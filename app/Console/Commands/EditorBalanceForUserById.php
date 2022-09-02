<?php

namespace App\Console\Commands;

use App\Services\BalanceService;
use Illuminate\Console\Command;

class EditorBalanceForUserById extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'edit:balance {operator} {id} {amount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '
    Addition or subtraction user balance with command line.
    For addition balance use command like :  " php artisan edit:balance add 1 1000 ",
    For subtraction balance use command like :  " php artisan edit:balance rm 1 1000 ",
    ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $operator = $this->argument('operator');
        if ($operator == 'add') {
            try {
                (new BalanceService())->income($this->argument('id'), $this->argument('amount'));
                $this->info("success");
            } catch (\Exception $e) {
                $this->info("error");
            }
        } elseif ($operator == 'rm') {
            try {
                (new BalanceService())->outcome($this->argument('id'), $this->argument('amount'));
                $this->info("success");
            } catch (\Exception $e) {
                $this->info("error");
            }
        }
    }
}
