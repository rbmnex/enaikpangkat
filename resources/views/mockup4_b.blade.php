@extends('layouts.main')
<script type="text/javascript">
.cell__big {
  border-color: red;
  height: auto;
  display: flex;
  height: calc(100% - 2rem);

  div{
    border:1px solid red;
  
}
</script>
@section('customCss')
@include('web.datatable-css')
<link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/forms/select/select2.min.css')}}">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Pemohon</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Rumah</a>
                        </li>
                        <li class="breadcrumb-item">Urus Setia
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Resume</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                 <div class="card-header basic-select2">
                                    <h4 class="card-title"> Carian Pegawai</h4>
                                </div>
                                 <div class="card-body">
                                    <form class="form form-horizontal" method="POST" action="{{Request::root()}}/urussetia/resume/mockup4">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="nama">Carian NOKP</label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <input type="hidden" id="setICtext" class="form-control"/>
                                                        <input type="text" id="setIC" class="form-control" name="nokp" placeholder="NOKP" />
                                                    </div>
                                                     <div class="col-sm-2"> 
                                                        <input type="submit" class="btn btn-success me-1" value="cari">
                                                       
                                                    </div>  
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-2"> 
                                                        <a href="{{Request::root()}}/urussetia/resume/email/{{$user['nokp'] ?? ''}}" type="button" class="btn btn-danger me-1 setEmaillink" target="_blank">Hantar Email</a>
                                                    </div> 
                                                     <div class="col-sm-2"> 
                                                        <a href="{{Request::root()}}/urussetia/resume/resume/{{$user['nokp'] ?? ''}}" type="button" class="btn btn-info me-1 setIClink" target="_blank">Cetak</a>
                                                    </div> 
                                                    <!-- <div class="col-sm-2"> 
                                                        <a href="{{Request::root()}}/urussetia/resume/pdf/lampiran2/{{$user['nokp'] ?? ''}}" type="button" class="btn btn-info me-1 setl2link" target="_blank">Lampiran 2</a>
                                                    </div> 
                                                    <div class="col-sm-2"> 
                                                        <a href="{{Request::root()}}/urussetia/resume/lampiran3/{{$user['nokp'] ?? ''}}" type="button" class="btn btn-info me-1 setl3link" target="_blank">Lampiran 3</a>
                                                    </div> 
                                                    <div class="col-sm-2"> 
                                                        <a href="{{Request::root()}}/urussetia/resume/lampiran4/{{$user['nokp'] ?? ''}}" type="button" class="btn btn-info me-1 setl4link" target="_blank">Lampiran 4</a>
                                                    </div>  -->
                                                     </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                </div>
            </div>
        </div>
    </section>
</div>
<div class="content-body">
    <section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header basic-select2">
                                    <h4 class="card-title">A. BUTIRAN PERIBADI</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="nama">Nama</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                         <input type="text" class="form-control nama" id="basicInput" placeholder="" readonly value="{{$user['name'] ?? ''}}" /> 
                                                    </div>
                                                   <div class="col-sm-3">
                                                        <div class="card" style="width: 18rem;">
                                                            @if(isset($user['peribadi']['gambar'])) 
                                                          <img src="http://10.8.80.68/{{$user['peribadi']['gambar']??''}}" class="card-img" alt=""  width="120px" height="200px">
                                                          @else
                                                           <img src="http://127.0.0.1:8000/images/default-profile.png" class="card-img" alt=""  width="120px" height="200px">
                                                           @endif
                                                         
                                                        </div>  
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-3">
                                                 <div class="col-sm-3">
                                                 </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="jawatan">Jawatan </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                       
                                                        <input type="text" class="form-control jawatan" id="basicInput" placeholder="" readonly value="{{$user['jawatan'] ?? ''}}" /> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="nokp_lama">No Kad Pengenalan</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control nokp" id="basicInput" placeholder="" readonly value="{{$user['nokp'] ?? ''}}" /> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="tkh_lahir">Tarikh Lahir</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                         <input type="text" class="form-control jawatan" id="basicInput" placeholder="" readonly value="{{$user['peribadi']['tkh_lahir'] ?? ''}}" /> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="tempat_lahir">Tempat Lahir</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                         <input type="text" class="form-control tempat_lahir" id="basicInput" placeholder="" readonly value="{{$user['peribadi']['tempat_lahir'] ?? ''}}" /> 
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="alamat_pej">Alamat Pejabat</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                         <input type="textarea" class="form-control alamat_pej" id="basicInput" placeholder="" readonly value="{{$user['alamat_pejabat'] ?? ''}}" /> 
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="alamat_rumah">Alamat Rumah</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control alamat_rumah" id="basicInput" placeholder="" readonly value="{{$user['peribadi']['alamat_rumah'] ?? ''}}" /> 
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="taraf_perkahwinan">Taraf Perkahwinan</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                         <input type="text" class="form-control taraf_perkahwinan" id="basicInput" placeholder="" readonly value="{{$user['peribadi']['taraf_perkahwinan'] ?? ''}}" /> 
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="no_telefon">No. Telefon(Pejabat)</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                       <input type="text" class="form-control no_tel_pejabat" id="basicInput" placeholder="" readonly value="{{$user['peribadi']['tel_pejabat'] ?? ''}}" /> 
                                                    </div>
                                                       <div class="col-sm-3">
                                                        <label class="col-form-label" for="no_telefon">No. Telefon(HP)</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                       <input type="text" class="form-control no_tel_pejabat" id="basicInput" placeholder="" readonly value="{{$user['peribadi']['tel_bimbit'] ?? ''}}" /> 
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="no_fax">No. Fax</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="no_fax" class="form-control no fax" readonly value="{{$user['peribadi']['no_fax'] ?? ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="emel">E-Mail</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="emel" class="form-control emel" readonly value="{{$user['email'] ?? ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="tkh_isytihar_harta">Tarikh pengisytiharan Harta Terkini</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="tkh_isytihar_harta" class="form-control tkh_isytihar_harta" readonly value="{{$user['jawatan'] ?? ''}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            
                    
                </div>                         
             </div>
        </div>
       <!--  <div class="col-12">
            <div class="card">
                 <div class="card-header">
                    <h4 class="card-title">B. PRESTASI</h4>
                 </div>
            <tbody>
                <div class="col-12">
                    <div class="mb-1 row">
                        <div class="col-md-4 border-bottom">Tahun</div>
                        <div class="col-md-4 border-bottom">Purata</div></div>
                            @if(isset($user['markah'])) 
                                @foreach($user['markah'] as $markah) 
                                    <div class="mb-1 row">
                                        <div class="col-md-4"> {{ $markah['tahun'] }} </div>
                                        <div class="col-md-4"> {{ $markah['purata'] }} </div></div>
                                @endforeach
                            @endif     
                </div>
            </tbody>   
            </div>
        </div>
        
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">C. KEPAKARAN DAN PENGALAMAN</h4>
                        </div> 
                           
                                <div class="mb-1 row">
                                            <div class="col-md-4 border-bottom">Nama Kursus</div>
                                            <div class="col-md-4 border-bottom">Tarikh Mula</div>
                                            <div class="col-md-4 border-bottom">Tarikh Tamat</div></div>
                            @if(isset($user['pengalaman'])) 
                                @foreach($user['pengalaman'] as $pengalaman) 
                                    
                                        <div class="mb-1 row">
                                            <div class="col-md-4"> {{ $pengalaman['tempat'] }} </div>
                                            <div class="col-md-4"> {{ $pengalaman['mula'] }} </div>
                                            <div class="col-md-4"> {{ $pengalaman['tamat'] }} </div></div>
                                @endforeach
                            @endif     
                        
                        </div>                          
                    </div>
    
                    
   
        <div class="col-12">
            <div class="card">
                <div class="basic-select2">
                <div class="card-header">
                    <h4 class="card-title">D. PENDEDAHAN</h4>
                </div>
                    <div class="col-12">
                        <div class="mb-1 row">
                            <div class="col-sm-3">
                                <label class="col-form-label" for="alamat_pej">Majikan</label>
                            </div>
                            <div class="col-sm-9">
                                 <input type="textarea" class="form-control alamat_pej" id="basicInput" placeholder="" readonly value="Jabatan Kerja Raya Malaysia" /> 
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-sm-3">
                                <label class="col-form-label" for="alamat_pej">Skim Perkhidmatan</label>
                            </div>
                            <div class="col-sm-9">
                                 <input type="textarea" class="form-control alamat_pej" id="basicInput" placeholder="" readonly value="{{$user['perkhidmatan']['skim'] ?? ''}}" /> 
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-sm-3">
                                <label class="col-form-label" for="alamat_pej">Tarikh Mula Perkhidmatan</label>
                            </div>
                            <div class="col-sm-9">
                                 <input type="textarea" class="form-control alamat_pej" id="basicInput" placeholder="" readonly value="{{$user['perkhidmatan']['tkh_mula_gred_hakiki'] ?? ''}}" /> 
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-sm-3">
                                <label class="col-form-label" for="alamat_pej">Tarikh Bersara Wajib</label>
                            </div>
                            <div class="col-sm-9">
                                 <input type="textarea" class="form-control alamat_pej" id="basicInput" placeholder="" readonly value="{{$user['peribadi']['tkh_wajib_bersara']?? ''}}" /> 
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-sm-3">
                                <label class="col-form-label" for="alamat_pej">Gred Hakiki</label>
                            </div>
                            <div class="col-sm-9">
                                 <input type="textarea" class="form-control alamat_pej" id="basicInput" placeholder="" readonly value="{{$user['perkhidmatan']['kod_jawatan'] ?? ''}}" /> 
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-sm-3">
                                <label class="col-form-label" for="alamat_pej">Tarikh Mula Gred Hakiki</label>
                            </div>
                            <div class="col-sm-9">
                                 <input type="textarea" class="form-control alamat_pej" id="basicInput" placeholder="" readonly value="{{$user['perkhidmatan']['tkh_mula_gred_hakiki'] ?? ''}}" /> 
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="basic-select2">
                <div class="card-header">
                    <h4 class="card-title">E. KELAYAKAN AKADEMIK DAN PROFESIONAL</h4>
                </div>
                     <tbody>
                            <div class="col-12">
                                 <div class="card-header">
                                    <h1 class="card-title">KELAYAKAN AKADEMIK</h1>
                                 </div>
                                <div class="mb-1 row">
                                            <div class="col-md-4 border-bottom">Nama Kelulusan</div>
                                            <div class="col-md-4 border-bottom">Institusi Pengajian</div>
                                            <div class="col-md-4 border-bottom">Tahun Kelulusan</div>
                                </div>
                            @if(isset($user['kelayakan'])) 
                                @foreach($user['kelayakan'] as $kelayakan) 
                                    
                                        <div class="mb-1 row">
                                            <div class="col-md-4"> {{ $kelayakan['nama_kelulusan'] }} </div>
                                            <div class="col-md-4"> {{ $kelayakan['institusi'] }} </div>
                                            <div class="col-md-4"> {{ $kelayakan['tkh_kelulusan'] }} </div></div>
                                @endforeach
                            @endif     
                         </div>
                          <div class="col-12">
                             <div class="card-header">
                                    <h1 class="card-title">KELAYAKAN PROFESIONAL</h1>
                                 </div>
                                <div class="mb-1 row">
                                            <div class="col-md-4 border-bottom">Nama Kelulusan</div>
                                            <div class="col-md-4 border-bottom">Institusi Pengajian</div>
                                            <div class="col-md-4 border-bottom">Tahun Kelulusan</div>
                                </div>
                            @if(isset($user['professional'])) 
                                @foreach($user['professional'] as $professional) 
                                    
                                        <div class="mb-1 row">
                                            <div class="col-md-4"> {{ $professional['nama_kelulusan'] }} </div>
                                            <div class="col-md-4"> {{ $professional['institusi'] }} </div>
                                            <div class="col-md-4"> {{ $professional['tkh_kelulusan'] }} </div></div>
                                @endforeach
                            @endif     
                         </div>
                        </tbody>   
                </div>
            </div>
        </div> 

        <div class="col-12">
            <div class="card">
                <div class="basic-select2">
                <div class="card-header">
                    <h4 class="card-title">F. SUMBANGAN DAN KEGIATAN</h4>
                </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                     
                    </form>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-12">
            <div class="card">
                <div class="basic-select2">
                <div class="card-header">
                    <h4 class="card-title">G. PENGIKTIRAFAN</h4>
                </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                      

                    </form>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-12">
            <div class="card">
                <div class="basic-select2">
                <div class="card-header">
                    <h4 class="card-title">H. LAIN-LAIN</h4>
                </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                       
                      
                       

                    </form>
                    </div>
                </div>
            </div>
        </div>                                  
    </div>    
    </div class="col-sm-12"> -->
     <!--   

        <div class="col-sm-4"> 
         <a href="/admin/pengguna/mockup2">      
        <button type="#" class="btn btn-success me-1">Seterusnya</button>
        </a>
        </div> -->
    </div>
    </section>
</div>
@endsection

@section('customJs')
<script>
    $(document).on('keyup', '#setIC', function(){
        let ic = $('#setICtext').val($(this).val());
        $('.setIClink').attr('href', window.location.origin +'/urussetia/resume/resume/' + ic);  
    });

      $(document).on('keyup', '#setIC', function(){
        let ic = $('#setICtext').val($(this).val());
        $('.setEmaillink').attr('href', window.location.origin +'/urussetia/resume/email/' + ic);  
    });

      $(document).on('keyup', '#setIC', function(){
        let ic = $('#setICtext').val($(this).val());
        $('.setl2link').attr('href', window.location.origin +'/urussetia/resume/pdf/lampiran2/' + ic);  
    });

      $(document).on('keyup', '#setIC', function(){
        let ic = $('#setICtext').val($(this).val());
        $('.setl3link').attr('href', window.location.origin +'/urussetia/resume/lampiran3/' + ic);  
    });

      $(document).on('keyup', '#setIC', function(){
        let ic = $('#setICtext').val($(this).val());
        $('.setl4link').attr('href', window.location.origin +'/urussetia/resume/lampiran4/' + ic);  
    });

    $(document).on('click', '.setIClink', function(){
        if($('#setICtext').val() == '' || typeof $('#setICtext').val() == 'undefined'){
            alert('Sila Isi IC');
            return false;
        }else{
            $('.setIClink').attr('href', window.location.origin +'/urussetia/resume/resume/' + $('#setICtext').val());
        }      
    });
</script>
@endsection
