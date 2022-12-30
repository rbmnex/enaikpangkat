Flatpickrinit.initAll('#holiday-date');

DatatableUI.init({
    selector: '.lpnk-table',
    columnList: [
        {data: 'nama', searchable: false},
        {data: 'action', searchable: false},
    ],
    url: '/bpsm/question/get-list',
    buttons: [
        {
            text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Tambah',
            className: 'btn btn-primary',
            attr: {
                'id': 'add-holiday-modal'
            },
            init: function (api, node, config) {
                $(node).removeClass('btn-secondary');
            }
        }
    ],
    columnDef: [
        {
            // Actions
            targets: -1,
            title: 'Tindakan',
            orderable: false,
            render: function (data, type, full, meta) {
                let row_status = full.status;
                let btn = '';

                btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light soalan-sub-modal">'+ feather.icons['send'].toSvg() +' Sub Soalan</button>';
                btn += '<button type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light soalan-kemaskini">'+ feather.icons['send'].toSvg() +' Kemaskini</button>';
                btn += '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light soalan-padam">'+ feather.icons['trash-2'].toSvg() +' Padam</button>';

                return btn;
            }
        }
    ],
    label: 'Soalan LNPK'
});

