$(document).on('click','.valid-applicant', function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('valid-applicant')) {
        let pemohon_id = selectedClass.closest('tr').attr('data-pemohon-id');
        let role = $('#hdn_role').val();
        let view = 'n'
        if(role == 'hos')
            view = 's';
        else if(role == 'hod')
            view = 'h';
        window.open(getUrl() + '/form/ukp12/nview/'+pemohon_id+'?view='+view,'_self');
    }
});
