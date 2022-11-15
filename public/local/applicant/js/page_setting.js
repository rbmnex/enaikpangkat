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
    url: '/urussetia/appl/calon/load/list?id='+$('#hdn_id_application').val(),
    buttons: [
        {
            text: feather.icons['arrow-left'].toSvg({ class: 'mr-50 font-small-4' }) + 'Kembali',
            className: 'create-new btn btn-success back-main',
            attr: {
                'data-appl-id': $('#hdn_id_application').val(),
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
            searchable: false,
            render: function (data, type, full, meta) {
                return '<div class="badge badge-'+full.colour+'">'+full.status+'</div>';
            }
        },
        {
            // Actions
            targets: -1,
            title: 'Tindakan',
            orderable: false,
            searchable: false,
            render: function (data, type, full, meta) {
                var btn = '';
                var status =  full.status
                if( (status != 'Tiada Tindakan') && (status != 'Belum Siap')) {
                    btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light view-form">'+ feather.icons['file-text'].toSvg() +' Lihat</button>';
                    // btn += '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-appliation">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>';
                }
                if(status == 'Tunggu Keputusan') {
                    btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light verdict-applicant">'+ feather.icons['check-square'].toSvg() +' Keputusan</button>';
                }

                return btn;
            }
        }
    ],
    label: 'Senarai Calon'
});
