class BatchController extends Ajax {
    static add_batch({data}) {
        this.runAjax({
            url : 'urussetia/resume/batch/add',
            data : data,
            func: function(postData) {
                if(postData.success == 1) {
                    ToastAlert.toasting('Berjaya', 'Kumpulan berjaya ditambah', 'success');
                } else {
                    ToastAlert.toasting('Gagal', 'kumpulan gagal ditambah', 'warning');
                }
                DatatableUI.reloadTable('.table-resumeb');
                $('#batch-modal').modal('hide');
            }
        });
    }

    static delete_batch({data}) {
        this.runAjax({
            url : 'urussetia/resume/batch/delete',
            data : data,
            func: function(postData) {
                if(postData.success == 1) {
                    ToastAlert.toasting('Berjaya', 'Kumpulan berjaya dihapus', 'success');
                } else {
                    ToastAlert.toasting('Gagal', 'kumpulan gagal dihapus', 'warning');
                }
                DatatableUI.reloadTable('.table-resumeb');
            }
        });
    }

    static send_all({data}) {
        this.runAjax({
            url : 'urussetia/resume/batch/sendAll',
            data : data,
            func: function(postData) {
                if(postData.success == 1) {
                    ToastAlert.toasting('Berjaya', 'Emel berjaya dihantar', 'success');
                } else {
                    ToastAlert.toasting('Gagal', 'Emel gagal dihantar', 'warning');
                }
                DatatableUI.reloadTable('.table-resumeb');
            }
        });
    }
}
