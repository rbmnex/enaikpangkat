class MemberController extends Ajax {
    static add_single({data}) {
        this.runAjax({
            url : 'urussetia/resume/member/addSingle',
            data : data,
            func: function(postData) {
                if(postData.success == 1) {
                    ToastAlert.toasting('Berjaya', 'Pegawai berjaya ditambah', 'success');
                } else {
                    ToastAlert.toasting('Gagal', 'Pegawai gagal ditambah', 'warning');
                }
                DatatableUI.reloadTable('.table-member');
                $('#officer-modal').modal('hide');
            }
        });
    }

    static delete_member({data}) {
        this.runAjax({
            url : 'urussetia/resume/member/delete',
            data : data,
            func: function(postData) {
                if(postData.success == 1) {
                    ToastAlert.toasting('Berjaya', 'Pegawai berjaya dihapus', 'success');
                } else {
                    ToastAlert.toasting('Gagal', 'Pegawai gagal dihapus', 'warning');
                }
                DatatableUI.reloadTable('.table-member');
            }
        });
    }

    static send_mail({data}) {
        this.runAjax({
            url : 'urussetia/resume/member/sendSingle',
            data : data,
            func: function(postData) {
                if(postData.success == 1) {
                    ToastAlert.toasting('Berjaya', 'Emel berjaya dihantar', 'success');
                } else {
                    ToastAlert.toasting('Gagal', 'Pegawai gagal dihantar', 'warning');
                }
                DatatableUI.reloadTable('.table-member');
            }
        });
    }
}
