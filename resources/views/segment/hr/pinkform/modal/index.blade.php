<div class="modal fade" id="pinkform-modal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">No. Rujukan Surat</label>
                            <input type="text" class="form-control" id="pinkform-name" placeholder="Bil. 58/2022 ruj:(93) JKR/KPKR/010. 030 104 JLD. 25"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Tarikh Kuatkuasa</label>
                            <input type="text" class="form-control" id="pinkform-tkh-lapor-diri" value=""/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Alamat Pejabat Baru</label>
                            <textarea class="form-control" rows="5" id="pinkform-alamat-pejabat"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Jenis Penempatan</label>
                            <select class="form-select form-control" id="pinkform-jenis-penempatan">
                                <option value="">-- Sila Pilih --</option>
                                <option value="2">KADER</option>
                                <option value="1">BUKAN KADER</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="formFile">Muat Naik Pink Form</label>
                            <input class="form-control" type="file" id="pinkform-borang" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success" id="pinkform-hantar">Hantar</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="pemohon-id" value="">
<input type="hidden" id="user-nokp" value="">
