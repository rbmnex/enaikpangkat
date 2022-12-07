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
        <div class="container-fluid">
  <div class="col-12 bg-light"style="text-align: justify;text-justify: inter-word;text-align: center;"><h2>SELAMAT DATANG KE</h2><br>
  <h4 class="text-warning">e-naikpangkat</h4></div>
  <div class="row">
    <div class="col-12 bg-light" style=" text-align: justify;"><p>Dasar dan peraturan pemangkuan dan kenaikan pangkat dalam perkhidmatan awam adalah berasaskan Peraturan-Peraturan Pegawai Awam (Pelantikan, Kenaikan Pangkat dan Penamatan Perkhidmatan) 2005 [P.U(A) 176/2005], Peraturan Peraturan Lembaga Kenaikan Pangkat Perkhidmatan Pelajaran, 2010 [P.U(A) 24/2010]</p></div>
  </div>

  <br>
  <div class="row">
    <div class="col-4 bg-light" style=" text-align: justify;"><h2 class="text-primary">PEMANGKUAN</h2><br/>
        <p><b>Pelaksanaan tugas secara sepenuh masa, suatu jawatan lain yang lebih tinggi grednya darioada gred hakiki</b> dalam skim perkhidmatan yang sema dengan kelulusan Lembaga Kenaikan Pangkat;</p>
    </div>
    <div class="col-4 bg-light" style=" text-align: justify;"><h2 class="text-primary">NAIK PANGKAT</h2><br/>
        <p><b>Peningkatan secara hakiki dari satu gred ke suatu gred yang lebih tiggi</b> dalam skim perkhidmatan yang sama dengan kelulusan Lembaga Kenaikan Pangkat;</p></div>
    <div class="col-4 bg-light"><h2 class="text-primary">RESUME</h2></div>
  </div>
  <br>
  <div>
    <div class="col-12 bg-light text-primary" style=" text-align: justify;"><h2>PEMANGKUAUN DAN KENAIKAN PANGKAT</h2></div>
     <div class="row"> 
        <div class="col-3 bg-white">
             <div class="row"> 
            <div class="col-2 bg-white" style="font-size:40px;">1</div>
            <div class="col-8 bg-white" style="font-size:9px;"><p>DISAHKAN <br/>DALAM <br/>PERKHIDMATAN</p></div>
        </div>
        </div>
        <div class="col-3 bg-white">
             <div class="row"> 
            <div class="col-2 bg-white" style="font-size:40px;">3</div>
            <div class="col-8 bg-white" style="font-size:9px;"><p>DIPERAKU OLEH<br/>KETUA JABATAN/ <br/>KETUA PERKHIIDMATAN</p></div>
        </div>
        </div>
        <div class="col-3 bg-white">
             <div class="row"> 
            <div class="col-2 bg-white" style="font-size:40px;"><h1>5</h1></div>
            <div class="col-8 bg-white" style="font-size:9px;"><p>ISYTIHAR <br/>HARTA <br/></p></div>
        </div>
        </div>
        <div class="col-3 bg-white">
             <div class="row"> 
            <div class="col-2 bg-white" style="font-size:40px;"><h1>7</h1></div>
            <div class="col-8 bg-white" style="font-size:9px;"><p>BEBAS DARIPADA <br/>DISENARAIKAN <br/>PEMINJAMAN PENDIDIKAN<BR/> TEGAR DARIPADA<BR/> INSTITUSI PINJAMAN <br/> PENDIDIKAN</p></div>
        </div>
        </div>
    </div>
    <div class="row">
     <div class="col-3 bg-white">
             <div class="row"> 
            <div class="col-2 bg-white" style="font-size:40px;"><h1>2</h1></div>
            <div class="col-8 bg-white"style="font-size:9px;"><p>CAPAI TAHAP <br>PRESTASI YANG <br/>DITETAPKAN <br/>>80%</p></div>
        </div>
        </div>
     <div class="col-3 bg-white">
             <div class="row"> 
            <div class="col-2 bg-white" style="font-size:40px;"><h1>4</h1></div>
            <div class="col-8 bg-white" style="font-size:9px;"><p>BEBAS DARI <br/>HUKUMAN <br/>TATATERTIB</p></div>
        </div>
        </div>
<div class="col-3 bg-white">
             <div class="row"> 
            <div class="col-2 bg-white" style="font-size:40px;"><h1>6</h1></div>
            <div class="col-8 bg-white" style="font-size:9px;"><p>LULUS TAPISAN <br/>KEUTUHAN <br/>SPRM</p></div>
        </div>
        </div>
<div class="col-3 bg-white">
             <div class="row"> 
            <div class="col-2 bg-white" style="font-size:40px;"><h1>8</h1></div>
            <div class="col-8 bg-white" style="font-size:9px;"><p>SYARAT LAIN YANG <br/>DITETAPKAN OLEH <br/>LEMBAGA</p></div>
        </div>
        </div>
 </div>
  </div>
  <div>
      <div class="col-6 bg-light">
          <p>Dasar dan peraturan berhubung urusan pemangkuan dan kenaikan pangkat dalam perkhidmatan awam:

          <ul>
              <li>Pekeliling Perkhidmatan Sumber Manusia-MyPPSM(link: https://docs.jpa.gov.my/ppsm/)</li>
              <li>Rasionalisasi Skim Perkhidmatan Bagi Perkhidmatan Awam Persekutuan Di Bawah Sistem Saraan Malaysia (link:
              https://docs.jpa.gov.my/docs/myppsm/PA/Rasianalisasi/)</li>
          </ul>   </p>
      </div>
      <div class="col-6 bg-light">
          
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
