<div id="pinjam-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 11 - Surat Akuan Pinjaman Pendidikan Institusi / Tabung Pendidikan</h5>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="col-form-label" for="jantina">Saya dengan ini mengesahkan bahawa saya:</label>
            <select id="status_pinjam" class="select2 form-control pinjam-status" name="status_pinjam">
                <option value="" selected>-- Sila Pilih --</option>
                <option value="0">Saya tidak ada mengambil pinjaman pendidikan daripada mana-mana institusi/ tabung pendidikan</option>
                <option value="1">Saya ada mengambil pinjaman pendidikan dan saya mengesahkan masih belum membuat bayaran</option>
                <option value="2">Saya ada mengambil pinjaman pendidikan dan pada masa ini sedang membuat pembayaran secara bulanan melalui pembayaran tunai/ potongan gaji</option>
                <option value="3">Saya ada mengambil pinjaman pendidikan dan saya telah pun menyelesaikan sepenuhnya pinjaman</option>
            </select>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-12 div-loan-1">
            <label class="col-form-label" for="tabung_pendidikan">Nama Institusi/ Tabung Pendidikan</label>
            <input type="text" id="tabung_pendidikan" class="form-control" name="tabung_pendidikan" placeholder="" />
        </div>
        <div class="form-group col-md-12 div-loan-2">
            <label class="col-form-label" for="jumlah_pinjaman">Jumlah Pinjaman</label>
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">RM</span>
            <input type="number" class="form-control" id="basic-url3" aria-describedby="basic-addon3" name="jumlah_pinjaman"/>
            </div>
        </div>
        <div class="form-group col-md-12 div-loan-3">
            <label class="col-form-label" for="bayaran_mulai">Mula Pinjaman</label>
            <input type="text" class="form-control flatpickr-loan" id="mula_pinjaman" name="mula_pinjaman"
                                                        value="" />

        </div>
        <div class="form-group col-md-12 div-loan-4">
            <label class="col-form-label" for="bayaran_mulai">Akhir Pinjaman</label>
            <input type="text" class="form-control flatpickr-loan" id="akhir_pinjaman" name="akhir_pinjaman"
                                                        value="" />

        </div>
        <div class="form-group col-md-12 div-loan-5">
            <label class="col-form-label" for="bayaran_mulai">Bayaran Mulai (Tahun)</label>
            <input type="text" class="form-control flatpickr-loan" id="bayaran_mulai" name="bayaran_mulai"
                                                        value="" />

        </div>
        <div class="form-group col-md-12 div-loan-6">
            <label class="col-form-label" for="selesai_bayar">Selesai Pembayaran (Tahun)</label>
            <input type="text" class="form-control flatpickr-loan" id="selesai_bayar" name="selesai_bayar"
                                                        value="" />
        </div>
        <div class="form-group col-md-12 div-loan-7">
            <form id="upload_loan" width="100%">
            <label class="col-form-label" for="formFileMultiple">MUATNAIK PENYATA BAYARAN PINJAMAN TERKINI /  SURAT PENGESAHAN</label>
            <input class="form-control" type="file" id="formFileMultiple " name="penyata_bayaran"/>
            </form>
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
