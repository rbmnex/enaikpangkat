class SoalanController extends Ajax{
    static hantarForm({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(postData){
                if(postData.data.trigger == 0){
                    ToastAlert.toasting('Anda Tidak Setuju', 'Borang Dihantar!', 'success');
                }else{
                    ToastAlert.toasting('Anda Tidak Setuju', 'Borang Dihantar!', 'error');
                }

                $('#soalan-modal').modal('hide');
            }
        });
    }
}
