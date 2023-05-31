$(document).on('click','.btn-back, .post-add-officer, .delete-officer, .send-single',function() {
    let selectedButton = $(this);
    if(selectedButton.hasClass('btn-back')) {
        window.open(Common.getUrl() + '/urussetia/resume/batch/view/','_self');
    } else if(selectedButton.hasClass('post-add-officer')) {
        let data = new FormData;
        data.append('_token', Common.getToken());
        data.append('batch_id',getId());
        data.append('nama',$('.calon-nama').val());
        data.append('nokp',$('.calon-nokp').val());
        data.append('jawatan',$('.calon-jawatan').val());
        data.append('gred',$('.calon-gred').val());
        data.append('jurusan',$('.calon-jurusan').val());
        data.append('kod_jurusan',$('.calon-kod-jurusan').val());
        data.append('email',$('.calon-email').val());

        MemberController.add_single({data : data});
    } else if(selectedButton.hasClass('delete-officer')) {
        let memberId =  selectedButton.closest('tr').attr('data-member-id');
        let data = new FormData;
        data.append('_token', Common.getToken());
        data.append('member_id', memberId);
        SwalUI.init({
            title: "Adakah Anda Pasti?",
            subtitle: "Pegawai akan dihapus",
            icon: "danger",
            confirmText: "Hapus",
            callback: function() {
                MemberController.delete_member({
                    data: data
                });
            }
        });

    } else if(selectedButton.hasClass('send-single')) {
        let memberId =  selectedButton.closest('tr').attr('data-member-id');
        let data = new FormData;
        data.append('_token', Common.getToken());
        data.append('member_id', memberId);
        SwalUI.init({
            title: "Adakah Anda Pasti?",
            subtitle: "Emel akan dihantar",
            icon: "warning",
            confirmText: "Hapus",
            callback: function() {
                MemberController.send_mail({
                    data: data
                });
            }
        });
    }
});


$('.calon-carian').change(function() {
    let no_ic = $(this).val();
    $.ajax({
        type:'GET',
        url: getUrl() + '/urussetia/resume/member/info/'+no_ic,
        dataType: "json",
        processData: false,
        contentType: false,
        context: this,
        success: function(data) {
            let result = data.success;
            let info = data.data;

            if(result == 1) {
                $('.calon-nama').val(info.nama);
                $('.calon-nokp').val(info.nokp);
                $('.calon-jawatan').val(info.jawatan);
                $('.calon-gred').val(info.gred);
                $('.calon-jurusan').val(info.jurusan);
                $('.calon-kod-jurusan').val(info.kod_jurusan);
                $('.calon-email').val(info.email);
            }
        }
    });
});


