<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    public function run(): void
    {
        ContactInfo::create([
            'email' => 'info@news254.co.ke',
            'tips_email' => 'tips@news254.co.ke',
            'phone' => '+254 751 153 333',
            'address' => 'Nairobi, Kenya',
            'facebook_url' => 'https://www.facebook.com/profile.php?id=61577716408403',
            'twitter_url' => 'https://x.com/News254kenya',
            'whatsapp_url' => 'https://whatsapp.com/channel/0029VbAVMuk84Om39cyJIB1p',
            'office_hours' => "Monday - Friday: 8:00 AM - 6:00 PM\nSaturday: 9:00 AM - 2:00 PM\nSunday: Closed"
        ]);
    }
}