<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">PENGESAHAN KETUA BAHAGIAN PERKHIDMATAN</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="form-check form-check-inline">

                        <input type="checkbox" class="form-check-input pengesahan_kbp medium" value="1" name="akuan_kbp" id="checkbox_akuan" @if(!empty($pemohon->pengesahan_perkhidmatan_tkh)) checked @endif onclick="return false;"/>
                        <label class="col-form-label" for="customCheck1">Saya telah menyemak butir-butir perkhidmatan pegawai di atas dan disahkan betul </label>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label">
                            <label class="col-form-label" for="first-name">Nama</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" id="nama_kerani" readonly class="form-control nama_kerani" placeholder="" value="{{ empty($pemohon->pengesahan_perkhidmatan_nama) ? $clerk['name'] : $pemohon->pengesahan_perkhidmatan_nama }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label">
                            <label class="col-form-label" for="first-name">Jawatan</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" id="jawatan_kerani" readonly class="form-control jawatan_kerani" value="{{ empty($pemohon->pengesahan_perkhidmatan_jawatan) ? $clerk['jawatan'] : $pemohon->pengesahan_perkhidmatan_jawatan }}" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label">
                            <label class="col-form-label" for="first-name">Caw./Jabatan</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" id="jabatan_kerani" readonly class="form-control jabatan_kerani" value="{{ empty($pemohon->pengesahan_perkhidmatan_cawangan) ? $clerk['waran_name']['bahagian'].','.$clerk['waran_name']['cawangan'] : $pemohon->pengesahan_perkhidmatan_cawangan }}" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label">
                            <label class="col-form-label" for="first-name">Tarikh</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" id="tkh_kerani" readonly class="form-control tkh_kerani" placeholder="" value="{{ empty($pemohon->pengesahan_perkhidmatan_tkh) ? '' : \Carbon\Carbon::parse($pemohon->pengesahan_perkhidmatan_tkh)->format('d-m-Y') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
