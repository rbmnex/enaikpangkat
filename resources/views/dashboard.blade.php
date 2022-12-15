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
        <div class="row">
            <div class="col-2 bg-light">
                <img src="{{ asset('images/enp.png') }}" />
            </div>
            <div class="col-10 bg-light"style="text-align: justify;text-justify: inter-word;text-align: center; background-color:#d9d9d9; ">
                <h2>SELAMAT DATANG KE</h2><br>
                <h1 class="text-warning">e-naikpangkat</h1>
                <br>
                <p style=" text-align: justify;">Dasar dan peraturan pemangkuan dan kenaikan pangkat dalam perkhidmatan awam adalah berasaskan Peraturan-Peraturan Pegawai Awam (Pelantikan, Kenaikan Pangkat dan Penamatan Perkhidmatan) 2005 [P.U(A) 176/2005], Peraturan Peraturan Lembaga Kenaikan Pangkat Perkhidmatan Pelajaran, 2010 [P.U(A) 24/2010]</p>
            </div>
        </div>
        <div class="row" style="background-color:#d9d9d9;">
            <div class="col-2 bg-light">
                <img src="{{ asset('images/definasi.png') }}" />
            </div>

                    <div class="col-5 bg-light" style=" text-align: justify;"><h2 class="text-primary">PEMANGKUAN</h2><br/>
                        <p><b>Pelaksanaan tugas secara sepenuh masa, suatu jawatan lain yang lebih tinggi grednya daripada gred hakiki</b> dalam skim perkhidmatan yang sema dengan kelulusan Lembaga Kenaikan Pangkat;</p>
                    </div>
                    <div class="col-5 bg-light" style=" text-align: justify;"><h2 class="text-primary">NAIK PANGKAT</h2><br/>
                        <p><b>Peningkatan secara hakiki dari satu gred ke suatu gred yang lebih tinggi</b> dalam skim perkhidmatan yang sama dengan kelulusan Lembaga Kenaikan Pangkat;</p></div>
                    {{-- <div class="col-4 bg-light"><h2 class="text-primary">RESUME</h2></div> --}}



  <br>
  <div class="row">
    <div class="col-4 bg-light" style=" text-align: justify;"><h2 class="text-primary">PEMANGKUAN</h2><br/>
        <p><b>Pelaksanaan tugas secara sepenuh masa, suatu jawatan lain yang lebih tinggi grednya darioada gred hakiki</b> dalam skim perkhidmatan yang sema dengan kelulusan Lembaga Kenaikan Pangkat;</p>
    </div>
        </div>
  <br>
  <div class="row">
    <div class="col-2 bg-light">
        <img src="{{ asset('images/kriteria.png') }}" />
    </div>
    <div class="col-10 bg-light">
        <div class="col-12 bg-light " style=" text-align: justify;"><h2 class="text-primary">PEMANGKUAN DAN KENAIKAN PANGKAT</h2></div>
        <div class="row">
            <div class="col-3 bg-grey">
                 <div class="row">
                    <div class="col-2 bg-grey"style="font-size:40px;">1</div>
                    <div class="col-10 bg-grey" style="font-size:9px;"><b>DISAHKAN <br/>DALAM <br/>PERKHIDMATAN</b></div>
                </div>
            </div>
            <div class="col-3 bg-light">
                 <div class="row">
                    <div class="col-2 bg-light" style="font-size:40px;">3</div>
                    <div class="col-10 bg-light" style="font-size:9px;"><b>DIPERAKU OLEH<br/>KETUA JABATAN/ <br/>KETUA PERKHIIDMATAN</b></div>
                </div>
            </div>
            <div class="col-3 bg-light">
                <div class="row">
                    <div class="col-2 bg-light" style="font-size:40px;">5</div>
                    <div class="col-10 bg-light" style="font-size:9px;"><b>ISYTIHAR <br/>HARTA <br/></b></div>
                </div>
            </div>
            <div class="col-3 bg-light">
                 <div class="row">
                    <div class="col-2 bg-light" style="font-size:40px;">7</div>
                    <div class="col-10 bg-light" style="font-size:9px;"><b>BEBAS DARIPADA DISENARAIKAN <br/>PEMINJAMAN PENDIDIKAN<BR/> TEGAR DARIPADA<BR/> INSTITUSI PINJAMAN <br/> PENDIDIKAN</b></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3 bg-light">
                    <div class="row">
                   <div class="col-2 bg-light" style="font-size:40px;">2</div>
                   <div class="col-10 bg-light"style="font-size:9px;"><b>CAPAI TAHAP <br>PRESTASI YANG <br/>DITETAPKAN <br/>>80%</b></div>
               </div>
               </div>
            <div class="col-3 bg-light">
                    <div class="row">
                   <div class="col-2 bg-light" style="font-size:40px;">4</div>
                   <div class="col-10 bg-light" style="font-size:9px;"><b>BEBAS DARI <br/>HUKUMAN <br/>TATATERTIB</b></div>
               </div>
               </div>
       <div class="col-3 bg-light">
                    <div class="row">
                   <div class="col-2 bg-light" style="font-size:40px;">6</div>
                   <div class="col-10 bg-light" style="font-size:9px;"><b>LULUS TAPISAN <br/>KEUTUHAN <br/>SPRM</b></div>
               </div>
               </div>
       <div class="col-3 bg-light">
            <div class="row">
                   <div class="col-2 bg-light" style="font-size:40px;">8</div>
                   <div class="col-10 bg-light" style="font-size:9px;"><b>SYARAT LAIN YANG <br/>DITETAPKAN OLEH <br/>LEMBAGA</b></div>
               </div>
        </div>

    </div>
  </div>

  <div>
      <div class="col-6 bg-light">
          <p>Dasar dan peraturan berhubung urusan pemangkuan dan kenaikan pangkat dalam perkhidmatan awam:

          <ul>
              <li>Pekeliling Perkhidmatan Sumber Manusia-MyPPSM(link: <a href="https://docs.jpa.gov.my/ppsm/">https://docs.jpa.gov.my/ppsm/)</a></li>
              <li>Rasionalisasi Skim Perkhidmatan Bagi Perkhidmatan Awam Persekutuan Di Bawah Sistem Saraan Malaysia (link:<a href="https://docs.jpa.gov.my/docs/myppsm/PA/Rasionalisasi/">
              https://docs.jpa.gov.my/docs/myppsm/PA/Rasionalisasi/)</a></li>
          </ul>   </p>
      </div>
  </div>
      <div class="row">
      <div class="col-9" style="text-align: justify;text-justify: inter-word;text-align: center; background-color: #388196; font-size: 8.5px; font-color:">
          <p style="color:white;">  HUBUNGI KAMI</p>
          <p style="color:white;">URUS SETIA KENAIKAN PANGKAT</p>
          <p style="color:white;">BAHAGIAN PENGURUSAN SUMBER MANUSIA, CAWANGAN DASAR DAN PENGURUSAN KORPORAT, <BR/>
            IBU PEJABAT JKR MALAYSIA, <br/>
        TINGKAT 29, MENARA KERJA RAYA(BLOK G), <br/>
        JALAN SULTAN SALAHUDDIN, 50480 KUALA LUMPUR. </p>
        <p style="color:white;">E-mel:urusetiakenaikanpangkat@jkr.gov.my</p>

        <p style="color:white;">Awam - 03-26188622/8413/8624 <br/> Arkitek,Ukur Bahan & Ukur Bangunan - 03-26188631/8477/8624<br/>Mekanikal & Elektrik - 03-26188623/8477/8624 <br/> JUSA - 03-26188639/8629/8626/8624</p>
      </div>
      <div class="col-3">
          <img width="200" height="150" src="{{ asset('images/jkr_logo.png') }}" />
      </div>

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
