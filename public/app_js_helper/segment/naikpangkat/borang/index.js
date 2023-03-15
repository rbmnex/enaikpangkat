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

$(document).on('click','.add-kerja, .delete-kerja, .tambah-kerja, .update-kerja',function() {
    let selectedDom = $(this);

    let btnDel = '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-kerja">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>';
    let btnModify = '<button type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light update-kerja">'+ feather.icons['edit-2'].toSvg() +' Kemaskini</button>';

    let act = $('#modal-act').val();
    let type = $('#modal-type').val();
    let indicator = $('#modal-indicator').val();
    let target = $('#modal-target').val();
    let achieve = $('#modal-achieve').val();
    let remark = $('#modal-remark').val();

    let validate = new Validation();
    let dt = new FormData();

    if(selectedDom.hasClass('add-kerja')) {
        dt = validate.checkEmpty(
            validate.getValue('#modal-act', 'mix', 'AKTIVITI / PROJEK / KETERANGAN', 'aktiviti'),
            validate.getValue('#modal-type', 'mix', 'JENIS PETUNJUK', 'petunjuk'),
            validate.getValue('#modal-indicator', 'mix', 'PETUNJUK PRESTASI', 'prestasi'),
            validate.getValue('#modal-target', 'mix', 'SASARAN KERJA', 'sasaran'),
            validate.getValue('#modal-achieve', 'mix', 'PENCAPAIAN SEBENAR', 'pencapaian'),
        );

        dt.append('ulasan',remark);
        dt.append('id',$("#hdn-id-work").val());
        dt.append('pemohon',$('#_formid').val());

        let row = [];
        row.push('');
        row.push(act);
        row.push('<b>'+type+'</b><br/>'+indicator);
        row.push(target);
        row.push(achieve);
        row.push(remark);
        row.push(btnModify+btnDel);

        let url = 'naikpangkat/ukp13/api/save-work';

        SwalUI.init({
            title: "Adakah Anda Pasti?",
            subtitle: "Data akan disimpan",
            icon: "info",
            confirmText: "Simpan",
            callback: function() {
                Ukp13Controller.crud_work({
                    data: dt,
                    url : url,
                    func: function resp(resp) {
                        let d = resp.success;
                        let r = resp.data;
                        if(d == 1) {
                            toasting('Data sudah disimpan', 'success');
                            if(r.ref == 0) {
                                add_row('#tbody-kerja',row,'data-work-id='+r.id);
                            } else {
                                modify_row('#tbody-kerja tr[data-work-id="' + r.id + '"]',row);
                            }
                        } else {
                            toasting('Ralat telah berlaku, Data gagal disimpan', 'error');
                        }
                    }
                });
            }
        });

        $('#modal-kerja').modal('hide');

    } else if(selectedDom.hasClass('delete-kerja')) {
        let kerja_id  = selectedDom.closest('tr').attr('data-work-id');
        let data = new FormData();
        data.append('_token', Common.getToken());
        data.append('kerja_id', kerja_id);

        let url = 'naikpangkat/ukp13/api/delete-work';

        SwalUI.init({
            title: "Adakah Anda Pasti?",
            subtitle: "Data akan disimpan",
            icon: "warning",
            confirmText: "Hapus",
            callback: function() {
                Ukp13Controller.crud_work({
                    data: data,
                    url : url,
                    func: function resp(resp) {
                        let d = resp.success;
                        if(d == 1) {
                            toasting('Data sudah dihapus', 'success');
                            remove_row(selectedDom);
                        } else {
                            toasting('Ralat telah berlaku, Data gagal dihapus', 'error');
                        }
                    }
                });
            }
        });
    } else if(selectedDom.hasClass('update-kerja')) {
        let kerja_id  = selectedDom.closest('tr').attr('data-work-id');
        let url = '/naikpangkat/ukp13/api/load-work/';
        $("#hdn-id-work").val(kerja_id);

        $.ajax({
            type:'GET',
            url: Common.getUrl() + url + kerja_id,
            dataType: "json",
            processData: false,
            contentType: false,
            context: this,
            success: function(resp) {
                let d = resp.success;
                let result = resp.data;
                if(d == 1) {
                   $('#modal-act').val(result.aktviti);
                   $('#modal-type').val(result.jenis);
                   $('#modal-indicator').val(result.petunjuk);
                   $('#modal-target').val(result.sasaran);
                   $('#modal-achieve').val(result.pencapaian);
                   $('#modal-remark').val(result.ulasan);

                   $('#modal-kerja').modal('show');
                } else {
                    toasting('Ralat telah berlaku, Data gagal diambil', 'error');
                }

            }
        });
    } else if(selectedDom.hasClass('tambah-kerja')) {
        $("#hdn-id-work").val(0);
    }
});
