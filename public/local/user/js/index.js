$(document).on('click','.open-update, .open-offer',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('open-update')) {
        let formId = selectedClass.closest('tr').attr('data-permohonan-id');
        let kp = selectedClass.closest('tr').attr('data-pemohon-nokp');
        window.open(getUrl() + '/form/ukp12/display/'+formId+'?kp='+kp,'_blank');
    } else if(selectedClass.hasClass('open-update')) {
        let pemohon_id = selectedClass.closest('tr').attr('data-pemohon-id');
        window.open(getUrl() + '/user/form/pink/'+pemohon_id,'blank');
    }
});
