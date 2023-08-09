@extends('backend.components.master')
@section('title')
    Etkinlik Ekle
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
            Etkinlik
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
                    <h4 class="card-title mb-0 flex-grow-1">Etkinlik Düzenle</h4>
                    <a href="{{ route('activity.index') }}"
                       class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i
                            class="ri-arrow-go-back-fill"></i> &nbsp; Geri Dön</a>

                </div><!-- end card header -->
                <form action="{{route('activity.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-3">
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="labelInput" class="form-label">Etkinlik Teması <span class="text-danger">*</span></label>
                                        <select class="form-select" name="etkinlik_teması"
                                                aria-label="Default select example">
                                            <option selected="" disabled>Etkinlik Teması Seçiniz</option>
                                            <option value="1">Sosyal</option>
                                            <option value="2">Kültürel</option>
                                            <option value="3">Ekonomik</option>
                                            <option value="4">Saglik</option>

                                        </select>
                                        <span class="text-danger">
                                    @error('etkinlik_teması')
                                            {{ $message }}
                                            @enderror
                                    </span>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Etkinlik Başlığı <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="etkinlik_basligi" placeholder="Etkinlik Başlığı"
                                               class="form-control" value="{{$data->etkinlik_basligi}}">
                                        <span class="text-danger">
                                    @error('etkinlik_basligi')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Amaç</label>
                                        <input type="text" name="amac" placeholder="Amaç"
                                               class="form-control"  value="{{$data->amac}}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Düzenleyen Birim</label>
                                        <input type="text" name="duzenleyen_birimi" placeholder="Düzenleyen Birim"
                                               class="form-control"  value="{{$data->duzenleyen_birimi}}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Sorumlu Kişiler</label>
                                        <input type="text" name="sorumlu_kisiler" placeholder="Sorumlu Kişiler"
                                               class="form-control" value="{{ old('sorumlu_kisiler') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Katkı Sağlayan Birimler</label>
                                        <input type="text" name="katki_saglayan_birimler" placeholder="Katkı Sağlayan Birimler"
                                               class="form-control" value="{{ old('katki_saglayan_birimler') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Dış Paydaşlar</label>
                                        <input type="text" name="dis_paydaslar" placeholder="Dış Paydaşlar"
                                               class="form-control" value="{{ old('dis_paydaslar') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Katılımcı Kitle</label>
                                        <input type="text" name="katilimci_kitle" placeholder="Katılımcı Kitle"
                                               class="form-control" value="{{ old('katilimci_kitle') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Katılımcı Sayısı</label>
                                        <input type="text" name="katilimci_sayisi" placeholder="Katılımcı Sayısı"
                                               class="form-control" value="{{ old('katilimci_sayisi') }}">
                                    </div>
                                </div>

                                <!--end col-->
                                <div class="col-xl-6 col-md-6">
                                    <div>
                                        <label for="basiInput" class="form-label">Başlangıç Tarihi</label>
                                        <input type="date" class="form-control" name="baslangic_tarihi" id="exampleInputdate">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-6 col-md-6">
                                    <div>
                                        <label for="basiInput" class="form-label">Bitiş Tarihi</label>
                                        <input type="date" class="form-control" name="bitis_tarihi" id="exampleInputdate">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Etkinlik Yeri</label>
                                        <input type="text" name="etkinlik_yeri" placeholder="Etkinlik Yeri"
                                               class="form-control" value="{{ old('etkinlik_yeri') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Planlanan Bütçe</label>
                                        <input type="text" name="planlanan_butce" placeholder="Planlanan Bütçe"
                                               class="form-control" value="{{ old('planlanan_butce') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Gerçeklenen Bütçe</label>
                                        <input type="text" name="gerceklenen_butce" placeholder="Gerçeklenen Bütçe"
                                               class="form-control" value="{{ old('gerceklenen_butce') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="labelInput" class="form-label">Gerçekleşme Durumu</label>
                                        <select class="form-select" name="gerceklesme_durumu"
                                                aria-label="Default select example">
                                            <option selected="" disabled>Gerçekleşme Durumu Seçiniz</option>
                                            <option value="1">Planlama Aşamasında</option>
                                            <option value="2">Devam Ediyor</option>
                                            <option value="3">Tamamlandı</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-12 col-md-12 mt-3">
                                        <div>
                                            <label for="labelInput" class="form-label">Açıklama</label>
                                            <textarea  class="form-control"  name="aciklama"  placeholder="Message" rows="3"  cols="50" >

                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-12 mt-3">
                                        <div>
                                            <label for="formFile" class="form-label">Belge <span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"doc,docx,pdf,xsx"</b>.</span></label>
                                            <input class="form-control"  type="file" name="belge">
                                            <span class="text-danger">
                                    @error('belge')
                                                {{ $message }}
                                                @enderror
                            </span>
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <div class="col-xl-12 col-md-12 mt-3">
                                        <div>
                                            <label for="formFile" class="form-label">Resim <span class="text-danger"> Yükleyebilceğiniz dosya tipleri <b>"jpg,jpeg,png"</b>.</span></label>
                                            <input class="form-control"  type="file" name="resim">
                                            <span class="text-danger">
                                    @error('resim')
                                                {{ $message }}
                                                @enderror
                            </span>
                                        </div>
                                        <!-- end card -->
                                    </div>


                                    <div class="col-lg-12 mt-3">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Ekle</button>
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



