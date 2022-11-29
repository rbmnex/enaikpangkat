$(document).on('click','.btn-download, .btn-back, .btn-pdf',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('btn-download')) {
        var file_id = $(this).attr('data-file-id');
        window.open(getUrl() + '/common/id-download?fileid='+file_id,'_blank');
    } else if(selectedClass.hasClass('btn-back')) {
        var back_id = $(this).attr('data-appl-id');
        window.open(getUrl() + '/urussetia/appl/calon/main/'+back_id,'_self');
    } else if(selectedClass.hasClass('btn-pdf')) {
        var pemohon_id = $('.hidden_id').val();
        window.open(getUrl() + '/form/ukp12/download/view?dataform='+pemohon_id,'_blank');
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
        let lnpts = new Array();
        data.append('pengesahan',$('.tatatertib2').filter(':checked').val());
        data.append('jenis',$('#nama_hkm').val());
        data.append('tkh',$('.tkh_hukuman').val());
        for (let index = 1; index < 4; index++) {
            var tahun = $('#tahun-'+index).val();
            var markah = $('#markah-'+index).val();

            if(tahun == '' || tahun == 0 || tahun == undefined) {
                valid = false;
                addInvalid('#tahun-'+index, 'Sila berikan markah');
            } else {
                valid = true;
                clearInvalid('#tahun-'+index);
            }

            if(markah == '' || markah == 0 || markah == undefined) {
                valid = false;
                addInvalid('#markah-'+index, 'Sila berikan markah');
            } else {
                valid = true;
                clearInvalid('#markah-'+index);
            }

            lnpts.push({'tahun' : tahun, 'purata': markah});
        }

        // $('.markah-lnpt').each(function(){
        //     var tahun = $(this).attr('data-tahun-lnpt');
        //     var markah = $(this).val();
        //     if(markah == 0) {
        //         valid = false;
        //         addInvalid(this, 'Sila berikan markah');
        //     } else {
        //         clearInvalid(this);
        //         lnpts.push({'tahun' : tahun, 'purata': markah});
        //     }
        // });
        if(!$('.tatatertib2').is(':checked')) {
            valid = false;
            addInvalid('.tatatertib2', 'Sila berikan pengesahan');
        } else {
            clearInvalid('.tatatertib2');
        }
        data.append('lnpts',JSON.stringify(lnpts));

        if(valid) {
            swalAjax({
                titleText : 'Adakah Anda Pasti?',
                mainText : 'Data akan disimpan',
                icon: 'info',
                confirmButtonText: 'Simpan',
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
                confirmButtonText: 'Simpan',
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
        data.append('jabatan',$('.jabatan-ketua').val());
        data.append('ulasan',$('.ulasan_ketua').val());
        //data.append('tkh_pengesahan',$('.tkh_kerani').val());
        if(valid) {
            swalAjax({
                titleText : 'Adakah Anda Pasti?',
                mainText : 'Data akan disimpan',
                icon: 'info',
                confirmButtonText: 'Simpan',
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

