DatatableUI.init({
    selector: '.table-pemohon',
    columnList: [
        {data: 'nokp'},
        {data: 'nama'},
        {data: 'jawatan'},
        {data: 'gred'},
        {data: 'status'},
        {data: 'rank'},
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
            targets: -3,
            title: 'Status',
            orderable: false,
            searchable: false,
            render: function (data, type, full, meta) {
                var status =  full.status;
                var status_hos = full.pengesahan_hos;
                var status_hod = full.pengesahan_hod;
                var text = '';

                if(status == "BH") {
                    text = 'Belum Siap';
                } else if(status == "TA") {
                    text = 'Tunggu Pengesahan';
                    if(status_hos == "NOT" && status_hod == "NOT")  {
                        text += ' Ketua Bahagian Perkhidmatan';
                    } else if(status_hos == "DONE" && status_hod == "NOT") {
                        text += ' Ketua Jabatan';
                    }
                } else if(status == "PT") {
                    text = 'Tolak Tawaran';
                } else if(status == "SP") {
                    text = 'Dalam Proses';
                } else if(status == "LL") {
                    text = 'Calon Berjaya';
                } else if(status == "GL") {
                    text = 'Calon Gagal';
                } else if(status == "PL") {
                    text = 'Tolak Lantikan';
                } else if(status == "MJ") {
                    text = 'Tunggu Jawapan';
                } else if(status == "TL") {
                    text = 'Terima Lantikan';
                } else if(status == "TK") {
                    text = 'Tunggu Keputusan LKPPA';
                } else if(status == "LS") {
                    text = 'Calon Simpanan';
                } else if(status == "NA") {
                    text = 'Tiada Tindakan';
                }
                return '<div class="badge badge-'+full.colour+'">'+text+'</div>';
            }
        },
        {
            // Actions
            targets: -2,
            title: 'Tangga',
            orderable: true,
            searchable: false,
            visible: true,
            render: function (data, type, full, meta) {
                return full.rank;
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
                if( (status != 'NA') && (status != 'BH') && (status != 'TA') ) {
                    btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light view-form">'+ feather.icons['file-text'].toSvg() +' Kemaskini</button>';
                    btn += '<button type="button" class="btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light view-full">'+ feather.icons['file'].toSvg() +' Papar</button>';
                    // btn += '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-appliation">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>';

                }
                if((status != 'NA') && (status != 'BH') && (status != 'TA') && (status != "SP") && (status != "PT")) {
                    btn += '<button type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light verdict-applicant">'+ feather.icons['check-square'].toSvg() +' Keputusan</button>';
                }

                if( (status == "MJ") || (status == "PL") || (status == "TL") ) {
                    btn += '<button type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light ukp11-view">'+ feather.icons['download'].toSvg() +' UKP 11</button>';
                }

                if(full.email_status == "FAILED" || full.email_status == "UNKNOWN") {
                    btn +='<button type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light calon-resend">'+ feather.icons['mail'].toSvg() +' Hantar Semula</button>';
                }


                return btn;
            }
        }
    ],
    order: [[5, 'asc']],
    label: 'Senarai Calon'
});

$('#verdict-date').flatpickr({
    dateFormat: 'd-m-Y'
});
