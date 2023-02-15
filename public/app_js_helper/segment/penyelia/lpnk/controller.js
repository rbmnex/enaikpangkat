class SoalanController extends Ajax{
    static hantarForm({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(postData){
                if(postData.data.trigger == 0){
                    ToastAlert.toasting('Anda Setuju', 'Borang Dihantar!', 'success');
                    window.open(getUrl() + '/penyelia/lpnk','_self');
                }else{
                    ToastAlert.toasting('Anda Tidak Setuju', 'Borang Dihantar!', 'error');
                }

                $('#soalan-modal').modal('hide');

            }
        });
    }
}
