<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Newsletter;

class NewsletterSubscription extends Model
{
    protected $fillable = ['email'];

    public static function createNewsletter($email)
    {
        $exists = NewsletterSubscription::where('email',$email)->first();
        if(empty($exists))
        {
            Newsletter::subscribePending($email);
            NewsletterSubscription::create(['email' => $email]);
            return 'success';
        }
        else
        { return 'exists'; }
        
    }
}
