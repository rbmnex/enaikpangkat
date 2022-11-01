$(document).on('click','.delete-appliation, .view-applicant',function() {
    let selectedClass = $(this);
    let application_id =  selectedClass.closest('tr').attr('data-appl-id');
    var data = new FormData;
    data.append('_token', getToken());
    data.append('permohonan_id',application_id);
    if(selectedClass.hasClass('delete-appliation')) {
        swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Rekod akan dihapus',
            icon: 'info',
            confirmButtonText: 'Hapus',
            postData: {
                url : '/urussetia/appl/main/delete',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        //swalPostFire('success', 'Berjaya Disimpan', 'Data sudah disimpan');
                        toasting('Rekod sudah berjaya dihapus', 'success');
                    } else if(success == 0) {
                        //swalPostFire('error', 'Gagal Disimpan', 'Ralat telah berlaku');
                        toasting('Ralat telah berlaku, Rekod telah gagal dihapus', 'error');
                    }

                    DatatableUI.reloadTable('.table-borang');
                }
            }
        });
    } else if(selectedClass.hasClass('view-applicant')) {
        window.open(getUrl() + '/urussetia/appl/calon/main/'+application_id,'_self');
    }
});

$(document).on('click','.back-main',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('delete-appliation')) {
        window.open(getUrl() + '/urussetia/appl/main','_self');
    }
});
