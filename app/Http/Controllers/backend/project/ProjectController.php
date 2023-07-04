<?php

namespace App\Http\Controllers\backend\project;

use App\Http\Controllers\Controller;
use App\Models\KysCode;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function  index(){
        $data = Project::all();
        return view('backend.project.index',compact('data'));
    }

    public function  create(){
        $data = KysCode::all()->where('kyscategory_id',1);
        return view('backend.project.create',compact('data'));
    }

    public function  store(Request $request){

        $request->validate([

            'kys_olcutu' => 'required',
            'proje_adi' => 'required',

        ]);
        $data  = new Project();
        $data->kys_olcutu = $request->input('kys_olcutu');
        $data->proje_adi = $request->input('proje_adi');
        $data->destek_alinan_kurum = $request->input('destek_alinan_kurum');
        $data->cagri_tipi = $request->input('cagri_tipi');
        $data->proje_no = $request->input('proje_no');
        $data->proje_butcesi = $request->input('proje_butcesi');
        $data->baslangic_tarihi = $request->input('baslangic_tarihi');
        $data->bitis_tarihi = $request->input('bitis_tarihi');
        $data->is_birligi = $request->input('is_birligi');
        $data->arastirmacilar = $request->input('arastirmacilar');
        $data->proje_aciklama = $request->input('proje_aciklama');
        $data->temel_alani = $request->input('temel_alani');

        $query = $data->save();
        if (!$query) {
            return back()->with('error', 'Proje Ekleme Başarısız');
        } else {
            return back()->with('success', 'Proje Ekleme Başarılı.');
        }
    }
}
