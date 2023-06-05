<?php

namespace App\Http\Controllers\backend\kys;

use App\Http\Controllers\Controller;
use App\Models\KysCategory;
use Illuminate\Http\Request;

class KyscategoryController extends Controller
{
    public  function  index(){
        $data = KysCategory::all();
        return view('backend.kys_category.index',compact('data'));
    }

    public  function  store(Request $request){
        $request->validate([

            'kys_category_name' => 'required|unique:kys_categories',

        ]);

        $data = new KysCategory();
        $data->kys_category_name = $request->input('kys_category_name');


        $query = $data->save();
        if (!$query) {
            return back()->with('error', 'Kullanıcı eklenirken bir hata oluştu!');
        } else {
            return back()->with('success', 'Kategori ekleme başarılı.');
        }
    }

    public function delete($id)
    {
        $data = KysCategory::find($id);

        $query = $data->delete();
        if (!$query) {
            return back()->with('error', 'Kategori düzenlerken bir hata oluştu!');
        } else {
            return back()->with('success', 'Kategori silme işlemi başarılı.');
        }
    }




}
