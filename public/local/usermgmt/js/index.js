$(document).on('change', '.pengguna-carian', function(){
    let no_ic = $(this).val();
    let data = new FormData;
    data.append('no_ic', no_ic);
    //data.append('_token', getToken());
    load_user(no_ic,false);
});

$(document).on('click','.add-pengguna, .pengguna-info',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('add-pengguna')){
        postEmptyFields([
            ['.pengguna-nama', 'text'],
            ['.pengguna-email', 'text'],
            ['.pengguna-nokp', 'text'],
            ['.pengguna-cawangan', 'text'],
            ['.pengguna-bahagian', 'text'],
            ['.pengguna-unit', 'text'],
            ['.pengguna-pejabat', 'text'],
            ['.pengguna-jawatan', 'text'],
            ['.pengguna-role', 'checkbox'],
        ]);
        $('.post-add-pengguna').html('Tambah');
        $('.hidden-ops').val(0);
        $('.pengguna-modal').modal('show');
    } else if(selectedClass.hasClass('pengguna-info')) {
        let no_ic = selectedClass.closest('tr').attr('data-nokp');
        postEmptyFields([
            ['.pengguna-nama', 'text'],
            ['.pengguna-email', 'text'],
            ['.pengguna-nokp', 'text'],
            ['.pengguna-cawangan', 'text'],
            ['.pengguna-bahagian', 'text'],
            ['.pengguna-unit', 'text'],
            ['.pengguna-pejabat', 'text'],
            ['.pengguna-jawatan', 'text'],
            ['.pengguna-role', 'checkbox'],
        ]);
        load_user(no_ic);
        $('.post-add-pengguna').html('Kemaskini');
        $('.pengguna-modal').modal('show');
    }
});

$(document).on('click', '.post-add-pengguna', function() {
    let operation =  $('.hidden-ops').val();

    let roleArr = new Array();
    $('.pengguna-role').each(function(){
        if($(this).prop('checked') == true){
            roleArr.push($(this).attr('data-role-id'));
        }
    });
    var data = new FormData;
    data.append('roles',JSON.stringify(roleArr));
    data.append('ops', operation);
    data.append('_token', getToken());
    if(operation) {
        data.append('userid',$('.hidden-user-id').val());
    } else {
        data.append('nokp',$('.pengguna-nokp').val());
    }

    swalAjax({
        titleText : 'Adakah Anda Pasti?',
        mainText : 'Pengguna akan ditambah',
        icon: 'info',
        confirmButtonText: 'Tambah',
        postData: {
            url : '/admin/pengguna/api',
            data: data,
            postfunc: function(data) {
                let success = data.success;
                let parseData = data.data;
                if(success == 1) {
                    if(parseData.ops) {
                        toasting('Data sudah berjaya dikemaskini', 'success');
                    } else {
                        toasting('Data sudah berjaya ditambah', 'success');
                    }
                } else if(success == 0) {
                    //swalPostFire('error', 'Gagal Ditambah', 'Ralat telah berlaku');
                    toasting('Ralat telah berlaku, Data telah gagal disimpan', 'error');
                }

            },
        }
    });
});
