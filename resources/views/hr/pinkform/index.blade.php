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
                <h2 class="content-header-title float-left mb-0">Surat Pink</h2>
                {{-- <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">BSPK</a>
                        </li>
                        <li class="breadcrumb-item">Admin
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Pengurusan Pengguna</a>
                        </li>
                    </ol>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">

            </div>
        </div>
    </div>
    </section>
</div>
@endsection

@section('customJs')
@include('web.datatable-js')
@include('web.sweet-alert-js')
@endsection
