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
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Laman Utama</a>
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
        <div class="container-fluid">
      
        <div class="row" style="background-color:#d9d9d9; height: 250px;">
           

                    <div class="col-6" style=" text-align: justify;color:#000000;"><h2 class="text-primary">Status Resume</h2>
                        <p>
                 @if($resume)
                 <table>
                <tr><thead colspan= 2> <b>Status Lampiran </b></thead>
                </tr>
                <tr>
                    <td>Lampiran Kursus</td>
                     @if($lampirankursus->count() == 0)
                     <td><div class="badge badge-danger">Tidak Lengkap</div></td>
                     @else
                     <td><div class="badge badge-success">Lengkap</div></td>
                     @endif
                </tr>
                 <tr>
                    <td>Lampiran Beban Kerja</td>
                     @if($lampiranbeban->count() == 0)
                     <td><div class="badge badge-danger">Tidak Lengkap</div></td>
                     @else
                     <td><div class="badge badge-success">Lengkap</div></td>
                     @endif
                </tr>
                <tr>
                    <td>Lampiran Projek</td>
                     @if($lampiranprojek->count() == 0)
                     <td><div class="badge badge-danger">Tidak Lengkap</div></td>
                     @else
                     <td><div class="badge badge-success">Lengkap</div></td>
                     @endif
                </tr>
                
                <tr>
                    <td>Lampiran Kepakaran</td>
                     @if($lampiranpendedahan->count() == 0)
                     <td><div class="badge badge-danger">Tidak Lengkap</div></td>
                     @else
                     <td><div class="badge badge-success">Lengkap</div></td>
                     @endif
                </tr>
                <tr>
                    <td>Lampiran Pencapaian Tertinggi</td>
                     @if($lampiranpencapaian->count() == 0)
                     <td><div class="badge badge-danger">Tidak Lengkap</div></td>
                     @else
                     <td><div class="badge badge-success">Lengkap</div></td>
                     @endif
                </tr>

            </table>
        @endif
    </p>
                    </div>
                    <div class="col-6" style=" text-align: justify; color:#000000;"><h2 class="text-primary">PAUTAN</h2>
                           @if($resume)
                           <button  onclick="location.href='{{url('/user/resume/lampiran')}}'" target="_blank" type="button" class="btn btn-info borang-lampiran"><i data-feather='paperclip'></i>Borang Lampiran</button>
                           @endif
                           <button onclick="location.href='{{ url('/user/resume/paparan') }}'"  target="_blank" type="button" class="btn btn-warning paparan-resume"><i data-feather='eye'></i>Paparan Resume</button>
                            <button  onclick="location.href='{{ url('/user/resume/download') }}'"type="button" class="btn btn-success muat-turun"><i data-feather='printer'></i>Muat Turun</button>
                            <div></div></div>
                    {{-- <div class="col-4 "><h2 class="text-primary">RESUME</h2></div> --}}


        </div>

     
  </div>

</div>
    </section>
    <!-- Dashboard Ecommerce ends -->

</div>
@endsection
@section('customJs')
 <!-- BEGIN: Page JS-->
 {{-- <script src="{{asset('asset/js/scripts/pages/dashboard-ecommerce.js')}}"></script> --}}
 <!-- END: Page JS-->
@endsection
