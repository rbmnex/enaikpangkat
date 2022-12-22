class TawaranUpdateController extends Ajax{

    static hantarForm({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(success){
                ToastAlert.toasting('Success', 'Borang Telah Dihantar Kepada Ketua Bahagian Untuk Disahkan', 'success');
                window.open(Common.getUrl() + '/user/form','_self');
            }
        });
    }

    static downloadForm({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(success){
                //pemangku/tawaran/preview-pdf/{id_pemohon}
                window.open(Common.getUrl() + '/pemangku/tawaran/preview-pdf/'+data.get('pemohon_id'),'_blank');
            }
        });
    }

    static uploadForm({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(success){
                //pemangku/tawaran/preview-pdf/{id_pemohon}
                ToastAlert.toasting('Success', 'Berjaya Dimuat naik', 'success');
            }
        });
    }
}
