var token = $('._token').val();

function getUrl(){
    // let basePath = window.location.pathname.split("/");
    // if(basePath[1]) {
    //     return window.location.origin+"/"+basePath[1];
    // } else {
    //     return window.location.origin;
    // }
    return window.location.origin;
}


function getToken(){
    return $('._token').val();
}

function postEmptyFields(fieldArray){
    for(var x = 0;x<fieldArray.length;x++){
        var inputClass = fieldArray[x][0];
        var inputType = fieldArray[x][1];

        if(inputType == 'text'){
            $(inputClass).val('').closest('.form-group').find('.invalid-feedback').html('');
        }else if(inputType == 'dropdown'){
            $(inputClass).val('').trigger('change').closest('.form-group').find('.invalid-feedback').html('');
        }else if(inputType == 'photo'){
			$(inputClass).attr('style', '');
		}else if(inputType == 'checkbox'){
            $(inputClass).each(function(i, obj) {
                var check = $(this).prop('checked');
                if(check){
                    $(this).prop('checked', false);
                }
            });
        }
    }
}

function dropdown_populate(selectorClass, inputClass, listType, model, queryString = [], postfunc = 0){
    let data = new FormData();
    data.append('model', model);
    data.append('queryString', JSON.stringify(queryString));
    data.append('_token', token);

    ajax_common('POST', '/common/get-listing', data, postfunc, selectorClass, inputClass, listType);
}

function ajax_common(methods,url, data, postfunc, selectorClass, inputClass, listType){
    $.ajax({
        type:methods,
        url:getUrl() + url,
        data:data,
        dataType: "json",
        processData: false,
        contentType: false,
        context: this,
        success: function(data) {
            let append = '';
            let getData = data.data;
            let getDataLength = getData.length;
            if(postfunc === 0) {
                if (data.success === 1) {
                    $(selectorClass).empty();
                    if (getDataLength > 0) {
                        for (let x = 0; x < data.data.length; x++) {
                            if (listType === 'dropdown') {
                                if (x === 0) {
                                    append += '<option value="">--Sila Pilih--</option>';
                                }
                                append += '<option value="' + data.data[x].value + '">' + data.data[x].label + '</option>';
                            }else if(listType === 'checkbox'){
                                append += '<div class="col-xl-3 col-md-4 col-12">' +
                                    '<div class="form-group">' +
                                        '<div class="custom-control custom-control-primary custom-checkbox">' +
                                            '<input type="checkbox" class="custom-control-input '+ inputClass +'" id="'+ data['data'][x]['value'] +'" data-role-id="'+ data['data'][x]['value'] +'"/>' +
                                            '<label class="custom-control-label" for="'+ data['data'][x]['value'] +'">'+ data['data'][x]['label'] +'</label>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
                            }
                        }
                    }
                    $(selectorClass).append(append);
                }
            }else if(postfunc === 1) {
                if (data.success === 1) {
                    $(selectorClass).find('.profile-relation-relation').empty();
                    if (getDataLength > 0) {
                        for (let x = 0; x < data.data.length; x++) {
                            if (listType === 'dropdown') {
                                if (x === 0) {
                                    append += '<option value="">Please Select</option>';
                                }
                                append += '<option value="' + data.data[x].value + '">' + data.data[x].label + '</option>';
                            }
                        }
                    }
                    $(selectorClass).find('.profile-relation-relation').append(append).select2();
                }
            }
        }
    });
}

function swalAjax({titleText, mainText, icon, confirmButtonText, postData}){
    Swal.fire({
        title: titleText,
        text: mainText,
        icon: icon,
        showCancelButton: true,
        confirmButtonText: confirmButtonText,
        customClass: {
            confirmButton: 'btn btn-warning',
            cancelButton: 'btn btn-outline-danger ml-1'
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {

            swalAjaxFire(postData);
        }
    });
}

function swalAjaxFire(postData){
    let url = postData.url;
    let data = postData.data;
    let postfunc = postData.postfunc;

    $.blockUI();
    $.ajax({
        type:'POST',
        url: getUrl() + url,
        data:data,
        dataType: "json",
        processData: false,
        contentType: false,
        context: this,
        success: function(data) {

            postfunc(data);

            $.unblockUI();
        }
    });
}

function swalPostFire(icon, title, mainText){
    Swal.fire({
        icon: icon,
        title: title,
        text: mainText,
        customClass: {
            confirmButton: 'btn btn-success'
        }
    });
}
