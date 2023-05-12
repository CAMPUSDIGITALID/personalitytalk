<?php

namespace Campusdigital\CampusCMS\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * int id pelamar
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // CS
        $cs = User::where('role','=',role('cs'))->first();

		// Get data user
		$user = User::find($this->user);
		
        return $this->from($cs->email, setting('site.name'))->markdown('faturcms::email.verification')->subject('Selamat Datang di '.setting('site.name').'!')->with([
            'user' => $user,
        ]);
    }
}
