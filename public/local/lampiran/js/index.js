// kursus
$(document).on('click','.add-kursus, .post-edit-kursus, .update-kursus, .delete-kursus, .tambah-kursus',function() {
    let selectedButton = $(this);
    if(selectedButton.hasClass('add-kursus') || selectedButton.hasClass('post-edit-kursus')) {
        let tajuk = $('input[name="kursus-tajuk"]').val();
        let mula = $('input[name="kursus-mula"]').val();
        let tamat = $('input[name="kursus-tamat"]').val();
        let tempat = $('input[name="kursus-tempat"]').val();

         $('.add-kursus').attr('style', '');
        $('.post-edit-kursus').attr('style', 'display:none');

        var data = new FormData;
        data.append('_token', getToken());
        data.append('tajuk',tajuk);
        data.append('mula',mula);
        data.append('tamat',tamat);
        data.append('tempat',tempat);
        data.append('nokp',$('input[name="nokp"]').val());
        if(selectedButton.hasClass('post-edit-kursus')){
            data.append('id', $('#kursus-id').val());
        }

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data ini akan disimpan',
            icon: 'info',
            confirmButtonText: 'Hantar',
            postData: {
                url : '/form/api/kursus',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        let row = [];
                        row.push(parseData.tajuk);
                        row.push(parseData.mula);
                        row.push(parseData.tamat);
                        row.push(parseData.tempat);
                        var btn = '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-row">'+ feather.icons['trash-2'].toSvg() +'</button>';
                        btn += '<button type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light update-kursus" data-toggle="modal" data-target="#modal-kursus">'+ feather.icons['check-square'].toSvg() +'</button>';
                        row.push(btn);
                        $('.kursus-no-data').remove();
                        add_row('#tbody-badan-kursus',row,'data-kursus-id='+parseData.id);
                        $('#modal-kursus').modal('hide');
                        toasting('Kursus Ditambah', 'success');
                        }else if(success == 2) {
                        $('tr[data-kursus-id='+ parseData.id +']').find('td:first-child').html(parseData.tajuk);
                        $('tr[data-kursus-id='+ parseData.id +']').find('td:eq(1)').html(parseData.mula);
                         $('tr[data-kursus-id='+ parseData.id +']').find('td:eq(2)').html(parseData.tamat);
                          $('tr[data-kursus-id='+ parseData.id +']').find('td:eq(3)').html(parseData.tempat);
                        $('#modal-kursus').modal('hide');
                        toasting('Senarai Kepakaran Dikemaskini', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                    }
                },
            }
        });
    } else if(selectedButton.hasClass('update-kursus')) {
        $('.add-kursus').attr('style', 'display:none');
        $('.post-edit-kursus').attr('style', '');

        let id = $(this).closest('tr').attr('data-kursus-id');

        $('#kursus-id').val(id);

        let data = new FormData;
        data.append('id', id);
        data.append('_token', getToken());

        $.ajax({
            type:'POST',
            url: getUrl() + '/form/api/get-kursus',
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            context: this,
            success: function(data) {
                let result = data.data;
                $('input[name=kursus-tajuk]').val(result.result);
                 $('input[name=kursus-mula]').val(result.mula);
                  $('input[name=kursus-tamat]').val(result.tamat);
                   $('input[name=kursus-tempat]').val(result.tempat);

            }
        });

    } else if(selectedButton.hasClass('delete-kursus')) {
        let kursus_id = selectedButton.closest('tr').attr('data-kursus-id');

        var data = new FormData;
        data.append('_token', getToken());
        data.append('id',kursus_id);

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data ini akan dipadam',
            icon: 'warning',
            confirmButtonText: 'Padam',
            postData: {
                url : '/form/api/kursus/del',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        remove_row(selectedButton);
                        toasting('Kursus Dipadam', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal dipadam', 'error');
                    }
                },
            }
        });
    } else if(selectedButton.hasClass('tambah-kursus')) {
        $('.add-kursus').attr('style', '');
        $('.post-edit-kursus').attr('style', 'display:none');
        $('input[name=kursus-tajuk]').val('');
        $('input[name=kursus-mula]').val('');
        $('input[name=kursus-tamat]').val('');
        $('input[name=kursus-tempat]').val('');
    }
});

// JD
$('.upload-lampiran').on('change',function() {
    let data = new FormData();
    var file = $('#lampiran_beban')[0].files[0];
    data.append('_token', getToken());
    data.append('lampiran_beban',file);
    $('.beban-file').html('&nbsp;'+file.name);
    $.ajax({
        type:'POST',
        url: getUrl() + '/form/api/bebankerja',
        data:data,
        processData: false,
        contentType: false,
        context: this,
        success: function(resp) {
            let d = resp.success;
            if(d == 1) {
                toasting('Fail berjaya sudah dimuat naik', 'success');
            } else {
                toasting('Ralat telah berlaku, Data telah gagal dimuat naik', 'error');
            }
        }
    });
});

// Projek
$(document).on('click','.add-projek, .post-edit-projek, .update-projek, .delete-projek, .tambah-projek',function() {
    let selectedButton = $(this);
    if(selectedButton.hasClass('add-projek') || selectedButton.hasClass('post-edit-projek')) {
        let tajuk = $('input[name="projek-nama"]').val();
        let kos = $('input[name="projek-kos"]').val();

        $('.add-projek').attr('style', '');
        $('.post-edit-projek').attr('style', 'display:none');

        var data = new FormData;
        data.append('_token', getToken());
        data.append('tajuk',tajuk);
        data.append('kos',kos);
        data.append('pemohonId',$('._formid').val());
        data.append('nokp',$('input[name="nokp"]').val());
         if(selectedButton.hasClass('post-edit-projek')){
            data.append('id', $('#projek-id').val());
        }

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data ini akan disimpan',
            icon: 'info',
            confirmButtonText: 'Hantar',
            postData: {
                url : '/form/api/projek',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        let row = []

                        row.push(parseData.tajuk);
                        row.push("RM"+ separateComma(parseData.kos));
                        var btn = '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-row">'+ feather.icons['trash-2'].toSvg() +'</button>';
                        btn += '<button type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light update-projek" data-toggle="modal" data-target="#modal-projek">'+ feather.icons['check-square'].toSvg() +'</button>';
                        row.push(btn);
                        $('.projek-no-data').remove();
                        add_row('#tbody-badan-projek',row,'data-projek-id='+parseData.id);
                        $('#modal-projek').modal('hide');
                        toasting('Senarai Kepakaran Ditambah', 'success');
                    }else if(success == 2) {

                        $('tr[data-projek-id='+ parseData.id +']').find('td:first-child').html(parseData.tajuk);
                        $('tr[data-projek-id='+ parseData.id +']').find('td:eq(1)').html("RM"+separateComma(parseData.kos));
                        $('#modal-projek').modal('hide');
                        toasting('Senarai Kepakaran Dikemaskini', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                    }
                },
            }
        });
    } else if(selectedButton.hasClass('update-projek')) {
        $('.add-projek').attr('style', 'display:none');
        $('.post-edit-projek').attr('style', '');

        let id = $(this).closest('tr').attr('data-projek-id');

        $('#projek-id').val(id);

        let data = new FormData;
        data.append('id', id);
        data.append('_token', getToken());

        $.ajax({
            type:'POST',
            url: getUrl() + '/form/api/get-projek',
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            context: this,
            success: function(data) {
                let result = data.data;
                $('input[name=projek-nama]').val(result.nama);
                $('input[name=projek-kos]').val(result.kos);
            }
        });
    } else if(selectedButton.hasClass('delete-projek')) {
        let projek_id = selectedButton.closest('tr').attr('data-projek-id');

        var data = new FormData;
        data.append('_token', getToken());
        data.append('id',projek_id);

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data ini akan dipadam',
            icon: 'warning',
            confirmButtonText: 'Padam',
            postData: {
                url : '/form/api/projek/del',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        remove_row(selectedButton);
                        toasting('Projek Dipadam', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal dipadam', 'error');
                    }
                },
            }
        });
    } else if(selectedButton.hasClass('tambah-projek')) {
        $('.add-projek').attr('style', '');
        $('.post-edit-projek').attr('style', 'display:none');
        $('input[name=projek-nama]').val('');
        $('input[name=projek-kos]').val('');
    }
});

//pakar
$(document).on('click','.tambah-pendedahan, .update-pendedahan, .add-pendedahan, .post-edit-pendedahan, .delete-pendedahan',function() {
    let selectedButton = $(this);
    if(selectedButton.hasClass('tambah-pendedahan')) {
        $('.add-pendedahan').attr('style', '');
        $('.post-edit-pendedahan').attr('style', 'display:none');
        $('textarea[name=pendedahan-nama]').val('');
    } else if(selectedButton.hasClass('update-pendedahan')) {
        $('.add-pendedahan').attr('style', 'display:none');
        $('.post-edit-pendedahan').attr('style', '');

        let id = $(this).closest('tr').attr('data-pendedahan-id');

        $('#pendedahan-id').val(id);

        let data = new FormData;
        data.append('id', id);
        data.append('_token', getToken());

        $.ajax({
            type:'POST',
            url: getUrl() + '/form/api/get-pendedahan',
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            context: this,
            success: function(data) {
                let result = data.data;
                $('textarea[name=pendedahan-nama]').val(result.result);
            }
        });
    } else if(selectedButton.hasClass('add-pendedahan')|| selectedButton.hasClass('post-edit-pendedahan')){

        let tajuk = $('textarea[name="pendedahan-nama"]').val();

        $('.add-pendedahan').attr('style', '');
        $('.post-edit-pendedahan').attr('style', 'display:none');

        var data = new FormData;
        data.append('_token', getToken());
        data.append('tajuk',tajuk);
        data.append('pemohonId',$('._formid').val());
        data.append('nokp',$('input[name="nokp"]').val());
         if(selectedButton.hasClass('post-edit-pendedahan')){
            data.append('id', $('#pendedahan-id').val());
        }

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data ini akan disimpan',
            icon: 'info',
            confirmButtonText: 'Hantar',
            postData: {
                url : '/form/api/pendedahan',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        let row = [];
                        row.push(parseData.tajuk);
                        var btn = '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-row">'+ feather.icons['trash-2'].toSvg() +'</button>';
                        btn += '<button type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light update-pendedahan" data-toggle="modal" data-target="#modal-pendedahan">'+ feather.icons['check-square'].toSvg() +'</button>';
                      row.push(btn);
                        $('.pendedahan-no-data').remove();
                        add_row('#tbody-badan-pendedahan',row,'data-pendedahan-id='+parseData.id);
                        $('#modal-pendedahan').modal('hide');
                        toasting('Senarai Kepakaran Ditambah', 'success');
                    }else if(success == 2) {
                        $('tr[data-pendedahan-id='+ parseData.id +']').find('td:first-child').html(parseData.tajuk);
                        $('#modal-pendedahan').modal('hide');
                        toasting('Senarai Kepakaran Dikemaskini', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                    }
                },
            }
        });
    } else if(selectedButton.hasClass('delete-pendedahan')) {
        let pendedahan_id = selectedButton.closest('tr').attr('data-pendedahan-id');

        var data = new FormData;
        data.append('_token', getToken());
        data.append('id',pendedahan_id);

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data ini akan dipadam',
            icon: 'warning',
            confirmButtonText: 'Padam',
            postData: {
                url : '/form/api/pendedahan/del',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        remove_row(selectedButton);
                        toasting('Maklumat Pendedahan Dipadam', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal dipadam', 'error');
                    }
                },
            }
        });
    }
});

$(document).on('click','.tambah-pencapaian, .update-pencapaian, .add-pencapaian, .post-edit-pencapaian, .delete-pencapaian',function() {
    let selectedButton = $(this);
    if(selectedButton.hasClass('tambah-pendedahan')) {
        $('.add-pencapaian').attr('style', '');
        $('.post-edit-pencapaian').attr('style', 'display:none');
        $('textarea[name=pencapaian-nama]').val('');
    } else if(selectedButton.hasClass('update-pencapaian')) {
        $('.add-pencapaian').attr('style', 'display:none');
        $('.post-edit-pencapaian').attr('style', '');

        let id = $(this).closest('tr').attr('data-pencapaian-id');

        $('#pencapaian-id').val(id);

        let data = new FormData;
        data.append('id', id);
        data.append('_token', getToken());

        $.ajax({
            type:'POST',
            url: getUrl() + '/form/api/get-pencapaian',
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            context: this,
            success: function(data) {
                let result = data.data;
                $('textarea[name=pencapaian-nama]').val(result.result);
            }
        });
    } else if(selectedButton.hasClass('add-pencapaian') || selectedButton.hasClass('post-edit-pencapaian')){

        let tajuk = $('textarea[name="pencapaian-nama"]').val();

        $('.add-pencapaian').attr('style', '');
        $('.post-edit-pencapaian').attr('style', 'display:none');

        var data = new FormData;
        data.append('_token', getToken());
        data.append('tajuk',tajuk);
        data.append('pemohonId',$('._formid').val());
        data.append('nokp',$('input[name="nokp"]').val());
        if(selectedButton.hasClass('post-edit-pencapaian')){
            data.append('id', $('#pencapaian-id').val());
        }

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data ini akan disimpan',
            icon: 'info',
            confirmButtonText: 'Hantar',
            postData: {
                url : '/form/api/pencapaian',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        let row = [];
                        row.push(parseData.tajuk);
                         var btn = '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-row">'+ feather.icons['trash-2'].toSvg() +' </button>';
                        btn += '<button type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light update-pencapaian" data-toggle="modal" data-target="#modal-pencapaian">'+ feather.icons['check-square'].toSvg() +'</button>';
                        row.push(btn);
                        $('.pencapaian-no-data').remove();
                        add_row('#tbody-badan-pencapaian',row,'data-pencapaian-id='+parseData.id);
                        $('#modal-pencapaian').modal('hide');
                        toasting('Senarai Kepakaran Ditambah', 'success');
                    }else if(success == 2) {
                        $('tr[data-pencapaian-id='+ parseData.id +']').find('td:first-child').html(parseData.tajuk);
                        $('#modal-pencapaian').modal('hide');
                        toasting('Senarai Kepakaran Dikemaskini', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                    }
                },
            }
        });
    } else if(selectedButton.hasClass('delete-pencapaian')) {
        let pencapaian_id = selectedButton.closest('tr').attr('data-pencapaian-id');

        var data = new FormData;
        data.append('_token', getToken());
        data.append('id',pencapaian_id);

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data ini akan dipadam',
            icon: 'warning',
            confirmButtonText: 'Padam',
            postData: {
                url : '/form/api/pencapaian/del',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        remove_row(selectedButton);
                        toasting('pencapaian Dipadam', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal dipadam', 'error');
                    }
                },
            }
        });
    }
});

// Istihar Harta
$('.upload-harta').on('change',function() {
    let data = new FormData();
    var file = $('#lampiran_E')[0].files[0];
    data.append('_token', getToken());
    data.append('lampiran_harta',file);
    $('.harta-file').html('&nbsp;'+file.name);
    $.ajax({
        type:'POST',
        url: getUrl() + '/form/api/lampirharta',
        data:data,
        processData: false,
        contentType: false,
        context: this,
        success: function(resp) {
            let d = resp.success;
            if(d == 1) {
                toasting('Fail berjaya sudah dimuat naik', 'success');
            } else {
                toasting('Ralat telah berlaku, Data telah gagal dimuat naik', 'error');
            }
        }
    });
});

$('.selesai-calon').on('click',function() {
    // validation

    // conformation
    var data = new FormData;
    data.append('_token', getToken());
    swalAjax({
        titleText : 'Adakah Anda Selesai Mengisi?',
        mainText : 'Lampiran akan dikira lengkap dan sedia untuk dicetak',
        icon: 'info',
        confirmButtonText: 'Hantar',
        postData: {
            url : '/form/api/lengkap/lampiran',
            data: data,
            postfunc: function(data) {
                let success = data.success;
                let parseData = data.data;
                if(success == 1) {
                    toasting('Lampiran telah dilengkap', 'success');
                } else if(success == 0) {
                    toasting('Ralat telah berlaku', 'error');
                }
            },
        }
    });
});


