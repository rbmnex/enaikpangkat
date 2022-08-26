<div class="modal fade text-left modal-primary batch-modal" id="modal-penempatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Tambah Penempatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <label class="form-label" for="">Gelaran Jawatan</label>
                        <input type="text" id="modal-title" name="penempatan-jawatan" class="form-control" placeholder=""  />
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <label class="form-label" for="">Tahun Berkhidmat</label>
                        <input type="number" id="modal-year" name="penempatan-tahun" class="form-control" placeholder=""  />
                    </div>
                    <div class="col-xl-6 col-md-6 col-12 mb-1">
                        <label class="form-label" for="">Penempatan</label>
                        <input type="number" id="modal-post" name="penempatan-tempat" class="form-control" placeholder=""  />
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success add-perkhidmatan">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left modal-primary batch-modal" id="modal-cuti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Tambah Cuti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="vertical-email">Maklumat Cuti</label>
                        <select class="select2 form-control" name="cuti_jenis" id="country">
                            <option>-- Sila Pilih --</option>
                            <option value="CTG">Cuti tanpa gaji</option>
                            <option value="CSG">Cuti separuh gaji</option>
                            <option value="CBR">Cuti belajar bergaji penuh/Cuti belajar separuh gaji</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="vertical-email">Tarikh Mula</label>
                        <input type="date" id="tarih_lantikan" name="cuti_tkh_mula" class="form-control"
                                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="vertical-email">Tarikh Akhir</label>
                        <input type="date" id="tarih_lantikan" name="cuti_tkh_akhir" class="form-control"
                                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="formFileMultiple">Muat Naik Surat Kelulusan Cuti</label>
                        <input class="form-control" type="file" id="formFileMultiple" name="cuti_surat_kelulusan"/>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success add-cuti">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left modal-primary batch-modal" id="modal-pertubuhan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Tambah Pertubuhan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Jawatan</label>
                            <input type="text" id="modal-title" name="pertubuhan-jawatan" class="form-control" placeholder=""  />
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Tahun</label>
                            <input type="number" id="modal-year" name="pertubuhan-tahun" class="form-control" placeholder=""  />
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Nama Pertubuhan</label>
                            <input type="number" id="modal-post" name="pertubuhan-tempat" class="form-control" placeholder=""  />
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success add-pertubuhan">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left modal-primary batch-modal" id="modal-akademik" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Tambah Akademik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Jawatan</label>
                            <input type="text" id="modal-title" name="akademik-kelulusan" class="form-control" placeholder=""  />
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Tahun</label>
                            <input type="number" id="modal-year" name="akademik-tahun" class="form-control" placeholder=""  />
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Nama Pertubuhan</label>
                            <input type="number" id="modal-post" name="akademik-tempat" class="form-control" placeholder=""  />
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success add-akademik">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left modal-primary batch-modal" id="modal-profesional" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Tambah Profesional</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Kelayakkan Profesional / Pendaftaran Dengan Badan
                                Profesional</label>
                            <input type="text" id="modal-title" name="profesional-kelulusan" class="form-control" placeholder=""  />
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Tahun</label>
                            <input type="number" id="modal-year" name="profesional-tahun" class="form-control" placeholder=""  />
                        </div>
                        <div class="col-xl-6 col-md-6 col-6 mb-1">
                            <label class="form-label" for="">No. Pendaftaran</label>
                            <input type="number" id="modal-post" name="profesional-tempat" class="form-control" placeholder=""  />
                        </div>
                        <div class="col-xl-6 col-md-6 col-6 mb-1">
                            <label class="form-label" for="">Nama Pertubuhan</label>
                            <input type="number" id="modal-post" name="profesional-tempat" class="form-control" placeholder=""  />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="formFileMultiple">Muat Naik Kelayakkan / Pendaftaran</label>
                            <input class="form-control" type="file" id="formFileMultiple" name="profesional-fail"/>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success add-profesional">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left modal-primary batch-modal" id="modal-kompeten" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Tambah Kekompetenan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Pensijilan Kekompetenan</label>
                            <input type="text" id="modal-title" name="profesional-kelulusan" class="form-control" placeholder=""  />
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Tahap</label>
                            <input type="number" id="modal-year" name="profesional-tahun" class="form-control" placeholder=""  />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="formFileMultiple">Muat Naik Sijil Kekompeten</label>
                            <input class="form-control" type="file" id="formFileMultiple" name="profesional-fail"/>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success add-kompeten">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left modal-primary batch-modal" id="modal-iktiraf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Tambah Pengiktirafan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Pengiktirafan</label>
                            <input type="text" id="modal-title" name="profesional-kelulusan" class="form-control" placeholder=""  />
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Tahun</label>
                            <input type="number" id="modal-year" name="profesional-tahun" class="form-control" placeholder=""  />
                        </div>

                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success add-iktiraf">Tambah</button>
            </div>
        </div>
    </div>
</div>
