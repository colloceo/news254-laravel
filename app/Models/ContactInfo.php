<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = 'contact_info';
    
    protected $fillable = [
        'email',
        'tips_email',
        'phone',
        'address',
        'facebook_url',
        'twitter_url',
        'whatsapp_url',
        'office_hours'
    ];
    
    public static function getContactInfo()
    {
        return self::first() ?? new self([
            'email' => 'info@news254.co.ke',
            'tips_email' => 'tips@news254.co.ke',
            'phone' => '+254 751 153 333',
            'address' => 'Nairobi, Kenya',
            'facebook_url' => '#',
            'twitter_url' => '#',
            'whatsapp_url' => '#',
            'office_hours' => 'Monday - Friday: 8:00 AM - 6:00 PM'
        ]);
    }
}
