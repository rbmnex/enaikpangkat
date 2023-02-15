class CutiController extends Ajax{
    static hantar({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(postData){
                //
                if(postData.success == 1) {
                    ToastAlert.toasting('Berjaya', 'Cuti Berjaya Disimpan!', 'success');
                } else {
                    ToastAlert.toasting('Gagal', 'Berlaku Ralat!', 'error');
                }
                DatatableUI.reloadTable('.holiday-table');
                $('#cuti-modal').modal('hide');
            }
        });
    }

    static load({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(postData){
                //
                if(postData.success == 1) {
                    let obj = postData.data;
                    $('#holiday-name').val(obj.nama);
                    $('#holiday-desc').val(obj.penerangan);
                    $('#holiday-date').val(obj.tarikh);
                    $('#holiday-length').val(obj.tempoh);
                    $('#id-holiday').val(obj.id);

                    ModalUI.modal({
                        selector: '#cuti-modal',
                        mode: 'show',
                        color: 'modal-success',
                        label: 'Kemaskini Cuti',
                        buttonMode: [
                            {
                                selector: '#holiday-save',
                                show: false,
                            },
                            {
                                selector: '#holiday-update',
                                show: true,
                            }
                        ]
                    });
                } else {
                    ToastAlert.toasting('Gagal', 'Berlaku Ralat!', 'error');
                }
            }
        });
    }

    static toggle({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(postData){
                //
                if(postData.success == 1) {
                    ToastAlert.toasting('Berjaya', 'Status Berjaya Diubah!', 'success');
                } else {
                    ToastAlert.toasting('Gagal', 'Berlaku Ralat!', 'error');
                }
                DatatableUI.reloadTable('.holiday-table');
            }
        });
    }

    static delete({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(postData){
                //
                if(postData.success == 1) {
                    ToastAlert.toasting('Berjaya', 'Cuti Berjaya Dipadam!', 'success');
                } else {
                    ToastAlert.toasting('Gagal', 'Berlaku Ralat!', 'error');
                }
                DatatableUI.reloadTable('.holiday-table');
            }
        });
    }
}
