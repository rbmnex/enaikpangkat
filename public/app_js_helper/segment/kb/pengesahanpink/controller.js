class PinkFormController extends Ajax{
    static hantarForm({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(success){
                ToastAlert.toasting('Success', 'Borang Telah Dihantar Kepada Pemangku', 'success');
                DatatableUI.reloadTable('.pinkform-table');
                $('#pinkform-modal').modal('hide');
            }
        });
    }
}
