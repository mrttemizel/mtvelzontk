@extends('backend.components.master')
@section('title')
    Kys Kodu
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
            Kys Kodu
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
                    <h4 class="card-title mb-0 flex-grow-1">Kys Kategori Ekle</h4>
                </div><!-- end card header -->
                <form action="#" method="POST" >
                    @csrf
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-3">
                                <div class="col-xl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Kys Kategori Adı : <span class="text-danger">*</span></label>
                                        <input type="text" name="kys_category_name" placeholder="Kys Kategori Adı" class="form-control" value="{{ old('name') }}">
                                        <span class="text-danger">
                                    @error('kys_category_name')
                                            {{ $message }}
                                            @enderror
                            </span>
                                    </div>
                                </div>

                                <div class="col-lg-12">
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



    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Kys Kategori Listesi</h4>
                </div><!-- end card header -->

                    <div class="card-body">
                        <!-- Striped Rows -->

                    </div><!-- end card body -->

            </div>
    </div>
    </div>


@endsection

@section('addjs')


    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/sweetalerts.init.js') }}"></script>



@endsection

