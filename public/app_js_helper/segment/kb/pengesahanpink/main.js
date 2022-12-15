$(document).on('click', '.semak-pengesahan', function(){
    let pemohon_id = $(this).attr('data-pemohon');
    window.location.href = Common.getUrl() + '/kb/pengesahan-pink/update-pengesahan/' + pemohon_id;
});

$(document).on('click', '#button-setuju, #button-tidak-setuju', function(){
    let pressed_check = $('#pressed-check').val();

    if(pressed_check == 0){
        alert('Sila Preview Borang Tawaran Terdahulu');
        return false;
    }
});

$(document).on('click', '.semak-pdf', function(){
    $('#pressed-check').val(1);
});
