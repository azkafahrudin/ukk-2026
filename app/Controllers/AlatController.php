<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;

class AlatController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome');
    }
}
