<div id="pinjam-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Surat Akuan Pinjaman Pendidikan Institusi / Tabung Pendidikan</h5>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="form-label" for="jantina">Saya dengan ini mengesahkan bahawa saya:</label>
            <select class="select2 form-control">
                <option value="" selected>-- Sila Pilih --</option>
                <option value="0">Saya tidak ada mengambil pinjaman pendidikan daripada mana-mana institusi/ tabung pendidikan</option>
                <option value="1">Saya ada mengambil pinjaman pendidikan dan saya mengesahkan masih belum membuat bayaran</option>
                <option value="2">Saya ada mengambil pinjaman pendidikan dan pada masa ini sedang membuat pembayaran secara bulanan melalui pembayaran tunai/ potongan gaji</option>
                <option value="3">Saya ada mengambil pinjaman pendidikan dan saya telah pun menyelesaikan sepenuhnya pinjaman</option>
            </select>
        </div>
        <div class="form-group col-md-12">
            <label class="form-label" for="tabung_pendidikan">Nama Institusi/ Tabung Pendidikan</label>
            <input type="text" id="tabung_pendidikan" class="form-control" name="tabung_pendidikan" placeholder="" />
        </div>
        <div class="form-group col-md-12">
            <label class="form-label" for="jumlah_pinjaman">Jumlah Pinjaman</label>
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">RM</span>
            <input type="text" class="form-control" id="basic-url3" aria-describedby="basic-addon3" name="jumlah_pinjaman"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="form-label" for="bayaran_mulai">Bayaran Mulai (Tahun)</label>
            <input type="date" class="form-control" id="bayaran_mulai" name="bayaran_mulai"
                                                        value="" />

        </div>
        <div class="form-group col-md-12">
            <label class="form-label" for="selesai_bayar">Selesai Pembayaran (Tahun)</label>
            <input type="date" class="form-control" id="selesai_bayar" name="selesai_bayar"
                                                        value="" />
        </div>
        <div class="form-group col-md-12">
            <label class="form-label" for="formFileMultiple">MUATNAIK PENYATA BAYARAN PINJAMAN TERKINI /  SURAT PENGESAHAN</label>
            <input class="form-control" type="file" id="formFileMultiple" name="penyata_bayaran"/>
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
