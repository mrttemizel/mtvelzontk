<?php

namespace App\Http\Controllers\backend\activity;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ActivityController extends Controller
{
    public  function create(){

        return view('backend.activity.create');
    }

    public function delete($id)
    {
        $data = Activity::find($id);

        if (Auth::user()->status == 0)
        {
            return back()->with('error', 'Sadece Yöneticiler Etklinlikleri Silebilir!');
        }
        else{
            $path = public_path().'/tk/belge/'.$data->belge;

            if (\File::exists($path)) {
                \File::delete($path);
            }
            $path2 = public_path().'/tk/resim/'.$data->resim;
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
            'resim' => 'image|mimes:jpg,jpeg,png|max:2048',
            'belge' => 'file|mimes:pdf,xlsx,docx|max:2048',

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
        $data->aciklama = trim($request->input('aciklama'));
        $data->user_id = Auth::user()->id;


        if ($request->hasFile('resim')) {

            $resim = $request->file('resim');
            $resimname= time().'-'.uniqid().'.'.$resim->getClientOriginalExtension();
            $resim->move('tk/resim',$resimname);
            $data->resim = $resimname;

        }

        if ($request->hasFile('belge')) {

            $belge = $request->file('belge');
            $belgename= time().'-'.uniqid().'.'.$belge->getClientOriginalExtension();
            $belge->move('tk/belge',$belgename);
            $data->belge = $belgename;

        }


        $query = $data->save();
        if (!$query) {
            return redirect()->route('activity.index')->with('error', 'Etkinlik eklenirken bir hata oluştu!');
        } else {
            return redirect()->route('activity.index')->with('success', 'Etkinlik ekleme işlemi başarılı.');
        }


    }


    public  function  edit($id){
        $data = Activity::where('id',$id)->first();

        if (Auth::user()->status == 0){
            if (Auth::user()->id == $data->user_id)
            {
                return view('backend.activity.edit',compact('data'));
            }
            else{
                return back()->with('error', 'Kullanıcılar sadece kendi eklediği projeleri düzenyelebilir!');
            }
        }
        else{

            return view('backend.activity.edit',compact('data'));
        }
    }

    public  function update(Request $request)
    {
        $notification_success = array(
            'message' => 'Güncelleme Başarılı',
            'alert-type' => 'success'
        );

        $notification_error = array(
            'message' => 'Güncelleme Başarısız',
            'alert-type' => 'error'
        );

        $data = Activity::findOrFail($request->input('id'));

        $request->validate([
            'etkinlik_teması' => 'required',
            'etkinlik_basligi' => 'required',
            'resim' => 'image|mimes:jpg,jpeg,png|max:2048',
            'belge' => 'file|mimes:pdf,xlsx,docx|max:2048',

        ]);

        if ($request->hasFile('resim')) {

            $deleteOldResim = public_path().'/tk/resim/'.$data->resim;

            if (File::exists($deleteOldResim)) {
                File::delete($deleteOldResim);
            }
            $resim = $request->file('resim');
            $resimname= time().'-'.uniqid().'.'.$resim->getClientOriginalExtension();
            $resim->move('tk/resim',$resimname);
            $data->resim = $resimname;

        }

        if ($request->hasFile('belge')) {

            $deleteOldBelge = public_path().'/tk/belge/'.$data->belge;

            if (File::exists($deleteOldBelge)) {
                File::delete($deleteOldBelge);
            }
            $belge = $request->file('belge');
            $belgename= time().'-'.uniqid().'.'.$belge->getClientOriginalExtension();
            $belge->move('tk/belge',$belgename);
            $data->belge = $belgename;

        }
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
        $data->aciklama = trim($request->input('aciklama'));
        $query = $data->update();

        if (!$query) {
            return back()->with($notification_error);
        } else {
            return back()->with($notification_success);
        }
    }
}
