<div class="modal fade text-left modal-primary batch-modal" id="modal-kerja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Tambah Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-xl-12 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">AKTIVITI / PROJEK / KETERANGAN</label>
                            <input type="text" id="modal-act" name="kerja-aktiviti" class="form-control" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-xl-12 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">JENIS PETUNJUK</label>
                            <select class="select2 form-control" name="kerja-jenis" id="modal-type">
                                <option value="Kuantiti" selected>Kuantiti</option>
                                <option value="Kualiti">Kualiti</option>
                                <option value="Masa">Masa</option>
                                <option value="Masa">Kos</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-xl-12 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">PETUNJUK PRESTASI</label>
                            <input type="text" id="modal-indicator" name="kerja-petunjuk" class="form-control" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-xl-12 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">SASARAN KERJA</label>
                            <input type="text" id="modal-target" name="kerja-sasaran" class="form-control" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-xl-12 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">PENCAPAIAN SEBENAR</label>
                            <input type="text" id="modal-achieve" name="kerja-capai" class="form-control" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-xl-12 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">ULASAN</label>
                            <input type="text" id="modal-remark" name="kerja-ulasan" class="form-control" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <input type="hidden" id="hdn-id-work" class="id-work"/>
                    </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-success add-kerja">Simpan</button>
                    </div>

            </div>

        </div>

    </div>
</div>
