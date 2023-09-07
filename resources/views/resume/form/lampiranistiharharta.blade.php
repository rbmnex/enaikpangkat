<div id="harta-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Lampiran 6 -Pengisytiharan Harta</h5>

    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="col-form-label" for="tarikhAkhir_harta">Tarikh Akhir Pengisytiharan Harta Terkini:</label>
            <input type="text" readonly class="form-control" value="{{ $tkh_harta == 0 ? $tkh_harta : \Carbon\Carbon::parse($tkh_harta)->format('d-m-Y') }}" id="tarikhAkhir_harta" name="harta_tkh_akhir_pengisytiharan">
            {{-- <div class="invalid-feedback" @if($profile['istihar_sah']) {{ 'style="display:block;"' }} @endif>@if($profile['istihar_sah']) {{ 'Sila kemaskini semula Tarikh Akhir Pengisytiharan Harta yang baru' }} @endif</div> --}}

        </div>

        <div class="form-group col-md-12">
            <div class="file btn btn-success ">
                <i data-feather='upload'></i> Muat Naik
                <input class="file-input upload-harta" type="file" id="lampiran_E" name="harta_surat_kelulusan" />
            </div>
            <span class="col-form-label harta-file"></span>
            <span style="color: red; font-size: 0.857rem; !important; font-style: italic;">Saiz Maksimum 2 MB</span>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group col-md-12">
            {{-- <form id="upload_harta" width="100%"> --}}
            <label class="col-form-label" style="" for="lampiran_E">* SILA MUAT NAIK <b>LAMPIRAN E - PENGISYTIHARAN HARTA</b> yang dijana dari <b>HRMIS</b> disini (sila pastikan maklumat tarikh sama di dalam sistem MYKJ)</label>

            {{-- </form> --}}
        </div>
        {{-- <div class="form-group col-md-12">
            <label class="col-form-label" style="font-style: italic; font-size: 0.857rem; " for=""><b>* Kelulusan Pengisytiharan Harta (LAMPIRAN E yang dijana dari HRMIS) <!--yang disahkan--> perlu disertakan bersama</b></label>
        </div> --}}
        {{-- <div class="form-group col-md-12">
            <label class="col-form-label" style="font-style: italic; font-size: 0.857rem; " for=""><b>* Sila pastikan kelulusan Pengisytiharan Harta adalah sah dan tidak melebihi dari lima (5) tahun dari tarikh Pengisytiharan Harta terakhir</b></label>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" style="font-style: italic; font-size: 0.857rem; " for=""><b>* Sila pastikan tempoh sah laku masih berbaki sekurang-kurangnya 8 bulan dari tarikh emel ini</b></label>
        </div> --}}
        <div class="form-group col-md-12">
            <button class="btn btn-warning paparan-resume" onClick="javascript:window.open('{{ url('/user/resume/paparan') }}', '_blank');"><i data-feather='eye'></i>Paparan Resume</button>

        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="form-group col-md-12">
            {{-- <button type="button" class="btn btn-info selesai-calon" data-toggle="modal" data-target="#modal-selesai"><i data-feather='send'></i>Hantar</button> --}}
            <button type="button" class="btn btn-info selesai-calon"><i data-feather='send'></i>Hantar Keseluruhan Resume</button>
            <br/>
             <!-- @if($lampirankursus->count() != 0 && $lampiranbeban->count() != 0 && $lampiranprojek->count() != 0 && $lampiranpendedahan->count() != 0 && $lampiranpencapaian->count() != 0) -->

           <!--  @else
             <button type="button" disabled class="btn btn-info selesai-lampiran" data-toggle="modal" data-target="#modal-selesai"><i data-feather='send'></i>Hantar</button><br>
             @endif
              @if ($lampirankursus->count() == 0)
            <span style="color:red; font-size:10px"> * lengkapkan lampiran kursus</span><br>@endif
            @if ($lampiranbeban->count() == 0)
             <span style="color:red; font-size:10px"> * lengkapkan lampiran beban</span><br>@endif
             @if ($lampiranprojek->count() == 0)
             <span style="color:red; font-size:10px"> * lengkapkan lampiran projek</span><br>@endif
             @if ($lampiranpendedahan->count() == 0)
             <span style="color:red; font-size:10px"> * lengkapkan lampiran pendedahan</span><br>@endif
             @if ($lampiranpencapaian->count() == 0)
             <span style="color:red; font-size:10px"> * lengkapkan lampiran pencapaian</span>
             @endif -->
        </div>

    </div>
    {{-- <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-primary btn-prev">
            <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Sebelum</span>
        </button>
        <button class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Selanjutnya</span>
            <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
        </button>
    </div> --}}
</div>
