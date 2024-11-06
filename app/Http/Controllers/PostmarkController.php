<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
//require_once ()'.autoload.php//'; // or include '.autoload.php';
use Postmark\PostmarkClient;
use App\Models\EmailSent;

class PostmarkController extends Controller
{
    public function webhook(Request $request)
    {
        \Log::info(json_encode($request->all()));
        
        $newEmailSent = new EmailSent();
        //$newEmailSent->email_address = $request->emailAddress;
        //$newEmailSent->save();
        
        return response('OK', 200);
    }

    public function sendEmail(Request $request)
    {
        \Log::info(json_encode($request->all()));
        \Log::info(env('POSTMARK_API_KEY'));
        
        $client = new PostmarkClient(env('POSTMARK_API_KEY')); //env(POSTMARK_API_KEY);
        $fromEmail = "interviews@cztester.com";
        $toEmail = $request->emailAddress;
        $subject = "Hello from Postmark";
        $htmlBody = "<strong>Hello</strong> dear Postmark user.";
        $textBody = "Hello dear Postmark user.";
        $tag = "example-email-tag";
        $trackOpens = true;
        $trackLinks = "None";
        $messageStream = "outbound";

        // Send an email:
        $sendResult = $client->sendEmail(
        $fromEmail,
        $toEmail,
        $subject,
        $htmlBody,
        $textBody,
        $tag,
        $trackOpens,
        NULL, // Reply To
        NULL, // CC
        NULL, // BCC
        NULL, // Header array
        NULL, // Attachment array
        $trackLinks,
        NULL, // Metadata array
        $messageStream
        );

        \Log::info(json_encode($sendResult));
        return response('OK', 200);
    }
}