<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

abstract class Base extends Command
{
    abstract protected function handleTask();

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $startTime = microtime(true);
        $this->comment(PHP_EOL . 'prepare task ' . $this->getSignature() . ' ...');

        if (method_exists($this, 'init')) {
            $this->init();
        }

        try {
            $this->handleTask();
            $this->comment(PHP_EOL . 'task ' . $this->getSignature()
                           . ' execution finished, time consuming '
                           . sprintf('%.8f', microtime(true) - $startTime) . " s");
        } catch (\Exception $e) {
            \Log::error('task execution failed', [
                'task'  => $this->getSignature(),
                'error' => $e->getCode() . ':' . $e->getMessage(),
                'file'  => $e->getFile() . ':' . $e->getLine(),
            ]);

            $this->comment(PHP_EOL . 'task ' . $this->getSignature() . ' execution failed!');
        }

    }

    protected function logDebug($message, $data = [])
    {
        $this->log('debug', $message, $data);
    }

    protected function logWarning($message, $data = [])
    {
        $this->log('warning', $message, $data);
    }

    protected function logInfo($message, $data = [])
    {
        $this->log('info', $message, $data);
    }

    protected function logError($message, $data = [])
    {
        $this->log('error', $message, $data);
    }

    protected function log($level, $message, $data = [])
    {
        \Log::$level($this->getSignature(), ['msg' => $message, 'data' => $data]);
    }

    protected function getSignature()
    {
        return explode(' ', $this->signature)[0];
    }
}