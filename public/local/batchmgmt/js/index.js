$(document).on('click','.add-kumpulan, .get-carian-staff, .batch-edit',function() {
    let selectedClass = $(this);
    if(selectedClass.hasClass('add-kumpulan')) {
        postEmptyFields([
            ['.kump-nama','text']
        ]);
        $('.batch-modal').modal('show');
        load_staff();
    } else if(selectedClass.hasClass('get-carian-staff')) {
        let tahun = $('.dropdown-tahun').val();
        let gred = $('.dropdown-gred').val();
        let jurusan = $('.dropdown-jurusan').val();
        search_staff(tahun,jurusan,gred);
    } else if(selectedClass.hasClass('batch-edit')) {
        let batch_id = selectedClass.closest('tr').attr('data-batch-id');
        postEmptyFields([
            ['.kump-nama-1','text']
        ]);
        $.ajax({
            type:'GET',
            url: getUrl() + '/urussetia/kumpulan/papar?batch_id='+batch_id,
            dataType: "json",
            processData: false,
            contentType: false,
            context: this,
            success: function(data) {
                let success = data.success;
                let parseData = data.data;
                $('.kump-nama-1').val(parseData.name);
                $('.hidden-batch-id').val(parseData.id);
                $('.calon-modal').modal('show');
                display_staff(parseData.id);
            }
        });
    }
});

$(document).on('click','.post-add-batch, .post-update-batch',function() {
    let selectedClass = $(this);
    let nama = $('.kump-nama').val();
    let nokp_list = new Array();
    var data = new FormData;
    data.append('_token', getToken());
    data.append('nama', nama);

    if(selectedClass.hasClass('post-add-batch')) {
        let rows_selected = staff_table.column(0).checkboxes.selected();

        $.each(rows_selected, function(index, rowId) {
            nokp_list.push(rowId);
         });
         data.append('staff_list', JSON.stringify(nokp_list));
    } else if(selectedClass.hasClass('post-update-batch')) {
        let rows_selected = staff2_table.column(0).checkboxes.selected();

        $.each(rows_selected, function(index, rowId) {
            nokp_list.push(rowId);
         });
         data.append('staff_list', JSON.stringify(nokp_list));
         data.append('batch_id',$('.hidden-batch-id').val());
    }

    swalAjax({
        titleText : 'Adakah Anda Pasti?',
        mainText : 'Data akan disimpan',
        icon: 'info',
        confirmButtonText: 'Simpan',
        postData: {
            url : '/urussetia/kumpulan/simpan',
            data: data,
            postfunc: function(data) {
                let success = data.success;
                let parseData = data.data;
                if(success == 1) {
                    $('.batch-modal').modal('hide');
                    swalPostFire('success', 'Berjaya Disimpan', 'Data sudah disimpan');
                } else if(success == 0) {
                    swalPostFire('error', 'Gagal Disimpan', 'Ralat telah berlaku');
                }

            },
        }
    });

});
