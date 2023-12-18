<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use DB;

class LayDuLieuCommand extends Command
{
    protected $signature = 'lay-du-lieu';

    protected $description = 'Lay du lieu tu URL va luu lai';

    public function handle()
    {
        // Gọi đến URL và lấy dữ liệu
        $response = Http::get('http://68.183.236.192/-QKPnSkVxFV-Hhw70YVxs2kVJHfhGKmC/get/V1');

        $thoi_gian_utc = gmdate("Y-m-d H:i:s");
        $day=date("d-m-Y", strtotime($thoi_gian_utc . " +7 hours"));
        $gio=date("H", strtotime($thoi_gian_utc . " +7 hours"));
        $doam=request("doam");
        DB::table("doam")->insert(["date"=>$day,"hour"=>$gio,"doam"=>$response]);

        $this->info('Da lay du lieu thanh cong!');
    }
}
