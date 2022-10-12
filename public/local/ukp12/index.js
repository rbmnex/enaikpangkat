$(document).on('click','.tambah-cuti',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('tambah-cuti')) {
        $('#modal-cuti').modal('show');
    }
});

$(document).on('click','.add-cuti, .add-perkhidmatan, .add-pertubuhan',function() {
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
                url : '/form/api/org',
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
            },
            method: 'DELETE'
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
            $('.pengguna-jawatan').val(result.jawatan);
        }
    });
});


