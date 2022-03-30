<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Webhistory;

class DeleteEmployeeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:delete {ip_address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete an employee';

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
        $delete_employee = Employee::whereip_address($ip_address)->delete();
        $delete_web_history = Webhistory::whereip_address($ip_address)->delete();
        $this->info("Employee Deleted Successfully");
    }
}
