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
                            <label class="form-label" for="basicInput">Kategori</label>
                            <select class="form-select form-control" id="pinkform-kategori">
                                <option value="">-- Sila Pilih --</option>
                                <option value="1">Pemberitahuan Pertukaran</option>
                                <option value="2">Pemakluman Semula Pemberitahuan Pertukaran</option>
                                <option value="3">Pembatalan Pemberitahuan Pertukaran</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Alamat Pejabat Baru</label>
                            <textarea class="form-control" rows="5" id="pinkform-alamat-pejabat"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div> --}}
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
                            <label class="form-label" for="basicInput">Emel Displin</label>
                            <input type="text" class="form-control" id="pinkform-emailcc" placeholder="nama1@mail.com,nama2@mail.com,nama3@gmail.com"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Catatan Baru</label>
                            <textarea class="form-control" rows="5" id="pinkform-catatan"></textarea>
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
</div>

<div class="modal fade" id="pinkform-edit" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <input type="text" class="form-control" id="pinkform-name-1" placeholder="Bil. 58/2022 ruj:(93) JKR/KPKR/010. 030 104 JLD. 25"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Tarikh Kuatkuasa</label>
                            <input type="text" class="form-control" id="pinkform-tkh-lapor-diri-1" value=""/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Kategori</label>
                            <select class="form-select form-control" id="pinkform-kategori-1">
                                <option value="">-- Sila Pilih --</option>
                                <option value="1">Pemberitahuan Pertukaran</option>
                                <option value="2">Pemakluman Semula Pemberitahuan Pertukaran</option>
                                <option value="3">Pembatalan Pemberitahuan Pertukaran</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Emel Displin</label>
                            <input type="text" class="form-control" id="pinkform-emailcc-1" placeholder="nama1@mail.com,nama2@mail.com,nama3@gmail.com"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Alamat Pejabat Baru</label>
                            <textarea class="form-control" rows="5" id="pinkform-alamat-pejabat"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div> --}}
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Jenis Penempatan</label>
                            <select class="form-select form-control" id="pinkform-jenis-penempatan-1">
                                <option value="">-- Sila Pilih --</option>
                                <option value="2">KADER</option>
                                <option value="1">BUKAN KADER</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="basicInput">Catatan Baru</label>
                            <textarea class="form-control" rows="5" id="pinkform-catatan-1"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="mb-1 form-group">
                            <label class="form-label" for="formFile">Muat Naik Pink Form</label>
                            <input class="form-control" type="file" id="pinkform-borang-1" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success" id="pinkform-kemaskini">Kemaskini</button>
                <button type="button" class="btn btn-success" id="pinkform-email">Hantar</button>
            </div>
        </div>
    </div>
</div>


<input type="hidden" id="pemohon-id" value="">
<input type="hidden" id="pink-id" value="">
<input type="hidden" id="user-nokp" value="">
