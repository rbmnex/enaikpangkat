Flatpickrinit.initAll('#pinkform-tkh-lapor-diri');

DatatableUI.init({
    selector: '.ukp13-table',
    columnList: [
        {data: 'nokp'},
        {data: 'nama'},
        {data: 'status'},
        {data: 'aksi'},
    ],
    url: '/naikpangkat/ukp13/get-ukp13-list',
    buttons: [

    ],
    columnDef: [
        {
            targets: -2,
            title: 'Status',
            orderable: false,
            render: function (data, type, full, meta) {
                let row_flag = full.status;

                if(row_flag == 'LL') {
                    return (
                        '<div class="badge badge-primary">Baru</div>'
                    );
                }else if(row_flag == 'BH'){
                    return (
                        '<div class="badge badge-warning">Baru</div>'
                    );
                } else if(row_flag == 'MJ' || row_flag == 'TA'){
                    return (
                        '<div class="badge badge-warning">Menunggu Jawapan</div>'
                    );
                } else if(row_flag == 'TL'){
                    return (
                        '<div class="badge badge-warning">Terima Lantikan</div>'
                    );
                } else if(row_flag == 'PL'){
                    return (
                        '<div class="badge badge-warning">Tolakan Lantikan</div>'
                    );
                }

            }
        },
        {
            // Actions
            targets: -1,
            title: 'Tindakan',
            orderable: false,
            render: function (data, type, full, meta) {
                let row_status = full.status;
                let btn = '';
                if(row_status == 'MJ') {
                    btn += '<a href="'+ window.location.origin +'/pemangku/tawaran/update/'+ full.id +'" type="button" style="color:#00cfe8" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light">'+ feather.icons['send'].toSvg() +' Semak</a>';
                }
                if(row_status == 'TL' || row_status == 'TA') {
                    btn += '<a target="_blank" href="'+ window.location.origin +'/naikpangkat/ukp13/download/part?dataform='+ full.id +'" type="button" style="color:#00cfe8" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light">'+ feather.icons['send'].toSvg() +' PDF</a>';
                }
                if(row_status == 'BH') {
                    btn += '<a href="'+ window.location.origin +'/naikpangkat/ukp13/borang/'+ full.id +'" type="button" style="color:#00cfe8" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light">'+ feather.icons['send'].toSvg() +' Kemaskini</a>';
                }
                return btn;
            }
        }
    ],
    label: 'Senarai Pink Form'
});
