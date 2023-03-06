$(document).on('click', '.post-tidak-setuju, .post-setuju', function(){
    let validate = new Validation();
    let curThis = $(this);
    let trigger = '';
    let pass = 0;
    let v = null;
    try{
        v = validate.checkEmpty(
            validate.getValue('#jumlah-pengawasan', 'int', 'Soalan', 'jumlah_pengawasan'),
            validate.getValue('.penyelia-ulasan', 'mix', 'Penerangan', 'ulasan')
            //validate.getValue('#skt', 'picture', 'SKT', 'skt')
        );
    }catch (e) {
        pass++;
    }

    let passinput = 0;
    let skorArr = [];
    $('.lpnk-skor').each(function(k, v){
        let curThis = $(this);
        if($(this).val() == '' || typeof $(this).val() == "undefined"){
            passinput++;
        }else{
            skorArr.push([curThis.attr('data-soalan-id') , $(this).val()]);
        }
    });

    if(pass > 0 || passinput > 0){
        ToastAlert.toasting('Tidak Berjaya', 'Sila Isi Semua Skor Dan Informasi Yang Diperlukan', 'error');
        return false;
    }
    v.append('skorArr', JSON.stringify(skorArr));
    v.append('id_permohonan', $('#id-permohonan').val());
    v.append('id_pemohon',$('#id-pemohon').val())

    if(curThis.hasClass('post-setuju')){
        trigger = 0;
    }else{
        trigger = 1;
    }

    v.append('trigger', trigger);

    SoalanController.hantarForm({
        url: 'penyelia/lpnk/post-borang',
        data: v,
    });
});
