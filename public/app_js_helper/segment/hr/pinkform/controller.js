class PinkFormController extends Ajax{
    static hantarForm({url, data}){
        this.runAjax({
            url : url,
            data: data,
            func: function(data){
                if(data.success == 1) {
                    ToastAlert.toasting('Success', 'Borang Berjaya Dihantar Kepada Pemangku', 'success');
                } else {
                    ToastAlert.toasting('Failed', 'Borang Gagal Dihantar Kepada Pemangku', 'error');
                }
                DatatableUI.reloadTable('.pinkform-table');
                $('#pinkform-modal').modal('hide');
                $('#pinkform-edit').modal('hide');
            }
        });
    }

    static kemaskiniForm({url, data}){
        this.runAjax({
            url : url,
            data: data,
            func: function(data){
                if(data.success == 1) {
                    ToastAlert.toasting('Success', 'Borang Berjaya Disimpan', 'success');
                } else {
                    ToastAlert.toasting('Failed', 'Borang Gagal Disimpan', 'error');
                }
                DatatableUI.reloadTable('.pinkform-table');
                $('#pinkform-modal').modal('hide');
                $('#pinkform-edit').modal('hide');
            }
        });
    }

    static resendEmail({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(data){
                if(data.success == 1) {
                    ToastAlert.toasting('Success', 'Email Berjaya Dihantar', 'success');
                } else {
                    ToastAlert.toasting('Failed', 'Email Gagal Dihantar', 'error');
                }
                DatatableUI.reloadTable('.pinkform-table');
                //$('#pinkform-modal').modal('hide');
            }
        });
    }

    static loadPink({url}){
        this.getAjax({
            url: url,
            func: function(data) {

                if(data.success == 1) {
                    $('#pinkform-name-1').val(data.data.name);
                    $('#pinkform-tkh-lapor-diri-1').val(data.data.date_reportin);
                    $('#pinkform-kategori-1').val(data.data.cate).attr('selected','selected');
                    $('#pinkform-jenis-penempatan-1').val(data.data.type).attr('selected','selected');
                    $('#pinkform-catatan-1').val(data.data.remark);
                    $('#pinkform-emailcc-1').val(data.data.cc);
                    $('#pink-id').val(data.data.id);

                } else {
                    ToastAlert.toasting('Failed', 'Pink Form gagal dipapar', 'error');
                }


                ModalUI.modal({
                    selector: '#pinkform-edit',
                    mode: 'show',
                    color: 'modal-warning',
                    label: 'Kemaskini Pink Form',
                });
            }
        });
    }
}
