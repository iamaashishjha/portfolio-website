<?php

namespace App\Jobs;

use App\Mail\ApproveMember;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMembershipApprovalMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $member;
    protected $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($member, $email)
    {
        $this->member = $member;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = new ApproveMember($this->member);
        Mail::to($this->email)->send($message);
    }
}
