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
             gdfgdf                        
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
        $('.setl2link').attr('href', window.location.origin +'/urussetia/resume/lampiran2/' + ic);  
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
