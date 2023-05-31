@extends('layouts.main')

@section('customCss')

    @include('segment.layouts.custom_view_links.toast.css.index')
    @include('segment.layouts.custom_view_links.datatable.css.index')
    @include('segment.layouts.custom_view_links.swal.css.index')
    @include('segment.layouts.custom_view_links.datepicker.flatpickr.css.index')
    <link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/forms/select/select2.min.css')}}">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Senarai Kumpulan</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Laman Utama</a>
                        </li>
                        <li class="breadcrumb-item">BPSM
                        </li>
                        <li class="breadcrumb-item">Resume
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Senarai Kumpulan</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="datatables table table-resumeb">
                    <thead>
                        <tr>
                            <th>nama</th>
                            <th>Tarikh Hantar</th>
                            <th>status</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    </section>
</div>
<input type="hidden" id="_token" class="_token" name="_token" value="{{csrf_token()}}">
@include('urussetia.resume.modal')
@endsection

@section('customJs')
@include('segment.layouts.custom_view_links.toast.js.index')
@include('segment.layouts.custom_view_links.datatable.js.index')
@include('segment.layouts.custom_view_links.modals.js.index')
@include('segment.layouts.custom_view_links.swal.js.index')
@include('segment.layouts.custom_view_links.customjavascript.index')
@include('segment.layouts.custom_view_links.select2.js.index')
<script src="{{asset('local/rbatch/js/setting.js')}}"></script>
<script src="{{asset('local/rbatch/js/controller.js')}}"></script>
<script src="{{asset('local/rbatch/js/index.js')}}"></script>
@endsection
