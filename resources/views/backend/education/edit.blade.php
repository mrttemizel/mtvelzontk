@extends('backend.components.master')
@section('title')
    Eğitim Faliyetleri Ekle
@endsection
@section('css')
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Formlar
        @endslot
        @slot('title')
            Eğitim Faliyetleri
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            @if (session()->get('success'))
                <div class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show"
                     role="alert">
                    <i class="ri-check-double-line label-icon"></i><strong>  {{ session()->get('success') }}</strong></strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            @if (session()->get('error'))
                <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show"
                     role="alert">
                    <i class="ri-check-double-line label-icon"></i><strong>  {{ session()->get('success') }}</strong></strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            <div class="card ">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Eğitim Faliyetleri Düzenle</h4>
                    <a href="{{ route('education.index') }}"
                       class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i
                            class="ri-arrow-go-back-fill"></i> &nbsp; Geri Dön</a>

                </div><!-- end card header -->
                <form action="{{route('education.update')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$data->id}}">
                    @csrf
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-3">
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="labelInput" class="form-label">KYS Ölçütü <span class="text-danger">*</span></label>
                                        <select class="form-select" name="kys_olcutu"
                                                aria-label="Default select example">
                                            <option selected="" disabled>KYS Ölçütü</option>
                                            <option value="{{ $data->getKysCode->id }}" selected>{{ $data->getKysCode->code_name }} - {{ $data->getKysCode->code_description }}</option>

                                        @foreach( $code as $codes)
                                                @if($data->getKysCode->code_name == $codes->code_name )
                                                    @continue
                                                @endif
                                                <option value="{{ $codes->id }}">{{ $codes->code_name }} - {{$codes -> code_description}}</option>

                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                    @error('kys_olcutu')
                                            {{ $message }}
                                            @enderror
                                    </span>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Faliyetin Adı <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="faliyetin_adi" placeholder="Faliyetin Adı"
                                               class="form-control" value="{{ $data->faliyetin_adi }}">
                                        <span class="text-danger">
                                    @error('faliyetin_adi')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Faliyetin Tipi</label>
                                        <input type="text" name="faliyetin_tipi" placeholder="Faliyetin Tipi"
                                               class="form-control" value="{{ $data->faliyetin_tipi }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">İş Birliği Yapılan - Ortaklık Kurulan Kurum/Kişi</label>
                                        <input type="text" name="is_birligi" placeholder="İş Birliği Yapılan - Ortaklık Kurulan Kurum/Kişi"
                                               class="form-control" value="{{ $data->is_birligi }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Faliyetin Bütcesi</label>
                                        <input type="text" name="faliyetin_butcesi" placeholder="Faliyetin Bütcesi"
                                               class="form-control" value="{{ $data->faliyetin_butcesi }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div>
                                        <label for="basiInput" class="form-label">Başlangıç Tarihi</label>
                                        <input type="date" class="form-control" value="{{ $data->baslangic_tarihi}}" name="baslangic_tarihi" id="exampleInputdate">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-6 col-md-6">
                                    <div>
                                        <label for="basiInput" class="form-label">Bitiş Tarihi</label>
                                        <input type="date" class="form-control" value="{{ $data->bitis_tarihi}}"  name="bitis_tarihi" id="exampleInputdate">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Hedef Kitlesi</label>
                                        <input type="text" name="hedef_kitlesi" placeholder="Hedef Kitlesi"
                                               class="form-control" value="{{ $data->hedef_kitlesi}}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Hedef Kitlenin Sayısı</label>
                                        <input type="text" name="hedef_kitle_sayisi" placeholder="Hedef Kitlenin Sayısı"
                                               class="form-control" value="{{ $data->hedef_kitle_sayisi }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Faliyeti Gerçekleştiren Personel</label>
                                        <input type="text" name="faliyeti_gerceklestiren_personel" placeholder="Faliyeti Gerçekleştiren Personel"
                                               class="form-control" value="{{ $data->faliyeti_gerceklestiren_personel }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Faliyetin Kısa Açıklaması</label>
                                        <input type="text" name="faliyetin_kisa_aciklamasi" placeholder="Faliyetin Kısa Açıklaması"
                                               class="form-control" value="{{ $data->faliyetin_kisa_aciklamasi }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Temel Alanı</label>
                                        <input type="text" name="temel_alani" placeholder="Temel Alanı"
                                               class="form-control" value="{{ $data->temel_alani }}">
                                    </div>
                                </div>
                                <!--end col-->


                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary">Düzenle</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </form>
            </div>
        </div>
    </div>

@endsection



