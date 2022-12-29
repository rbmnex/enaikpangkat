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
                        <input type="text" id="modal-post" name="penempatan-tempat" class="form-control" placeholder=""  />
                    </div>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success add-cuti">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left modal-primary batch-modal" id="modal-pertubuhan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Tambah Pertubuhan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Nama Pertubuhan</label>
                            <input type="text" id="modal-post" name="pertubuhan-tempat" class="form-control" placeholder=""  />
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Jawatan</label>
                            <input type="text" id="modal-title" name="pertubuhan-jawatan" class="form-control" placeholder=""  />
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Tahun</label>
                            <input type="number" id="modal-year" name="pertubuhan-tahun" class="form-control" placeholder=""  />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-success add-pertubuhan">Tambah</button>
                    </div>

            </div>

        </div>

    </div>
</div>

<div class="modal fade text-left modal-primary batch-modal" id="modal-kursus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Tambah Kursus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Tajuk</label>
                            <input type="textarea" id="modal-tajuk" name="kursus-tajuk" class="form-control" placeholder=""  />
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Tarikh Mula</label>
                             <input type="text" id="fp-default" name="kursus-mula" class="form-control flatpickr-basic tkh_mula" placeholder="DD-MM-YYYY" />
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Tarikh Tamat</label>
                             <input type="text" id="fp-default" name="kursus-tamat" class="form-control flatpickr-basic tkh_tamat" placeholder="DD-MM-YYYY" />
                        </div>
                         <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Tempat</label>
                            <input type="text" id="modal-title" name="kursus-tempat" class="form-control" placeholder=""  />
                        </div>



                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-success add-kursus">Tambah</button>
                         <button type="button" class="btn btn-success post-edit-kursus">Kemaskini</button>
                    </div>

            </div>

        </div>

    </div>
</div>


<div class="modal fade text-left modal-primary batch-modal" id="modal-selesai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Maklumat Disimpan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-xl-12col-md-6 col-12 mb-1">
                           <label class="form-label" for="">Semua Maklumat telah disimpan. Resume boleh dimuat turun pada sub-menu Muat Turun</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Selesai</button>

                    </div>

            </div>

        </div>

    </div>
</div>

<div class="modal fade text-left modal-primary batch-modal" id="modal-projek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Tambah Projek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Nama Projek</label>
                            <input type="text" id="modal-post" name="projek-nama" class="form-control" placeholder=""  />
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Kos</label>
                            <input type="text" id="modal-title" name="projek-kos" class="form-control" placeholder="cth: 40000000"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                            <label class="form-label" for="" style="color:red; font-size=5px;">Masukkan nombor sahaja pada ruangan kos cth: 40000000</label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-success add-projek">Tambah</button>
                    </div>

            </div>

        </div>

    </div>
</div>


<div class="modal fade text-left modal-primary batch-modal" id="modal-pendedahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Tambah Kepakaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-xl-12 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Kepakaran</label>
                            <input type="textarea" id="modal-post" name="pendedahan-nama" class="form-control" placeholder=""  />
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-success add-pendedahan">Tambah</button>
                    </div>

            </div>

        </div>

    </div>
</div>

<div class="modal fade text-left modal-primary batch-modal" id="modal-pencapaian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Tambah Pencapaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-xl-12 col-md-6 col-12 mb-1">
                            <label class="form-label" for="">Pencapaian</label>
                            <textarea rows="6" name="pencapaian-nama" class="form-control"></textarea>
                            <!-- <input type="textarea" id="modal-post" name="pencapaian-nama" class="form-control" placeholder=""  /> -->
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-success add-pencapaian">Tambah</button>
                        <button type="button" class="btn btn-success post-edit-pencapaian">Kemaskini</button>
                    </div>

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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success add-iktiraf">Tambah</button>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="pencapaian-id" value="">
<input type="hidden" id="kursus-id" value="">
<input type="hidden" id="beban-id" value="">
<input type="hidden" id="projek-id" value="">
