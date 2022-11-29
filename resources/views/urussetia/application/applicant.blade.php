@extends('layouts.main')

@section('customCss')
@include('web.sweet-alert-css')
@include('web.datatable-css')
<link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/forms/select/select2.min.css')}}">
@include('segment.layouts.custom_view_links.datepicker.flatpickr.css.index')
<style>
    input.larger {
      width: 50px;
      height: 50px;
    }
    input.medium {
      width: 25px;
      height: 25px;
    }
    input.small {
      width: 10px;
      height: 10px;
    }
</style>
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Senarai Calon Pemangkuan</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Laman Utama</a>
                        </li>
                        <li class="breadcrumb-item">BPSM
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Senarai Calon Pemangkuan</a>
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
                <table class="datatables table table-pemohon">
                    <thead>
                        <tr>
                            <th>no kad pengenalan</th>
                            <th>nama</th>
                            <th>jawatan</th>
                            <th>gred</th>
                            <th>status</th>
                            <th>tangga</th>
                            <th>tindakan</th>
                        </tr>
                    </thead>
                </table>
                <input type="hidden" id="hdn_id_application" value="{{ $permohonan_id }}"/>
            </div>
        </div>
    </div>
    </section>
</div>
@include('urussetia.application.modal.applicant')
@endsection

@section('customJs')
@include('web.datatable-js')
@include('web.sweet-alert-js')
@include('segment.layouts.custom_view_links.datepicker.flatpickr.js.index')
<script src="{{ asset('asset/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('app_js_helper/main/common.js') }}"></script>
<script src="{{ asset('app_js_helper/inits/datatable/index.js') }}"></script>
<script src="{{asset('local/applicant/js/page_setting.js')}}"></script>
<script src="{{asset('local/applicant/js/index.js')}}"></script>
@endsection
