@extends('backend.components.master')
@section('title')
    KYS Kodu Düzenle
@endsection
@section('css')
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            KYS
        @endslot
        @slot('title')
            KYS Kodu Düzenle
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
                    <h4 class="card-title mb-0 flex-grow-1"> KYS Kodu Düzenle</h4>
                    <a href="{{ route('kys.code.index') }}" class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i class="ri-arrow-go-back-fill"></i> &nbsp; Geri Dön</a>

                </div><!-- end card header -->
                <form action="{{ route('kys.code.update') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $data->id }}" name="id">
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-3">
                                <div class="col-xl-6 col-md-6">
                                    <div>
                                        <label for="basiInput" class="form-label">KYS Kodu <span class="text-danger">*</span></label>
                                        <input type="text" name="kys_kodu"  class="form-control" value="{{ $data->code_name }}">
                                        <span class="text-danger">
                                    @error('kys_kodu')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-6 col-md-6">
                                    <div>
                                        <label for="labelInput" class="form-label">KYS Kodu Kategorisi <span class="text-danger">*</span></label>
                                        <select class="form-select" name="kys_category"  aria-label="Default select example">
                                            <option value="{{ $data->getKysCategory->id }}" selected>{{ $data->getKysCategory->kys_category_name }}</option>
                                            @foreach( $category as $categorys)
                                                @if($data->getKysCategory->kys_category_name == $categorys->kys_category_name )
                                                    @continue
                                                @endif
                                                <option value="{{$categorys -> id}}">{{$categorys -> kys_category_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                    @error('kys_category')
                                            {{ $message }}
                                            @enderror
                                    </span>
                                    </div>

                                </div>
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="labelInput" class="form-label">KYS Açıklaması <span class="text-danger">*</span></label>
                                        <textarea  class="form-control"  name="kys_aciklamasi"  placeholder="Message" rows="3"  cols="50" >{{ $data->code_description }}</textarea>
                                        <span class="text-danger">
                                    @error('kys_aciklamasi')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary">Güncelle</button>
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


