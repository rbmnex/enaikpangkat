class TawaranUpdateController extends Ajax{
    static hantarForm({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(success){
                ToastAlert.toasting('Success', 'Borang Telah Dihantar Kepada Ketua Bahagian Untuk Disahkan', 'success');
            }
        });
    }
}
