class SoalanController extends Ajax{
    static hantarForm({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(postData){
                if(postData.data.trigger == 0){
                    ToastAlert.toasting('Berjaya', 'Soalan Ditambah!', 'success');
                    DatatableUI.reloadTable('.lpnk-table');
                }else{
                    ToastAlert.toasting('Kemaskini', 'Soalan Dikemaskini!', 'warning');
                    DatatableUI.reloadTable('.lpnk-table');
                }


                $('#soalan-modal').modal('hide');
            }
        });
    }

    static hantarFormSub({url, data, trigger}){
        this.runAjax({
            url : url,
            data: data,
            func: function(postData){
                if(postData.data.trigger == 0){
                    ToastAlert.toasting('Berjaya', 'Soalan Ditambah!', 'success');
                    DatatableUI.reloadTable('.lpnk-sub-table');
                }else{
                    ToastAlert.toasting('Kemaskini', 'Soalan Dikemaskini!', 'warning');
                    $('#sub-soalan-name').val('');
                    $('#sub-soalan-name-penerangan').val('');
                    $('.sub-soalan-post').attr('style', '');
                    $('.sub-soalan-post-edit').attr('style', 'display:none;width:100%');
                    DatatableUI.reloadTable('.lpnk-sub-table');
                }
            }
        });
    }
}
