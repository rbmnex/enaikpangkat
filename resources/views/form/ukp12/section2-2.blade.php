<div id="cuti-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 2 - Maklumat Cuti Dan Pengesahan</h5>
        <small class="text-notice">Sila kemas kini di bahagian CUTI di portal MyKj jika ada perubahan </small>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="col-form-label" for="country">Pengesahan Cuti Tanpa Gaji / Cuti Separuh Gaji / Cuti Belajar Bergaji Penuh / Cuti Belajar Separuh Gaji</label>
            <select class="select2 form-control" name="cuti_status" id="status_cuti">
                <option>-- Sila Pilih --</option>
                <option value="ada" @if($profile['cuti']->count() > 0){{ 'selected' }} @endif>ADA</option>
                <option value="tiada" @if($profile['cuti']->count() == 0){{ 'selected' }} @endif>TIADA</option>
            </select>
        </div>


        {{-- <div class="form-group col-md-12">
            <br/>
            <button type="button" class="btn btn-success tambah-cuti" data-toggle="modal" data-target="#modal-cuti"><i data-feather='plus'></i>Tambah</button>
        </div> --}}
        <span style="font-style: italic;">* Surat Kelulusan Cuti yang disahkan perlu disertakan bersama.</span>
        <br/>
        <div class="table-responsive col-md-12">
            <table class="datatables table cuti-table">
                <thead>
                    <th>Jenis Cuti</th>
                    <th>Tarikh Mula</th>
                    <th>Tarikh Akhir</th>
                    {{-- <th>Dokumen</th> --}}
                    {{-- <th>Ti</th> --}}
                </thead>
                <tbody id="tbody-cuti">
                    @foreach ($profile['cuti'] as $cuti)
                    <tr data-cuti-id="{{ $cuti->id_cuti }}">
                        <td>{{ $cuti->jenis_cuti }}</td>
                        <td>{{ \Carbon\Carbon::parse($cuti->tkh_mula)->format('d-m-Y')  }}</td>
                        <td>{{ \Carbon\Carbon::parse($cuti->tkh_tamat)->format('d-m-Y')  }}</td>
                        {{-- <td><input class="form-control cuti-upload" type="file" id="cuti_{{ $cuti->id_cuti }}" name="cuti_{{ $cuti->id_cuti }}" /></td> --}}
                    </tr>
                    @endforeach
                    @if($profile['cuti']->count() == 0)
                    <tr data-cuti-id="">
                        <td colspan="3" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
    <br/>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="col-form-label" for="alamat_bertugas">Alamat Tempat Bertugas</label>
            <textarea row=6 readonly id="sect-2-alamat_pej" class="form-control" name="alamat_bertugas" value="" placeholder="">{{ $profile['alamat_pejabat'] }}</textarea>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="no_tel_pejabat">No Telefon Pejabat</label>
            <input type="text" readonly id="sect-2-tel_pejabat" class="form-control" name="no_tel_pejabat" value="{{ $profile['tel_pejabat'] }}" placeholder=""/>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="no_faksimili">No Faksimili</label>
            <input type="text" readonly id="sect-2-no_faksimili" class="form-control" name="no_faksimili" value="{{ $profile['no_faks'] }}" placeholder="No Faksimili"/>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="no_telefon">No Telefon Bimbit</label>
            <input type="text" readonly id="sect-2-no_tel" class="form-control" name="no_telefon" value="{{ $profile['no_hp'] }}" placeholder="No Telefon Bimbit"/>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="emel">Emel</label>
            <input type="text" readonly id="sect-2-emel" class="form-control" name="emel" value="{{ $profile['email'] }}" placeholder="Emel"/>
            <div class="invalid-feedback"></div>
        </div>
        {{-- <div class="form-group col-md-12">
            <label class="col-form-label" for="email-id">Muat Naik Borang Pengesahan (Disahkan oleh Kerani Perkhidmatan)</label>
            <div class="invalid-feedback"></div>
        </div> --}}
        {{-- <div class="form-group d-flex justify-content-between col-md-12">
            <button class="btn btn-warning btn-download">
                <span class="align-middle d-sm-inline-block d-none">Muat Turun</span>
                <i data-feather="download" class="align-middle ml-sm-25 ml-0"></i>
            </button>
            <div class="file btn btn-primary">
                <i data-feather='upload'></i>  Muat Naik
                <input class="form-control file-input cuti-upload" type="file" id="cuti_sah" name="cuti_sah"/>
            </div>
            <span class="col-form-label cuti-file">{{ $profile['file_cuti'] }}</span>
            <div class="invalid-feedback"></div>
        </div> --}}
        <div class="form-group col-md-12">
            <div class="invalid-feedback cuti-error"></div>
        </div>
    </div>
    {{-- <br/>
        <br/> --}}
        <div class="d-flex justify-content-between">
            <button  class="btn btn-primary btn-prev">
                <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Sebelum</span>
            </button>
            <button class="btn btn-primary btn-next">
                <span class="align-middle d-sm-inline-block d-none">Selanjutnya</span>
                <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
            </button>
        </div>
</div>
