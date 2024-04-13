<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function index(){
        $data = Contact::paginate(20);

        return view('admin.adminContact.index',compact('data'));
    }

    public function updateStatus($id){
        try{
            $record = Contact::findOrFail($id);
            $record->status = 2;
            $record->save();

            return redirect()->route('contact.index')->with('success','Cập nhật trạng thái thành công!');
        }catch(\Throwable $th){
            return redirect()->route('contact.index')->with('error','Cập nhật trạng thái không thành công!');
        }
    }

    public function delete($id){
        try{
            $record = Contact::findOrFail($id);
            $record->delete();
            return redirect()->route('contact.index')->with('success','Xóa thành công!');
        }catch(\Throwable $th){
            return redirect()->route('contact.index')->with('error','Xóa không thành công!');
        }
    }
}
