@extends('layouts.main')

@section('customCss')
@include('web.sweet-alert-css')
<link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/forms/wizard/bs-stepper.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/forms/form-wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Borang Pemangkuan JKR UKP 12</h4>
                <h6 class="card-subtitle" style="font-style: italic; color:red !important;">* Jika berlaku kesilapan maklumat, sila kemas kini maklumat pada portal MyKJ</h6>
                <section class="vertical-wizard">
                    <div class="bs-stepper vertical vertical-wizard-example">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#peribadi-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">1</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 1</span>
                                        <span class="bs-stepper-subtitle">Butiran Peribadi</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#cuti-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">2</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 2</span>
                                        <span class="bs-stepper-subtitle">Maklumat Cuti</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#penempatan-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">3</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 3</span>
                                        <span class="bs-stepper-subtitle">Pengesahan Tempat Bertugas</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#harta-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">4</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 4</span>
                                        <span class="bs-stepper-subtitle">Pengisytiharan Harta</span>
                                    </span>
                                </button>
                            </div>
                             <div class="step" data-target="#utuh-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">5</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 5</span>
                                        <span class="bs-stepper-subtitle">Butiran Calon</span>
                                    </span>
                                </button>
                            </div>
                           <div class="step" data-target="#perkhidmatan-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">6</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 6</span>
                                        <span class="bs-stepper-subtitle">Sejarah Perkhidmatan</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#pertubuhan-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">7</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 7</span>
                                        <span class="bs-stepper-subtitle">Pertubuhan</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#akademik-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">8</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 8</span>
                                        <span class="bs-stepper-subtitle">Akademik</span>
                                    </span>
                                </button>
                            </div>
                             <div class="step" data-target="#profesional-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">9</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 9</span>
                                        <span class="bs-stepper-subtitle">Profesional</span>
                                    </span>
                                </button>
                            </div>
                             <div class="step" data-target="#kompeten-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">10</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 10</span>
                                        <span class="bs-stepper-subtitle">Kekompetenan</span>
                                    </span>
                                </button>
                            </div>
                           <div class="step" data-target="#iktiraf-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">11</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 11</span>
                                        <span class="bs-stepper-subtitle">Pengiktirafan</span>
                                    </span>
                                </button>
                            </div>
                           <div class="step" data-target="#pinjam-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">12</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 12</span>
                                        <span class="bs-stepper-subtitle">Akaun Pinjaman</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#akuan-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">13</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 13</span>
                                        <span class="bs-stepper-subtitle">Akaun Pegawai</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#carian-pegawai">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">14</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Bahagian 14</span>
                                        <span class="bs-stepper-subtitle">Ketua Jabatan/Bahagian</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            {{-- <form id="ukp12_form"> --}}
                                @include('form.ukp12.section1')
                                @include('form.ukp12.section2')
                                @include('form.ukp12.section3')
                                @include('form.ukp12.section4')
                                @include('form.ukp12.section5')
                                @include('form.ukp12.section6')
                                @include('form.ukp12.section7')
                                @include('form.ukp12.section8')
                                @include('form.ukp12.section9')
                                @include('form.ukp12.section10')
                                @include('form.ukp12.section11')
                                @include('form.ukp12.section12')
                                @include('form.ukp12.section13')
                                @include('form.ukp12.section14')
                            {{-- </form> --}}
                        </div>
                    </div>
                </section>
                </div>
            </div>
        </div>
    </div>
</section>


</div>
@include('form.ukp12.modal')
<input type="hidden" id="_token" class="_token" name="_token" value="{{csrf_token()}}">

@endsection

@section('customJs')

@include('web.sweet-alert-js')
<script src="{{ asset('asset/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('asset/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
<script src="{{ asset('asset/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('local/ukp12/page_setting.js') }}"></script>
<script src="{{ asset('local/ukp12/index.js') }}"></script>
<script type="text/javascript">

   // $("#gender_select").val('{{ $profile['jantina'] }}').trigger('change');
</script>
@endsection
