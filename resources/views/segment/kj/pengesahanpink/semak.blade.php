@extends('layouts.main')

@section('CSS')
    @include('segment.layouts.custom_view_links.toast.css.index')
    @include('segment.layouts.custom_view_links.datatable.css.index')
    @include('segment.layouts.custom_view_links.swal.css.index')
    @include('segment.layouts.custom_view_links.datepicker.flatpickr.css.index')
@endsection

@section('customCss')
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Persetujuan Pink Form</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row mb-2">
            <div class="col-3"></div>
            <div class="col-6" style="text-align:center">
                <a target="_blank" style="width:100%;" class="btn btn-info semak-pdf" href="{{Request::root()}}/kb/pengesahan-pink/preview/{{$pemohon_id}}">Semak PDF</a>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6" style="text-align:center">
                <div class="form-group">
                    <span style="color:red">*</span>Saya mengesahkan bahawa semua maklumat yang diberkan adalah benar
                </div>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-3" style="text-align:center">
                <a style="width:100%;" class="btn btn-success" id="button-setuju" href="{{Request::root()}}/kj/pengesahan-pink/setuju/1/{{$pemohon_id}}">Setuju</a>
            </div>
            <div class="col-3" style="text-align:center">
                <a style="width:100%;" class="btn btn-danger" id="button-tidak-setuju"  href="{{Request::root()}}/kj/pengesahan-pink/setuju/0/{{$pemohon_id}}">Tidak Setuju</a>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <input type="hidden" id="pressed-check" value="0">
@endsection

@section('JS')
    @include('segment.layouts.custom_view_links.toast.js.index')
    @include('segment.layouts.custom_view_links.datatable.js.index')
    @include('segment.layouts.custom_view_links.modals.js.index')
    @include('segment.layouts.custom_view_links.swal.js.index')
    @include('segment.layouts.custom_view_links.datepicker.flatpickr.js.index')
@endsection

@section('customJs')
    @include('segment.layouts.custom_view_links.customjavascript.index')
    <script src="{{ asset('app_js_helper/segment/kb/pengesahanpink/controller.js') }}"></script>
    <script src="{{ asset('app_js_helper/segment/kb/pengesahanpink/main.js') }}"></script>
@endsection
