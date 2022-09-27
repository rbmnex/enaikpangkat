<div id="cuti-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Maklumat Cuti</h5>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label class="form-label" for="country">Pengesahan Cuti Tanpa Gaji / Cuti Separuh Gaji / Cuti Belajar Sepanjang Perkhidmatan</label>
            <select class="select2 form-control" name="cuti_status" id="status_cuti">
                <option>-- Sila Pilih --</option>
                <option value="ada">ADA</option>
                <option value="tiada">TIADA</option>
            </select>
        </div>

        <div class="form-group col-md-12">
            <br/>
            <button type="button" class="btn btn-success tambah-cuti" data-toggle="modal" data-target="#modal-cuti"><i data-feather='plus'></i>Tambah</button>
        </div>
        <div class="table-responsive col-md-12">
            <table class="datatables table cuti-table">
                <thead>
                    <th>Jenis Cuti</th>
                    <th>Tarikh Mula</th>
                    <th>Tarikh Akhir</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                </thead>
                <tbody id="tbody-cuti">

                </tbody>
            </table>
        </div>

    </div>
    <br/>
        <br/>
        <div class="d-flex justify-content-between">
            <button  class="btn btn-primary btn-prev">
                <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Previous</span>
            </button>
            <button class="btn btn-primary btn-next">
                <span class="align-middle d-sm-inline-block d-none">Next</span>
                <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
            </button>
        </div>
</div>
