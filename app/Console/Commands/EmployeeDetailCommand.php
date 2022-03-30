<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Webhistory;

class EmployeeDetailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:detail {ip_address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Detail view of employee';

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
        $ip_address = $this->argument('ip_address');
        $employee_details = Employee::whereip_address($ip_address)->with('web_history')->first();
        if($employee_details){
         $this->info($employee_details);
        }else{
         $this->info("No Such Details");
        }

    }
}
