Flatpickrinit.initAll('#pinkform-tkh-lapor-diri');

DatatableUI.init({
    selector: '.pinkform-table',
    columnList: [
        {data: 'nokp', searchable: false},
        {data: 'nama', searchable: false},
        {data: 'jawatan', searchable: false},
        {data: 'jenis', searchable: false},
        {data: 'status', searchable: false},
        {data: 'email_status', searchable: false},
        {data: 'aksi', searchable: false},
    ],
    url: '/hr2/pinkform/get-pink-form-list',
    buttons: [

    ],
    columnDef: [
        {
            target: -4,
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
            targets: -3,
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
                } else if(row_flag == 'MT'){
                    return (
                        '<div class="badge badge-primary">Baru</div>'
                    );
                }

            }
        },
        {
            targets: -2,
            title: 'Email',
            orderable: false,
            render: function (data, type, full, meta) {
                let row_flag = full.email_status;
                if(row_flag == 'SUCCESSED') {
                    return (
                        '<div class="badge badge-success">Berjaya</div>'
                    );
                } else if(row_flag == 'FAILED'){
                    return (
                        '<div class="badge badge-danger">Gagal</div>'
                    );
                } else {
                    return (
                        '<div class="badge badge-warning">Belum</div>'
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
                let row_flag = full.email_status;
                let btn = '';
                //if(row_status == 'LL') {
                    btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light update-pinkform" data-toggle="modal" data-target="#pink_modal">'+ feather.icons['send'].toSvg() +' Hantar</button>';


                    if(row_flag == 'FAILED' || row_flag == 'NULL' || row_flag == 'null') {
                        btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light resend-pinkform" >'+ feather.icons['email'].toSvg() +'  Hantar Semula</button>';

                    }
                    btn += '<button type="button" class="btn btn-icon btn-outline-success mr-1 mb-1 waves-effect waves-light download-pinkform" >'+ feather.icons['download'].toSvg() +' Muat turun</button>';
                //}
                return btn;
            }
        }
    ],
    label: 'Senarai Pink Form'
});
