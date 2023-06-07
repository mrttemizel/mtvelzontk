@extends('backend.components.master')
@section('title')
    KYS Kodu Listesi
@endsection
@section('css')
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}' rel="stylesheet" type="text/css" />

    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('backend/assets/libs/datatable/jquery.dataTables.css')}}" rel="stylesheet" />
@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            KYS
        @endslot
        @slot('title')
            KYS Kodu Listesi
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">KYS Kodu Listesi</h5>
                    <button type="button" class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i class="ri-add-box-line"></i> KYS Kodu Ekle</button>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>SR No.</th>
                            <th>KYS Kodu</th>
                            <th>KYS Açıklama</th>
                            <th>KYS Kategori</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody
                        @php $i = 0 @endphp
                        @foreach($data as $datas)
                            @php $i++ @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$datas->code_name}}</td>
                                <td>{{$datas->code_description}}</td>
                                <td>{{$datas->getKysCategory->kys_category_name}}</td>
                                <td>
                                    <div class="hstack gap-3 fs-15">
                                        <a href="" class="link-primary"><i class="ri-settings-4-line"></i></a>
                                        <a href="" class="link-danger" id="delete_user"><i class="ri-delete-bin-5-line"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                    </table>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->




@endsection

@section('addjs')

        <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/pages/sweetalerts.init.js') }}"></script>

    <!--datatable js-->
        <script src="{{asset("backend/assets/libs/datatable/jquery.dataTables.js")}}"></script>
    <script src="{{asset("backend/assets/libs/datatable/dataTables.bootstrap5.min.js")}}"></script>
    <script src="{{asset("backend/assets/libs/datatable/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("backend/assets/libs/datatable/buttons.bootstrap5.min.js")}}"></script>
    <script src="{{asset("backend/assets/libs/datatable/jszip.min.js")}}"></script>
    <script src="{{asset("backend/assets/libs/datatable/pdfmake.min.js")}}"></script>
    <script src="{{asset("backend/assets/libs/datatable/vfs_fonts.js")}}"></script>
    <script src="{{asset("backend/assets/libs/datatable/buttons.html5.min.js")}}"></script>

        <script src="{{asset('backend/assets/libs/datatable/mydatatable.js')}}"></script>

@endsection

