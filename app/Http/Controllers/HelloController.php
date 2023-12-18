<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//để sử dụng đối tượng Validator thì phải use thư viện sau
use Illuminate\Support\Facades\Validator;

class HelloController extends Controller
{    
    public function index(){
        echo "<h1>Controller Hello, action index</h1>";
    }
    //truyền tham số từ url vào hàm trong controller
    public function index2($bien1,$bien2){
        echo "<h1>$bien1 $bien2</h1>";
    }
    //GET
    public function form1(){
        //gọi view có tên là form1.blade.php
        return view("php64.form1");
    }
    //sau khi ấn nút submit
    //có thể truyền vào class Request để lấy giá trị của thẻ form
    public function form1Post(Request $request){
        $name = $request->get("name");
        $email = $request->get("email");
        echo "<h1>$name - $email</h1>";
    }
    //GET
    public function form2(){
        //gọi view có tên là form1.blade.php
        return view("php64.form2");
    }
    //POST
    public function form2Post(){ 
        //truyền dữ liệu ra view
        return view("php64.form2");
    }
    //validation
    public function validation(){
        return view("php64.form3");
    }
    //validation post
    public function validationPost(Request $request){
        //lấy tất cả các giá trị của thẻ form: $request->all()
        $validator = Validator::make($request->all(),['name'=>'required|string|max:10','email'=>'email']);//tra ve true hoac false
        //nếu chưa pass được thông tin trên
        if($validator->fails()){
            return redirect(url('controller/validation'))->withErrors($validator);
        }
        echo "<h1>Confirm OK</h1>";
    }   
}
