<?php

namespace App\Http\Controllers;

use App\Models\Mobileconfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobileconfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = [];
      // $mobile = Mobileconfig::all();
      $mobile = DB::select(DB::raw("SELECT * FROM `dbo.mobileconfig`"));
      foreach($mobile as $d) {
        $values = explode("|", $d->Value);
        foreach($values as $value) {
          $result2 = DB::select(DB::raw("SELECT d.Jenis, SUM(d.Qty) AS Qty FROM `dbo.customertthdetail` d WHERE d.TTHNo LIKE '%00A%' AND d.Jenis = '$value' GROUP BY d.jenis"));
          foreach($result2 as $r2) {
            if ($r2->Jenis != null){
              if (explode(' ', $r2->Jenis)[0] == 'Emas') {
                $r2->Unit = 'Buah';
              } else if (explode(' ', $r2->Jenis)[0] == 'Voucher') {
                $r2->Unit = 'Lembar';
              }
              array_push($data, $r2);
            }
          }
        }
      }
      $datas = ["data" => $data];
      return response()->json($datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mobileconfig  $mobileconfig
     * @return \Illuminate\Http\Response
     */
    public function show(mobileconfig $mobileconfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mobileconfig  $mobileconfig
     * @return \Illuminate\Http\Response
     */
    public function edit(mobileconfig $mobileconfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mobileconfig  $mobileconfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mobileconfig $mobileconfig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mobileconfig  $mobileconfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(mobileconfig $mobileconfig)
    {
        //
    }
}
