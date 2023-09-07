$(document).on('click', '.update-pinkform, .edit-pinkform', function(){
    let pemohon_id = $(this).closest('tr').attr('data-pemohon-id');
    $('#pemohon-id').val(pemohon_id);
    let selectedClass = $(this);

    if(selectedClass.hasClass('update-pinkform')) {
        ModalUI.modal({
            selector: '#pinkform-modal',
            mode: 'show',
            color: 'modal-info',
            label: 'Hantar Pink Form',
        });
    } else if(selectedClass.hasClass('edit-pinkform')) {
        PinkFormController.loadPink({
            url : 'hr2/pinkform/load-pink/'+pemohon_id
        })
    }


});

$(document).on('click', '.download-pinkform, .resend-pinkform', function(){
    let id = $(this).closest('tr').attr('data-pemohon-id');
    let selectedClass = $(this);
    if(selectedClass.hasClass('download-pinkform')) {
        window.open(getUrl() + '/hr2/pinkform/download-pink/'+id,'blank');
    } else if(selectedClass.hasClass('resend-pinkform')) {
        // cubaan hantar semula
        let id = $(this).closest('tr').attr('data-pemohon-id');
        let v = new FormData;
        v.append('_token', Common.getToken());
        v.append('pemohon_id',id);
        SwalUI.init({
            title: "Adakah Anda Pasti?",
            subtitle: "Email akan dihantar",
            icon: "info",
            confirmText: "Hantar",
            callback: function() {
                PinkFormController.resendEmail({
                    url: 'hr2/pinkform/resend',
                    data: v,
                });
            }
        });
    }
});

$(document).on('click', '#pinkform-hantar', function(){
   let validate = new Validation();

    let v = validate.checkEmpty(
        validate.getValue('#pinkform-name', 'mix', 'Nama', 'pinkform_name'),
        validate.getValue('#pinkform-tkh-lapor-diri', 'mix', 'Tarikh Lapor Diri', 'pinkform_tkh'),
        validate.getValue('#pinkform-borang', 'picture', 'Borang', 'pinkform_borang'),
        // validate.getValue('#pinkform-alamat-pejabat', 'mix', 'Borang', 'pinkform_alamat'),
        validate.getValue('#pinkform-jenis-penempatan', 'mix', 'Jenis Penempatan', 'pinkform_jenis'),
        validate.getValue('#pinkform-kategori', 'mix', 'Kategori', 'pinkform_kategori')
    );

    v.append('pinkform_catatan', $('#pinkform-catatan').val());
    v.append('pinkform_cc', $('#pinkform-emailcc').val());
    v.append('pemohon_id', $('#pemohon-id').val());

    SwalUI.init({
        title: "Adakah Anda Pasti?",
        subtitle: "Data akan dihantar",
        icon: "info",
        confirmText: "Hantar",
        callback: function() {
            PinkFormController.hantarForm({
                url: 'hr2/pinkform/hantar',
                data: v,
            });
        }
    });


});

$(document).on('click', '#pinkform-kemaskini', function(){
    let validate = new Validation();

     let v = validate.checkEmpty(
         validate.getValue('#pinkform-name-1', 'mix', 'Nama', 'pinkform_name'),
         validate.getValue('#pinkform-tkh-lapor-diri-1', 'mix', 'Tarikh Lapor Diri', 'pinkform_tkh'),
        //  validate.getValue('#pinkform-borang-1', 'picture', 'Borang', 'pinkform_borang'),
         // validate.getValue('#pinkform-alamat-pejabat', 'mix', 'Borang', 'pinkform_alamat'),
         validate.getValue('#pinkform-jenis-penempatan-1', 'mix', 'Jenis Penempatan', 'pinkform_jenis'),
         validate.getValue('#pinkform-kategori-1', 'mix', 'Kategori', 'pinkform_kategori')
     );

     v.append('pinkform_borang', $('#pinkform-borang-1')[0].files[0]);
     v.append('pinkform_catatan', $('#pinkform-catatan-1').val());
     v.append('pinkform_cc', $('#pinkform-emailcc-1').val());
     v.append('email_trigger', 0);
     v.append('pemohon_id', $('#pemohon-id').val());
     v.append('pink_id', $('#pink-id').val());

     SwalUI.init({
         title: "Adakah Anda Pasti?",
         subtitle: "Data akan dihantar",
         icon: "info",
         confirmText: "Hantar",
         callback: function() {
             PinkFormController.kemaskiniForm({
                 url: 'hr2/pinkform/kemaskini',
                 data: v,
             });
         }
     });


 });

 $(document).on('click', '#pinkform-email', function(){
    let validate = new Validation();

     let v = validate.checkEmpty(
         validate.getValue('#pinkform-name-1', 'mix', 'Nama', 'pinkform_name'),
         validate.getValue('#pinkform-tkh-lapor-diri-1', 'mix', 'Tarikh Lapor Diri', 'pinkform_tkh'),
        //  validate.getValue('#pinkform-borang-1', 'picture', 'Borang', 'pinkform_borang'),
         // validate.getValue('#pinkform-alamat-pejabat', 'mix', 'Borang', 'pinkform_alamat'),
         validate.getValue('#pinkform-jenis-penempatan-1', 'mix', 'Jenis Penempatan', 'pinkform_jenis'),
         validate.getValue('#pinkform-kategori-1', 'mix', 'Kategori', 'pinkform_kategori')
     );
     //
     v.append('pinkform_borang', $('#pinkform-borang-1')[0].files[0]);
     v.append('pinkform_catatan', $('#pinkform-catatan-1').val());
     v.append('pinkform_cc', $('#pinkform-emailcc-1').val());
     v.append('email_trigger', 1);
     v.append('pemohon_id', $('#pemohon-id').val());
     v.append('pink_id', $('#pink-id').val());

     SwalUI.init({
         title: "Adakah Anda Pasti?",
         subtitle: "Data akan dihantar",
         icon: "info",
         confirmText: "Hantar",
         callback: function() {
             PinkFormController.hantarForm({
                 url: 'hr2/pinkform/kemaskini',
                 data: v,
             });
         }
     });


 });

