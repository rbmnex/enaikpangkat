<div class="col-12">
    <div class="card" style="background-color: greenyellow;">
        <div class="card-header">
            <h4 class="card-title">PERAKUAN KETUA JABATAN</h4>
        </div>
        <div class="card-body">
            <div class="form-group col-md-12">
                <div class="form-check form-check-inline ">
                    <input type="radio" value="1" class="form-check-input medium radio-certified" name="terima_tawaran" id="radiol-1" @if($pemohon->perakuan_ketua_jabatan == 1) checked @endif/>
                    <label class="col-form-label" for="tatatertib"> Diperakui</label>
                </div>
                <div class="form-check form-check-inline ">
                    <input type="radio" value="0" class="form-check-input medium radio-certified" name="terima_tawaran" id="radiol-2" @if(!empty($pemohon->perakuan_ketua_jabatan) && $pemohon->perakuan_ketua_jabatan == 0) checked @endif/>
                    <label class="col-form-label" for="tatatertib"> Tidak Diperakui </label>
                </div>
                <div class="invalid-feedback"></div>
            </div>

                <div class="form-group col-12">
                    <span class="col-form-label">Ulasan</span>
                    <textarea row=3 type="text" width="100%" id="ulasan_ketua" class="form-control ulasan_ketua" name="ulasan_ketua"  placeholder="Sila Berikan Ulasan Anda">{{ empty($pemohon->perakuan_ketua_jabatan_ulasan) ? '' : $pemohon->perakuan_ketua_jabatan_ulasan }}</textarea>
                    <div class="invalid-feedback"></div>
                </div>

            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-2 col-form-label">
                        <label class="col-form-label" for="first-name">Nama</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" id="nama-ketua" value="{{ empty($pemohon->perakuan_ketua_jabatan_nama) ? $hod['name'] : $pemohon->perakuan_ketua_jabatan_nama  }}" readonly class="form-control nama-ketua" placeholder="">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-2 col-form-label">
                        <label class="col-form-label" for="first-name">Jawatan</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" id="jawatan-ketua" readonly class="form-control jawatan-ketua" placeholder="" value="{{ empty($pemohon->perakuan_ketua_jabatan_jawatan) ? $hod['jawatan'] : $pemohon->perakuan_ketua_jabatan_jawatan }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-2 col-form-label">
                        <label class="col-form-label" for="first-name">Caw./Jabatan</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" id="jabatan-ketua" readonly class="form-control jabatan-ketua" placeholder="" value="{{ empty($pemohon->perakuan_ketua_jabatan_alamat_pejabat)?$hod['waran_name']['bahagian'].','.$clerk['waran_name']['cawangan']:$pemohon->perakuan_ketua_jabatan_alamat_pejabat }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-2 col-form-label">
                        <label class="col-form-label" for="first-name">Tarikh</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" id="tkh-ketua" readonly class="form-control tkh-ketua" placeholder="" value="{{ empty($pemohon->perakuan_ketua_jabatan_tkh) ? \Carbon\Carbon::parse(Date::now())->format('d-m-Y') : \Carbon\Carbon::parse($pemohon->perakuan_ketua_jabatan_tkh)->format('d-m-Y') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-between">
                <button type="button" class="btn btn-primary btn-prev btn-hod">
                    <i data-feather='send' class="align-middle mr-sm-25 mr-0"></i>
                    <span class="align-middle d-sm-inline-block d-none">Hantar</span>
                </button>
            </div>
        </div>
    </div>
</div>
