<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, HasFactory, Notifiable;

    public function partnershipRequest()
    {
        return PartnershipRequest::where('status', 0)->count();
    }

    public function contactRequest()
    {
        return ContactRequest::where('status', 0)->count();
    }
    public function demoRequest()
    {
        return DemoRequest::where('status', 0)->count();
    }
}
