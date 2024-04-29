<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Room;

class adminCate extends Controller
{
    private $cates;
    private $rooms;
    public function __construct(){
        $this->cates = Category::orderby('categories.id' , 'desc')->with('room')
        ->paginate(request('limit') ?? 7);
        $this->rooms = Room::all();
        // dd( $this->cates);
    }

    public function index(){
        $keyword = isset($_GET['q']) ? $_GET['q'] : "";
        // dd($keyword);
        $query =Category::orderby('categories.id' , 'asc');
        $room_id = isset($_GET['room_id']) ? $_GET['room_id'] : "";
        if(!empty($keyword)) $query = Category::where('categories.name' , 'LIKE' , "%$keyword%");
        if(!empty($room_id)) $query = Category::where('categories.room_id' , '=' , $room_id);
        // dd($this->cates);
        if(!empty($keyword) && !empty($room_id)){
            $query = Category::where('categories.name' , 'LIKE' , "%$keyword%")->where('categories.room_id' , '=' , $room_id);
        }
       
        $cates = $query
                ->orderBy('id','asc')
                ->paginate(request('limit') ?? 5);
        // dd($this->cates);
        return view('admin.adminCate.adminCate' , ['cates' => $cates , 'rooms' => $this->rooms]);
    }

    public function store(Request $request){
        $cate = new Category();

        if($request->hasFile('image')){
            $file = $request->image;
            $fileName = $file->getClientoriginalName();
            $file->move(public_path('/upload'), $fileName);
        }else{
            $fileName = '';
        }
   
        $cate->image = $fileName;
        $cate->fill($request->all());
        $cate->save();
        session()->put('success' , 'Thêm thành công');
        return redirect()->route('cate.index');
    }

    public function update(Request $request, $id){
        $cate = Category::find($id);

        if($request->hasFile('image')){
            $file = $request->image;
            $fileName = $file->getClientoriginalName();
            $file->move(public_path('/upload'), $fileName);
            $cate->image = $fileName;
        }
   
        $cate->fill($request->all());
        $cate->save();
        // session()->put('success' , 'Cập nhật thành công');
        return redirect()->back()->with('success','Cập nhật thành công');
    }

    public function distroy($id){
        try {
            $cate = Category::find($id);
            if($cate){
                $cate->delete();
                session()->put('success', 'Xóa thành công');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function edit($id){
        $cate = Category::find($id);

        return view('admin.adminCate.edit', compact('cate'));
    }

    public function updateStatus(){
        $idCate = $_GET['id'];
        $status = $_GET['status'];

        $cate = Category::find($idCate);
        $cate->status =  $status;
        $cate->save();
        echo  'success';
        //  var_dump($cate);
    }

}