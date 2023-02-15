class CanController extends Ajax{
    static send({url, data}){
        this.runAjax({
            url : url,
            data: data,
            func: function(postData){
                //
                if(postData.success == 1) {
                    ToastAlert.toasting('Berjaya', 'Permohonan Berjaya Dihantar!', 'success');
                } else {
                    ToastAlert.toasting('Gagal', 'Berlaku Ralat!', 'error');
                }
                DatatableUI.reloadTable('.table-candidate');
            }
        });
    }
}
