$(document).on('click','.btn-download, .btn-back',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('btn-download')) {
        var file_id = $(this).attr('data-file-id');
        window.open(getUrl() + '/common/id-download?fileid='+file_id,'_blank');
    } else if(selectedClass.has('btn-back')) {
        var back_id = $(this).attr('data-appl-id');
        window.open(getUrl() + '/urussetia/appl/calon/main/'+back_id,'_self');
    }
});

$(document).on('click','.btn-bpsm, .btn-kbp, .btn-hod',function() {
    let selectedClass = $(this);
    var pemohon_id = $('.hidden_id').val();
    var data = new FormData;
    data.append('_token', getToken());
    data.append('pemohon_id',pemohon_id);
    if(selectedClass.hasClass('btn-bpsm')) {
        var valid = true;
        data.append('pengesahan',$('.tatatertib2').filter(':checked').val());
        data.append('jenis',$('#nama_hkm').val());
        data.append('tkh',$('.tkh_hukuman').val());
        if(!$('.tatatertib2').is(':checked')) {
            valid = false;
            addInvalid('.tatatertib2', 'Sila berikan pengesahan');
        } else {
            clearInvalid('.tatatertib2');
        }
        if(valid) {
            swalAjax({
                titleText : 'Adakah Anda Pasti?',
                mainText : 'Data akan disimpan',
                icon: 'info',
                confirmButtonText: 'Tambah',
                postData: {
                    url : '/form/api/urussetia/submit',
                    data: data,
                    postfunc: function(data) {
                        let success = data.success;
                        let parseData = data.data;
                        if(success == 1) {
                            toasting('Data sudah berjaya disimpan', 'success');
                        } else if(success == 0) {
                            toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                        }

                    },
                }
            });
        }
    } else if(selectedClass.hasClass('btn-kbp')) {
        var valid = true;
        if(!$('.pengesahan_kbp').is(':checked')) {
            valid = false;
            addInvalid('.pengesahan_kbp', 'Sila berikan pengesahan');
        } else {
            clearInvalid('.pengesahan_kbp');
        }
        data.append('pengesahan',$('.pengesahan_kbp').filter(':checked').val());
        data.append('nama',$('.nama_kerani').val());
        data.append('jawatan',$('.jawatan_kerani').val());
        data.append('jabatan',$('.jabatan_kerani').val());
        //data.append('tkh_pengesahan',$('.tkh_kerani').val());
        if(valid) {
            swalAjax({
                titleText : 'Adakah Anda Pasti?',
                mainText : 'Data akan disimpan',
                icon: 'info',
                confirmButtonText: 'Tambah',
                postData: {
                    url : '/form/api/kerani/submit',
                    data: data,
                    postfunc: function(data) {
                        let success = data.success;
                        let parseData = data.data;
                        if(success == 1) {
                            toasting('Data sudah berjaya disimpan', 'success');
                        } else if(success == 0) {
                            toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                        }

                    },
                }
            });
        }
    } else if(selectedClass.hasClass('btn-hod')) {
        var valid = true;
        if(!$('.radio-certified').is(':checked')) {
            valid = false;
            addInvalid('.radio-certified', 'Sila berikan pengesahan');
        } else {
            clearInvalid('.radio-certified');
        }
        data.append('pengesahan',$('.radio-certified').filter(':checked').val());
        data.append('nama',$('.nama-ketua').val());
        data.append('jawatan',$('.jawatan-ketua').val());
        data.append('jabatan',$('.jabatan-ketuai').val());
        data.append('ulasan',$('.ulasan_ketua').val());
        //data.append('tkh_pengesahan',$('.tkh_kerani').val());
        if(valid) {
            swalAjax({
                titleText : 'Adakah Anda Pasti?',
                mainText : 'Data akan disimpan',
                icon: 'info',
                confirmButtonText: 'Tambah',
                postData: {
                    url : '/form/api/ketua/submit',
                    data: data,
                    postfunc: function(data) {
                        let success = data.success;
                        let parseData = data.data;
                        if(success == 1) {
                            toasting('Data sudah berjaya disimpan', 'success');
                        } else if(success == 0) {
                            toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                        }

                    },
                }
            });
        }
    }
});

