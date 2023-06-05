@extends('backend.components.master')
@section('title')
    Kys Kategori
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
            Kys Kategori
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
                <form action="{{route('kys.category.store')}}" method="POST" >
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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">SR No.</th>
                                <th scope="col">Kategori Adı</th>
                                <th scope="col">Düzenle</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 0 @endphp
                            @foreach($data as $datas)
                                @php $i++ @endphp
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$datas->kys_category_name}}</td>
                                    <td>                                    <a href="javascript:void(0)" data-url={{route('kys.category.delete', ['id'=>$datas->id]) }} data-id={{ $datas->id }} class="link-danger" id="delete_category"><i class="ri-delete-bin-5-line"></i></a>                                                </div>
                </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div><!-- end card body -->

            </div>
    </div>
    </div>


@endsection

@section('addjs')


    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/sweetalerts.init.js') }}"></script>


    <script>
        $(document).on('click', '#delete_category', function () {
            var user_id = $(this).attr('data-id');
            const url = $(this).attr('data-url');
            Swal.fire({
                title: 'Emin misiniz?',
                text: "Bu kategoriyi silmek istediğinize emin misiniz?",
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

