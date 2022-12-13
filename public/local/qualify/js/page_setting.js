let dt = DatatableUI.init({
    selector: '.table-personal',
    columnList: [
        {data: 'id'},
        {data: 'nokp'},
        {data: 'nama'},
        {data: 'position'},
        {data: 'kumpulan'},
    ],
    url: '/urussetia/appl/calon/list/success',
    buttons: [
        {
            text: feather.icons['send'].toSvg({ class: 'me-50 font-small-4' }) + 'Hantar',
            className: 'btn btn-primary',
            attr: {
                'id': 'hantar-calon-berjaya'
            },
            init: function (api, node, config) {
                $(node).removeClass('btn-secondary');
            }
        }
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
    label: 'Senarai Calon'

});
