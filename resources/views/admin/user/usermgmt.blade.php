@extends('layouts.main')

@section('customCss')
@include('web.datatable-css')
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Pengurusan Pengguna</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Rumah</a>
                        </li>
                        <li class="breadcrumb-item">Admin
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Pengurusan Pengguna</a>
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
                <table class="datatables table table-user">
                    <thead>
                        <tr>
                            <th>nama</th>
                            <th>jawatan</th>
                            <th>penempatan</th>
                            <th>emel</th>
                            <th>aksi</th>
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
<script src="{{asset('local/common/js/app.js')}}"></script>
<script src="{{asset('local/usermgmt/js/datatable.js')}}"></script>
@endsection
