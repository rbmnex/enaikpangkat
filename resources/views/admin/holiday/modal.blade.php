<div class="modal fade" id="cuti-modal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Cuti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Nama Cuti</label>
                            <input type="text" class="form-control" id="holiday-name" placeholder=""/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Penerangan Cuti</label>
                            <input type="text" class="form-control" id="holiday-desc" placeholder=""/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Tarikh Cuti</label>
                            <input type="text" class="form-control" id="holiday-date" value=""/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Tempoh Cuti</label>
                            <input type="number" class="form-control" id="holiday-length" value="1"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <input id="id-holiday" type="hidden" value="0">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success" id="holiday-save">Simpan</button>
                <button type="button" class="btn btn-success" id="holiday-update">Kemaskini</button>
            </div>
        </div>
    </div>
</div>
