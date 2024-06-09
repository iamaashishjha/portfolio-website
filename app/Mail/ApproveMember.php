<?php

namespace App\Mail;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ApproveMember extends Mailable
{
    use Queueable, SerializesModels;

    public $member;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    /**
 * Build the message.
 *
 * @return $this
 */
public function build()
{
    try {
        return $this->view('email.verifyMember')
                    ->with([
                        'memberName' => $this->member->name_en,
                        'approvedBy' => $this->member->approveUser->name,
                    ]);
    } catch (\Throwable $th) {
        Log::error("APPROVE-MEMBER-MAIL", [$th->getMessage()]);
    }
}
}
