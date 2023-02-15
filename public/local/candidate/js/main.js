$(document).on('click', '.send-email', function() {
    let selectedElement = $(this);
    let pemohon_id = selectedElement.closest('tr').attr('data-pemohon-id');
    let dt =  new FormData();
    dt.append('_token', Common.getToken());
    dt.append('id',pemohon_id);
    SwalUI.init({
        title: "Adakah Anda Pasti?",
        subtitle: "Emel akan dihantar",
        icon: "info",
        confirmText: "Hantar",
        callback: function() {
            CanController.send({
                url: 'urussetia/promote/send',
                data: dt
            });
        }
    });
});
