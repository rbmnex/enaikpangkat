@extends('layouts.main')

@section('customCss')
@include('web.sweet-alert-css')
<link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/forms/wizard/bs-stepper.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/forms/form-wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset//vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <style>
        .text-notice {
            color: red !important;
            font-style: italic;
        }

        .select2-selection--single {
            height: 60% !important;
        }
        .select2-selection__rendered{
            word-wrap: break-word !important;
            text-overflow: inherit !important;
            white-space: normal !important;
        }

        .file {
            position: relative;
            overflow: hidden;
        }

        .file-input {
        position: absolute;
        font-size: 50px;
        opacity: 0;
        right: 0;
        top: 0;
        }

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
{{-- <div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Pengurusan Pengguna</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Laman Utama</a>
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
                <h4 class="card-title">Borang Lampiran</h4>

                <section class="vertical-wizard">
                    <div class="bs-stepper vertical vertical-wizard-example">
                        <div class="bs-stepper-header">
                             <div class="step" data-target="#per-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">1</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Lampiran Kursus</span>
                                        <span class="bs-stepper-subtitle"></span>
                                    </span>
                                </button>
                            </div>

                            <div class="step" data-target="#bebankerja-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">2</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Lampiran Beban Kerja</span>
                                        <span class="bs-stepper-subtitle"> </span>
                                    </span>
                                </button>
                            </div>



                            <div class="step" data-target="#projek-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">3</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Lampiran Projek</span>
                                        <span class="bs-stepper-subtitle"></span>
                                    </span>
                                </button>
                            </div>

                                <div class="step" data-target="#pendedahan-vertical">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">4</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Pendedahan</span>
                                        <span class="bs-stepper-subtitle"></span>
                                    </span>
                                </button>
                            </div>



                        </div>


                        <div class="bs-stepper-content">
                            {{-- <form id="ukp12_form"> --}}

                                 @include('form.ukp12.lampiranbebankerja')
                                @include('form.ukp12.lampirankursus')
                                @include('form.ukp12.lampiranprojek')
                                @include('form.ukp12.lampiranpendedahan')
                                 @include('segment.layouts.custom_view_links.datepicker.flatpickr.css.index')
                            {{-- </form> --}}
                        </div>
                    </div>
                </section>
                </div>
            </div>
        </div>
    </div>
     <div class="col-sm-2">

                        </div>
</section>


</div>
@include('form.ukp12.modal')
<input type="hidden" id="_token_alt" class="_token_alt" name="_token_alt" value="{{csrf_token()}}">
<input type="hidden" id="nokp_1" class="nokp" name="nokp" value="{{ $nokp }}">
<input type="hidden" id="user_1" class="user" name="user" value="{{ $user }}">

@endsection

@section('customJs')

@include('web.sweet-alert-js')
<script src="{{ asset('asset/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('asset/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('asset/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
<script src="{{ asset('asset/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('local/ukp12/page_setting.js') }}"></script>
<script src="{{ asset('local/ukp12/index.js') }}"></script>
<script type="text/javascript">

</script>
@endsection
