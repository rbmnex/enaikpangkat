class Ukp13Controller extends Ajax{
    static upload({data, selector}){
        this.runAjax({
            url : 'naikpangkat/ukp13/api/upload',
            data: data,
            func: function(resp){
                let d = resp.success;
                if(d == 1) {
                    toasting('Fail berjaya sudah dimuat naik', 'success');
                    $(selector).html(resp.data.name);
                } else {
                    toasting('Ralat telah berlaku, Data telah gagal dimuat naik', 'error');
                }
            }
        });
    }
}
