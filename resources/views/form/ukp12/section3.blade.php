<div id="penempatan-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 3 - Pengesahan Butiran Perkhidmatan</h5>
        <small class="text-notice">Sila kemas kini di bahagian di portal MyKj jika ada perubahan </small>
    </div>
    <div class="row">
        <div class="col-form-group col-md-12">
            <label class="col-form-label" for="alamat_bertugas">Alamat Tempat Bertugas</label>
            <textarea row=6 readonly id="alamat_bertugas" class="form-control" name="alamat_bertugas" value="" placeholder="">{{ $profile['alamat_pejabat'] }}</textarea>
        </div>
        <div class="col-form-group col-md-6">
            <label class="col-form-label" for="no_tel_pejabat">No Telefon Pejabat</label>
            <input type="text" readonly id="no_tel_pejabat" class="form-control" name="no_tel_pejabat" value="{{ $profile['tel_pejabat'] }}" placeholder=""/>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="no_faksimili">No Faksimili</label>
            <input type="text" readonly id="no_faksimili" class="form-control" name="no_faksimili" value="{{ $profile['no_faks'] }}" placeholder="No Faksimili"/>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="no_telefon">No Telefon Bimbit</label>
            <input type="text" readonly id="no_telefon" class="form-control" name="no_telefon" value="{{ $profile['no_hp'] }}" placeholder="No Telefon Bimbit"/>
        </div>
        <div class="form-group col-md-6">
            <label class="col-form-label" for="emel">Emel</label>
            <input type="text" readonly id="emel" class="form-control" name="emel" value="{{ $profile['email'] }}" placeholder="Emel"/>
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
