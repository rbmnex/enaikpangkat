@extends('layouts.main')

@section('customCss')
@include('web.sweet-alert-css')
@include('web.datatable-css')
@include('segment.layouts.custom_view_links.toast.css.index')
@include('segment.layouts.custom_view_links.swal.css.index')
{{-- <link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/forms/select/select2.min.css')}}"> --}}

@endsection

@section('customCss')
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
                <h2 class="content-header-title float-left mb-0">Senarai Permohonan Naik Pangkat</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Laman Utama</a>
                        </li>
                        <li class="breadcrumb-item">BPSM
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Senarai Permohonan Naik Pangkat</a>
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
                <table class="datatables table table-promote">
                    <thead>
                        <tr>
                            <th>nokp</th>
                            <th>nama</th>
                            <th>jawatan</th>
                            <th>status</th>
                            <th>tindakan</th>
                        </tr>
                    </thead>
                </table>
                <input type="hidden" id="hdn_id" class="hidden-class" value=""/>
            </div>
        </div>
    </div>
    </section>
</div>
{{-- @include('urussetia.application.modal.applicant') --}}
@endsection

@section('customJs')
{{-- @include('web.datatable-js') --}}
{{-- @include('web.sweet-alert-js') --}}
@include('segment.layouts.custom_view_links.toast.js.index')
@include('segment.layouts.custom_view_links.swal.js.index')
@include('segment.layouts.custom_view_links.datatable.js.index')
{{-- <script src="{{ asset('asset/vendors/js/forms/select/select2.full.min.js') }}"></script> --}}
@include('segment.layouts.custom_view_links.customjavascript.index')
<script src="{{asset('local/promote/js/setting.js')}}"></script>
<script src="{{asset('local/promote/js/main.js')}}"></script>
{{-- <script src="{{asset('local/candidate/js/controller.js')}}"></script> --}}
@endsection

