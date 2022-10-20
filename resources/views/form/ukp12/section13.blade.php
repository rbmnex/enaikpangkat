<div id="akuan-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 12 - Akaun Pegawai</h5>
        <small class="text-muted"></small>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="col-form-label" for="">Saya dengan ini mengesahkan bahawa saya:</label>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" for="">a) Tindakan tatatertib:</label>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check form-check-inline ">
                <input type="radio" value="1" class="form-check-input" name="tatatertib" id="radio1" />
                <label class="col-form-label" for="tatatertib"> Pernah</label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check form-check-inline ">
                <input type="radio" value="0" class="form-check-input" name="tatatertib" id="radio1" />
                <label class="col-form-label" for="tatatertib"> Tidak Pernah</label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" for="">b) Telah mengisytiharkan harta mengikut peraturan yang ditetapkan</label>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check form-check-inline ">
                <input type="radio" value="1" class="form-check-input" name="harta" id="radio1" />
                <label class="col-form-label" for="tatatertib"> Pernah</label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check form-check-inline ">
                <input type="radio" value="0" class="form-check-input" name="harta" id="radio1" />
                <label class="col-form-label" for="tatatertib"> Tidak Pernah</label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" for="">c) Lanjutan tempoh percubaan dengan denda</label>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check form-check-inline ">
                <input type="radio" value="1" class="form-check-input" name="denda" id="radio1" />
                <label class="col-form-label" for="tatatertib"> Pernah</label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check form-check-inline ">
                <input type="radio" value="0" class="form-check-input" name="denda" id="radio1" />
                <label class="col-form-label" for="tatatertib"> Tidak Pernah</label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" for="">d) Cuti Tanpa Gaji selain Cuti Belajar Tanpa Gaji</label>


        </div>
        <div class="form-group col-md-6">
            <div class="form-check form-check-inline ">
                <input type="radio" value="1" class="form-check-input" name="cuti_check" id="radio1" />
                <label class="col-form-label" for="tatatertib"> Pernah</label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check form-check-inline ">
                <input type="radio" value="0" class="form-check-input" name="cuti_check" id="radio1" />
                <label class="col-form-label" for="tatatertib"> Tidak Pernah</label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" name="akuan" id="customCheck10" />
                <label class="col-form-label" for="customCheck1">Saya mengaku bahawa butiran yang dinyatakan di dalam Borang JKR/UKP/12 ini adalah benar. Sekiranya tidak benar, saya boleh dikenakan tindakan tatatertib di bawah Peraturan 4 (f) dan Peraturan 4 (g), Peraturan-Peraturan Pegawai Awam ( Kelakuan dan Tatatertib ) 1993.</label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" for="">Nama: {{ $profile['nama'] }}</label>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" for="">Jawatan: {{ $profile['jawatan'] }}</label>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" for="">Alamat Pejabat: {{ $profile['alamat_pejabat'] }}</label>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" for="">Tarikh: {{ \Carbon\Carbon::parse(Date::now())->format('d-m-Y') }}</label>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-primary btn-prev">
            <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <button type="button" class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
        </button>
    </div>
</div>
