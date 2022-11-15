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
                    <h2 class="content-header-title float-start mb-0">Senarai UKP 13</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="ukp13-table table">
                        <thead>
                        <tr>
                            <th>NOKP</th>
                            <th>NAMA</th>
                            <th>STATUS</th>
                            <th>TINDAKAN</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>NOKP</th>
                            <th>NAMA</th>
                            <th>STATUS</th>
                            <th>TINDAKAN</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
    <script src="{{ asset('app_js_helper/segment/naikpangkat/main/settings.js') }}"></script>
    <script src="{{ asset('app_js_helper/segment/naikpangkat/main/controller.js') }}"></script>
    <script src="{{ asset('app_js_helper/segment/naikpangkat/main/main.js') }}"></script>
@endsection
