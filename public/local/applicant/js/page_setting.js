DatatableUI.init({
    selector: '.table-pemohon',
    columnList: [
        {data: 'nokp'},
        {data: 'nama'},
        {data: 'jawatan'},
        {data: 'gred'},
        {data: 'status'},
        {data: 'aksi'},
    ],
    url: '/urussetia/appl/calon/list?id='+$('#hdn_id_application').val(),
    buttons: [

    ],
    columnDef: [
        {
            // Actions
            targets: -1,
            title: 'Tindakan',
            orderable: false,
            searchable: false,
            render: function (data, type, full, meta) {
                var btn = '';
                    btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light view-form">'+ feather.icons['file-text'].toSvg() +' Lihat</button>';
                    // btn += '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-appliation">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>';

                return btn;
            }
        }
    ],
    label: 'Senarai Permohonan'
});
