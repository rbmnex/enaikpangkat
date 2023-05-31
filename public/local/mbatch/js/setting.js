// $(document).ready(function() {
//     $('.select2').each(function() {
//         var _this = $(this);
//         //_this.wrap('<div class="position-relative"></div>');
//         _this.select2({
//             //placeholder: '-- Sila Pilih --',
//             dropdownParent: _this.parent()
//           });
//     });
// });

function getId() {
    return $('#_id').val();
}

DatatableUI.init({
    selector: '.table-member',
    columnList: [
        {data: 'nokp', searchable: false},
        {data: 'nama', searchable: false},
        {data: 'jawatan', searchable: false},
        {data: 'gred', searchable: false},
        {data: 'displin', searchable: false},
        {data: 'send_date', searchable: false},
        {data: 'status', searchable: false},
        {data: 'aksi', searchable: false},
    ],
    url: '/urussetia/resume/member/list/'+getId(),
    buttons: [
        {
            text: feather.icons['arrow-left'].toSvg({ class: 'me-50 font-small-4' }) + 'Kembali',
            className: 'btn btn-success btn-back',
            attr: {
                'id': 'back-page'
            },
            init: function (api, node, config) {
                $(node).removeClass('btn-secondary');
            }
        },
        {
            text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Tambah Pegawai',
            className: 'btn btn-primary',
            attr: {
                'id': 'add-officer-modal'
            },
            attr: {
                'data-toggle': 'modal',
                'data-target': '#officer-modal'
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
                let nokp = full.nokp;
                let sent = full.send_date;
                let btn = '';
                if( sent == '00-00-0000') {
                    btn += '<button title="Hantar" type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light send-single" >'+ feather.icons['send'].toSvg() +'Hantar </button>';
                }
                btn += '<a title="Papar" href="'+Common.getUrl()+'/urussetia/resume/paparanall/'+nokp+'" class="btn btn-icon btn-outline-success mr-1 mb-1 waves-effect waves-light view-resume" target="_blank">'+ feather.icons['eye'].toSvg() +' Papar </a>';
                btn += '<a title="Muat Turun" href="'+Common.getUrl()+'/urussetia/resume/resume/'+nokp+'" class="btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light view-resume" target="_blank">'+ feather.icons['printer'].toSvg() +' Muat Turun </a>';
                btn += '<button title="Hapus" type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-officer" >'+ feather.icons['trash'].toSvg() +' Hapus </button>';
                return btn;
            }
        },
        {
            // Status
            targets: -2,
            title: 'Status',
            orderable: false,
            render: function (data, type, full, meta) {
                let row_status = full.status;
                if(row_status == 'new') {
                    return '<div class="badge badge-primary">Baru</div>';
                } else if(row_status == 'sent') {
                    return '<div class="badge badge-warning">Dalam Tindakan</div>';
                } else {
                    return '<div class="badge badge-success">Selesai</div>';
                }
            }
        }
    ],
    label: 'Senarai Ahli'
});

$('.calon-carian').wrap('<div class="position-relative"></div>').select2({
    dropdownAutoWidth: true,
    dropdownParent: $('.calon-carian').parent(),
    width: '100%',
    language: {
        inputTooShort: function(){
            return 'Sekurang-kurangnya mengisi satu huruf...';
        },
        searching: function(){
            return 'Sedang Mencari Pegawai...';
        }
    },
    ajax: {
        url: Common.getUrl() + '/urussetia/resume/member/search',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term, // search term
                page: params.page
            };
        },
        processResults: function (data, params) {
            let parseData = data.data;
            return {
                results: parseData,
                pagination: {
                    more: params.page * 30 < parseData.length
                }
            };
        },
        cache: true
    },
    placeholder: 'Sila Isi Nama Calon',
    minimumInputLength: 1,
});
