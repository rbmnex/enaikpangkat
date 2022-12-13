$(document).on('click',
'.open-update, .open-offer, .open-reportin, .form-promotion, .open-form12',
function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('open-update')) {
        let formId = selectedClass.closest('tr').attr('data-permohonan-id');
        let kp = selectedClass.closest('tr').attr('data-pemohon-nokp');
        window.open(getUrl() + '/form/ukp12/display/'+formId+'?kp='+kp,'_blank');
    } else if(selectedClass.hasClass('open-offer')) {
        let pemohon_id = selectedClass.closest('tr').attr('data-pemohon-id');
        window.open(getUrl() + '/user/form/pink/'+pemohon_id,'_blank');
    } else if(selectedClass.hasClass('open-reportin')) {
        let pemohon_id = selectedClass.closest('tr').attr('data-pemohon-id');
        window.open(getUrl() + '/pemangku/tawaran/update/'+pemohon_id,'_blank');
    } else if(selectedClass.hasClass('form-promotion')) {
        let pemohon_id = selectedClass.closest('tr').attr('data-pemohon-id');
        window.open(getUrl() + '/naikpangkat/ukp13/apply/'+pemohon_id,'_blank');
    } else if(selectedClass.hasClass('open-form12')) {
        let pemohon_id = selectedClass.closest('tr').attr('data-pemohon-id');
        window.open(getUrl() + '/form/ukp12/nview/'+pemohon_id+'?view=n','_self');
    }
});
