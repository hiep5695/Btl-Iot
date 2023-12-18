<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//sử dụng query builder
use DB;
//đối tượng mã hóa password
use Hash;
use Auth;
use Illuminate\Support\Arr;



class TudongController extends Controller
{
    public function read(Request $request){
        //lấy các bản ghi, phân 4 bản ghi trên 1 trang
        $data = DB::table("tudong")->orderBy("id","asc")->paginate(10);
       
        $bien="";
        foreach($data as $index=>$row){
            $bien.=(string)$row->thoigian;
            if($index!=count($data)-1){
                $bien.="m";
            }
        }
        return view("admin.tudong.read",compact('data','bien'));
    }
    public function update(Request $request,$id){
        //lấy 1 bản ghi
        $record = DB::table("tudong")->where("id","=",$id)->first();
        $action = url('backend/tudong/update-post/'.$id);
        return view("admin.tudong.create_update",["record"=>$record,"action"=>$action]);
    }
    public function updatePost(Request $request,$id){
        $thoigian = $request->get("thoigian");
        DB::table("tudong")->where("id","=",$id)->update(["thoigian"=>$thoigian]);
        
        return redirect(url('backend/tudong'));
    }
    public function create(Request $request){
        //tạo biến $action để đưa vào thuộc tính action của form
        $action = url('backend/tudong/create-post');
        return view("admin.tudong.create_update",["action"=>$action]);
    }
    public function createPost(Request $request){
        $thoigian = $request->get("thoigian");
        //có thể dùng cách khác để lấy giá trị
        
        //update name
        DB::table("tudong")->insert(["thoigian"=>$thoigian]);
        return redirect(url('backend/tudong'));
    }
    public function delete(Request $request,$id){
        //xóa bản ghi
        $record = DB::table("tudong")->where("id","=",$id)->delete();
        return redirect(url('backend/tudong'));
    }
}
