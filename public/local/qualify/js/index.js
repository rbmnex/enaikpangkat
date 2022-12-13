$(document).on('click','#hantar-calon-berjaya',function() {
    var list = $(".table-qualify").DataTable().column(0).checkboxes.selected();

    if(list.length == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Ralat',
            text: 'Sila Pilih Calon Dulu!',
            customClass: {
              confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false
          });
    } else {
        let id_list = new Array();
        var data = new FormData;
        data.append('_token', getToken());
        $.each(list, function(index, rowId) {
            id_list.push(rowId);
         });
         data.append('applicant_list', JSON.stringify(id_list));
         swalAjax({
            titleText : 'Adakah Anda Pasti?',
            mainText : 'Data akan dihantar',
            icon: 'info',
            confirmButtonText: 'Hantar',
            postData: {
                url : '/urussetia/appl/calon/process',
                data: data,
                postfunc: function(data) {
                    let success = data.success;
                    let parseData = data.data;
                    if(success == 1) {
                        toasting('Data sudah berjaya dihantar', 'success');
                    } else if(success == 0) {
                        //swalPostFire('error', 'Gagal Disimpan', 'Ralat telah berlaku');
                        toasting('Ralat telah berlaku, Data telah gagal dihantar', 'error');
                    }
                    $(".table-qualify").DataTable().ajax.reload(null, false);
                },
            }
        });
    }


});
