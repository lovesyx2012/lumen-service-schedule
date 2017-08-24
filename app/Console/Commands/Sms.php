<?php

namespace App\Console\Commands;

class Sms extends Base
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:sms_daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '每天短信通知';


    protected function handleTask()
    {
        $this->comment('每天短信通知');
    }
}
