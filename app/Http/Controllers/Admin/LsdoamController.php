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
use Illuminate\Support\Facades\Http;


class LsdoamController extends Controller
{
    public function read(Request $request){
        $data = DB::table("doam")->orderBy("id","asc")->where("date","=","20-11-2023")->paginate(10);
        $data1 = DB::table("doam")->orderBy("id","asc")->where("date","=","21-11-2023")->paginate(10);
        return view("admin.lsdoam.read",compact("data","data1"));
       
    }
    public function update(Request $request){
        $response = Http::get('http://68.183.236.192/-QKPnSkVxFV-Hhw70YVxs2kVJHfhGKmC/get/V1');
        $thoi_gian_utc = gmdate("Y-m-d H:i:s");
        $day=date("d-m-Y", strtotime($thoi_gian_utc . " +7 hours"));
        $gio=date("H", strtotime($thoi_gian_utc . " +7 hours"));
        $doam=$response->body();
        // DB::table("doam")->insert(["date"=>$day,"hour"=>$gio,"doam"=>$response]);
        return response()->json($doam);
    }
}
