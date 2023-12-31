@extends('backend.components.master')
@section('title') Dashboard  @endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1') Admin @endslot
        @slot('title') Dashboard  @endslot
    @endcomponent



    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            Etkinlik Gurubuna Göre TopDağılım
                        </div>
                        <div class="card-body">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                </div><!--end col-->

            </div><!--end row-->
        </div>
    </div>


@endsection
@section('addjs')





    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}

@endsection

