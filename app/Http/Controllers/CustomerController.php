<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Customertth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // echo "masuk";
      // $data = Customer::all();
      $data = DB::select(DB::raw("SELECT * FROM `dbo.customer`"));
      $received = 0;
      $i = 0;
      foreach($data as $d) {
        $hadiahList = [];
        $custID = $d->CustID;
        // $hadiahs = Customertth::select('TTOTTPNo', 'received')
        //                     ->where('CustID', $custID);
        $hadiahs = DB::select(DB::raw("SELECT t.TTOTTPNo, t.received FROM `dbo.customertth` t WHERE t.CustID='$custID'"));
        foreach ($hadiahs as $hadiah) {
          array_push($hadiahList, $hadiah->TTOTTPNo);
          $received = $hadiah->received;
        }
        $data[$i]->hadiah = $hadiahList;
        $data[$i]->received = $received;
        $i++;
      }

      $datas = ["data"=>$data];
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
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        //
    }
}
