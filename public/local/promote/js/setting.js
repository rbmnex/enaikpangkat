DatatableUI.init({
    selector: '.table-promote',
    columnList: [
        {data: 'nokp', searchable: false},
        {data: 'nama', searchable: false},
        {data: 'position', searchable: false},
        {data: 'status', searchable: false},
        {data: 'aksi', searchable: false},
    ],
    url: '/urussetia/promote/list',
    buttons: [

    ],
    columnDef: [
        {
            targets: -2,
            title: 'Status',
            orderable: false,
            render: function (data, type, full, meta) {
                var status =  full.status;
                // var status_hos = full.pengesahan_hos;
                // var status_hod = full.pengesahan_hod;
                var text = '';

                if(status == "BH") {
                    text = 'Belum Siap';
                } else if(status == "TA") {
                    text = 'Tunggu Pengesahan';
                    // if(status_hos == "NOT" && status_hod == "NOT")  {
                    //     text += '<br> Ketua Bahagian Perkhidmatan';
                    // } else if(status_hos == "DONE" && status_hod == "NOT") {
                    //     text += '<br> Ketua Jabatan';
                    // }
                } else if(status == "PT") {
                    text = 'Tolak Tawaran';
                } else if(status == "SP") {
                    text = 'Menunggu Penilaian LNPT';
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
                } else if(status == "MT") {
                    text = 'Menunggu Tindakan BPSK';
                }
                return '<div class="badge badge-warning">'+text+'</div>';
            }
        },
        {
            // Actions
            targets: -1,
            title: 'Tindakan',
            orderable: false,
            render: function (data, type, full, meta) {
                var btn = '';
                var status =  full.status

                if( (status != 'NA') && (status != 'BH') && (status != 'TA') ) {
                    btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light view-form">'+ feather.icons['file-text'].toSvg() +' Kemaskini</button>';
                    btn += '<button type="button" class="btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light view-full">'+ feather.icons['file'].toSvg() +' JKR/UKP/13</button>';
                    // btn += '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-appliation">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>';

                }

                if((status != 'NA') && (status != 'BH') && (status != 'TA') && (status != "SP") && (status != "PT")) {
                    btn += '<button type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light verdict-applicant">'+ feather.icons['check-square'].toSvg() +' Keputusan</button>';
                }

                return btn;
            }
        }
    ],
    order: [],
    label: 'Senarai Permohonan Naik Pangkat'
});
