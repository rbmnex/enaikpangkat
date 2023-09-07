Flatpickrinit.initAll('#tawaran-tkh-lapor-diri', '#tawaran-tkh-mula-tugas',  '#tawaran-tkh-tangguh-start','#tawaran-tkh-tangguh-end');

Select2init.initAll();

Select2init.penggunaSearch({selector: '#tawaran-ketua-bahagian'});
Select2init.penggunaSearch({selector: '#tawaran-ketua-jabatan'});

let g = $('#tawaran-setuju').val();
if(g == '' || g == 'TL') {
    $('.notis-tolak').hide();
} else {
    $('.notis-tolak').show();
}

function compareCheckInDate(val) {
    // 00-00-0000
    let day = val.substring(0,2);
    let month = val.substring(3,5);
    let year = val.substring(6);
    let today  = new Date();
    let checkInDay = new Date(year,month - 1, day);


    if(today >= checkInDay) {
        return true;
    } else {
        return false;
    }

}
