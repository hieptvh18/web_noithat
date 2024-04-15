<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Cart extends Controller
{
    public function __construct()
    {
        if(!session()->exists('cart') && empty(session('cart'))){
            return redirect()->route('home');
        }
    }

    public function index()
    {
        $cart = array();
        if (session()->exists('cart')) {
            $cart = session('cart');
        }
        return view('client.cart', [
            'cart' => $cart
        ]);
    }

    public function addCart(Request $request)
    {
        $rowProduct = Product::find($request->id);
        $cart = [
            'id' => $request->id,
            'name' => $rowProduct->name,
            'img' => $rowProduct->image,
            'size' => 'Size:'  . '-' . $request->size   . '|'  . 'Color :' . $request->color,
            'price' => $rowProduct->price_sale,
            'number' => $request->quantity,
            'note' => $request->note
        ];

        session()->put('cart',  $cart);
        $result = session('cart');
        return redirect()->back()->with('success',  'Đặt dịch vụ thành công');
    }

    public function updateCart()
    {
        $data = json_decode($_GET['cartUpdate']);
        // dd($data);
        $cart = session('cart');
        foreach ($data as $ky => $value) {
            if (session()->exists('cart')) {
                $cart[$value->id]['number'] = $value->value;
            }
        }
        session()->forget('cart');
        session()->put('cart', $cart);
        session()->put('success', 'Cập nhật thành công !!!');
        echo 'success';
    }

    public function deleteCart($id)
    {
        // $cart = session('cart');
        // unset($cart[$id]);
        // session()->put('cart', $cart);

        Session::forget('cart');

        return redirect()->back()->with('success', 'Đã xóa thành công');
    }

    public function Order()
    {
        $cart = [];
        if (session()->exists('cart')) {
            $cart = session('cart');
        }
        return view('client.order', ['cart' => $cart]);
    }

    public function OrderStore(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|max:255',
                'note' => 'required'
            ];

            $messages =   [
                'name.required' => 'Name bắt buộc nhập',
                'email.required' => 'Email bắt buộc nhập',
                'phone.required' => 'Phone bắt buộc nhập',
                'note.required' => 'Ghi chú bắt buộc nhập',
            ];

            $this->validate($request, $rules, $messages);

            DB::beginTransaction();
            try {
                $order = new \App\Models\Order();
                if (Auth::check()) {
                    $user_id = Auth::id();
                }
                $order->user_id = $user_id;
                $order->fill($request->all());

                if (session()->exists('cart') && !empty(session('cart'))) {
                    $cart = session('cart');
                    $order->product_id  = $cart['id'];
                    $order->price  = $cart['price'];
                    $order->image  = $cart['img'];

                    $productModel = Product::find($cart['id']);

                    $order->product_name = $productModel->name;

                    session()->forget('cart');
                }

                $order->save();
            } catch (\Throwable $th) {
                abort(500, 'Not save Order');
                return false;
            }
            
            DB::commit();

            return redirect()->route('home')->with('success', 'Đặt hàng thành công');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đặt hàng thất bại');
        }
    }
}
