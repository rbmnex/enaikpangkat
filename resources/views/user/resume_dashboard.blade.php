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

        <div class="row" style="background-color:#d9d9d9; padding-top: 10px;">

            <div class="col-lg-12 col-md-6 col-12">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Laman Resume</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                @if($resume)
                <div class="card card-transaction">
                    <div class="card-header">
                        <h4 class="card-title">Status Lampiran</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                           <button  onclick="location.href='{{url('/user/resume/lampiran')}}'" target="_blank" type="button" class="btn btn-info borang-lampiran"><i data-feather='paperclip'></i>&nbsp; Borang Lampiran</button>

                            </div>
                        </div>
                        <br/>
                        <div class="transaction-item">
                            <div class="media">

                                <div class="media-body">
                                    <h6 class="transaction-title">Lampiran Kursus</h6>
                                </div>
                            </div>
                            @if ($lampirankursus->count() > 0 && $resume->kursus)
                            <div class="badge badge-success">Lengkap</div>
                            @else
                            <div class="badge badge-danger">Tidak Lengkap</div>
                            @endif
                        </div>
                        <div class="transaction-item">
                            <div class="media">

                                <div class="media-body">
                                    <h6 class="transaction-title">Lampiran Deskripsi Tugas Kerja</h6>
                                </div>
                            </div>
                            @if ($lampiranbeban->count() > 0 && $resume->beban_kerja)
                            <div class="badge badge-success">Lengkap</div>
                            @else
                            <div class="badge badge-danger">Tidak Lengkap</div>
                            @endif
                        </div>
                        <div class="transaction-item">
                            <div class="media">

                                <div class="media-body">
                                    <h6 class="transaction-title">Lampiran Projek</h6>
                                </div>
                            </div>
                            @if ($lampiranprojek->count() > 0 && $resume->projek)
                            <div class="badge badge-success">Lengkap</div>
                            @else
                            <div class="badge badge-danger">Tidak Lengkap</div>
                            @endif
                        </div>
                        <div class="transaction-item">
                            <div class="media">

                                <div class="media-body">
                                    <h6 class="transaction-title">Lampiran Kepakaran</h6>
                                </div>
                            </div>
                            @if ($lampiranpendedahan->count() > 0 && $resume->kepakaran)
                            <div class="badge badge-success">Lengkap</div>
                            @else
                            <div class="badge badge-danger">Tidak Lengkap</div>
                            @endif
                        </div>
                        <div class="transaction-item">
                            <div class="media">

                                <div class="media-body">
                                    <h6 class="transaction-title">Lampiran Pencapaian Tertinggi</h6>
                                </div>
                            </div>
                            @if ($lampiranpencapaian->count() > 0 && $resume->pencapaian_tertinggi)
                            <div class="badge badge-success">Lengkap</div>
                            @else
                            <div class="badge badge-danger">Tidak Lengkap</div>
                            @endif
                        </div>

                        <div class="transaction-item">
                            <div class="media">

                                <div class="media-body">
                                    <h6 class="transaction-title">Lampiran Isytihar Harta</h6>
                                </div>
                            </div>
                            @if ($lampiranharta->count() > 0 )
                            <div class="badge badge-success">Lengkap</div>
                            @else
                            <div class="badge badge-danger">Tidak Lengkap</div>
                            @endif
                        </div>

                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pautan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <button  onclick="location.href='{{ url('/user/resume/download') }}'" type="button" class="btn btn-success muat-turun"><i data-feather='printer'></i>&nbsp; Resume</button>
                            </div>
                            @if($lampiranbeban->count() > 0)
                            <div class="col-4">
                                <button  onclick="location.href='{{ url($lampiranbeban[0]->path) }}'" type="button" class="btn btn-success muat-turun"><i data-feather='printer'></i>&nbsp; Deskripsi Tugas Kerja</button>
                            </div>
                            @endif
                            @if($lampiranharta->count() > 0)
                            <div class="col-4">
                                <button  onclick="location.href='{{ url($lampiranharta[0]->path) }}'" type="button" class="btn btn-success muat-turun"><i data-feather='printer'></i>&nbsp; Isytihar Harta</button>
                            </div>
                            @endif
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-warning paparan-resume" onClick="javascript:window.open('{{ url('/user/resume/paparan') }}', '_blank');"><i data-feather='eye'></i>&nbsp; Paparan Resume</button>

                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary paparan-tatacara" onClick="javascript:window.open('{{ url('/docs/TATACARA_PENGISIAN_RESUME_SISTEM_E-NAIKPANGKAT_(14.8.2023).pdf') }}', '_blank');"><i data-feather='download'></i>&nbsp; Tatacara Pengisian Resume</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!--
             @if($resume)
                    <div class="col-6" style=" text-align: justify;color:#000000;"><h2 class="text-primary">Status Resume</h2>


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


                    </div>
                      @endif
                    <div class="col-6" style=" text-align: justify; color:#000000;"><h2 class="text-primary">PAUTAN</h2>
                           @if($resume)
                           <button  onclick="location.href='{{url('/user/resume/lampiran')}}'" target="_blank" type="button" class="btn btn-info borang-lampiran"><i data-feather='paperclip'></i>Borang Lampiran</button>
                           @endif
                           <button  onclick="location.href='{{ url('/user/resume/download') }}'" type="button" class="btn btn-success muat-turun"><i data-feather='printer'></i>Muat Turun</button>
                            <button class="btn btn-warning paparan-resume" onClick="javascript:window.open('{{ url('/user/resume/paparan') }}', '_blank');"><i data-feather='eye'></i>Paparan Resume</button>

                            <div></div></div>
                    {{-- <div class="col-4 "><h2 class="text-primary">RESUME</h2></div> --}}

                    -->
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
