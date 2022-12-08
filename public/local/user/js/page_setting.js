let dt = DatatableUI.init({
    selector: '.table-personal',
    columnList: [
        {data: 'jenis'},
        {data: 'status'},
        {data: 'aksi'},
    ],
    url: '/user/form/list',
    buttons: [

    ],
    columnDef: [
        {
            // Actions
            targets: 1,
            title: 'Status',
            orderable: false,
            searchable: false,
            render: function (data, type, full, meta) {
                //var label;
                var status =  full.status;
                var text = '';
                var color = ''
                if(status == "BH") {
                    text = 'Belum Siap';
                    color = 'warning';
                } else if(status == "TA") {
                    text = 'Tunggu Pengesahan';
                    color = 'warning';
                } else if(status == "PT") {
                    text = 'Tolak Tawaran';
                    color = 'danger';
                } else if(status == "SP") {
                    text = 'Dalam Proses';
                    color = 'warning';
                } else if(status == "LL") {
                    text = 'Calon Berjaya';
                    color = 'success';
                } else if(status == "GL") {
                    text = 'Calon Gagal';
                    color = 'secondary';
                } else if(status == "PL") {
                    text = 'Tolak Lantikan';
                    color = 'dark';
                } else if(status == "MJ") {
                    text = 'Tunggu Jawapan';
                    color = 'info';
                } else if(status == "TL") {
                    text = 'Terima Lantikan';
                    color = 'success';
                } else if(status == "TK") {
                    text = 'Tunggu Keputusan LKPPA';
                    color = 'warning';
                } else if(status == "LS") {
                    text = 'Calon Simpanan';
                    color = 'info';
                } else if(status == "NA") {
                    text = 'Tiada Tindakan';
                    color = 'danger';
                }
                return '<div class="badge badge-'+color+'">'+text+'</div>';
            }
        },
        {
            // Actions
            targets: 0,
            title: 'Jenis',
            orderable: false,
            searchable: false,
            render: function (data, type, full, meta) {
                var jenis =  full.jenis;
                let label = '';
                if(jenis == 'UKP12') {
                    label = 'PEMANGKUAN';
                } else if(jenis == 'UKP13') {
                    label = 'NAIK PANGKAT';
                }
                return label;
            }
        },
        {
            // Actions
            targets: -1,
            title: 'Tindakan',
            orderable: false,
            searchable: false,
            render: function (data, type, full, meta) {
                var status =  full.status;
                var jenis =  full.jenis;
                var btn = '';
                if(status == "BH") {
                    btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light open-update">'+ feather.icons['edit'].toSvg() +' Kemaskini</button>';
                }

                if((status == "HT" || status == "TL" || status == "PL" || status == "MJ") && jenis == "UKP12") {
                    btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light open-offer">'+ feather.icons['file-text'].toSvg() +' Surat Pink</button>';
                }

                if(status == "LL" || status == "MJ") {
                    btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light open-reportin">'+ feather.icons['edit'].toSvg() +' Lapor Diri</button>';
                }


                return btn;
            }
        }
    ],
    label: 'Senarai Permohonan'
});
