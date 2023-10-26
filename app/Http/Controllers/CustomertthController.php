<?php

namespace App\Http\Controllers;

use App\Models\Customertth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomertthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\customertth  $customertth
     * @return \Illuminate\Http\Response
     */
    public function show(customertth $customertth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customertth  $customertth
     * @return \Illuminate\Http\Response
     */
    public function edit(customertth $customertth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customertth  $customertth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customertth $customertth)
    {
      // echo ("masuk");
      $input = $request->validate([
        'sudahTerima' => 'required',
        'custID' => 'required',
        'failedReason' => 'required',
      ]);
      $custID = $input['custID'];
      $failedReason = $input['failedReason'];
      $date = date("Y-m-d H:i:s");
      if ($input['sudahTerima'] == "sudah") {
        $received = 1;
        // Customertth::where('CustID', $input['custID'])
        //     ->update([
        //       'Received' => $received,
        //       'ReceivedDate' => $date,
        //     ]);
        DB::select(DB::raw("UPDATE `dbo.customertth` SET Received=$received, ReceivedDate='$date' WHERE CustID='$custID';"));
      } else if($input['sudahTerima'] == "belum") {
        $received = 0;
        // Customertth::where('CustID', $input['custID'])
        //     ->update([
        //       'Received' => $received,
        //       'ReceivedDate' => $date,
        //       'FailedReason' => $input['failedReason'],
        //     ]);
        DB::select(DB::raw("UPDATE `dbo.customertth` SET Received=$received, ReceivedDate='$date', FailedReason='$failedReason' WHERE CustID='$custID';"));
      }
      // $hasil = $stmt->execute();
      // if ($hasil == true) {
      //   $arr=["result"=>"success","custID"=>$custID]; 
      // } else {
      //   $arr=["result"=>"fail","Error"=>$conn->error];
      // }
      // echo json_encode($arr);
      return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customertth  $customertth
     * @return \Illuminate\Http\Response
     */
    public function destroy(customertth $customertth)
    {
        //
    }
}
