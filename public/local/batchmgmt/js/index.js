$(document).on('click','.add-kumpulan, .get-carian-staff, .batch-edit, .batch-email, .batch-delete, .post-send-email',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('add-kumpulan')) {
        postEmptyFields([
            ['.kump-nama','text']
        ]);
        $('.batch-modal').modal('show');
        load_staff();
    } else if(selectedClass.hasClass('get-carian-staff')) {
        let tahun = $('.dropdown-tahun').val();
        let gred = $('.dropdown-gred').val();
        let jurusan = $('.dropdown-jurusan').val();
        search_staff(tahun,jurusan,gred);
    } else if(selectedClass.hasClass('batch-edit')) {
        let batch_id = selectedClass.closest('tr').attr('data-batch-id');
        postEmptyFields([
            ['.kump-nama-1','text']
        ]);
        $.ajax({
            type:'GET',
            url: getUrl() + '/urussetia/kumpulan/papar?batch_id='+batch_id,
            dataType: "json",
            processData: false,
            contentType: false,
            context: this,
            success: function(data) {
                let success = data.success;
                let parseData = data.data;
                $('.kump-nama-1').val(parseData.name);
                $('.hidden-batch-id').val(parseData.id);

                postEmptyFields([
                    ['.calon-nama','text'],
                    ['.calon-nokp','text'],
                    ['.calon-jawatan','text'],
                    ['.calon-gred','text'],
                    ['.calon-jurusan','text'],
                    ['.calon-tkh-sah','text'],
                    ['.calon-tempat','text'],
                ]);

            }
        });
        $('.calon-modal').modal('show');
        display_staff(batch_id);
    } else if(selectedClass.hasClass('batch-email')) {
        let batch_id = selectedClass.closest('tr').attr('data-batch-id');
        $('.hidden-batch-id').val(batch_id);

        $('.email-modal').modal('show');


    } else if(selectedClass.hasClass('batch-delete')) {
        let batch_id = selectedClass.closest('tr').attr('data-batch-id');
        var data = new FormData;
        data.append('_token', getToken());
        data.append('batch_id',batch_id);
        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data akan dihapus',
            icon: 'info',
            confirmButtonText: 'Hapus',
            postData: {
                url : '/urussetia/kumpulan/padam',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        //swalPostFire('success', 'Berjaya Disimpan', 'Data sudah disimpan');
                        toasting('Data sudah berjaya dihapus', 'success');
                    } else if(success == 0) {
                        //swalPostFire('error', 'Gagal Disimpan', 'Ralat telah berlaku');
                        toasting('Ralat telah berlaku, Data telah gagal dihapus', 'error');
                    }

                    $('.email-modal').modal('hide');
                    $('.table-kumpulan').DataTable().ajax.reload(null, false);
                },
            }
        });
    } else if(selectedClass.hasClass('post-send-email')) {
        batch_id = $('.hidden-batch-id').val();
        var data = new FormData;
        data.append('_token', getToken());
        data.append('batch_id',batch_id);
        //data.append('kod_jawatan',$('.dropdown-jawatan').val());
        data.append('kod_gred',$('.dropdown-gred-2').val());
        data.append('kod_jurusan',$('.dropdown-jurusan-2').val());

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Emel akan dihantar kepada semua calon',
            icon: 'info',
            confirmButtonText: 'Hantar',
            postData: {
                url : '/urussetia/kumpulan/mel',
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
                    $('.table-kumpulan').DataTable().ajax.reload(null, false);
                },
            }
        });
    }
});

$(document).on('click','.post-add-batch, .post-update-batch',function() {
    let selectedClass = $(this);

    let nokp_list = new Array();
    var data = new FormData;
    data.append('_token', getToken());

    if(selectedClass.hasClass('post-add-batch')) {
        let rows_selected = staff_table.column(0).checkboxes.selected();
        let nama = $('.kump-nama').val();
        data.append('nama', nama);
        $.each(rows_selected, function(index, rowId) {
            nokp_list.push(rowId);
         });
         data.append('staff_list', JSON.stringify(nokp_list));
    } else if(selectedClass.hasClass('post-update-batch')) {
        let rows_selected = staff2_table.column(0).checkboxes.selected();
        let nama = $('.kump-nama-1').val();
        data.append('nama', nama);
        $.each(rows_selected, function(index, rowId) {
            nokp_list.push(rowId);
         });
         data.append('staff_list', JSON.stringify(nokp_list));
         data.append('batch_id',$('.hidden-batch-id').val());
    }

    swalAjax({
        titleText : 'Adakah Anda Pasti?',
        mainText : 'Data akan disimpan',
        icon: 'info',
        confirmButtonText: 'Simpan',
        postData: {
            url : '/urussetia/kumpulan/simpan',
            data: data,
            postfunc: function(data) {
                let success = data.success;
                let parseData = data.data;
                if(success == 1) {
                    if(parseData.flag) {
                        $('.batch-modal').modal('hide');
                    } else {
                        $('.calon-modal').modal('hide');
                    }
                    //swalPostFire('success', 'Berjaya Disimpan', 'Data sudah disimpan');
                    toasting('Data sudah berjaya disimpan', 'success');
                } else if(success == 0) {
                    //swalPostFire('error', 'Gagal Disimpan', 'Ralat telah berlaku');
                    toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                }
                $('.table-kumpulan').DataTable().ajax.reload(null, false);
            },
        }
    });

});

$(document).on('click','.calon-delete, .tambah-calon', function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('calon-delete')) {
        let nokp = selectedClass.closest('tr').attr('data-calon-id');
        let batch_id = selectedClass.closest('tr').attr('data-batch-id');
        var data = new FormData;
        data.append('_token', getToken());
        data.append('nokp',nokp);
        data.append('batch_id', batch_id);

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Calon akan dihapus',
            icon: 'error',
            confirmButtonText: 'Hapus',
            postData: {
                url : '/urussetia/kumpulan/hapus',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        display_staff(batch_id);
                        //swalPostFire('success', 'Berjaya Dihapus', 'Data sudah dihapus');
                        toasting('Data sudah berjaya dihapus', 'success');
                    } else if(success == 0) {
                        //swalPostFire('error', 'Gagal Dihapus', 'Ralat telah berlaku');
                        toasting('Ralat telah berlaku, Data telah gagal dihapus', 'error');
                    }

                },
            }
        });
        $('.table-staff2').DataTable().ajax.reload(null, false);
    } else if(selectedClass.hasClass('tambah-calon')) {
        let nokp = $('.calon-nokp').val();
        let batch_id = $('.hidden-batch-id').val();
        var data = new FormData;
        data.append('_token', getToken());
        data.append('nokp',nokp);
        data.append('batch_id', batch_id);

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Calon akan ditambah',
            icon: 'info',
            confirmButtonText: 'Tambah',
            postData: {
                url : '/urussetia/kumpulan/tambah',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        display_staff(batch_id);
                        //swalPostFire('success', 'Berjaya Ditambah', 'Data sudah ditambah');
                        toasting('Data sudah berjaya ditambah', 'success');
                    } else if(success == 0) {
                        //swalPostFire('error', 'Gagal Ditambah', 'Ralat telah berlaku');
                        toasting('Ralat telah berlaku, Data telah gagal ditambah', 'error');
                    }

                },
            }
        });
        $('.table-staff2').DataTable().ajax.reload(null, false);
    }
});

$(document).on('change', '.calon-carian', function(){
    let no_ic = $(this).val();
    let data = new FormData;
    data.append('nokp', no_ic);
    //data.append('_token', getToken());
    // load calon info here
    $.ajax({
        type:'GET',
        url: getUrl() + '/urussetia/kumpulan/info?nokp='+no_ic,
        dataType: "json",
        processData: false,
        contentType: false,
        context: this,
        success: function(data) {
            let result = data.success;
            let info = data.data;

            if(result == 1) {
                $('.calon-nama').val(info.nama);
                $('.calon-nokp').val(info.nokp);
                $('.calon-jawatan').val(info.jawatan);
                $('.calon-gred').val(info.gred);
                $('.calon-jurusan').val(info.jurusan);
                $('.calon-tkh-sah').val(info.tkh_sah);
                $('.calon-tempat').val(info.tempat);
            }
        }
    });
});
