function load_user(ic) {
    $.ajax({
        type:'GET',
        url: getUrl() + '/admin/pengguna/api?no_ic='+ic,
        dataType: "json",
        processData: false,
        contentType: false,
        context: this,
        success: function(data) {
            let result = data.data;
            let roles = data.roles;
            $('.pengguna-nama').val(result.nama);
            $('.pengguna-email').val(result.emel);
            $('.pengguna-nokp').val(result.nokp);
            $('.pengguna-cawangan').val(result.cawangan);
            $('.pengguna-bahagian').val(result.bahagian);
            $('.pengguna-unit').val(result.unit);
            $('.pengguna-pejabat').val(result.pejabat);
            $('.pengguna-jawatan').val(result.jawatan);

            if('user_id' in result) {
                $('.hidden-user-id').val(result.user_id);

                $('.post-add-pengguna').html('Kemaskini');
                $('.hidden-ops').val(1);

                for (let index = 0; index < roles.length; index++) {
                    $('.role-checkbox').each(function(){
                        if($(this).attr('data-role-id') == roles[index].role_id){
                            $(this).prop('checked',true);
                        }
                    });

                }
            }
        }
    });
}
