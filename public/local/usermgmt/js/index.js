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
        $('.pengguna-modal').modal('show');
    } else if(selectedClass.hasClass('pengguna-info')) {
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
        load_user(no_ic,true);
    }
});
