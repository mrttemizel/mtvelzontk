@extends('backend.components.master')
@section('title')
    Proje Ekle
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
            Proje
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
                    <h4 class="card-title mb-0 flex-grow-1">Proje Düzenle</h4>
                    <a href="{{ route('project.index') }}"
                       class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i
                            class="ri-arrow-go-back-fill"></i> &nbsp; Geri Dön</a>

                </div><!-- end card header -->
                <form action="{{route('project.update')}}" method="POST" enctype="multipart/form-data">
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
                                        <label for="basiInput" class="form-label">Proje Adı <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="proje_adi" placeholder="Proje Adı"
                                               class="form-control" value="{{ $data->proje_adi }}">
                                        <span class="text-danger">
                                    @error('proje_adi')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Destek Alınan Kurum</label>
                                        <input type="text" name="destek_alinan_kurum" placeholder="Destek Alınan Kurum"
                                               class="form-control" value="{{ $data-> destek_alinan_kurum}}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Çağrı Tipi Veya Kodu</label>
                                        <input type="text" name="cagri_tipi" placeholder="Çağrı Tipi Veya Kodu"
                                               class="form-control" value="{{ $data->cagri_tipi }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Proje No</label>
                                        <input type="text" name="proje_no" placeholder="Proje No"
                                               class="form-control" value="{{ $data->proje_no }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Proje Bütcesi</label>
                                        <input type="text" name="proje_butcesi" placeholder="Proje Bütcesi"
                                               class="form-control" value="{{ $data->proje_butcesi }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-6 col-md-6">
                                    <div>
                                        <label for="basiInput" class="form-label">Başlangıç Tarihi</label>
                                        <input type="date" class="form-control" name="baslangic_tarihi" id="exampleInputdate" value="{{ $data->baslangic_tarihi }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-6 col-md-6">
                                    <div>
                                        <label for="basiInput" class="form-label">Bitiş Tarihi</label>
                                        <input type="date" class="form-control" name="bitis_tarihi" id="exampleInputdate" value="{{ $data->bitis_tarihi }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">İş Birliği Yapılan Kurum</label>
                                        <input type="text" name="is_birligi" placeholder="İş Birliği Yapılan Kurum"
                                               class="form-control" value="{{ $data->is_birligi }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Araştırmacılar</label>
                                        <input type="text" name="arastirmacilar" placeholder="Araştırmacılar"
                                               class="form-control"  value="{{ $data->arastirmacilar }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Projenin Kısa Açıklaması</label>
                                        <input type="text" name="proje_aciklama" placeholder="Projenin Kısa Açıklaması"
                                               class="form-control" value="{{ $data->proje_aciklama }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Temel Alanı</label>
                                        <input type="text" name="temel_alani" placeholder="Temel Alanı"
                                               class="form-control"  value="{{ $data->temel_alani}}">
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



