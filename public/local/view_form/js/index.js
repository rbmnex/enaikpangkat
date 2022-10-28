$(document).on('click','.btn-download',function() {
    let selectedClass = $(this);
    var file_id = $(this).attr('data-file-id');
    if(selectedClass.hasClass('btn-download')) {
        window.open(getUrl() + '/common/id-download?fileid='+file_id,'_blank');
    }
});
