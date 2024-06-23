<?php

namespace App\Listeners;

use App\Events\TaskAdded;
use App\Mail\TaskAddedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
class TaskAdedEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TaskAdded $event): void
    {
        //
        $task = $event->tasks;
        Mail::to('test@example.com')->send(new TaskAddedMail($task));

    }
}
