<?php

namespace App\Jobs;

use App\Mail\BulkMessageMail;
use App\Models\Membership;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendBulkMessageMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $bulkMessage;
    protected $members;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($bulkMessage, $members)
    {
        $this->bulkMessage = $bulkMessage;
        $this->members = $members;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = new BulkMessageMail($this->bulkMessage);
        foreach ($this->members as $memberId) {
            $member = Membership::find($memberId);
            Mail::to($member->email)->send($message);
        }
    }
}
