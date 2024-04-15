<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Product as ModelProduct;
use App\Models\Category;
use App\Models\Option;
use App\Models\productUser;
use App\Models\productOption;
use Illuminate\Support\Facades\Auth;

class Service extends Controller
{
    // protected $productId;

    public function allService()
    {
        $search = request('q');
        $services = ModelProduct::when($search, function($query) use ($search){
            $query->where('name','like','%'.$search.'%');
        })->get();
        $cates = Category::all();

        return view('client.product' , [
            'rooms' => [],
            'cates' => $cates,
            'products' => $services,
            'parentCategory'=>'',
            'searchValue'=>$search
        ]);
    }
    
    public function getProductByCategory($cateId){
        $rooms = Room::all();
        
        $cates = Category::all();
        $parentCategory = Category::find($cateId);
        $products = ModelProduct::select('id' , 'name' , 'image' , 'price' , 'price_sale')
                ->orderby('products.id' , 'desc')
                ->where('status',1)
                ->where('cate_id',$cateId)
                ->paginate(request('limit') ?? 20);

        // dd($rooms);
        return view('client.product' , [
            'rooms' => $rooms,
            'cates' => $cates,
            'products' => $products,
            'parentCategory'=>$parentCategory
        ]);
    }

    public function detail($id){
        $this->productId = $id;
        $product = ModelProduct::with('productOption')->find($id);
        $productUser = productUser::where('product_id' , $id)->where('user_id' , Auth::id())->count();
        $size = \App\Models\Option::find(12);
        $color = \App\Models\Option::find(15);

        if(Auth::check() &&  $productUser==0){
            $productViews = new productUser();
            $productViews->product_id = $product->id;
            $productViews->user_id = Auth::id();
            $productViews->save();
        }
        $productViewed = productUser::join('products' , 'product_user.product_id', '=' , 'products.id')
        ->where('product_user.user_id', Auth::id())->get();
        // dd($productViewed);
        $productRelate =  ModelProduct::with('category')
        ->where('products.cate_id' , $product->cate_id)
        ->get(); 
        return view('client.product-detail' , [
            'product' =>$product,
            'size' => $size,
            'color' => $color,
            'productRelate' => $productRelate,
            'productViewed' => $productViewed
        ]);
    } 

    public function filterSelect(Request $request){
        $query = ModelProduct::select('id'  ,'name' , 'image' , 'price' , 'price_sale' , 'quantity_view')
        ->where('products.status' , 1)
        ->when($request->cate_id, function($query) use ($request){
            $query->where('cate_id',$request->cate_id);
        })
        ->limit(20);
        $products = [];
        $selectValue = $_GET['valueSelect'] ? $_GET['valueSelect'] : '';
        if($selectValue == 1){
           $products =   $query->orderby('products.id' , 'desc')->get();
        }else if($selectValue == 2){
            $products =   $query->orderby('products.id' , 'asc')->get();
        }

        $this->renderAjax($products);
    }

    public function filterCate(){
        $cate_id = $_GET['cate_id'] ? $_GET['cate_id'] : '';
        $product = ModelProduct::select('id'  ,'name' , 'image' , 'price' , 'price_sale' , 'quantity_view')
        ->where('products.status' , 1);

        if($cate_id){
            $product = $product->where('cate_id' , '=' , $cate_id);
        }
        
        $product->skip(0)->take(10)->get();
        $this->renderAjax($product);
    }

    // public function filterPrice(){
    //     $cate_id = $_GET['valuePrice'] ? $_GET['valuePrice'] : '';
    //     $query = ModelProduct::select('id'  ,'name' , 'image' , 'price' , 'price_sale' , 'quantity_view')
    //     ->where('products.status' , 1)->where('');
    //     $this->renderAjax($product);
    // }

    public function filterRoom(){
        $room_id = $_GET['room_id'] ? $_GET['room_id'] : '';
        $products = ModelProduct::select('products.id'  ,'products.name' , 'products.image' , 'products.price' , 'products.price_sale' , 'products.quantity_view')->
        join('categories' , 'categories.id' ,'products.cate_id')
        ->where('categories.room_id' , $room_id)->get();
        $this->renderAjax($products);
    }
    
    function renderAjax($product){
        foreach ($product as $item) {
            $herf = route('client.product.detail' , $item->id);
            $sale = ceil(($item->price - $item->price_sale) * 100/$item->price);
            $image =  asset('upload/' . $item->image);

            $price_sale = number_format($item->price_sale, 0 , '.');
            $price = number_format($item->price_sale, 0 , '.');
            echo   "<div class='product-item'>
             <div class='product-item_img-box'>
                <a href='".$herf."'>
                    <img class='w-100' src='".$image ."' alt=''>
                </a>
                <div class='product-item_percent'>-".$sale."%</div>
                <a href='". $herf."' class='product-item_icon'>
                    <i class='fa-solid fa-magnifying-glass-plus'></i>
                </a>
            </div>
            <p class='product-item_name'><a href='". $herf."'>".$item->name."</a></p>
            <div class='product-item_price-wraper'>
                <div class='product-price-main'>
                  ". $price_sale."₫
                </div>
                <div class='product-price_sale'>
                    ".$price.">₫
                </div>
               </div>
           </div>";
        };
    }

    function filterSearch(){
        $keyword = $_GET['keyword'] ? $_GET['keyword'] : '';
       
        $product = ModelProduct::where('name' , 'LIKE' ,  '%'.$keyword.'%')->get();
        // var_dump($product);
        foreach($product as $item){
            $image =  asset('upload/' . $item->image);
            $herf = route('client.product.detail' , $item->id);
            $price_sale = number_format($item->price_sale, 0 , '.');
            echo 
            "<a style='text-decoration:none'  href='". $herf."'>
                <div class='product-search-item'>
                <img class='product-search-item-img w-100'
                src='".$image ."' alt=''>
                <div class='product-search-item-name' style='font-weigth:bold;color:#000'>
                    ".$item->name."
                </div>
                <h4 class='product-search-item-price'>".$price_sale."₫
                </h4>
            </div>
             <a>";
        }

    }

 
}