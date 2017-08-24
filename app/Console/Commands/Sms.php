<?php

namespace App\Console\Commands;

use Flc\Alidayu\Client;
use Flc\Alidayu\App;
use Flc\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;
use Flc\Alidayu\Requests\IRequest;

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
        file_put_contents("/vagrant_data/github/lumen-service-schedule/log.txt",config('alidayu.app_key'),FILE_APPEND);
        $this->comment('每天短信通知');
    }
}
