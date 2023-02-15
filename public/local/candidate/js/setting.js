DatatableUI.init({
    selector: '.table-candidate',
    columnList: [
        {data: 'nokp'},
        {data: 'nama'},
        {data: 'pangkat'},
        {data: 'gred_pemangkuan'},
        {data: 'tempoh'},
        {data: 'aksi'},
    ],
    url: '/urussetia/promote/load',
    buttons: [

    ],
    columnDef: [
        {
            // Actions
            targets: -1,
            title: 'Tindakan',
            orderable: false,
            searchable: false,
            render: function (data, type, full, meta) {
                let flag = full.flag;
                var btn = '';
                if(flag == 1)
                    btn += '<button type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light send-email">'+ feather.icons['mail'].toSvg() +' Hantar</button>';
                else if(flag == 2)
                    btn += 'Tawaran Sudah Dihantar';

                return btn;
            }
        }
    ],
    label: 'Senarai Calon Naik Pangkat'
});
