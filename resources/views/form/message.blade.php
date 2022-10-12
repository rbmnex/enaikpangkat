@extends('layouts.main')

@section('customCss')

@endsection

@section('content')
{{-- <div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Pengurusan Pengguna</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Rumah</a>
                        </li>
                        <li class="breadcrumb-item">BPSM
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Pengurusan Kumpulan</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="content-body">
    <section id="basic-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">PERHATIAN</h4>
                </div>
                <div class="card-body">
                    <span>{{ $message }}</span>
                </div>
            </div>
        </div>
    </section>
</div>

<input type="hidden" id="_token" class="_token" name="_token" value="{{csrf_token()}}">

@endsection

@section('customJs')

@endsection
