<?php

namespace App\Jobs;

use App\Application;
use App\Mail\NotifyApplicationSender;
use App\Mail\NotifyClient;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class NotifyAboutApplication implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Application
     */
    private $application;

    /**
     * Create a new job instance.
     *
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->application->email)->send(new NotifyApplicationSender($this->application));
        Mail::to($this->application->event->user->email)->send(new NotifyClient($this->application));
    }
}
