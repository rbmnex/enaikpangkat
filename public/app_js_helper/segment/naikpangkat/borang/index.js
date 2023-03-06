$(document).on('click','.btn-submit, .btn-download, .radio-accept, .btn-preview',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('btn-submit')) {
        //$('#modal-cuti').modal('show');
        let process = validate_form();
        if(process) {
            // submit proccess
            var data = new FormData;
            data.append('_token', getToken());
            data.append('id_pemohon',$('input[name="_formid"]').val());
            data.append('accept',$('.radio-accept').filter(':checked').val());
            data.append('alasan',$('.alasan_tolak').val());
            data.append('ketua_nokp',$('.pegawai-nokp').val());
            data.append('kerani_nokp',$('.pengguna-nokp').val());
            data.append('penyelia_nokp',$('.penyelia-nokp').val());
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
                    url : '/naikpangkat/ukp13/api/normal-submit',
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
        window.open(getUrl() + '/naikpangkat/ukp13/download/part?dataform='+dataform,'_blank');

    } else if(selectedClass.hasClass('radio-accept')) {
        let result = selectedClass.val();
        if(result == 1) {
            $('.reason_reject').hide();
        } else {
            $('.reason_reject').show();
        }
    } else if(selectedClass.hasClass('btn-preview')) {
        let process = validate_form();
        if(process) {
            // submit proccess
            var data = new FormData;
            data.append('_token', getToken());
            data.append('id_pemohon',$('input[name="_formid"]').val());
            data.append('accept',$('.radio-accept').filter(':checked').val());
            data.append('alasan',$('.alasan_tolak').val());
            data.append('ketua_nokp',$('.pegawai-nokp').val());
            data.append('kerani_nokp',$('.pengguna-nokp').val());
            data.append('penyelia_nokp',$('.penyelia-nokp').val());
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

            let id_pemohon = $('input[name="_formid"]').val();
            let url = getUrl() + '/form/ukp13/nview/'+id_pemohon+'?view=n'
            let target = '_blank';

            $.ajax({
                type:'POST',
                url: getUrl() + '/naikpangkat/ukp13/api/preview-download',
                data:data,
                processData: false,
                contentType: false,
                context: this,
                success: function(resp) {
                    let d = resp.success;
                    if(d == 1) {
                        //toasting('Dokumen berjaya sudah dimuat naik', 'success');
                        window.open(url,target);
                    } else {
                        toasting('Ralat telah berlaku, Dokumen telah gagal dimuat turun', 'error');
                    }
                }
            });
        }
    }
});

$(document).on('change', '.pinjam-status, .upload-harta, .penyata_bayaran, .cuti-upload, .upload-work', function() {
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
        data.append('id_pemohon',$('input[name="_formid"]').val());
        data.append('upload_file',file);
        data.append('type','harta');
        Ukp13Controller.upload({
            data: data,
            selector: '.harta-file'
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
        data.append('upload_file',file);
        data.append('id_pemohon',$('input[name="_formid"]').val());
        data.append('type','pinjaman_pendidikan');
        Ukp13Controller.upload({
            data: data,
            selector: '.loan-file'
        });

    } else if(selectedClass.hasClass('cuti-upload')) {
        let data = new FormData();
        var file =$('.cuti-upload')[0].files[0];
        data.append('_token', getToken());
        data.append('id_pemohon',$('._formid').val());
        data.append('upload_file',file);
        data.append('type','cuti');
        Ukp13Controller.upload({
            data: data,
            selector: '.cuti-file'
        });

    } else if(selectedClass.hasClass('upload-work')) {
        let data = new FormData();
        var file =$('.cuti-upload')[0].files[0];
        data.append('_token', getToken());
        data.append('id_pemohon',$('._formid').val());
        data.append('upload_file',file);
        data.append('type','work');
        Ukp13Controller.upload({
            data: data,
            selector: '.work-file'
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

$(document).on('change', '.penyelia-carian', function(){
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
            $('.penyelia-nama').val(result.nama);
            $('.penyelia-email').val(result.emel);
            $('.penyelia-nokp').val(result.nokp);
            $('.penyelia-cawangan').val(result.cawangan);
            $('.penyelia-bahagian').val(result.bahagian);
            $('.penyelia-unit').val(result.unit);
            $('.penyelia-pejabat').val(result.pejabat);
            $('.penyelia-jawatan').val(result.jawatan+' '+result.gred);
        }
    });
});

