$(document).on('click', '#add-holiday-modal', function() {
    let selectedElement = $(this);
    if(selectedElement[0].id == 'add-holiday-modal') {
        $('#id-holiday').val(0);
        $('#holiday-length').val(1);
        $('#holiday-name').val('');
        $('#holiday-desc').val('');
        $('#holiday-date').val('');
        ModalUI.modal({
            selector: '#cuti-modal',
            mode: 'show',
            color: 'modal-success',
            label: 'Cuti Baru',
            buttonMode: [
                {
                    selector: '#holiday-save',
                    show: true,
                },
                {
                    selector: '#holiday-update',
                    show: false,
                }
            ]
        });
        //$('#cuti-modal').modal('show');
    }
});

$(document).on('click', '#holiday-save, #holiday-update', function() {
    let selectedElement = $(this);
    if(selectedElement[0].id == 'holiday-save' || selectedElement[0].id == 'holiday-update') {
        let validate = new Validation();
        let dt = new FormData();
        dt = validate.checkEmpty(
            validate.getValue('#holiday-name', 'mix', 'Nama Cuti diperlukan', 'nama', true),
            validate.getValue('#holiday-date', 'datedashstandard', 'Nama Cuti diperlukan', 'tarikh', true)
        );

        dt.append('id',$('#id-holiday').val());
        dt.append('penerangan',$('#holiday-desc').val());
        dt.append('tempoh',$('#holiday-length').val());

        SwalUI.init({
            title: "Adakah Anda Pasti?",
            subtitle: "Data akan disimpan",
            icon: "info",
            confirmText: "Hantar",
            callback: function() {
                CutiController.hantar({
                    url: 'admin/holiday/save',
                    data: dt,
                })
            }
        });
    }
});

$(document).on('click', '.cuti-kemaskini, .cuti-onoff, .cuti-padam', function() {
    let selectedClass = $(this);
    let id = selectedClass.closest('tr').attr('data-holiday-id');
    let dt =  new FormData();
    dt.append('_token', Common.getToken());
    dt.append('id',id);
    if(selectedClass.hasClass('cuti-kemaskini')) {
        CutiController.load({
            url: 'admin/holiday/load',
            data: dt,
        })
    } else if(selectedClass.hasClass('cuti-onoff')) {
        SwalUI.init({
            title: "Adakah Anda Pasti?",
            subtitle: "Status akan diubah",
            icon: "info",
            confirmText: "Hantar",
            callback: function() {
                CutiController.toggle({
                    url: 'admin/holiday/toggle-active',
                    data: dt,
                })
            }
        });
    } else if(selectedClass.hasClass('cuti-padam')) {
        SwalUI.init({
            title: "Adakah Anda Pasti?",
            subtitle: "Cuti akan dipadam",
            icon: "warning",
            confirmText: "Padam",
            callback: function() {
                CutiController.delete({
                    url: 'admin/holiday/delete-flag',
                    data: dt,
                })
            }
        });
    }
});
