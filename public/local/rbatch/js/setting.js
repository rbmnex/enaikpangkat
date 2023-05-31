$(document).ready(function() {
    $('.select2').each(function() {
        var _this = $(this);
        //_this.wrap('<div class="position-relative"></div>');
        _this.select2({
            //placeholder: '-- Sila Pilih --',
            dropdownParent: _this.parent()
          });
    });
});


DatatableUI.init({
    selector: '.table-resumeb',
    columnList: [
        {data: 'nama', searchable: false},
        {data: 'send_date', searchable: false},
        {data: 'status', searchable: false},
        {data: 'aksi', searchable: false},
    ],
    url: '/urussetia/resume/batch/list',
    buttons: [
        {
            text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Tambah Kumpulan',
            className: 'btn btn-primary',
            attr: {
                'id': 'add-batch-modal'
            },
            attr: {
                'data-toggle': 'modal',
                'data-target': '#batch-modal'
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
                let sent = full.send_date;
                let btn = '';
                if( sent == '00-00-0000') {
                    btn += '<button title="Hantar" type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light send-all" >'+ feather.icons['send'].toSvg() +'Hantar </button>';
                }
                btn += '<button title="Kemaskini" type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light open-update" >'+ feather.icons['edit'].toSvg() +' Kemaskini </button>';
                btn += '<button title="Hapus" type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-batch" >'+ feather.icons['trash'].toSvg() +' Hapus </button>';
                return btn;
            }
        },
        {
            // Actions
            targets: 2,
            title: 'Status',
            orderable: false,
            render: function (data, type, full, meta) {
                let row_status = full.status;
                if(row_status == 'new') {
                    return '<div class="badge badge-primary">Baru</div>';
                } else {
                    return '<div class="badge badge-dark">Selesai</div>';
                }
            }
        }
    ],
    label: 'Senarai Kumpulan'
});


function search_pegawai(data) {
    DatatableUI.init({
        selector: '.table-pegawai',
        columnList: [
            {data: 'nokp', searchable: false},
            {data: 'nokp', searchable: false},
            {data: 'nama', searchable: false},
            {data: 'kod_gred', searchable: false},
            {data: 'jawatan', searchable: false},
            {data: 'displin', searchable: false},
        ],
        url: '/urussetia/resume/batch/pegawai?gred='+data.get('gred')+'&jurusan='+data.get('jurusan'),
        buttons: [

        ],
        columnDef: [
            {
                'targets': 0,
                'checkboxes': {
                   'selectRow': true
                }
             }
        ],
        select: {
            'style': 'multi'
        },
        label: 'Senarai Pegawai'
    });

}
