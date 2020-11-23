<?php

namespace App\Http\Controllers;

use App\ApiData;
use App\Domain;
use App\Hirtory;
use App\Jobs\ApiDataInsert;
use App\Stats;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApiData::all();
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
    // public function store(Request $request)
    // {
    //     //return $request->all();
    //     $mytime = Carbon::now();
    //     $request['registration_date']= $mytime->toDateTimeString();

    //     $api_data_id =  ApiData::insertGetId($request->all());
    //     $domain = [
    //         'domain_name'=>$request['domain_name'],
    //         'extention'=>$request['extention'],
    //         'registration_date'=>$request['registration_date'],
    //         'status'=>$request['status']

    //     ];
    //     $stats = [
    //         'mr'=>$request['mr'],
    //         'pa'=>$request['pa'],
    //         'da'=>$request['da'],
    //     ];
    //     $history = [
    //         'mr'=>$request['mr'],
    //         'pa'=>$request['pa'],
    //         'da'=>$request['da'],
    //         'status'=>$request['status'],
    //         'status_update'=>$request['registration_date'],
    //         'api_data_id'=>$api_data_id
    //     ];
    //     Domain::create($domain);
    //     Stats::create($stats);
    //     Hirtory::create($history);

    //     return response()->json($api_data_id, 201);
    // }

    public function store(Request $request)
    {

        // $job = New ApiDataInsert($request);
      ApiDataInsert::dispatch($request->all())->delay(now()->addSeconds(10));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ApiData  $apiData
     * @return \Illuminate\Http\Response
     */
    public function show(ApiData $apiData)
    {
        return $apiData;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ApiData  $apiData
     * @return \Illuminate\Http\Response
     */
    public function edit(ApiData $apiData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApiData  $apiData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApiData $apiData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApiData  $apiData
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApiData $apiData)
    {
        //
    }
}
