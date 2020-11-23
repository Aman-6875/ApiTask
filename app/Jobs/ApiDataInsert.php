<?php

namespace App\Jobs;

use App\ApiData;
use App\Domain;
use App\Hirtory;
use App\Stats;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ApiDataInsert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $request;
    public function __construct(array $input)
    {

        $this->input = $input;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

            // Do something
            $mytime = Carbon::now();
            $this->input['registration_date']= $mytime->toDateTimeString();
            $api_data = [
                'domain_name'=>$this->input['domain_name'],
                'extention'=>$this->input['extention'],
                'registration_date'=>$this->input['registration_date'],
                'status'=>$this->input['status'],
                'mr'=>$this->input['mr'],
                'pa'=>$this->input['pa'],
                'da'=>$this->input['da'],
            ];
            $api_data_id =  ApiData::insertGetId($api_data);
            $domain = [
                'domain_name'=>$this->input['domain_name'],
                'extention'=>$this->input['extention'],
                'registration_date'=>$this->input['registration_date'],
                'status'=>$this->input['status']

            ];
            $stats = [
                'mr'=>$this->input['mr'],
                'pa'=>$this->input['pa'],
                'da'=>$this->input['da'],
            ];
            $history = [
                'mr'=>$this->input['mr'],
                'pa'=>$this->input['pa'],
                'da'=>$this->input['da'],
                'status'=>$this->input['status'],
                'status_update'=>$this->input['registration_date'],
                'api_data_id'=>$api_data_id
            ];
            Domain::create($domain);
            Stats::create($stats);
            Hirtory::create($history);

            return response()->json($api_data_id, 201);


    }
}
