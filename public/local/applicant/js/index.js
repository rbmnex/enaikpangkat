$(document).on('click','.view-form, .back-main',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('view-form')) {
        let pemohon_id =  selectedClass.closest('tr').attr('data-pemohon-id');
    //    let pemohonan_id = $('#hdn_id_application').val();
        window.open(getUrl() + '/form/ukp12/view/'+pemohon_id,'_self');
    } else if(selectedClass.has('back-main')) {
        window.open(getUrl() + '/urussetia/appl/main/','_self');
    }
});
