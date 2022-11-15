DatatableUI.init({
    selector: '.lpnk-table',
    columnList: [
        {data: 'nama', searchable: false},
        {data: 'nokp', searchable: false},
        {data: 'jawatan', searchable: false},
        {data: 'gred', searchable: false},
        {data: 'status', searchable: false},
        {data: 'action', searchable: false},
    ],
    url: '/penyelia/lpnk/get-list',
    buttons: [
        {
            text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Soalan Baru',
            className: 'btn btn-primary',
            attr: {
                'id': 'add-soalan-modal'
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
                if(full.lpnk_status == 0){
                    btn += '<a href="'+ window.location.origin +'/penyelia/lpnk/borang/'+ full.id +'" type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light">'+ feather.icons['send'].toSvg() +' Borang</a>';
                }else{
                    btn += '-'
                }


                return btn;
            }
        }
    ],
    label: 'Soalan LNPK'
});
