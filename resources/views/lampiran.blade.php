@extends('layouts.main')
<script type="text/javascript">
.cell__big {
  border-color: red;
  height: auto;
  display: flex;
  height: calc(100% - 2rem);
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
                                    <h4 class="card-title"> Lampiran 2</h4>
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
                                                        <input type="text" id="setIC" class="form-control" name="nokp" placeholder="Nama" />
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
                                                        <a href="{{Request::root()}}/urussetia/resume/resume/{{$user['nokp'] ?? ''}}" type="button" class="btn btn-danger me-1 setIClink" target="_blank">Hantar Email</a>
                                                    </div> 
                                                     <div class="col-sm-2"> 
                                                        <a href="{{Request::root()}}/urussetia/resume/resume/{{$user['nokp'] ?? ''}}" type="button" class="btn btn-info me-1 setIClink" target="_blank">Cetak</a>
                                                    </div> 
                                                     </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-12">
            <div class="card">
                 <div class="card-header basic-select2">
                                    <h4 class="card-title"> Lampiran 3</h4>
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
                                                        <input type="text" id="setIC" class="form-control" name="nokp" placeholder="Nama" />
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
                                                        <a href="{{Request::root()}}/urussetia/resume/resume/{{$user['nokp'] ?? ''}}" type="button" class="btn btn-danger me-1 setIClink" target="_blank">Hantar Email</a>
                                                    </div> 
                                                     <div class="col-sm-2"> 
                                                        <a href="{{Request::root()}}/urussetia/resume/resume/{{$user['nokp'] ?? ''}}" type="button" class="btn btn-info me-1 setIClink" target="_blank">Cetak</a>
                                                    </div> 
                                                     </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-12">
            <div class="card">
                 <div class="card-header basic-select2">
                                    <h4 class="card-title"> Lampiran 4</h4>
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
                                                        <input type="text" id="setIC" class="form-control" name="nokp" placeholder="Nama" />
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
                                                        <a href="{{Request::root()}}/urussetia/resume/resume/{{$user['nokp'] ?? ''}}" type="button" class="btn btn-danger me-1 setIClink" target="_blank">Hantar Email</a>
                                                    </div> 
                                                     <div class="col-sm-2"> 
                                                        <a href="{{Request::root()}}/urussetia/resume/resume/{{$user['nokp'] ?? ''}}" type="button" class="btn btn-info me-1 setIClink" target="_blank">Cetak</a>
                                                    </div> 
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
