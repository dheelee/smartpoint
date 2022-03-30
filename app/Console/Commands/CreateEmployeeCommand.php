<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Webhistory;

class CreateEmployeeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:create {emp_id} {emp_name} {ip_address} {url*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new employee';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $emp_id = $this->argument('emp_id');
       $emp_name = $this->argument('emp_name');
       $ip_address = $this->argument('ip_address');
       $urls = $this->argument('url');
       //print_r($urls);
       $employee =  Employee::create([
          'emp_id' => $emp_id,
          'emp_name' => $emp_name,
          'ip_address' =>$ip_address
        ]);

       if($employee->ip_address){
        foreach($urls as $key=>$url){
           $history = new Webhistory;
           $history->ip_address = $employee->ip_address;
           $history->url = $url;
           $history->date = Carbon::now()->toDateString();
           $history->save();
        }

       }

        $this->info($employee);
    }
}
