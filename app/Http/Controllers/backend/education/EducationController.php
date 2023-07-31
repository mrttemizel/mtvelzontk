<?php

namespace App\Http\Controllers\backend\education;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\KysCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function  index(){
        $data = Education::all();
        return view('backend.education.index',compact('data'));
    }


    public function  create(){
        $data = KysCode::all()->where('kyscategory_id',2);
        return view('backend.education.create',compact('data'));
    }


    public function  store(Request $request){

        $request->validate([

            'kys_olcutu' => 'required',
            'faliyetin_adi' => 'required',

        ]);
        $data  = new Education();
        $data->user_id = Auth::user()->id;
        $data->kys_olcutu = $request->input('kys_olcutu');
        $data->faliyetin_adi = $request->input('faliyetin_adi');
        $data->faliyetin_tipi = $request->input('faliyetin_tipi');
        $data->is_birligi = $request->input('is_birligi');
        $data->faliyetin_butcesi = $request->input('faliyetin_butcesi');
        $data->baslangic_tarihi = $request->input('baslangic_tarihi');
        $data->bitis_tarihi = $request->input('bitis_tarihi');
        $data->hedef_kitlesi = $request->input('hedef_kitlesi');
        $data->hedef_kitle_sayisi = $request->input('hedef_kitle_sayisi');
        $data->faliyeti_gerceklestiren_personel = $request->input('faliyeti_gerceklestiren_personel');
        $data->faliyetin_kisa_aciklamasi = $request->input('faliyetin_kisa_aciklamasi');
        $data->temel_alani = $request->input('temel_alani');

        $query = $data->save();
        if (!$query) {
            return back()->with('error', 'Eğitim Faliyeti  Ekleme Başarısız');
        } else {
            return back()->with('success', 'Eğitim Faliyeti  Ekleme Başarılı.');
        }
    }

    public function delete($id)
    {
        $data = Education::find($id);


        $query = $data->delete();
        if (!$query) {
            return back()->with('error', 'Eğitim Faliyeti  düzenlerken bir hata oluştu!');
        } else {
            return back()->with('success', 'Eğitim Faliyeti silme işlemi başarılı.');
        }
    }

    public function edit($id)
    {

        return view('backend.education.edit', [
            'code' => KysCode::all()->where('kyscategory_id',1),
            'data' => Education::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request)
    {
        $data = Education::where('id', $request->input('id'))->first();
        $request->validate([

            'kys_olcutu' => 'required',
            'faliyetin_adi' => 'required',

        ]);

        $data->kys_olcutu = $request->input('kys_olcutu');
        $data->faliyetin_adi = $request->input('faliyetin_adi');
        $data->faliyetin_tipi = $request->input('faliyetin_tipi');
        $data->is_birligi = $request->input('is_birligi');
        $data->faliyetin_butcesi = $request->input('faliyetin_butcesi');
        $data->baslangic_tarihi = $request->input('baslangic_tarihi');
        $data->bitis_tarihi = $request->input('bitis_tarihi');
        $data->hedef_kitlesi = $request->input('hedef_kitlesi');
        $data->hedef_kitle_sayisi = $request->input('hedef_kitle_sayisi');
        $data->faliyeti_gerceklestiren_personel = $request->input('faliyeti_gerceklestiren_personel');
        $data->faliyetin_kisa_aciklamasi = $request->input('faliyetin_kisa_aciklamasi');
        $data->temel_alani = $request->input('temel_alani');

        $query = $data->update();
        if (!$query) {
            return back()->with('error', 'Eğitim Faliyeti  Ekleme Başarısız');
        } else {
            return back()->with('success', 'Eğitim Faliyeti Güncelleme Başarılı.');
        }
    }
}
