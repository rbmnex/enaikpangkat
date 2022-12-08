$(document).on('click','.open-update, .open-offer, .open-reportin',function() {
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
    }
});
