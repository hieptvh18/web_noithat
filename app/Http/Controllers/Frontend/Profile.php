<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderUserMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Profile extends Controller
{
    public function index($id = ''){
        $user = Auth::user();
        $order = \App\Models\Order::with('orderDetail')
            ->where('orders.user_id' , Auth::id())
            ->orderBy('updated_at','desc')
            ->get();
       
        $proOrderDetail = [];
        $orderDetail = [];
        $sum =0;
        if($id){
            $orderDetail =  \App\Models\Order::with(['orderUserMedias'])
                                            ->where('id',$id)
                                            ->first();

            $proOrderDetail =  \App\Models\OrderDetail::with(['order' , 'product'])->where('order_id' , $id)->get();
        }
        return view('client.profile' ,  compact('user' , 'order' , 'proOrderDetail' ,   'orderDetail'));
    }

    public function updateInfo(Request $request){
        try {
                $user = \App\Models\User::find(Auth::id());
                $fileName = '';
                if($request->hasFile('avatar')){
                    $file =  $request->avatar;
                    $fileName =  $file->getClientoriginalName();
                    $file->move(public_path('/upload'), $fileName);
                }else{
                    $fileName = $user->avatar;
                }

                $user->password = $request->password ? 
                password_hash($request->password ,PASSWORD_DEFAULT) 
                : $user->password;
        
                $user->avatar = $fileName;
                $user->fill($request->all());
                $user->save();
                return redirect()->back()->with('success',  'Thay đổi thành công !');

        } catch (\Throwable $th) {
           $th->false;
        }
    }

    public function deleteProOrder($id){
        $pro = \App\Models\OrderDetail::find($id);
        if($pro){
            $pro->delete();
            return  redirect()->back()->with('success' , 'Xoá thành công  !');
        }
    }

    public function updateStatus($id){
        $cate = \App\Models\Order::find($id);
        $cate->status = 2;
        $cate->save();
        session()->put('order' , $cate);
        return redirect()->route('profile.index')->with('success' , 'Cập nhật thành công !!!');
    }

    public function updateStatusOrderMedia(Request $request, $id){
        $orderMediaId = $id;
        $status = $request->status;

        if(isset($status)){
            $media = OrderUserMedia::find($orderMediaId);
            $media->status = $status;
            $media->save();

            if($status == 2){ // set completed to order table
                $order = Order::find($media->order_id);
                $order->status = 3;
                $order->save();
            }
        }

        return redirect()->back()->with('success' , 'Cập nhật thành công !!!');
    }
}