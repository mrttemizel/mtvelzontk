<?php

namespace App\Http\Controllers\backend\kys;

use App\Http\Controllers\Controller;
use App\Models\KysCode;


class KysKodeController extends Controller
{
    public  function  index(){
        return view('backend.kys_code.index');
    }

    public  function  show(){
        $members = KysCode::all();

        return view('backend.kys_code.kys_code_list', compact('members'));
    }
}
