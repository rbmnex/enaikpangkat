let staff_table;
let staff2_table;

$('.table-kumpulan').DataTable({
    processing: true,
    serverSide: true,
    ajax: getUrl() + '/urussetia/kumpulan/senarai',
    lengthChange:true,
    columns: [
        {data: 'name'},
        {data: 'status'},
        {data: 'aksi'},
    ],
    createdRow: function( row, data, dataIndex ) {
        $(row).addClass('kumpulan-row');
    },
    columnDefs: [
        {
            // Actions
            targets: -2,
            title: 'Status',
            orderable: false,
            render: function (data, type, full, meta) {
                let row_flag = full.status;
                if(row_flag == 'NEW') {
                    return (
                        '<div class="badge badge-success">Baru</div>'
                    );
                } else {
                    return (
                        '<div class="badge badge-warning">Sudah Diproses</div>'
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
                if(row_status == 'NEW') {
                    btn = '<button type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light batch-email">'+ feather.icons['mail'].toSvg() +' Hantar</button>' +
                    '<button type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light batch-edit">'+ feather.icons['user'].toSvg() +' Kemaskini</button>' +
                     '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light batch-delete">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>' +
                     btn;
                }
                return (
                     btn
                );
            }
        }
    ],
    dom:
        '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
    lengthMenu: [10, 15, 25, 50, 75, 100],
    buttons: [,
        {
            text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4' }) + 'Tambah Kumpulan',
            className: 'create-new btn btn-primary add-kumpulan',
            attr: {
                'data-toggle': 'modal',
                'data-target': '#modals-slide-in'
            },
            init: function (api, node, config) {
                $(node).removeClass('btn-secondary');
            }
        }
    ],
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.modal({
                header: function (row) {
                    var data = row.data();
                    return 'Details of ' + data['full_name'];
                }
            }),
            type: 'column',
            renderer: function (api, rowIdx, columns) {
                var data = $.map(columns, function (col, i) {
                    return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                        ? '<tr data-dt-row="' +
                        col.rowIndex +
                        '" data-dt-column="' +
                        col.columnIndex +
                        '">' +
                        '<td>' +
                        col.title +
                        ':' +
                        '</td> ' +
                        '<td>' +
                        col.data +
                        '</td>' +
                        '</tr>'
                        : '';
                }).join('');

                return data ? $('<table class="table"/>').append(data) : false;
            }
        }
    },
    language: {
        paginate: {
            // remove previous & next text from pagination
            previous: '&nbsp;',
            next: '&nbsp;'
        }
    }
});

function load_staff() {

    staff_table = $('.table-staff').DataTable({
        processing: true,
        serverSide: true,
        ajax: getUrl() + '/urussetia/kumpulan/staff',
        lengthChange:true,
        columns: [
            {data: 'nokp'},
            {data: 'nokp'},
            {data: 'nama'},
            {data: 'jawatan'},
            // {data: 'kod_gred'},
            // {data: 'jurusan'},
            // {data: 'tempat'},
            {data: 'tkh_sah_perkhidmatan'},
            {data: 'kod_kanan'},

        ],
        createdRow: function( row, data, dataIndex ) {
            $(row).addClass('kumpulan-row');
        },
        columnDefs: [
            {
                'targets': 0,
                'checkboxes': {
                   'selectRow': true
                }
             }
        ],
        dom:
            '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        lengthMenu: [10, 15, 25, 50, 75, 100],
        buttons: [,

        ],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details of ' + data['full_name'];
                    }
                }),
                type: 'column',
                renderer: function (api, rowIdx, columns) {
                    var data = $.map(columns, function (col, i) {
                        return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                            ? '<tr data-dt-row="' +
                            col.rowIndex +
                            '" data-dt-column="' +
                            col.columnIndex +
                            '">' +
                            '<td>' +
                            col.title +
                            ':' +
                            '</td> ' +
                            '<td>' +
                            col.data +
                            '</td>' +
                            '</tr>'
                            : '';
                    }).join('');

                    return data ? $('<table class="table"/>').append(data) : false;
                }
            }
        },
        language: {
            paginate: {
                // remove previous & next text from pagination
                previous: '&nbsp;',
                next: '&nbsp;',
                loadingRecords: 'Sedang Muat Turun'
            }
        },
        select: {
            'style': 'multi'
        },
        destroy: true,
    });
}

function search_staff(tahun,jurusan,gred) {

    staff_table = $('.table-staff').DataTable({
        processing: true,
        serverSide: true,
        ajax: getUrl() + '/urussetia/kumpulan/carian?tahun='+tahun+'&jurusan='+jurusan+'&gred='+gred,
        // type: "GET",
		// data: {
		// 	jurusan: jurusan,
		// 	gred: gred,
		// 	tahun: tahun
		// },
        lengthChange:true,
        columns: [
            {data: 'nokp'},
            {data: 'nokp'},
            {data: 'nama'},
            {data: 'jawatan'},
            // {data: 'kod_gred'},
            // {data: 'jurusan'},
            // {data: 'tempat'},
            {data: 'tkh_sah_perkhidmatan'},
            {data: 'kod_kanan'},
        ],
        createdRow: function( row, data, dataIndex ) {
            $(row).addClass('kumpulan-row');
        },
        columnDefs: [
            {
                'targets': 0,
                'checkboxes': {
                   'selectRow': true
                }
             }
        ],
        dom:
            '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        lengthMenu: [10, 15, 25, 50, 75, 100],
        buttons: [,

        ],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details of ' + data['full_name'];
                    }
                }),
                type: 'column',
                renderer: function (api, rowIdx, columns) {
                    var data = $.map(columns, function (col, i) {
                        return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                            ? '<tr data-dt-row="' +
                            col.rowIndex +
                            '" data-dt-column="' +
                            col.columnIndex +
                            '">' +
                            '<td>' +
                            col.title +
                            ':' +
                            '</td> ' +
                            '<td>' +
                            col.data +
                            '</td>' +
                            '</tr>'
                            : '';
                    }).join('');

                    return data ? $('<table class="table"/>').append(data) : false;
                }
            }
        },
        language: {
            paginate: {
                // remove previous & next text from pagination
                previous: '&nbsp;',
                next: '&nbsp;',
                loadingRecords: 'Sedang Muat Turun'
            }
        },
        select: {
            'style': 'multi'
        },
        destroy: true,
    });
}

function display_staff(batch) {
    staff2_table = $('.table-staff2').DataTable({
        processing: true,
        serverSide: true,
        ajax: getUrl() + '/urussetia/kumpulan/calon?batch_id='+batch,
        lengthChange:true,
        columns: [
            {data: 'nokp'},
            {data: 'nama'},
            {data: 'jawatan'},
            // {data: 'kod_gred'},
            // {data: 'jurusan'},
            // {data: 'tempat'},
            {data: 'tkh_sah_perkhidmatan'},
            {data: 'kod_kanan'},
            {data: 'aksi'},
        ],
        createdRow: function( row, data, dataIndex ) {
            $(row).addClass('batch-row');
        },
        columnDefs: [
            // {
            //     'targets': 0,
            //     'checkboxes': {
            //        'selectRow': true
            //     }
            //  },
             {
                // Actions
                targets: -1,
                title: 'Tindakan',
                orderable: false,
                render: function (data, type, full, meta) {
                    return (
                        '<button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light calon-delete">'+ feather.icons['trash-2'].toSvg() +' Hapus</button>'
                    );
                }
            }
        ],
        dom:
            '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        lengthMenu: [10, 15, 25, 50, 75, 100],
        buttons: [,

        ],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details of ' + data['full_name'];
                    }
                }),
                type: 'column',
                renderer: function (api, rowIdx, columns) {
                    var data = $.map(columns, function (col, i) {
                        return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                            ? '<tr data-dt-row="' +
                            col.rowIndex +
                            '" data-dt-column="' +
                            col.columnIndex +
                            '">' +
                            '<td>' +
                            col.title +
                            ':' +
                            '</td> ' +
                            '<td>' +
                            col.data +
                            '</td>' +
                            '</tr>'
                            : '';
                    }).join('');

                    return data ? $('<table class="table"/>').append(data) : false;
                }
            }
        },
        language: {
            paginate: {
                // remove previous & next text from pagination
                previous: '&nbsp;',
                next: '&nbsp;',
                loadingRecords: 'Sedang Muat Turun'
            }
        },
        select: {
            'style': 'multi'
        },
        destroy: true,
    });
}
