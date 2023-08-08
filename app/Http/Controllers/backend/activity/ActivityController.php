<?php

namespace App\Http\Controllers\backend\activity;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public  function create(){

        return view('backend.activity.create');
    }

    public function delete($id)
    {
        $data = Activity::find($id);

        $path = public_path() . '/tk/belge' . $data->belge;

        if (\File::exists($path)) {
            \File::delete($path);
        }

        $path2 = public_path() . '/tk/resim' . $data->resim;

        if (\File::exists($path2)) {
            \File::delete($path2);
        }
        $query = $data->delete();
        if (!$query) {
            return back()->with('error', 'Etkinlik silerken bir hata oluştu!');
        } else {
            return back()->with('success', 'Etkinlik silme işlemi başarılı.');
        }
    }

    public  function index(){
        $data = Activity::all();
        return view('backend.activity.index',compact('data'));
    }

    public  function store(Request $request){


        $data = new Activity();

        $request->validate([
            'etkinlik_teması' => 'required',
            'etkinlik_basligi' => 'required',


        ]);

        $data->etkinlik_teması = $request->input('etkinlik_teması');
        $data->etkinlik_basligi = $request->input('etkinlik_basligi');
        $data->amac = $request->input('amac');
        $data->duzenleyen_birimi = $request->input('duzenleyen_birimi');
        $data->sorumlu_kisiler = $request->input('sorumlu_kisiler');
        $data->katki_saglayan_birimler = $request->input('katki_saglayan_birimler');
        $data->dis_paydaslar = $request->input('dis_paydaslar');
        $data->katilimci_kitle = $request->input('katilimci_kitle');
        $data->katilimci_sayisi = $request->input('katilimci_sayisi');
        $data->baslangic_tarihi = $request->input('baslangic_tarihi');
        $data->bitis_tarihi = $request->input('bitis_tarihi');
        $data->etkinlik_yeri = $request->input('etkinlik_yeri');
        $data->planlanan_butce = $request->input('planlanan_butce');
        $data->gerceklenen_butce = $request->input('gerceklenen_butce');
        $data->gerceklesme_durumu = $request->input('gerceklesme_durumu');
        $data->aciklama = $request->input('aciklama');
        $data->user_id = Auth::user()->id;


        if ($request->hasFile('resim')) {
            $request->validate([
                'resim' => 'image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $imagename = 'TK-R-'.Auth::user()->id.'.'.time();
            $file = $request->file('resim');
            $extention = $file->getClientOriginalExtension();
            $filname = $imagename . '-' . 'resim' . '.' . $extention;
            $file->move('tk/resim', $filname);
            $data->resim = $filname;
        }

        if ($request->hasFile('belge')) {
            $request->validate([
                'belge' => 'file|mimes:doc,docx,pdf,xsx|max:2048',
                ]);

            $belgename = 'TK-B-'.Auth::user()->id.'.'.time();
            $file2 = $request->file('belge');
            $extention = $file2->getClientOriginalExtension();
            $filname2 = $belgename . '-' . 'belge' . '.' . $extention;
            $file2->move('tk/belge', $filname2);
            $data->belge = $filname2;
        }


        $query = $data->save();
        if (!$query) {
            return redirect()->route('activity.index')->with('error', 'Etkinlik eklenirken bir hata oluştu!');
        } else {
            return redirect()->route('activity.index')->with('success', 'Etkinlik ekleme işlemi başarılı.');
        }


    }
}
