let urlPath = '';
let roleName = $('#hdn_role').val();

if(roleName == 'hos')
    urlPath = '/validate/senarai/pemohon/hos';
else if(roleName == 'hod')
    urlPath = '/validate/senarai/pemohon/hod';

DatatableUI.init({
    selector: '.table-disah',
    columnList: [
        {data: 'nokp'},
        {data: 'nama'},
        {data: 'jawatan'},
        {data: 'jenis'},
        {data: 'tarikh'},
        {data: 'status'},
        {data: 'aksi'},
    ],
    url: urlPath,
    buttons: [

    ],
    columnDef: [
        {
            // Actions
            targets: 2,
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
            targets: -4,
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
            targets: -2,
            title: 'Status',
            orderable: false,
            searchable: false,
            render: function (data, type, full, meta) {

                var label = '';
                var color = '';
                if(roleName == 'hos') {
                    if(full.pengesahan_perkhidmatan == 1) {
                        label = 'Sudah Disahkan';
                        color = 'success';
                    } else {
                        label = 'Belum Disahkan';
                        color = 'danger';
                    }
                } else if(roleName == 'hod') {
                    if(full.perakuan_ketua_jabatan == 1) {
                        label = 'Sudah Disahkan';
                        color = 'success';
                    } else {
                        label = 'Belum Disahkan';
                        color = 'danger';
                    }
                }

                return '<div class="badge badge-'+color+'">'+label+'</div>';
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
