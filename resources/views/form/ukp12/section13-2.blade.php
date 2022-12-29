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
        <div class="form-group col-md-12">
            <div class="form-check form-check-inline ">
                <input type="radio" value="1" class="form-check-input medium tatatertib" name="tatatertib" id="radio1" />
                <label class="col-form-label" for="tatatertib"> Pernah</label>
            </div>
            <div class="form-check form-check-inline ">
                <input type="radio" value="0" class="form-check-input medium tatatertib" name="tatatertib" id="radio2" />
                <label class="col-form-label" for="tatatertib"> Tidak Pernah</label>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" id="label-tatatertib"></label>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" for="">b) Telah mengisytiharkan harta mengikut peraturan yang ditetapkan</label>
        </div>
        {{-- <div class="form-group col-md-6">
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
        </div> --}}
        <div class="form-group col-md-12">
            <label class="col-form-label" for="">c) Lanjutan tempoh percubaan dengan denda</label>
        </div>
        <div class="form-group col-md-12">
            <div class="form-check form-check-inline ">
                <input type="radio" value="1" class="form-check-input medium denda" name="denda" id="radio1" />
                <label class="col-form-label" for="tatatertib"> Pernah</label>
            </div>
            <div class="form-check form-check-inline ">
                <input type="radio" value="0" class="form-check-input medium denda" name="denda" id="radio1" />
                <label class="col-form-label" for="tatatertib"> Tidak Pernah</label>
            </div>
        </div>

        <div class="form-group col-md-12">
            <label class="col-form-label" id="label-denda"></label>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" for="">d) Cuti Tanpa Gaji selain Cuti Belajar Tanpa Gaji</label>
        </div>
        <div class="form-group col-md-12">
            <div class="form-check form-check-inline ">
                <input type="radio" value="1" class="form-check-input medium cuti_check" name="cuti_check" id="radio1" />
                <label class="col-form-label" for="tatatertib"> Pernah</label>
            </div>
            <div class="form-check form-check-inline ">
                <input type="radio" value="0" class="form-check-input medium cuti_check" name="cuti_check" id="radio1" />
                <label class="col-form-label" for="tatatertib"> Tidak Pernah</label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" id="label-cuti_check"></label>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-12">
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input medium akuan_peribadi" value="1" name="akuan" id="checkbox_akuan" />
                <label class="col-form-label" for="customCheck1">Saya mengaku bahawa butiran yang dinyatakan di dalam Borang JKR/UKP/12 ini adalah benar. Sekiranya tidak benar, saya boleh dikenakan tindakan tatatertib di bawah Peraturan 4 (f) dan Peraturan 4 (g), Peraturan-Peraturan Pegawai Awam ( Kelakuan dan Tatatertib ) 1993.</label>
            </div>
            <div class="invalid-feedback"></div>
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
    <div class="row">
        <div class="form-group col-md-12">
            <a class="btn-form-download">
                <span style="color: red; font-size: 0.857rem; !important; font-style: italic;" class="align-middle d-sm-inline-block d-none">* Sila Muat Turun Borang Pemangkuan JKR/UKP/12 ini selepas mengisi (perlu disahkan oleh Kerani Perkhidmatan dan diperakui oleh Ketua Jabatan). Calon perlu memuat naik semula dokumen yang telah disahkan.</span>
                <img src="{{ asset('images/pdf_icon_1.png') }}" />

            </a>
        </div>
        <div class="form-group col-md-12">
            <div class="file btn btn-success">
                <i data-feather='upload'></i>  Muat Naik
                <input class="form-control file-input form-kader-upload" type="file" id="kader_file" name="kader_file"/>
            </div>
            <span class="col-form-label kader-file"></span>
            <div class="invalid-feedback"></div>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <span class="col-form-label">
                Saya {{ $profile['nama'] }} No. Kad Pengenalan {{ $profile['nokp_baru'] }}
            </span>
        </div>
        <div class="form-group col-md-12">
            <div class="form-check form-check-inline ">
                <input type="radio" value="1" class="form-check-input medium radio-accept" name="terima_tawaran" id="radio1-1" />
                <label class="col-form-label" for="tatatertib"> Terima</label>
            </div>
            <div class="form-check form-check-inline ">
                <input type="radio" value="0" class="form-check-input medium radio-accept" name="terima_tawaran" id="radio2-1" />
                <label class="col-form-label" for="tatatertib"> Tolak</label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" id="label-radio-accept"></label>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-12">
            <span class="col-form-label">tawaran pemangkuan ini.</span>
        </div>
    </div>
    <div class="row reason_reject">
        <div class="form-group col-12">
            <span class="col-form-label">Sila berikan alasan jika tolak pemangkuan ini</span>
            <textarea row=3 type="text" width="100%" id="alasan_tolak" class="form-control alasan_tolak" name="alasan_tolak"  placeholder="Sila Berikan Sebab Jika Tolak Tawaran Pemangkuan Ini"></textarea>
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-primary btn-prev">
            <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Sebelum</span>
        </button>
        {{-- <button type="button" class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Selanjutnya</span>
            <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
        </button> --}}
        <button type="button" class="btn btn-outline-success btn-submit">
            <span class="align-middle d-sm-inline-block d-none">Hantar</span>
            <i data-feather="send" class="align-middle ml-sm-25 ml-0"></i>
        </button>
    </div>
</div>
