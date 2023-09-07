<div class="modal fade text-left modal-primary verdict-modal" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Kumpulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-form-label" for="vertical-username">Nama</label>
                        <input type="text" id="verdict-nama" readonly name="nama" class="form-control"  value="" placeholder="" />
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" for="vertical-username">No Kad Pengenalan</label>
                        <input type="text" id="verdict-nokp" readonly name="nama" class="form-control"  value="" placeholder="" />
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" for="vertical-username">Jawatan</label>
                        <input type="text" id="verdict-jawatan" readonly name="nama" class="form-control"  value="" placeholder="" />
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" for="vertical-username">Gred</label>
                        <input type="text" id="verdict-gred" readonly name="nama" class="form-control"  value="" placeholder="" />
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" for="vertical-username">Tangga</label>
                        <input type="number" id="verdict-rank" name="nama" class="form-control"  value="" placeholder="" />
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" for="vertical-username">Bil. Mesyuarat</label>
                        <input type="text" id="verdict-meeting" name="nama" class="form-control"  value="" placeholder="" />
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" for="vertical-username">Tarikh Mesyuarat</label>
                        <input id="verdict-date" type="text" class="form-control"  value="" placeholder="" />
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" for="vertical-username">CC Emel</label>
                        <input type="email" class="form-control" id="emailcc" placeholder="nama1@mail.com,nama2@mail.com,nama3@mail.com" multiple/>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label" for="vertical-username">Keputusan</label>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-check form-check-inline ">
                            <input type="radio" value="1" class="form-check-input medium radio-verdict" name="keputusan" id="radio-verdict-1"/>
                            <label class="col-form-label" for="tatatertib"> LULUS</label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input type="radio" value="0" class="form-check-input medium radio-verdict" name="keputusan" id="radio-verdict-2"/>
                            <label class="col-form-label" for="tatatertib"> GAGAL</label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input type="radio" value="2" class="form-check-input medium radio-verdict" name="keputusan" id="radio-verdict-3"/>
                            <label class="col-form-label" for="tatatertib"> SIMPANAN</label>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <input id="pemohon-id-modal" class="pemohon-id-modal" type="hidden"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success btn-verdict">Simpan</button>
            </div>
        </div>
    </div>
</div>
