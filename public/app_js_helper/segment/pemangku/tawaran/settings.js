Flatpickrinit.initAll('#pinkform-tkh-lapor-diri');

DatatableUI.init({
    selector: '.pinkform-table',
    columnList: [
        {data: 'nokp'},
        {data: 'nama'},
        {data: 'jawatan'},
        {data: 'jenis'},
        {data: 'status'},
        {data: 'aksi'},
    ],
    url: '/hr2/pinkform/get-pink-form-list',
    buttons: [

    ],
    columnDef: [
        {
            target: -3,
            title: 'Jenis',
            orderable: false,
            render: function (data, type, full, meta) {
                let row_type = full.jenis;
                if(row_type == 'UKP12') {
                    return ('Pemangkuan');
                } else if(row_type == 'UKP11') {
                    return 'Kenaik Pangkat';
                } else {
                    return '';
                }
            }
        },
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
                } else if(row_flag == 'MJ'){
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
                if(row_status == 'TL') {
                    btn += '<a target="_blank" href="'+ window.location.origin +'/pemangku/tawaran/preview-pdf/'+ full.id +'" type="button" style="color:#00cfe8" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light">'+ feather.icons['send'].toSvg() +' PDF</a>';
                }
                return btn;
            }
        }
    ],
    label: 'Senarai Pink Form'
});
