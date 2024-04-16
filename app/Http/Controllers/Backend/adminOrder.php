<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderUserMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminOrder extends Controller
{
   public function index(){
    $search = request('q');
    $orders = Order::orderby('orders.id' , 'desc')
                    ->when($search, function($query) use ($search){
                        $query->where('name','like','%'.$search.'%')
                                ->orWhere('phone','like','%'.$search.'%');
                    })
                    ->paginate(request('limit') ?? 5 );
    return view('admin.adminOrder.adminOrder' ,compact('orders'));
   } 

   public function detail($id){
        $orderDetail = Order::with(['orderUserMedias'])
                                ->where('id',$id)
                                ->first();

        $products = OrderDetail::where('order_id' , $id)->get();
        $sum = 0;
        foreach($products as $key){
            $sum+=$key->price * $key->quantity;
        }
        return view('admin.adminOrder.detail', compact('orderDetail' , 'products' , 'sum'));
   }

   public function updateStatus(){
            $status = $_GET['status'] ? $_GET['status'] : '';
            $order_id = $_GET['order_id'] ? $_GET['order_id'] : '';
            $order = Order::find($order_id);
            if($status == ""){
                $order->status = 0;
                $order->save();
                echo 'success';
            }else{
                $order->status = $status;
                $order->save();
                echo 'success';
            }   
   }
   
   public function deleteOrderDetail($id){
        $orderDetail  = OrderDetail::find($id);
        if($orderDetail){
            $orderDetail->delete();
        }
        return redirect()->back()->with('success' , 'Delete success');
   }

   public function delete($id){
        $order  = Order::find($id);
        if($order){
            $order->delete();
        }
        return redirect()->back()->with('success' , 'Delete success');
   }

   // handle order media
   public function sendDesign(Request $request, $orderId){
        $request->validate([
            'file'=>'required|max:4196', // 4mb
        ]);

        try{
            DB::beginTransaction();

            $model = new OrderUserMedia();
            if($request->hasFile('file')){
                $file = $request->file;
                $filename =  $file->getClientoriginalName();
                $file->move(public_path('/upload'), $filename);
                $model->files = $filename;
            }
            $model->order_id = $orderId;
            $model->status = 0;
            $model->note = '';

            $model->save();
            DB::commit();

            return redirect()->route('order.detail',['id'=>$orderId])->with('success','Gửi thành công');

        }catch(\Throwable $e){
            DB::rollBack();
            report($e);
            return redirect()->route('order.detail',['id'=>$orderId])->with('error','Gửi thất bại');
        }
   }

    public function deleteOrderMedia($id){
        $order  = OrderUserMedia::find($id);
        if($order){
            $order->delete();
        }
        return redirect()->back()->with('success' , 'Delete success');
    }
}