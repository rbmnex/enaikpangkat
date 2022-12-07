$(document).on('click','.view-form, .back-main, .verdict-applicant, .btn-verdict, .view-full, .ukp11-view',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('view-form')) {
        let pemohon_id =  selectedClass.closest('tr').attr('data-pemohon-id');
    //    let pemohonan_id = $('#hdn_id_application').val();
        window.open(getUrl() + '/form/ukp12/nview/'+pemohon_id+'?view=l','_self');
    } else if(selectedClass.hasClass('back-main')) {
        // window.open(getUrl() + '/urussetia/appl/main/','_self');
        window.history.go(-1);
    } else if(selectedClass.hasClass('verdict-applicant')) {
        let pemohon_id =  selectedClass.closest('tr').attr('data-pemohon-id');

        $('.pemohon-id-modal').val(pemohon_id);
        $.ajax({
            type:'GET',
            url: getUrl() + '/urussetia/appl/calon/info?id='+pemohon_id,
            dataType: "json",
            processData: false,
            contentType: false,
            context: this,
            success: function(data) {
                let success = data.success;
                let parseData = data.data;
                if(success == 1) {
                    $('#verdict-nama').val(parseData.nama);
                    $('#verdict-nokp').val(parseData.nokp);
                    $('#verdict-jawatan').val(parseData.jawatan);
                    $('#verdict-gred').val(parseData.gred);
                    $('#verdict-rank').val(parseData.rank);
                    if(parseData.status == 'LL') {
                        $('#radio-verdict-1').attr('checked','checked');
                        $('#radio-verdict-2').removeAttr('checked');
                        $('#radio-verdict-3').removeAttr('checked');
                    } else if(parseData.status == 'GL') {
                        $('#radio-verdict-1').removeAttr('checked');
                        $('#radio-verdict-2').attr('checked','checked');
                        $('#radio-verdict-3').removeAttr('checked');
                    } else if(parseData.status == 'LS') {
                        $('#radio-verdict-1').removeAttr('checked');
                        $('#radio-verdict-2').removeAttr('checked');
                        $('#radio-verdict-3').attr('checked','checked');
                    }
                    $('#verdict-meeting').val(parseData.bil);
                    $('#verdict-date').val(parseData.tkh);

                    $('.verdict-modal').modal('show');
                }
            }
        });
    } else if(selectedClass.hasClass('btn-verdict')) {
        let pemohon_id =   $('.pemohon-id-modal').val();
        var data = new FormData;
        var verdict = $('.radio-verdict').filter(':checked').val();
        var bil = $('#verdict-meeting').val();
        var date = $('#verdict-date').val();
        if( bil == 0 || bil == '' || bil == undefined) {
            valid = false;
            addInvalid('#verdict-meeting', 'Tiada No. Bil. Mesyuarat LKPPA');
        }
        if( date == 0 || date == '' || date == undefined) {
            valid = false;
            addInvalid('#verdict-date', 'Tiada Tarikh Mesyuarat LKPPA');
        }
        data.append('_token', getToken());
        data.append('pemohon_id',pemohon_id);
        data.append('verdict',verdict);
        data.append('rank',$('#verdict-rank').val());
        data.append('bil',$('#verdict-meeting').val());
        data.append('date',$('#verdict-date').val());
        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data akan diubah',
            icon: 'info',
            confirmButtonText: 'Simpan',
            postData: {
                url : '/urussetia/appl/calon/verdict',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        //swalPostFire('success', 'Berjaya Disimpan', 'Data sudah disimpan');
                        toasting('Data sudah berjaya disimpan', 'success');
                    } else if(success == 0) {
                        //swalPostFire('error', 'Gagal Disimpan', 'Ralat telah berlaku');
                        toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                    }

                    $('.verdict-modal').modal('hide');
                    DatatableUI.reloadTable('.table-pemohon');
                },
            }
        });
    } else if(selectedClass.hasClass('view-lnpt')) {
        let pemohon_id =  selectedClass.closest('tr').attr('data-pemohon-id');
        window.open(getUrl() + '/form/ukp12/nview/'+pemohon_id+'?view=l','_self');
    } else if(selectedClass.hasClass('view-full')) {
        let pemohon_id =  selectedClass.closest('tr').attr('data-pemohon-id');
        window.open(getUrl() + '/form/ukp12/nview/'+pemohon_id+'?view=n','_self');
    } else if(selectedClass.hasClass('ukp11-view')) {
        let pemohon_id =  selectedClass.closest('tr').attr('data-pemohon-id');
        window.open(getUrl() + '/pemangku/tawaran/preview-pdf/'+pemohon_id,'_blank');
    }
});


$(document).on('click','.calon-resend',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('calon-resend')) {
        let nokp = $(this).closest('tr').attr('data-calon-nokp');
        let batch_id = $(this).closest('tr').attr('data-batch-id');
        var data = new FormData;
            data.append('_token', getToken());
            data.append('nokp',nokp);
            data.append('batch_id', batch_id);
        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Emel akan dihantar semula kepada calon',
            icon: 'info',
            confirmButtonText: 'Hantar',
            postData: {
                url : '/urussetia/kumpulan/resend',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        //swalPostFire('success', 'Berjaya Disimpan', 'Data sudah disimpan');
                        toasting('Emel sudah berjaya dihantar', 'success');
                    } else if(success == 0) {
                        //swalPostFire('error', 'Gagal Disimpan', 'Ralat telah berlaku');
                        toasting('Ralat telah berlaku, Emel telah gagal dihantar', 'error');
                    }
                    DatatableUI.reloadTable('.table-pemohon');
                },
            }
        });
    }
});
