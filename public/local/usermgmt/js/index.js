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
        $('.hidden-ops').val(1);
        $('.pengguna-modal').modal('show');
    }
});

$(document).on('click', '.post-add-pengguna', function() {
    let operation =  $('.hidden-ops').val();

    if(operation) {

    } else {

    }
});
