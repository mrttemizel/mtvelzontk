<?php

namespace App\Http\Controllers\backend\kys;

use App\Http\Controllers\Controller;


class KysKodeController extends Controller
{
    public  function  index(){
        return view('backend.kys_code.index');
    }
}
