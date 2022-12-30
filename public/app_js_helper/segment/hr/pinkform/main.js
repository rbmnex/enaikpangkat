$(document).on('click', '.update-pinkform', function(){
    $('#pemohon-id').val($(this).closest('tr').attr('data-pemohon-id'));

    ModalUI.modal({
        selector: '#pinkform-modal',
        mode: 'show',
        color: 'modal-info',
        label: 'Hantar Pink Form',
    });
});

$(document).on('click', '.download-pinkform, .resend-pinkform', function(){
    let id = $(this).closest('tr').attr('data-pemohon-id');
    let selectedClass = $(this);
    if(selectedClass.hasClass('download-pinkform')) {
        window.open(getUrl() + '/hr2/pinkform/download-pink/'+id,'blank');
    } else if(selectedClass.hasClass('resend-pinkform')) {
        // cubaan hantar semula
        let id = $(this).closest('tr').attr('data-pemohon-id');
        let v = new FormData;
        v.append('_token', Common.getToken());
        v.append('pemohon_id',id);
        SwalUI.init({
            title: "Adakah Anda Pasti?",
            subtitle: "Email akan dihantar",
            icon: "info",
            confirmText: "Hantar",
            callback: function() {
                PinkFormController.resendEmail({
                    url: 'hr2/pinkform/resend',
                    data: v,
                });
            }
        });
    }
});

$(document).on('click', '#pinkform-hantar', function(){
   let validate = new Validation();
   let curThis = $(this);
   let trigger = '';

    let v = validate.checkEmpty(
        validate.getValue('#pinkform-name', 'mix', 'Nama', 'pinkform_name'),
        validate.getValue('#pinkform-tkh-lapor-diri', 'mix', 'Tarikh Lapor Diri', 'pinkform_tkh'),
        validate.getValue('#pinkform-borang', 'picture', 'Borang', 'pinkform_borang'),
        validate.getValue('#pinkform-alamat-pejabat', 'mix', 'Borang', 'pinkform_alamat'),
        validate.getValue('#pinkform-jenis-penempatan', 'mix', 'Borang', 'pinkform_jenis')
    );

    v.append('pemohon_id', $('#pemohon-id').val());

    SwalUI.init({
        title: "Adakah Anda Pasti?",
        subtitle: "Data akan dihantar",
        icon: "info",
        confirmText: "Hantar",
        callback: function() {
            PinkFormController.hantarForm({
                url: 'hr2/pinkform/hantar',
                data: v,
            });
        }
    });


});

$(document).on('click', '.fasiliti-activate', function(){
    let id = $(this).closest('tr').attr('data-fasiliti-id');
    let curThis = $(this);
    let trigger = '';

    if(curThis.hasClass('btn-outline-success')){
        curThis.removeClass('btn-outline-success').addClass('btn-outline-danger');
        trigger = 0;
    }else if(curThis.hasClass('btn-outline-danger')){
        curThis.removeClass('btn-outline-danger').addClass('btn-outline-success');
        trigger = 1;
    }

    let v = Common.emptyRequest();
    v.append('id', id);

    FasilitiController.activateFasiliti({
        url: 'admin/tetapan/fasiliti/activate',
        data: v,
        trigger: trigger
    });
});

$(document).on('click', '.fasiliti-delete', function (){
    let id = $(this).closest('tr').attr('data-fasiliti-id');
    let data = Common.emptyRequest();
    data.append('id', id);

    FasilitiController.deleteFasiliti({
        url: 'admin/tetapan/fasiliti/delete',
        data: data,
    });
});
