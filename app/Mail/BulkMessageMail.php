<?php

namespace App\Mail;

use App\Models\BulkMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BulkMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bulkMessage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BulkMessage $bulkMessage)
    {
        $this->bulkMessage = $bulkMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.bulk-message')
            ->subject('Message From ' . $this->bulkMessage->createdByEntity->name)
            ->with([
                'content' => $this->bulkMessage->content,
                'sentBy' => $this->bulkMessage->createdByEntity->name,
            ]);
    }
}
