$(document).on('click', '#simpan-tawaran', function(){
   let validate = new Validation();
   let dt = new FormData();

    let v = validate.checkEmpty(
        validate.getValue('#tawaran-rujukan', 'mix', 'No. Rujukan', 'tawaran_rujukan'),
        validate.getValue('#tawaran-setuju', 'string', 'Persetujuan Tawaran', 'tawaran_setuju'),
        validate.getValue('#tawaran-tkh-kuatkuasa-baru', 'datedashstandard', 'Tarikh Kuat Kuasa Baru', 'tawaran_tkh_kuatkuasa_baru'),
        validate.getValue('#tawaran-tkh-lapor-diri', 'datedashstandard', 'Tarikh Lapor Diri', 'tawaran_tkh_lapor_diri'),
        validate.getValue('#tawaran-tkh-mula-tugas', 'datedashstandard', 'Tarikh Mula Tugas', 'tawaran_tkh_mula_tugas'),
        validate.getValue('#tawaran-ketua-bahagian', 'mix', 'Ketua Bahagian', 'tawaran_ketua_bahagian'),
        validate.getValue('#tawaran-alamat', 'mix', 'Alamat Pejabat Baru', 'alamat_baru'),
        validate.getValue('#tawaran-ketua-jabatan', 'mix', 'Ketua Jabatan', 'tawaran_ketua_jabatan')
    );

    let start = $('#tawaran-tkh-tangguh-start').val();
    let end = $('#tawaran-tkh-tangguh-end').val();
    let choice = $('#tawaran-setuju').val();

    let pass = true;

    if(start == '' && end != ''){
        Validation.addInvalidUI('#tawaran-tkh-tangguh-start', 'Tarikh Mula', true);
        pass = false;
    }

    if(start != '' && end == ''){
        Validation.addInvalidUI('#tawaran-tkh-tangguh-end', 'Tarikh Akhir', true);
        pass = false;
    }

    if(start != '' && end != ''){
        let upload = ValidateInput.testPic('#tawaran-surat-tangguh', $('#tawaran-surat-tangguh')[0].files[0]);
        if(!upload){
            Validation.addInvalidUI('#tawaran-surat-tangguh', 'Upload Cannot be Empty', true);
            pass = false;
            return false;
        }
    }

    if(pass){
        Validation.removeInvalidUI('#tawaran-tkh-tangguh-start');
        Validation.removeInvalidUI('#tawaran-tkh-tangguh-end');
        Validation.removeInvalidUI('#tawaran-surat-tangguh');
        v.append('tawaran_surat_tangguh', $('#tawaran-surat-tangguh')[0].files[0]);
        v.append('tawaran_tkh_tangguh_start', start);
        v.append('tawaran_tkh_tangguh_end', end);
    }else{
        if(choice != 'PL') {
            return false;
        }
    }

    v.append('pemohon_id', $('#pemohon_id').val());
    //v.append('alamat_baru', $('#tawaran-alamat').val());
    dt = v;

    TawaranUpdateController.hantarForm({
        url: 'pemangku/tawaran/update/process',
        data: dt,
    });
});

// for kader download : link : pemangku/tawaran/preview-pdf/{id_pemohon}
$(document).on('click', '#download-tawaran', function(){
    let validate = new Validation();
   let dt = new FormData();

    let v = validate.checkEmpty(
        validate.getValue('#tawaran-rujukan', 'mix', 'No. Rujukan', 'tawaran_rujukan'),
        validate.getValue('#tawaran-setuju', 'string', 'Persetujuan Tawaran', 'tawaran_setuju'),
        validate.getValue('#tawaran-tkh-kuatkuasa-baru', 'datedashstandard', 'Tarikh Kuat Kuasa Baru', 'tawaran_tkh_kuatkuasa_baru'),
        validate.getValue('#tawaran-tkh-lapor-diri', 'datedashstandard', 'Tarikh Lapor Diri', 'tawaran_tkh_lapor_diri'),
        validate.getValue('#tawaran-tkh-mula-tugas', 'datedashstandard', 'Tarikh Mula Tugas', 'tawaran_tkh_mula_tugas'),
        //validate.getValue('#tawaran-ketua-bahagian', 'mix', 'Ketua Bahagian', 'tawaran_ketua_bahagian'),
        //validate.getValue('#tawaran-ketua-jabatan', 'mix', 'Ketua Jabatan', 'tawaran_ketua_jabatan')
        validate.getValue('#tawaran-alamat', 'mix', 'Alamat Pejabat Baru', 'alamat_baru'),
    );

    let start = $('#tawaran-tkh-tangguh-start').val();
    let end = $('#tawaran-tkh-tangguh-end').val();
    let choice = $('#tawaran-setuju').val();

    let pass = true;

    if(start == '' && end != ''){
        Validation.addInvalidUI('#tawaran-tkh-tangguh-start', 'Tarikh Mula', true);
        pass = false;
    }

    if(start != '' && end == ''){
        Validation.addInvalidUI('#tawaran-tkh-tangguh-end', 'Tarikh Akhir', true);
        pass = false;
    }

    if(start != '' && end != ''){
        let upload = ValidateInput.testPic('#tawaran-surat-tangguh', $('#tawaran-surat-tangguh')[0].files[0]);
        if(!upload){
            Validation.addInvalidUI('#tawaran-surat-tangguh', 'Upload Cannot be Empty', true);
            pass = false;
            return false;
        }
    }

    if(pass){
        Validation.removeInvalidUI('#tawaran-tkh-tangguh-start');
        Validation.removeInvalidUI('#tawaran-tkh-tangguh-end');
        Validation.removeInvalidUI('#tawaran-surat-tangguh');
        v.append('tawaran_surat_tangguh', $('#tawaran-surat-tangguh')[0].files[0]);
        v.append('tawaran_tkh_tangguh_start', start);
        v.append('tawaran_tkh_tangguh_end', end);
    }else{
        if(choice != 'PL') {
            return false;
        }
    }

    v.append('pemohon_id', $('#pemohon_id').val());
    //v.append('alamat_baru', $('#tawaran-alamat').val());
    dt = v;

    TawaranUpdateController.downloadForm({
        url: 'pemangku/tawaran/update/process',
        data: dt,
    });
});


$(document).on('change', '#tawaran-tkh-tangguh-start, #tawaran-tkh-tangguh-end', function(){
    let start = $('#tawaran-tkh-tangguh-start').val();
    let end = $('#tawaran-tkh-tangguh-end').val();

    if((start == '' || typeof start == "undefined") || (end == '' || typeof end == "undefined")){
        $('.show-surat-tangguh').attr('style', '');
    }
});

$(document).on('click', '#padam-tangguh', function(){
    Validation.removeInvalidUI('#tawaran-tkh-tangguh-start');
    Validation.removeInvalidUI('#tawaran-tkh-tangguh-end');
    $('#tawaran-tkh-tangguh-start').val('');
    $('#tawaran-tkh-tangguh-end').val('');
    $('.show-surat-tangguh').attr('style', 'display:none');
});

$(document).on('change', '#tawaran-setuju', function() {
    let choice = $('#tawaran-setuju').val();
    if(choice == 'PL') {
        $('.notis-tolak').show();
    } else {
        $('.notis-tolak').hide();
    }
});

$(document).on('change', '#tawaran-borang-ukp11', function() {
    let data = new FormData();
    let file = $('#tawaran-surat-tangguh')[0].files[0];
    data.append('_token', getToken());
    data.append('pemohon_id', $('#pemohon_id').val());
    data.append('file', file);
    TawaranUpdateController.downloadForm({
        url: 'pemangku/tawaran/update/upload',
        data: data,
    });
});


