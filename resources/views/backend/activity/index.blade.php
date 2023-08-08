@extends('backend.components.master')
@section('title')
    ETKINLIK LİSTESİ
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            ETKINLIK
        @endslot
        @slot('title')
            ETKINLIK LİSTESİ
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
                    <i class="ri-check-double-line label-icon"></i><strong>  {{ session()->get('error') }}</strong></strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Etkinlik Listesi</h5>
                    <a  href="{{ route('activity.create') }}" class="btn btn-primary waves-effect waves-light d-flex justify-content-between"><i class="ri-add-box-line"></i>&nbsp; Etkinlik Ekle</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>SR No.</th>
                            <th>Etkinlik Teması</th>
                            <th>Etkinlik Başlığı</th>
                            <th>Amaç</th>
                            <th>Düzenleyen Birim</th>
                            <th>Sorumlu Kişiler</th>
                            <th>Katkı Sağlayan Birimler</th>
                            <th>Dış Paydaşlar</th>
                            <th>Katılımcı Kitle</th>
                            <th>Katılımcı Sayısı</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th>Etkinlik Yeri</th>
                            <th>Planlanan Bütçe</th>
                            <th>Gerçeklenen Bütçe</th>
                            <th>Gerçekleşme Durumu</th>
                            <th>Açıklama</th>
                            <th>Etkinlik Ekleyen</th>
                            <th>Belge</th>
                            <th>Resim</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody
                        @php $i = 0 @endphp
                        @foreach($data as $datas)
                            @php $i++ @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if($datas->etkinlik_teması == 1)
                                    <td>Sosyal</td>
                                    @elseif($datas->etkinlik_teması == 2)
                                    Kültürel
                                    @elseif($datas->etkinlik_teması == 3)
                                    Ekonomik
                                    @else
                                    Saglik
                                    @endif
                                </td>
                                <td>{{$datas->etkinlik_basligi}}</td>
                                <td>{{$datas->amac}}</td>
                                <td>{{$datas->duzenleyen_birimi}}</td>
                                <td>{{$datas->sorumlu_kisiler}}</td>
                                <td>{{$datas->katki_saglayan_birimler}}</td>
                                <td>{{$datas->dis_paydaslar}}</td>
                                <td>{{$datas->katilimci_kitle}}</td>
                                <td>{{$datas->katilimci_sayisi}}</td>
                                <td>{{Carbon\Carbon::parse($datas->baslangic_tarihi)->format('d-m-Y')}}</td>
                                <td>{{Carbon\Carbon::parse($datas->bitis_tarihi)->format('d-m-Y')}}</td>
                                <td>{{$datas->etkinlik_yeri}}</td>
                                <td>{{$datas->planlanan_butce}}</td>
                                <td>{{$datas->gerceklenen_butce}}</td>
                                <td>
                                    @if($datas->gerceklesme_durumu == 1)
                                        Planlama Aşamasında
                                    @elseif($datas->gerceklesme_durumu == 2)
                                        Devam Ediyor
                                    @else
                                        Tamamlandı
                                    @endif
                                </td>
                                <td>{{$datas->aciklama}}</td>
                                <td>{{$datas->getUser->name}}</td>

                                    <td>
                                        @if(empty($datas->belge))
                                            Belge Yüklenmemiş
                                        @else
                                            <a href="{{ asset('tk/belge/'.$datas->belge) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if(empty($datas->resim))
                                            Resim Yüklenmemiş
                                        @else
                                            <a href="{{ asset('tk/resim/'.$datas->resim) }}" target="_blank" class="btn btn-success btn-sm">İNDİR</a>
                                        @endif
                                    </td>

                                <td>
                                    <div class="hstack gap-3 fs-15">
                                        <a href="{{route('activity.edit', ['id' => $datas->id])}}" class="link-primary"><i class="ri-settings-4-line"></i></a>
                                        <a href="javascript:void(0)" data-url={{route('activity.delete', ['id'=>$datas->id]) }} data-id={{ $datas->id }} class="link-danger" id="delete_activity"><i class="ri-delete-bin-5-line"></i></a>
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
        $(document).on('click', '#delete_activity', function () {
            var user_id = $(this).attr('data-id');
            const url = $(this).attr('data-url');
            Swal.fire({
                title: 'Emin misiniz?',
                text: "Bu Etkinliği silmek istediğinize emin misiniz?",
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

