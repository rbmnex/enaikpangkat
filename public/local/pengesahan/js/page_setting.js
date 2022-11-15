DatatableUI.init({
    selector: '.table-disah',
    columnList: [
        {data: 'nokp'},
        {data: 'nama'},
        {data: 'jawatan'},
        {data: 'jenis'},
        {data: 'aksi'},
    ],
    url: '/validate/senarai/pemohon',
    buttons: [

    ],
    columnDef: [
        {
            // Actions
            targets: 3,
            title: 'Jawatan',
            orderable: false,
            searchable: false,
            render: function (data, type, full, meta) {
                var label;
                label = full.jawatan+' '+full.gred;
                return label;
            }
        },
        {
            // Actions
            targets: -2,
            title: 'Borang',
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
                var btn = '';
                    btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light valid-applicant">'+ feather.icons['check-square'].toSvg() +' Lihat</button>';
                    // btn += '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-appliation">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>';

                return btn;
            }
        }
    ],
    label: 'Senarai Pemohon'
});
