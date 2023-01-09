$(document).on('click','.hantar-signal', function(){
    let data = new FormData;
    let nokp = $(this).closest('tr').attr('data-nokp');
    data.append('nokp', nokp);
    $.ajax({
        type:'GET',
        url: getUrl() + '/urussetia/resume/email/'+nokp,

        processData: false,
        contentType: false,
        context: this,
        success: function(resp) {
            let d = resp.success;
            if(d == 1) {
                toasting('Emel sudah dihantar', 'success');
            } else {
                toasting('Ralat telah berlaku, Data telah gagal dimuat naik', 'error');
            }
        }
    });
});


$(document).on('click','.selesai-lampiran', function(){
    let data = new FormData;
    let nokp = $(this).closest('tr').attr('data-nokp');
    data.append('nokp', nokp);
    $.ajax({
        type:'GET',
        url: getUrl() + '/urussetia/resume/lampiran/'+nokp,

        processData: false,
        contentType: false,
        context: this,
        success: function(resp) {
            let d = resp.success;
            if(d == 1) {
                toasting('Emel sudah dihantar', 'success');
            } else {
                toasting('Ralat telah berlaku, Data telah gagal dimuat naik', 'error');
            }
        }
    });
});
