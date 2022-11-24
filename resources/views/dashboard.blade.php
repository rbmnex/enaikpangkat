{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 --}}
@extends('layouts.main')
 @section('customCss')
<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('asset/css/style.css')}}">
<!-- END: Custom CSS-->
 @endsection
@section('content')
 <div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                {{-- <h2 class="content-header-title float-left mb-0">ENaik Pangkat</h2> --}}
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Laman Utama</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">

    </section>
    <!-- Dashboard Ecommerce ends -->

</div>
@endsection
@section('customJs')
 <!-- BEGIN: Page JS-->
 {{-- <script src="{{asset('asset/js/scripts/pages/dashboard-ecommerce.js')}}"></script> --}}
 <!-- END: Page JS-->
@endsection
