$(document).on('click','.view-form, .view-full, .verdict-applicant', function() {
    let selectedElement = $(this);

    if(selectedElement.hasClass('view-form')) {
        let id_pemohon = selectedElement.closest('tr').attr('data-pemohon-id');
        let url = getUrl() + '/form/ukp13/nview/'+id_pemohon+'?view=l';
        window.open(url,'_blank');
    } else if(selectedElement.hasClass('view-full')) {
        var pemohon_id = selectedElement.closest('tr').attr('data-pemohon-id');
        window.open(getUrl() + '/form/ukp13/download/view?dataform='+pemohon_id,'_blank');
    } else if(selectedElement.hasClass('verdict-applicant')) {
        var pemohon_id = selectedElement.closest('tr').attr('data-pemohon-id');

        SwalUI.init({
            title: "Adakah Anda Pasti?",
            subtitle: "Calon telah berjaya untuk naik pangkat",
            icon: "info",
            confirmText: "Pasti ?",
            callback: function() {

            }
        });
    }
});
