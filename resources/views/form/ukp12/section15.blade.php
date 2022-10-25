<div id="terima-tawaran" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 14 - Penerimaan Tawaran</h5>
        <small class="text-muted"></small>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <span class="col-form-label">
                Saya {{ $profile['nama'] }}
            </span>
        </div>
        <div class="form-group col-md-12">
            <div class="form-check form-check-inline ">
                <input type="radio" value="1" class="form-check-input radio-accept" name="terima_tawaran" id="radio1-1" />
                <label class="col-form-label" for="tatatertib"> Terima</label>
            </div>
            <div class="form-check form-check-inline ">
                <input type="radio" value="0" class="form-check-input radio-accept" name="terima_tawaran" id="radio2-1" />
                <label class="col-form-label" for="tatatertib"> Tidak Terima</label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-form-label" id="label-radio-accept"></label>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group col-md-12">
            <span class="col-form-label">tawaran pemangkuan ini.</span>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <textarea row=3 type="text" width="100%" id="alasan_tolak" class="form-control alasan_tolak" name="alasan_tolak"  placeholder="Sila Berikan Sebab Jika Tolak Tawaran Pemangkuan Ini"></textarea>
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-primary btn-prev">
            <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <button type="button" class="btn btn-outline-success btn-submit">
            <span class="align-middle d-sm-inline-block d-none">Submit</span>
            <i data-feather="send" class="align-middle ml-sm-25 ml-0"></i>
        </button>
    </div>
</div>
