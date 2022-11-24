@extends('layouts.main')

@section('customCss')
@include('web.sweet-alert-css')
@include('web.datatable-css')
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
                        <li class="breadcrumb-item"><a href="/dashboard">Rumah</a>
                        </li>
                        <li class="breadcrumb-item">BPSM
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
                <table class="datatables table table-borang">
                    <thead>
                        <tr>
                            <th>nama</th>
                            <th>gred</th>
                            <th>disiplin</th>
                            <th>tindakan</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    </section>
</div>
@endsection

@section('customJs')
@include('web.datatable-js')
@include('web.sweet-alert-js')
<script src="{{ asset('asset/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('app_js_helper/main/common.js') }}"></script>
<script src="{{ asset('app_js_helper/inits/datatable/index.js') }}"></script>
<script src="{{asset('local/application/js/page_setting.js')}}"></script>
<script src="{{asset('local/application/js/index.js')}}"></script>
@endsection
