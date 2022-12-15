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

    static downloadForm({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(success){
                //pemangku/tawaran/preview-pdf/{id_pemohon}
                window.open(getUrl() + '/pemangku/tawaran/preview-pdf/'+data.get('pemohon_id'),'_blank');
            }
        });
    }
}
