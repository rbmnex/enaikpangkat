function load_user(ic,open) {
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

                for (let index = 0; index < roles.length; index++) {
                    $('.pengguna-role').each(function(){
                        if($(this).attr('data-role-id') == roles[index]){
                            $(this).prop('checked',true);
                        }
                    });

                }
            }

            if(open) {
                $('.pengguna-modal').modal('show');
            }
        }
    });
}
