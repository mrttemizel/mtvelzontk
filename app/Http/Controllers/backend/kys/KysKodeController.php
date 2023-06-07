<?php

namespace App\Http\Controllers\backend\kys;

use App\Http\Controllers\Controller;
use App\Models\KysCategory;
use App\Models\KysCode;
use Illuminate\Http\Request;


class KysKodeController extends Controller
{
    public  function  index(){


        return view('backend.kys_code.index',[
            'data' => KysCode::all(),
            'category' => KysCategory::all(),
        ]);
    }

    public  function store(Request $request)
    {


        $validator = \Validator::make($request->all(), [
            'kys_kodu' => 'required',
            'kys_aciklamasi' => 'required',
            'kys_category' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $data = new KysCode();
            $data->code_name = $request->input('kys_kodu');
            $data->code_description = $request->input('kys_aciklamasi');
            $data->kyscategory_id  = $request->input('kys_category');

            $query = $data->save();
            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'NO']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Ekleme İşlemi Başarılı']);
            }
        }
    }

}
