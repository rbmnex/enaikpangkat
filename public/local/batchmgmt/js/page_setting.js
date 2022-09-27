dropdown_populate(
    '.dropdown-gred',
    '',
    'dropdown',
    'Gred',
    []
);

dropdown_populate(
    '.dropdown-jurusan',
    '',
    'dropdown',
    'Jurusan',
    []
);

dropdown_populate(
    '.dropdown-gred-2',
    '',
    'dropdown',
    'Gred',
    []
);

dropdown_populate(
    '.dropdown-jurusan-2',
    '',
    'dropdown',
    'Jurusan',
    []
);

dropdown_populate(
    '.dropdown-jawatan',
    '',
    'dropdown',
    'Jawatan',
    []
);

$('.calon-carian').wrap('<div class="position-relative"></div>').select2({
    dropdownAutoWidth: true,
    dropdownParent: $('.calon-carian').parent(),
    width: '100%',
    language: {
        inputTooShort: function(){
            return 'Sekurang-kurangnya mengisi satu huruf...';
        },
        searching: function(){
            return 'Sedang Mencari Pengguna...';
        }
    },
    ajax: {
        url: getUrl() + '/urussetia/kumpulan/find',
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
