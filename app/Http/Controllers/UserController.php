<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserGroup;

class UserController extends Controller
{
    public function index()
    {
        $this->data['group'] = UserGroup::all();
        return view('user.user', $this->data);
    }
}
