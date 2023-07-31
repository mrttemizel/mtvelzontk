<?php

namespace App\Http\Controllers\backend\project;

use App\Http\Controllers\Controller;
use App\Models\KysCode;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data->user_id = Auth::user()->id;
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

    public function delete($id)
    {
        $data = Project::find($id);
        if (Auth::user()->status == 0)
        {
            if (Auth::user()->id == $data->user_id)
            {
                $query = $data->delete();
                if (!$query) {
                    return back()->with('error', 'Proje  düzenlerken bir hata oluştu!');
                } else {
                    return back()->with('success', 'Proje silme işlemi başarılı.');
                }
            }
            return back()->with('error', 'Başkasının Eklediği Projeyi Silemezsiniz!');
        }

        $query = $data->delete();
        if (!$query) {
            return back()->with('error', 'Proje  düzenlerken bir hata oluştu!');
        } else {
            return back()->with('success', 'Proje silme işlemi başarılı.');
        }
    }

    public function edit($id)
    {
        $data = Project::find($id);
        if (Auth::user()->status == 0)
        {
            if (Auth::user()->id == $data->user_id)
            {
                return view('backend.project.edit', [
                    'code' => KysCode::all()->where('kyscategory_id',1),
                    'data' => Project::where('id', $id)->first(),
                ]);
            }
            return back()->with('error', 'Başkasının Eklediği Projeyi Düzenlemezsiniz!');
        }
        return view('backend.project.edit', [
            'code' => KysCode::all()->where('kyscategory_id',1),
            'data' => Project::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request)
    {
        $data = Project::where('id', $request->input('id'))->first();
        $request->validate([

            'kys_olcutu' => 'required',
            'proje_adi' => 'required',

        ]);

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

        $query = $data->update();
        if (!$query) {
            return back()->with('error', 'Proje Güncelleme Başarısız');
        } else {
            return back()->with('success', 'Proje Güncelleme Başarılı.');
        }
    }
}
