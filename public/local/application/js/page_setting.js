DatatableUI.init({
    selector: '.table-borang',
    columnList: [
        {data: 'tajuk'},
        {data: 'gred'},
        {data: 'disiplin'},
        {data: 'aksi'},
    ],
    url: '/urussetia/appl/main/list',
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
                    btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light view-applicant">'+ feather.icons['list'].toSvg() +' Lihat</button>';
                    btn += '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-appliation">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>';

                return btn;
            }
        }
    ],
    label: 'Senarai Permohonan'
});
