<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LevelUserController extends Controller
{
    public function index()
    {
        return view ('master.leveluser.index');
    }
}
