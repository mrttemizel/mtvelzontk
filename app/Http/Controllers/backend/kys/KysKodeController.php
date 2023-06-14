<?php

namespace App\Http\Controllers\backend\kys;

use App\Http\Controllers\Controller;
use App\Models\KysCategory;
use App\Models\KysCode;
use Illuminate\Http\Request;


class KysKodeController extends Controller
{
    public function index()
    {


        return view('backend.kys_code.index', [
            'data' => KysCode::all(),
            'category' => KysCategory::all(),
        ]);
    }


    public function create()
    {


        return view('backend.kys_code.create', [
            'category' => KysCategory::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([

            'kys_kodu' => 'required',
            'kys_aciklamasi' => 'required',
            'kys_category' => 'required',
        ]);

        $data = new KysCode();
        $data->code_name = $request->input('kys_kodu');
        $data->code_description = $request->input('kys_aciklamasi');
        $data->kyscategory_id = $request->input('kys_category');

        $query = $data->save();
        if (!$query) {
            return back()->with('error', 'KYS Kodu  eklenirken bir hata oluştu!');
        } else {
            return back()->with('success', 'KYS Kodu Ekleme Başarılı.');
        }
    }

    public function delete($id)
    {
        $data = KysCode::find($id);

        $query = $data->delete();
        if (!$query) {
            return back()->with('error', 'KYS Kodu  düzenlerken bir hata oluştu!');
        } else {
            return back()->with('success', 'KYS Kodu  işlemi başarılı.');
        }
    }


    public function edit($id)
    {
        return view('backend.kys_code.edit', [
            'data' => KysCode::where('id', $id)->first(),
            'category' => KysCategory::all(),
        ]);

    }

    public function update(Request $request)
    {
        $notification_success = array(
            'message' => 'Güncelleme Başarılı',
            'alert-type' => 'success'
        );

        $notification_error = array(
            'message' => 'Güncelleme Başarısız',
            'alert-type' => 'error'
        );
        $request->validate([

            'kys_kodu' => 'required',
            'kys_aciklamasi' => 'required',
            'kys_category' => 'required',
        ]);

        $data = KysCode::find($request->id);

        $data->code_name = $request->input('kys_kodu');
        $data->code_description = $request->input('kys_aciklamasi');
        $data->kyscategory_id = $request->input('kys_category');




        $query = $data->update();

        if (!$query) {
            return back()->with($notification_error);
        } else {
            return redirect()->route('kys.code.index')->with($notification_success);
        }
    }


}
