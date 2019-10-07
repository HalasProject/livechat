<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function all(){
        return User::all();
    }
}
