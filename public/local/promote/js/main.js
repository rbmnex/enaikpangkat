$(document).on('click','.view-form', function() {
    let selectedElement = $(this);

    if(selectedElement.hasClass('view-form')) {
        let id_pemohon = selectedElement.closest('tr').attr('data-pemohon-id');
        let url = getUrl() + '/form/ukp13/nview/'+id_pemohon+'?view=l';
        window.open(url,'_blank');
    }
});
