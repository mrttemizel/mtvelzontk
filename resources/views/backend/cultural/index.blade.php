@extends('backend.components.master')
@section('title')
    PROJE LİSTESİ
@endsection
@section('css')
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}' rel="stylesheet" type="text/css" />

    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('backend/assets/libs/datatable/jquery.dataTables.css')}}" rel="stylesheet" />
@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            PROJE
        @endslot
        @slot('title')
            PROJE LİSTESİ
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
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Proje Listesi</h5>
                    <a  href="{{ route('project.create') }}" class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i class="ri-add-box-line"></i>&nbsp; Proje Ekle</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>SR No.</th>
                            <th>KYS Ölçütü</th>
                            <th>Proje Adı</th>
                            <th>Destek Alınan Kurum</th>
                            <th>Çağrı Tipi</th>
                            <th>Proje No</th>
                            <th>Proje Bütçesi</th>
                            <th>Başlangıç Tarihi - Biriş Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th>İş Birliği</th>
                            <th>Araştırmacılar</th>
                            <th>Kısa Açıklaması</th>
                            <th>Temel Alanı</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody
                        @php $i = 0 @endphp
                        @foreach($data as $datas)
                            @php $i++ @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$datas->getKysCode->code_name}}</td>
                                <td>{{$datas->proje_adi}}</td>
                                <td>{{$datas->destek_alinan_kurum}}</td>
                                <td>{{$datas->cagri_tipi}}</td>
                                <td>{{$datas->proje_no}}</td>
                                <td>{{$datas->proje_butcesi}}</td>
                                <td>{{Carbon\Carbon::parse($datas->baslangic_tarihi)->format('d-m-Y')}}</td>
                                <td>{{Carbon\Carbon::parse($datas->bitis_tarihi)->format('d-m-Y')}}</td>
                                <td>{{$datas->is_birligi}}</td>
                                <td>{{$datas->arastirmacilar}}</td>
                                <td>{{$datas->proje_aciklama}}</td>
                                <td>{{$datas->temel_alani}}</td>


                                <td>
                                    <div class="hstack gap-3 fs-15">
                                        <a href="{{route('project.edit', ['id' => $datas->id])}}" class="link-primary"><i class="ri-settings-4-line"></i></a>
                                        <a href="javascript:void(0)" data-url={{route('project.delete', ['id'=>$datas->id]) }} data-id={{ $datas->id }} class="link-danger" id="delete_user"><i class="ri-delete-bin-5-line"></i></a>
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

    <script>
        $(document).on('click', '#delete_user', function () {
            var user_id = $(this).attr('data-id');
            const url = $(this).attr('data-url');
            Swal.fire({
                title: 'Emin misiniz?',
                text: "Bu Projeyi silmek istediğinize emin misiniz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, sil!',
                cancelButtonText: 'Vazgeç'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    </script>

@endsection

