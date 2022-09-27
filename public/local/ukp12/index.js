$(document).on('click','.tambah-cuti',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('tambah-cuti')) {
        $('#modal-cuti').modal('show');
    }
});

$(document).on('click','.add-cuti, .add-perkhidmatan',function() {
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
    }
});

$(document).on('click','.delete-row',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('delete-row')) {
        remove_row(selectedClass);
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


