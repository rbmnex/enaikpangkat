$(document).on('click', '.update-pinkform', function(){
    $('#pemohon-id').val($(this).closest('tr').attr('data-pemohon-id'));

    ModalUI.modal({
        selector: '#pinkform-modal',
        mode: 'show',
        color: 'modal-info',
        label: 'Hantar Pink Form',
    });
});

$(document).on('click', '#pinkform-hantar', function(){

});

$(document).on('click', '#pinkform-hantar', function(){
   let validate = new Validation();
   let curThis = $(this);
   let trigger = '';

    let v = validate.checkEmpty(
        validate.getValue('#pinkform-name', 'mix', 'Nama', 'pinkform_name'),
        validate.getValue('#pinkform-tkh-lapor-diri', 'mix', 'Tarikh Lapor Diri', 'pinkform_tkh'),
        validate.getValue('#pinkform-borang', 'picture', 'Borang', 'pinkform_borang')
    );

    v.append('pemohon_id', $('#pemohon-id').val());

    PinkFormController.hantarForm({
        url: 'hr2/pinkform/hantar',
        data: v,
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
