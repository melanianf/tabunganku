<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class transaksi extends Controller
{
    public function getTabunganReguler($nis){
        $data = DB::table('transaksis')->where('nis',$nis)->get();
        if(count($data)>0){
            $res['message'] = "Success!";
            $res['value'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Empty!";
            return response($res);
        }
    }
    public function getSaldoReguler($nis){
        $nominal=0;
        $data = DB::table('transaksis')->where('nis',$nis)->get();
        if(count($data)>0){
            foreach($data as $transaksi){
                if($transaksi->jenis_tabungan =="reguler"){
                    $nominal=$nominal+$transaksi->nominal;
                }
            }
            $res['Total'] = $nominal;
            return response($res);
        }
        else{
            $res['message'] = "Empty!";
            return response($res);
        }
    }
}
