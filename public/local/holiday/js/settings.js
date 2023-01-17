Flatpickrinit.initAll('#holiday-date');

DatatableUI.init({
    selector: '.holiday-table',
    columnList: [
        {data: 'holiday_name', searchable: false},
        {data: 'tkh_cuti', searchable: false},
        {data: 'status', searchable: false},
        {data: 'action', searchable: false},
    ],
    url: '/admin/holiday/list',
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
            targets: -2,
            title: 'Status',
            orderable: false,
            render: function (data, type, full, meta) {
                let flag = full.flag;
                let color = 'danger'
                if(flag == 1) {
                    color = 'success';
                }
                return '<div class="badge badge-'+color+'">'+full.status+'</div>';
            }
        },
        {
            // Actions
            targets: -1,
            title: 'Tindakan',
            orderable: false,
            render: function (data, type, full, meta) {
                let row_status = full.flag;
                let btn = '';
                let text = '';
                let color = '';
                if(row_status == 1) {
                    text = 'Nyahaktif';
                    color = 'danger';
                } else {
                    text = 'Aktif'
                    color = 'success';
                }

                btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light cuti-kemaskini">'+ feather.icons['edit'].toSvg() +' Kemaskini</button>';

                btn += '<button type="button" class="btn btn-icon btn-outline-'+color+' mr-1 mb-1 waves-effect waves-light cuti-onoff">'+ feather.icons['power'].toSvg() +' '+text+'</button>';

                btn += '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light cuti-padam">'+ feather.icons['trash-2'].toSvg() +' Padam</button>';

                return btn;
            }
        }
    ],
    order: [[1, 'asc']],
    label: 'Senarai Cuti'
});

