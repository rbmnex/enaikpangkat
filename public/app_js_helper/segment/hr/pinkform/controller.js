class PinkFormController extends Ajax{
    static hantarForm({url, data, trigger}){
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
            }
        });
    }
}
