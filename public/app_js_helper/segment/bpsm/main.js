$(document).on('click', '#add-soalan-modal', function(){
    ModalUI.modal({
        selector: '#soalan-modal',
        mode: 'show',
        color: 'modal-success',
        label: 'Soalan Baru',
        buttonMode: [
            {
                selector: '.soalan-post',
                show: true,
            },
            {
                selector: '.soalan-post-edit',
                show: false,
            }
        ]
    });
});

$(document).on('click', '.soalan-kemaskini', function(){
    let id = $(this).closest('tr').attr('data-soalan-id');
    $('#soalan-id').val(id);

    let data = Common.emptyRequest();
    data.append('soalan_id', id);

    Ajax.runAjax({
        url : 'bpsm/question/get-soalan',
        data: data,
        func: function(postData){
            $('#soalan-name').val(postData.data.nama);

            ModalUI.modal({
                selector: '#soalan-modal',
                mode: 'show',
                color: 'modal-warning',
                label: 'Kemaskini Soalan',
                buttonMode: [
                    {
                        selector: '.soalan-post',
                        show: false,
                    },
                    {
                        selector: '.soalan-post-edit',
                        show: true,
                    }
                ]
            });
        }
    });
});

$(document).on('click', '.soalan-post, .soalan-post-edit', function(){
   let validate = new Validation();
   let curThis = $(this);
   let trigger = '';

    let v = validate.checkEmpty(
        validate.getValue('#soalan-name', 'mix', 'Soalan', 'soalan_name')
    );

    v.append('soalan_id', $('#soalan-id').val());

    if(curThis.hasClass('soalan-post')){
        trigger = 0;
    }else{
        trigger = 1;
    }

    v.append('trigger', trigger);

    SoalanController.hantarForm({
        url: 'bpsm/question/soalan-post',
        data: v,
    });
});

$(document).on('click', '.soalan-padam, .sub-soalan-padam', function (){
    if(!confirm('Adakah Anda Pasti Untuk Memadam Soalan Ini?')){
        return false;
    }

    let curThis = $(this);
    let id = $(this).closest('tr').attr('data-soalan-id');
    let url = '';

    if(curThis.hasClass('soalan-padam')){
        url = 'bpsm/question/delete-soalan-post';
    }else{
        url = 'bpsm/question/delete-sub-soalan-post';
    }

    let data = Common.emptyRequest();
    data.append('id', id);

    Ajax.runAjax({
        url : url,
        data: data,
        func: function(postData){
            alert('Soalan Dipadam');
            if(curThis.hasClass('soalan-padam')){
                DatatableUI.reloadTable('.lpnk-table');
            }else{
                DatatableUI.reloadTable('.lpnk-sub-table');
            }
        }
    });
});

$(document).on('click', '.soalan-sub-modal', function(){
    let id = $(this).closest('tr').attr('data-soalan-id');
    ModalUI.modal({
        selector: '#sub-soalan-modal',
        mode: 'show',
        color: 'modal-success',
        label: 'Sub Soalan',
        buttonMode: [
            {
                selector: '.sub-soalan-post',
                show: true,
            },
            {
                selector: '.sub-soalan-post-edit',
                show: false,
            }
        ],
        callback: function(){
            sub_soalan_table(id);
            $('#soalan-id').val(id);
        }
    });
});

$(document).on('click', '.sub-soalan-post, .sub-soalan-post-edit', function(){
    let validate = new Validation();
    let curThis = $(this);
    let trigger = '';

    let v = validate.checkEmpty(
        validate.getValue('#sub-soalan-name', 'mix', 'Soalan', 'sub_soalan_name'),
        validate.getValue('#sub-soalan-name-penerangan', 'mix', 'Penerangan', 'sub_soalan_name_penerangan')
    );

    v.append('sub_soalan_id', $('#sub-soalan-id').val());
    v.append('parent_id', $('#soalan-id').val());

    if(curThis.hasClass('sub-soalan-post')){
        trigger = 0;
    }else{
        trigger = 1;
    }

    v.append('trigger', trigger);

    SoalanController.hantarFormSub({
        url: 'bpsm/question/sub-soalan-post',
        data: v,
    });
});

$(document).on('click', '.sub-soalan-kemaskini', function(){
    let id = $(this).closest('tr').attr('data-soalan-id');
    $('#sub-soalan-id').val(id);

    let data = Common.emptyRequest();
    data.append('soalan_id', id);

    Ajax.runAjax({
        url : 'bpsm/question/get-sub-soalan',
        data: data,
        func: function(postData){
            $('#sub-soalan-name').val(postData.data.nama);
            $('#sub-soalan-name-penerangan').val(postData.data.penerangan);

            $('.sub-soalan-post').attr('style', 'display:none;width:100%');
            $('.sub-soalan-post-edit').attr('style', '');
        }
    });
});
