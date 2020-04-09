<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function getContactInfo()
    {
        $contact = Contact::first();
        return response()->json(['status' => 200, 'data' => ['email' => $contact->email, 'phone' => $contact->phone, 'whatsapp' => $contact->whatsapp]], 200);
    }
}
