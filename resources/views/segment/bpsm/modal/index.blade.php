<div class="modal fade" id="soalan-modal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Nama</label>
                            <input type="text" class="form-control" id="soalan-name" value=""/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success soalan-post">Simpan</button>
                <button type="button" class="btn btn-success soalan-post-edit">Kemaskini</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sub-soalan-modal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Nama</label>
                            <textarea class="form-control" id="sub-soalan-name"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Penerangan</label>
                            <textarea class="form-control" id="sub-soalan-name-penerangan"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 col-12">
                        <button type="button" class="btn btn-success sub-soalan-post" style="width:100%">Simpan</button>
                        <button type="button" class="btn btn-warning sub-soalan-post-edit">Kemaskini</button>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="lpnk-sub-table table">
                                <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th>PENERANGAN</th>
                                    <th>TINDAKAN</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<input type="hidden" id="soalan-id" value="">
<input type="hidden" id="sub-soalan-id" value="">
