$(document).on('click','.btn-submit, .btn-download, .radio-accept',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('btn-submit')) {
        //$('#modal-cuti').modal('show');
        let process = validate_form();
        if(process) {
            // submit proccess
            var data = new FormData;
            data.append('_token', getToken());
            data.append('pemohon',$('input[name="_formdata"]').val());
            data.append('accept',$('.radio-accept').filter(':checked').val());
            data.append('alasan',$('.alasan_tolak').val());
            data.append('ketua_nokp',$('.pegawai-nokp').val());
            data.append('kerani_nokp',$('.pengguna-nokp').val());
            data.append('tatatertib',$('.tatatertib').filter(':checked').val());
            data.append('denda',$('.denda').filter(':checked').val());
            data.append('cuti',$('.cuti_check').filter(':checked').val());
            if($('.akuan_peribadi').is(':checked')) {
                data.append('akuan',1);
            } else {
                data.append('akuan',0);
            }

            data.append('status_pinjam',$('.pinjam-status').val());
            data.append('nama_pinjam',$('.nama_tabung').val());
            data.append('jumlah_pinjam',$('.jumlah_pinjaman').val());
            data.append('mula_pinjam',$('.mula_pinjam').val());
            data.append('akhir_pinjam',$('.akhir_pinjam').val());
            data.append('bayar_pinjam',$('.bayar_mula').val());
            data.append('selesai_pinjam',$('.selesai_bayar').val());

            swalAjax({
                titleText : 'Adakah Anda Pasti?',
                mainText : 'Data ini akan disimpan',
                icon: 'info',
                confirmButtonText: 'Hantar',
                postData: {
                    url : '/form/api/submit',
                    data: data,
                    postfunc: function(data) {
                        let success = data.success;
                        let parseData = data.data;
                        if(success == 1) {
                            window.open(getUrl()+'/form/ukp12/final','_self');
                        } else if(success == 0) {
                            toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                        }
                    },
                }
            });
        }
    } else if(selectedClass.hasClass('btn-download')) {
        var data = new FormData;
        var dataform = $('input[name="_formid"]').val();
        data.append('_token', getToken());
        data.append('dataform',$('input[name="_formid"]').val());
        window.open(getUrl() + '/form/ukp12/download/part?dataform='+dataform,'_blank');
        // $.ajax({
        //     type: 'POST',
        //     url: getUrl() + '/form/ukp12/download/part',
        //     data:data,
        //     processData: false,
        //     contentType: false,
        //     context: this,
        //     success: function(data) {
        //         console.log(data);
        //         // window.open(data, '_blank ');
        //         // var a = document.createElement('a');
        //         // a.href= "data:application/octet-stream;base64,"+data;
        //         // a.target = '_blank';
        //         // a.download = 'Pemohonan_UKP12.pdf';
        //         // a.click();
        //         var blob=new Blob([data]);
        //         var link=document.createElement('a');
        //         //link.href=window.URL.createObjectURL(blob);
        //         link.href="data:application/octet-stream;base64,"+data;
        //         link.download="Pemohonan_UKP12.pdf";
        //         link.click();
        //     }
        // });
    } else if(selectedClass.hasClass('radio-accept')) {
        let result = selectedClass.val();
        if(result == 1) {
            $('.reason_reject').hide();
        } else {
            $('.reason_reject').show();
        }
    }
});

$(document).on('click','.add-cuti, .add-perkhidmatan, .add-pertubuhan, .add-kursus, .add-projek, add-pendedahan',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('add-cuti')) {
        let row = [];
        row.push('Cuti tanpa gaji');
        row.push('01-01-2022');
        row.push('01-02-2022');
        row.push('<button type="button" class="btn btn-icon btn-outline-success mr-1 mb-1 waves-effect waves-light download-file">'+ feather.icons['file'].toSvg() +' Muat Turun</button>');
        row.push('<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-row">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>');
        add_row('#tbody-cuti',row,'data-cuti-id=1');
        $('#modal-cuti').modal('hide');
    } else if(selectedClass.hasClass('add-perkhidmatan')) {
        var j = $('input[name="penempatan-jawatan"]').val();
        var t = $('input[name="penempatan-tahun"]').val();
        var m = $('input[name="penempatan-tempat"]').val();
        let row = [];
        row.push(j);
        row.push(m);
        row.push(t);
        row.push('<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-row">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>');
        add_row('#tbody-khidmat',row,'data-cuti-id=1');
        $('#modal-penempatan').modal('hide');
    } else if(selectedClass.hasClass('add-pertubuhan')){
        let tempat = $('input[name="pertubuhan-tempat"]').val();
        let jawatan = $('input[name="pertubuhan-jawatan"]').val();
        let tahun = $('input[name="pertubuhan-tahun"]').val();

        var data = new FormData;
        data.append('_token', getToken());
        data.append('nama',tempat);
        data.append('jawatan',jawatan);
        data.append('tahun',tahun);
        data.append('pemohonId',$('._formid').val());
        data.append('nokp',$('input[name="nokp_utuh"]').val());

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data ini akan disimpan',
            icon: 'info',
            confirmButtonText: 'Hantar',
            postData: {
                url : '/form/api/org',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        let row = [];
                        row.push(parseData.jawatan);
                        row.push(parseData.tempat);
                        row.push(parseData.tahun);
                        row.push('<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-row">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>');
                        add_row('#tbody-badan',row,'data-pertubuhan-id='+parseData.id);
                        $('#modal-pertubuhan').modal('hide');
                        toasting('Jawatan Dalam Pertubuhan Ditambah', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                    }
                },
            }
        });
      } else if(selectedClass.hasClass('add-kursus')){
        let tajuk = $('input[name="kursus-tajuk"]').val();
        let mula = $('input[name="kursus-mula"]').val();
        let tamat = $('input[name="kursus-tamat"]').val();
        let tempat = $('input[name="kursus-tempat"]').val();

        var data = new FormData;
        data.append('_token', getToken());
        data.append('tajuk',tajuk);
        data.append('mula',mula);
        data.append('tamat',tamat);
        data.append('tempat',tempat);
        data.append('nokp',$('input[name="nokp"]').val());

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
                        row.push('<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-row">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>');
                        add_row('#tbody-badan-kursus',row,'data-kursus-id='+parseData.id);
                        $('#modal-kursus').modal('hide');
                        toasting('Kursus Ditambah', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                    }
                },
            }
        });
      } else if(selectedClass.hasClass('add-projek')){
        let tajuk = $('input[name="projek-nama"]').val();
        let kos = $('input[name="projek-kos"]').val();

        var data = new FormData;
        data.append('_token', getToken());
        data.append('tajuk',tajuk);
        data.append('kos',kos);
        data.append('pemohonId',$('._formid').val());
        data.append('nokp',$('input[name="nokp"]').val());

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
                        let row = [];
                        row.push(parseData.tajuk);
                        row.push(parseData.kos);
                        row.push('<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-row">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>');
                        add_row('#tbody-badan-projek',row,'data-projek-id='+parseData.id);
                        $('#modal-projek').modal('hide');
                        toasting('projek Ditambah', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                    }
                },
            }
        });
    }else if(selectedClass.hasClass('add-pendedahan')){
        let tajuk = $('input[name="projek-nama"]').val();
        let kos = $('input[name="projek-kos"]').val();

        var data = new FormData;
        data.append('_token', getToken());
        data.append('tajuk',tajuk);
        data.append('kos',kos);
        data.append('pemohonId',$('._formid').val());
        data.append('nokp',$('input[name="nokp"]').val());

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
                        let row = [];
                        row.push(parseData.tajuk);
                        row.push(parseData.kos);
                        row.push('<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-row">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>');
                        add_row('#tbody-badan-projek',row,'data-projek-id='+parseData.id);
                        $('#modal-projek').modal('hide');
                        toasting('projek Ditambah', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                    }
                },
            }
        });
    }

});

$(document).on('click','.delete-row, .delete-org',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('delete-row')) {
        remove_row(selectedClass);
    } else if(selectedClass.hasClass('delete-org')) {
        let org_id = selectedClass.closest('tr').attr('data-pertubuhan-id');

        var data = new FormData;
        data.append('_token', getToken());
        data.append('id',org_id);

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data ini akan dipadam',
            icon: 'waring',
            confirmButtonText: 'Padam',
            postData: {
                url : '/form/api/org/del',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        remove_row(selectedClass);
                        toasting('Jawatan Dalam Pertubuhan Dipadam', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal dipadam', 'error');
                    }
                },
            }
        });
    }
});

$(document).on('click','.delete-row, .delete-kursus',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('delete-row')) {
        remove_row(selectedClass);
    } else if(selectedClass.hasClass('delete-kursus')) {
        let kursus_id = selectedClass.closest('tr').attr('data-kursus-id');

        var data = new FormData;
        data.append('_token', getToken());
        data.append('id',kursus_id);

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data ini akan dipadam',
            icon: 'waring',
            confirmButtonText: 'Padam',
            postData: {
                url : '/form/api/kursus/del',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        remove_row(selectedClass);
                        toasting('Kursus Dipadam', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal dipadam', 'error');
                    }
                },
            }
        });
    }
});


$(document).on('click','.delete-row, .delete-projek',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('delete-row')) {
        remove_row(selectedClass);
    } else if(selectedClass.hasClass('delete-projek')) {
        let projek_id = selectedClass.closest('tr').attr('data-projek-id');

        var data = new FormData;
        data.append('_token', getToken());
        data.append('id',projek_id);

        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data ini akan dipadam',
            icon: 'waring',
            confirmButtonText: 'Padam',
            postData: {
                url : '/form/api/projek/del',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        remove_row(selectedClass);
                        toasting('Projek Dipadam', 'success');
                    } else if(success == 0) {
                        toasting('Ralat telah berlaku, Data telah gagal dipadam', 'error');
                    }
                },
            }
        });
    }
});

$(document).on('click','.upload-lampiran', function(){
    let upload = $('#lampiran_beban')[0].files[0];

    let data = new FormData();
    data.append('_token', getToken());
    data.append('lampiran_beban',upload);
    data.append('nokp',$('input[name="nokp"]').val());

    $.ajax({
        type:'POST',
        url: '/form/api/bebankerja',
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

$(document).on('change', '.pinjam-status, .upload-harta, .upload-beban .penyata_bayaran, .cuti-upload', function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('pinjam-status')) {
        var value = selectedClass.val();
        if(value == 0) {
            $('.div-loan-1').hide();
            $('.div-loan-2').hide();
            $('.div-loan-3').hide();
            $('.div-loan-4').hide();
            $('.div-loan-5').hide();
            $('.div-loan-6').hide();
            $('.div-loan-7').hide();
        } else if(value == 1) {
            $('.div-loan-1').show();
            $('.div-loan-2').show();
            $('.div-loan-3').show();
            $('.div-loan-4').show();
            $('.div-loan-7').show();
        } else if(value == 2) {
            $('.div-loan-1').show();
            $('.div-loan-2').show();
            $('.div-loan-3').show();
            $('.div-loan-4').show();
            $('.div-loan-5').show();
            $('.div-loan-7').show();
        } else if(value == 3) {
            $('.div-loan-1').show();
            $('.div-loan-2').show();
            $('.div-loan-3').show();
            $('.div-loan-4').show();
            $('.div-loan-6').show();
            $('.div-loan-7').show();
        }
    } else if(selectedClass.hasClass('upload-harta')) {
        //var form = $('#upload-harta')[0];
        let data = new FormData();
        var file = $('#lampiran_E')[0].files[0];
        data.append('_token', getToken());
        data.append('formdata',$('input[name="_formdata"]').val());
        data.append('lampiran_e',file);
        $('.harta-file').html(file.name);
        $.ajax({
            type:'POST',
            url: '/form/api/property/save',
            data:data,
            processData: false,
            contentType: false,
            context: this,
            success: function(resp) {
                let d = resp.success;
                if(d == 1) {
                    toasting('Dokumen berjaya sudah dimuat naik', 'success');
                } else {
                    toasting('Ralat telah berlaku, Dokumen telah gagal dimuat naik', 'error');
                }
            }
        });
     } else if(selectedClass.hasClass('upload-beban')) {
        //var form = $('#upload-harta')[0];
        let data = new FormData();
        var file = $('#lampiran_beban')[0].files[0];
        data.append('_token', getToken());
        data.append('formdata',$('input[name="_formdata"]').val());
        data.append('lampiran_beban',file);
        $('.lampiran_beban').html(file.name);
        $.ajax({
            type:'POST',
            url: '/form/api/bebankerja',
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
    } else if(selectedClass.hasClass('penyata_bayaran')) {
        let data = new FormData();
        var file = $('.penyata_bayaran')[0].files[0];
        data.append('_token', getToken());
        data.append('status',$('.pinjam-status').val());
        data.append('nama',$('.nama_tabung').val());
        data.append('jumlah',$('.jumlah_pinjaman').val());
        data.append('mula',$('.mula_pinjam').val());
        data.append('akhir',$('.akhir_pinjam').val());
        data.append('bayar',$('.bayar_mula').val());
        data.append('selesai',$('.selesai_bayar').val());
        data.append('penyata_bayaran',file);
        data.append('formdata',$('._formid').val());
        $('.loan-file').html(file.name);
        $.ajax({
            type:'POST',
            url: '/form/api/loan/save',
            data:data,
            processData: false,
            contentType: false,
            context: this,
            success: function(resp) {
                let d = resp.success;
                if(d == 1) {
                    toasting('Dokumen berjaya sudah dimuat naik', 'success');
                } else {
                    toasting('Ralat telah berlaku, Dokumen telah gagal dimuat naik', 'error');
                }
            }
        });
    } else if(selectedClass.hasClass('cuti-upload')) {
        let data = new FormData();
        var file =$('.cuti-upload')[0].files[0];
        data.append('_token', getToken());
        data.append('pemohon_id',$('._formid').val());
        data.append('borang_pengesahan',file);
        $('.cuti-file').html(file.name);
        $.ajax({
            type:'POST',
            url: '/form/api/cuti/upload',
            data:data,
            processData: false,
            contentType: false,
            context: this,
            success: function(resp) {
                let d = resp.success;
                if(d == 1) {
                    toasting('Dokumen berjaya sudah dimuat naik', 'success');
                } else {
                    toasting('Ralat telah berlaku, Dokumen telah gagal dimuat naik', 'error');
                }
            }
        });
    }

});

$(document).on('change', '.pengguna-carian', function(){
    let no_ic = $(this).val();
    let data = new FormData;
    data.append('no_ic', no_ic);
    //data.append('_token', getToken());
    $.ajax({
        type:'GET',
        url: getUrl() + '/admin/pengguna/api?no_ic='+no_ic,
        dataType: "json",
        processData: false,
        contentType: false,
        context: this,
        success: function(data) {
            let result = data.data;
            $('.pengguna-nama').val(result.nama);
            $('.pengguna-email').val(result.emel);
            $('.pengguna-nokp').val(result.nokp);
            $('.pengguna-cawangan').val(result.cawangan);
            $('.pengguna-bahagian').val(result.bahagian);
            $('.pengguna-unit').val(result.unit);
            $('.pengguna-pejabat').val(result.pejabat);
            $('.pengguna-jawatan').val(result.jawatan+' '+result.gred);
        }
    });
});

$(document).on('change', '.pegawai-carian', function(){
    let no_ic = $(this).val();
    let data = new FormData;
    data.append('no_ic', no_ic);
    //data.append('_token', getToken());
    $.ajax({
        type:'GET',
        url: getUrl() + '/admin/pengguna/api?no_ic='+no_ic,
        dataType: "json",
        processData: false,
        contentType: false,
        context: this,
        success: function(data) {
            let result = data.data;
            $('.pegawai-nama').val(result.nama);
            $('.pegawai-email').val(result.emel);
            $('.pegawai-nokp').val(result.nokp);
            $('.pegawai-cawangan').val(result.cawangan);
            $('.pegawai-bahagian').val(result.bahagian);
            $('.pegawai-unit').val(result.unit);
            $('.pegawai-pejabat').val(result.pejabat);
            $('.pegawai-jawatan').val(result.jawatan+' '+result.gred);
        }
    });
});


