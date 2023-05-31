$(document).on('click','.get-carian-staff, .post-add-batch, .delete-batch, .open-update, .send-all',function() {
    let selectedButton = $(this);
    if(selectedButton.hasClass('get-carian-staff')) {
        let data = new FormData;
        data.append('jurusan',$('.dropdown-jurusan').val());
        data.append('gred',$('.dropdown-gred').val());
        search_pegawai(data);
    } else if(selectedButton.hasClass('post-add-batch')) {
        let data = new FormData;
        let nama = $('.kump-nama').val();
        let nokpList = [];
        let rows_selected = $('.table-pegawai').DataTable().column(0).checkboxes.selected();
        $.each(rows_selected, function(index, rowId) {
            nokpList.push(rowId);
         });
         data.append('_token', Common.getToken());
         data.append('nama',nama);
         data.append('nokps',JSON.stringify(nokpList));
         if(nama == '' || nama == 'undefined') {
            $('.kump-nama').addClass('is-invalid').closest('.form-group').find('.invalid-feedback').html('Tiada Nama Kumpulan').attr('style', 'display:block');
         } else {
            $('.kump-nama').removeClass('is-invalid').closest('.form-group').find('.invalid-feedback').html('');
            BatchController.add_batch({data: data});
         }
    } else if(selectedButton.hasClass('delete-batch')) {
        let batchId =  selectedButton.closest('tr').attr('data-batch-id');
        let data = new FormData;
        data.append('_token', Common.getToken());
        data.append('batch_id',batchId);
        SwalUI.init({
            title: "Adakah Anda Pasti?",
            subtitle: "Kumpulan akan dihapus",
            icon: "danger",
            confirmText: "Hapus",
            callback: function() {
                BatchController.delete_batch({
                    data: data
                });
            }
        });
    } else if(selectedButton.hasClass('open-update')) {
        let batchId =  selectedButton.closest('tr').attr('data-batch-id');
        window.open(Common.getUrl() + '/urussetia/resume/member/view/'+batchId,'_self');
    } else if(selectedButton.hasClass('send-all')) {
        let batchId =  selectedButton.closest('tr').attr('data-batch-id');
        let data = new FormData;
        data.append('_token', Common.getToken());
        data.append('batch_id',batchId);
        SwalUI.init({
            title: "Adakah Anda Pasti?",
            subtitle: "Emel akan dihatar",
            icon: "warning",
            confirmText: "Hantar",
            callback: function() {
                BatchController.send_all({
                    data: data
                });
            }
        });
    }
});
