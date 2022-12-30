(function (window, document, $) {
    validate_mykj();
}) (window, document, jQuery);

$('.div-loan-1').hide();
$('.div-loan-2').hide();
$('.div-loan-3').hide();
$('.div-loan-4').hide();
$('.div-loan-5').hide();
$('.div-loan-6').hide();
$('.div-loan-7').hide();

$('.reason_reject').hide();

var bsStepper = document.querySelectorAll('.bs-stepper'),
verticalWizard = document.querySelector('.vertical-wizard-example'),
select = $('.select2');
var basicPickr = $('.flatpickr-basic');
var loanPickr = $('.flatpickr-loan');
select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      placeholder: '-- Sila Pilih --',
      dropdownParent: $this.parent()
    });
  });

  if (basicPickr.length) {
    basicPickr.flatpickr({
            dateFormat: 'd-m-Y',
            static: true
        }
    );
  }

  if (loanPickr.length) {
    loanPickr.flatpickr(
        {
            // plugins: [
            //     new monthSelectPlugin({
            //       shorthand: true, //defaults to false
            //       dateFormat: "m.y", //defaults to "F Y"
            //       altFormat: "F Y", //defaults to "F Y"
            //       theme: "light" // defaults to "light"
            //     })
            // ]
            dateFormat: 'd-m-Y'
        }
    );
  }
  // Adds crossed class
//   if (typeof bsStepper !== undefined && bsStepper !== null) {
//     for (var el = 0; el < bsStepper.length; ++el) {
//       bsStepper[el].addEventListener('show.bs-stepper', function (event) {
//         var index = event.detail.indexStep;
//         var numberOfSteps = $(event.target).find('.step').length - 1;
//         var line = $(event.target).find('.step');

//         // The first for loop is for increasing the steps,
//         // the second is for turning them off when going back
//         // and the third with the if statement because the last line
//         // can't seem to turn off when I press the first item. ¯\_(ツ)_/¯

//         for (var i = 0; i < index; i++) {
//           line[i].classList.add('crossed');

//           for (var j = index; j < numberOfSteps; j++) {
//             line[j].classList.remove('crossed');
//           }
//         }
//         if (event.detail.to == 0) {
//           for (var k = index; k < numberOfSteps; k++) {
//             line[k].classList.remove('crossed');
//           }
//           line[0].classList.remove('crossed');
//         }
//       });
//     }
//   }

    // select2


      //if (typeof verticalWizard !== undefined && verticalWizard !== null) {
        var verticalStepper = new Stepper(verticalWizard, {
          linear: false
        });
        $(verticalWizard)
          .find('.btn-next')
          .on('click', function () {
            verticalStepper.next();
          });
        $(verticalWizard)
          .find('.btn-prev')
          .on('click', function () {
            verticalStepper.previous();
          });

        // $(verticalWizard)
        //   .find('.btn-submit')
        //   .on('click', function () {
        //     alert('Submitted..!!');
        //   });
      //}

function add_row(selector,row,attribute) {
    var content = '<tr '+attribute+'>';
    for(var i = 0; i < row.length; i++) {
        content+= '<td>'+row[i]+'</td>';
    }
    content += '</tr>';
    $(selector).append(content);
}

function remove_row(selector) {
    let tr = selector.closest('tr');
    tr.remove();
}

$('.pengguna-carian').wrap('<div class="position-relative"></div>').select2({
    dropdownAutoWidth: true,
    dropdownParent: $('.pengguna-carian').parent(),
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
        url: getUrl() + '/admin/pengguna/carian',
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
    placeholder: 'Sila Isi Nama Pengguna',
    minimumInputLength: 1,
});

$('.pegawai-carian').wrap('<div class="position-relative"></div>').select2({
    dropdownAutoWidth: true,
    dropdownParent: $('.pegawai-carian').parent(),
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
        url: getUrl() + '/admin/pengguna/carian',
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
    placeholder: 'Sila Isi Nama Pengguna',
    minimumInputLength: 1,
});

function validate_mykj() {
    var name = $('#sect-1-nama').val();
        var nokp = $('#sect-1-nokp').val();
        var jawatan = $('#sect-1-jawatan').val();
        var tkh_lantik = $('#sect-1-tkh_lantik').val();
        var bersara = $('#sect-1-bersara').val();
        var gred = $('#sect-1-gred').val();
        var tkh_sah = $('#sect-1-tkh_sah').val();

        if( name == 0 || name == '' || name == undefined) {
            addInvalid('#sect-1-nama', 'Tiada Nama, Sila Kemaskini di MyKj');
        }

        if( nokp == 0 || nokp == '' || nokp == undefined) {
            addInvalid('#sect-1-nokp', 'Tiada No Kad Pengenalan (Baru), Sila Kemaskini di MyKj');
        }

        if( jawatan == 0 || jawatan == '' || jawatan == undefined) {
            addInvalid('#sect-1-jawatan', 'Tiada Jawatan, Sila Kemaskini di MyKj');
        }

        if( tkh_lantik == 0 || tkh_lantik == '' || tkh_lantik == undefined) {
            addInvalid('#sect-1-tkh_lantik', 'Tiada Tarikh Lantikan Perkhidmatan, Sila Kemaskini di MyKj');
        }

        if( bersara == 0 || bersara == '' || bersara == undefined) {
            addInvalid('#sect-1-bersara', 'Tiada Umur Persaraan Wajib, Sila Kemaskini di MyKj');
        }

        if( gred == 0 || gred == '' || gred == undefined) {
            addInvalid('#sect-1-gred', 'Tiada Gred, Sila Kemaskini di MyKj');
        }

        if( tkh_sah == 0 || tkh_sah == '' || tkh_sah == undefined) {
            addInvalid('#sect-1-tkh_sah', 'Tiada Tarikh Disahkan Jawatan, Sila Kemaskini di MyKj');
        }

        var alamat_pej = $('#sect-2-alamat_pej').val();
        var tel_pejabat = $('#sect-2-tel_pejabat').val();
        var no_tel = $('#sect-2-no_tel').val();
        var emel = $('#sect-2-emel').val();

        if( alamat_pej == 0 || alamat_pej == '' || alamat_pej == undefined) {
            addInvalid('#sect-2-alamat_pej', 'Tiada Alamat Tempat Bertugas, Sila Kemaskini di MyKj');
        }

        if( tel_pejabat == 0 || tel_pejabat == '' || tel_pejabat == undefined) {
            addInvalid('#sect-2-tel_pejabat', 'Tiada No Telefon Pejabat, Sila Kemaskini di MyKj');
        }

        if( no_tel == 0 || no_tel == '' || no_tel == undefined) {
            addInvalid('#sect-2-no_tel', 'Tiada No Telefon Bimbit, Sila Kemaskini di MyKj');
        }

        if( emel == 0 || emel == '' || emel == undefined) {
            addInvalid('#sect-2-no_tel', 'Tiada Emel, Sila Kemaskini di MyKj');
        }

        var nama =$('#sect-4-nama ').val();
        var nokp =$('#sect-4-nokp').val();
        var jantina =$('#sect-4-jantina').val();
        var bangsa =$('#sect-4-bangsa').val();
        var agama =$('#sect-4-agama').val();
        var tkh_lahir =$('#sect-4-tkh_lahir').val();
        var tmpt_lahir =$('#sect-4-tmpt_lahir').val();
        var jawatan =$('#sect-4-jawatan').val();
        var gred =$('#sect-4-gred').val();
        var gaji=$('#sect-4-gaji').val();
        var taraf=$('#sect-4-taraf').val();
        var alamat_bertugas =$('#sect-4-alamat_bertugas').val();
        var alamat_rumah =$('#sect-4-alamat_rumah').val();
        var nama_pasangan =$('#sect-4-nama_pasangan').val();

        if( nama == 0 || nama == '' || nama == undefined) {
            addInvalid('#sect-4-nama', 'Tiada Nama, Sila Kemaskini di MyKj');
        }

        if( nokp == 0 || nokp == '' || nokp == undefined) {
            addInvalid('#sect-4-nokp', 'Tiada No Kad Pengenalan (Baru), Sila Kemaskini di MyKj');
        }

        if( jantina == 0 || jantina == '' || jantina == undefined) {
            addInvalid('#sect-4-jantina', 'Tiada Jantina, Sila Kemaskini di MyKj');
        }

        if( bangsa == 0 || bangsa == '' || bangsa == undefined) {
            addInvalid('#sect-4-bangsa', 'Tiada Bangsa, Sila Kemaskini di MyKj');
        }

        if( agama == 0 || agama == '' || agama == undefined) {
            addInvalid('#sect-4-agama', 'Tiada Agama, Sila Kemaskini di MyKj');
        }

        if( tkh_lahir == 0 || tkh_lahir == '' || tkh_lahir == undefined) {
            addInvalid('#sect-4-tkh_lahir', 'Tiada Tarikh Lahir, Sila Kemaskini di MyKj');
        }

        if( tmpt_lahir == 0 || tmpt_lahir == '' || tmpt_lahir == undefined) {
            addInvalid('#sect-4-tmpt_lahir', 'Tiada Tempat Lahir, Sila Kemaskini di MyKj');
        }

        if( jawatan == 0 || jawatan == '' || jawatan == undefined) {
            addInvalid('#sect-4-tmpt_lahir', 'Tiada Jawatan, Sila Kemaskini di MyKj');
        }

        if( gred == 0 || gred == '' || gred == undefined) {
            addInvalid('#sect-4-gred', 'Tiada Gred, Sila Kemaskini di MyKj');
        }

        if( gaji == 0 || gaji == '' || gaji == undefined) {
            addInvalid('#sect-4-gaji', 'Tiada Gaji Hakiki, Sila Kemaskini di MyKj');
        }

        if( alamat_bertugas == 0 || alamat_bertugas == '' || alamat_bertugas == undefined) {
            addInvalid('#sect-4-alamat_bertugas', 'Tiada Alamat Pejabat, Sila Kemaskini di MyKj');
        }

        if( alamat_rumah == 0 || alamat_rumah == '' || alamat_rumah == undefined) {
            addInvalid('#sect-4-alamat_rumah', 'Tiada Alamat Rumah, Sila Kemaskini di MyKj');
        }

        if(taraf == 'KAHWIN') {
            if( nama_pasangan == 0 || nama_pasangan == '' || nama_pasangan == undefined) {
                addInvalid('#sect-4-nama_pasangan', 'Tiada Nama Pasangan, Sila Kemaskini di MyKj');
            }
        }

}

function validate_form() {
    let valid = true;

    var tarikh_harta = $('#tarikhAkhir_harta').val();
    var status_pinjam = $('#status_pinjam').val();
    var tatatertib = $('.tatatertib');

    //section 1
    if(valid) {
        var name = $('#sect-1-nama').val();
        var nokp = $('#sect-1-nokp').val();
        var jawatan = $('#sect-1-jawatan').val();
        var tkh_lantik = $('#sect-1-tkh_lantik').val();
        var bersara = $('#sect-1-bersara').val();
        var gred = $('#sect-1-gred').val();
        var tkh_sah = $('#sect-1-tkh_sah').val();

        console.log('sect-1 is '+valid);

        if( name == 0 || name == '' || name == undefined) {
            valid = false;
            addInvalid('#sect-1-nama', 'Tiada Nama, Sila Kemaskini di MyKj');
        }

        console.log('nama is '+valid);

        if( nokp == 0 || nokp == '' || nokp == undefined) {
            valid = false;
            addInvalid('#sect-1-nokp', 'Tiada No Kad Pengenalan (Baru), Sila Kemaskini di MyKj');
        }

        console.log('nokp is '+valid);

        if( jawatan == 0 || jawatan == '' || jawatan == undefined) {
            valid = false;
            addInvalid('#sect-1-jawatan', 'Tiada Jawatan, Sila Kemaskini di MyKj');
        }

        console.log('jawatan is '+valid);

        if( tkh_lantik == 0 || tkh_lantik == '' || tkh_lantik == undefined) {
            valid = false;
            addInvalid('#sect-1-tkh_lantik', 'Tiada Tarikh Lantikan Perkhidmatan, Sila Kemaskini di MyKj');
        }

        console.log('tkh_lantik is '+valid);

        if( bersara == 0 || bersara == '' || bersara == undefined) {
            valid = false;
            addInvalid('#sect-1-bersara', 'Tiada Umur Persaraan Wajib, Sila Kemaskini di MyKj');
        }

        console.log('bersara is '+valid);

        if( gred == 0 || gred == '' || gred == undefined) {
            valid = false;
            addInvalid('#sect-1-gred', 'Tiada Gred, Sila Kemaskini di MyKj');
        }

        console.log('gred is '+valid);

        if( tkh_sah == 0 || tkh_sah == '' || tkh_sah == undefined) {
            valid = false;
            addInvalid('#sect-1-tkh_sah', 'Tiada Tarikh Disahkan Jawatan, Sila Kemaskini di MyKj');
        }
        console.log('tkh_sah is '+valid);

        console.log('sect-1 is '+valid);

        if(!valid) {
            verticalStepper.to(1);
            return valid;
        }
    }

    //section 2
    if(valid) {
        var alamat_pej = $('#sect-2-alamat_pej').val();
        var tel_pejabat = $('#sect-2-tel_pejabat').val();
        var no_tel = $('#sect-2-no_tel').val();
        var emel = $('#sect-2-emel').val();

        if( alamat_pej == 0 || alamat_pej == '' || alamat_pej == undefined) {
            valid = false;
            addInvalid('#sect-2-alamat_pej', 'Tiada Alamat Tempat Bertugas, Sila Kemaskini di MyKj');
        }

        if( tel_pejabat == 0 || tel_pejabat == '' || tel_pejabat == undefined) {
            valid = false;
            addInvalid('#sect-2-tel_pejabat', 'Tiada No Telefon Pejabat, Sila Kemaskini di MyKj');
        }

        if( no_tel == 0 || no_tel == '' || no_tel == undefined) {
            valid = false;
            addInvalid('#sect-2-no_tel', 'Tiada No Telefon Bimbit, Sila Kemaskini di MyKj');
        }

        if( emel == 0 || emel == '' || emel == undefined) {
            valid = false;
            addInvalid('#sect-2-no_tel', 'Tiada Emel, Sila Kemaskini di MyKj');
        }

        if($('.cuti-file').is(':empty')) {
            valid = false;
            addInvalid('.cuti-error', 'Sila Muat Naik Borang Pengesahan (Disahkan oleh Kerani Perkhidmatan)');
        }

        if(!valid) {
            verticalStepper.to(2);
            return valid;
        }
    }

    //section 3
    if(valid) {
        // if( tarikh_harta == 0 || tarikhAkhir_harta == '' || tarikhAkhir_harta == undefined) {
        //     valid = false;
        //     addInvalid('#tarikhAkhir_harta', 'Tiada Tarikh Pengisytiharan Harta Terkini!');
        // }

        if($('#tarikhAkhir_harta').hasClass('is-invalid'))  {
            valid = false;
        }

        if($('.harta-file').is(':empty')) {
            valid = false;
            addInvalid('.harta-file', 'Sila Muat Naik Lampiran E dari yang dijana dari HRMIS!');
        }

        if(!valid) {
            verticalStepper.to(3);
            return valid;
        }
    }

    //section 4
    if(valid) {
        var nama =$('#sect-4-nama ').val();
        var nokp =$('#sect-4-nokp').val();
        var jantina =$('#sect-4-jantina').val();
        var bangsa =$('#sect-4-bangsa').val();
        var agama =$('#sect-4-agama').val();
        var tkh_lahir =$('#sect-4-tkh_lahir').val();
        var tmpt_lahir =$('#sect-4-tmpt_lahir').val();
        var jawatan =$('#sect-4-jawatan').val();
        var gred =$('#sect-4-gred').val();
        var gaji=$('#sect-4-gaji').val();
        var taraf=$('#sect-4-taraf').val();
        var alamat_bertugas =$('#sect-4-alamat_bertugas').val();
        var alamat_rumah =$('#sect-4-alamat_rumah').val();
        var nama_pasangan =$('#sect-4-nama_pasangan').val();
        //var jawatan_pasangan =$('#sect-4-jawatan_pasangan').val();
        //var alamat_pejabat_pasangan =$('#sect-4-alamat_pejabat_pasangan').val();

        if( nama == 0 || nama == '' || nama == undefined) {
            valid = false;
            addInvalid('#sect-4-nama', 'Tiada Nama, Sila Kemaskini di MyKj');
        }

        if( nokp == 0 || nokp == '' || nokp == undefined) {
            valid = false;
            addInvalid('#sect-4-nokp', 'Tiada No Kad Pengenalan (Baru), Sila Kemaskini di MyKj');
        }

        if( jantina == 0 || jantina == '' || jantina == undefined) {
            valid = false;
            addInvalid('#sect-4-jantina', 'Tiada Jantina, Sila Kemaskini di MyKj');
        }

        if( bangsa == 0 || bangsa == '' || bangsa == undefined) {
            valid = false;
            addInvalid('#sect-4-bangsa', 'Tiada Bangsa, Sila Kemaskini di MyKj');
        }

        if( agama == 0 || agama == '' || agama == undefined) {
            valid = false;
            addInvalid('#sect-4-agama', 'Tiada Agama, Sila Kemaskini di MyKj');
        }

        if( tkh_lahir == 0 || tkh_lahir == '' || tkh_lahir == undefined) {
            valid = false;
            addInvalid('#sect-4-tkh_lahir', 'Tiada Tarikh Lahir, Sila Kemaskini di MyKj');
        }

        if( tmpt_lahir == 0 || tmpt_lahir == '' || tmpt_lahir == undefined) {
            valid = false;
            addInvalid('#sect-4-tmpt_lahir', 'Tiada Tempat Lahir, Sila Kemaskini di MyKj');
        }

        if( jawatan == 0 || jawatan == '' || jawatan == undefined) {
            valid = false;
            addInvalid('#sect-4-tmpt_lahir', 'Tiada Jawatan, Sila Kemaskini di MyKj');
        }

        if( gred == 0 || gred == '' || gred == undefined) {
            valid = false;
            addInvalid('#sect-4-gred', 'Tiada Gred, Sila Kemaskini di MyKj');
        }

        if( gaji == 0 || gaji == '' || gaji == undefined) {
            valid = false;
            addInvalid('#sect-4-gaji', 'Tiada Gaji Hakiki, Sila Kemaskini di MyKj');
        }

        if( alamat_bertugas == 0 || alamat_bertugas == '' || alamat_bertugas == undefined) {
            valid = false;
            addInvalid('#sect-4-alamat_bertugas', 'Tiada Alamat Pejabat, Sila Kemaskini di MyKj');
        }

        if( alamat_rumah == 0 || alamat_rumah == '' || alamat_rumah == undefined) {
            valid = false;
            addInvalid('#sect-4-alamat_rumah', 'Tiada Alamat Rumah, Sila Kemaskini di MyKj');
        }

        if(taraf == 'KAHWIN') {
            if( nama_pasangan == 0 || nama_pasangan == '' || nama_pasangan == undefined) {
                valid = false;
                addInvalid('#sect-4-nama_pasangan', 'Tiada Nama Pasangan, Sila Kemaskini di MyKj');
            }
        }

        if(!valid) {
            verticalStepper.to(4);
            return valid;
        }
    }

    if(valid) {
        if( status_pinjam == "") {
            valid = false;
            addInvalid('#status_pinjam', 'Sila pilih pengakuan pinjaman pendidikan');

        } else if(status_pinjam > 0) {
            var nama_tabung = $('.nama_tabung').val();
            var jumlah_pinjaman = $('.jumlah_pinjaman').val();
            var mula_pinjam = $('.mula_pinjam').val();
            var akhir_pinjam = $('.akhir_pinjam').val();
            var bayar_mula = $('.bayar_mula').val();
            var selesai_bayar = $('.selesai_bayar').val();

            if(status_pinjam == 1 || status_pinjam == "1" || status_pinjam == 2 || status_pinjam == "2" || status_pinjam == 3 || status_pinjam == "3") {
                if(nama_tabung == '' || nama_tabung == undefined) {
                    valid = false;
                    addInvalid('.nama_tabung', 'Sila isikan Nama Institusi/ Tabung Pendidikan');
                }
                if(jumlah_pinjaman == '' || jumlah_pinjaman == undefined) {
                    valid = false;
                    addInvalid('.jumlah_pinjaman', 'Sila isikan Jumlah Pinjaman');
                }
                if(mula_pinjam == '' || mula_pinjam == undefined) {
                    valid = false;
                    addInvalid('.mula_pinjam', 'Sila isikan Tarikh Mula Pinjaman');
                }
                if(akhir_pinjam == '' || akhir_pinjam == undefined) {
                    valid = false;
                    addInvalid('.akhir_pinjam', 'Sila isikan Tarikh Akhir Pinjaman');
                }

                if($('.loan-file').is(':empty')) {
                    valid = false;
                    addInvalid('.selesai_bayar', 'Sila Muat Naik Penyata Pembayaran Pinjaman Terkini atau Surat Pengesahan Menyelesaikan Pinjaman Pendidikan');
                }
            }

            if(status_pinjam == '2' || status_pinjam == 2) {
                if(bayar_mula == '' || bayar_mula == undefined) {
                    valid = false;
                    addInvalid('.bayar_mula', 'Sila isikan Tarikh Bayaran Mulai');
                }
            }

            if(status_pinjam == '3' || status_pinjam == 3) {
                if(selesai_bayar == '' || selesai_bayar == undefined) {
                    valid = false;
                    addInvalid('.selesai_bayar', 'Sila isikan Tarikh Selesai Pembayaran');
                }
            }
        }
        if(!valid) {
            verticalStepper.to(11);
            return valid;
        }
    }

    if(valid) {
        if(!tatatertib.is(':checked')) {
            valid = false;
            addInvalid('#label-tatatertib', 'Sila Pilih Pengakuan Ini');
        }

        if(!$('.denda').is(':checked')) {
            valid = false;
            addInvalid('#label-denda', 'Sila Pilih Pengakuan Ini');
        }

        if(!$('.cuti_check').is(':checked')) {
            valid = false;
            addInvalid('#label-cuti_check', 'Sila Pilih Pengakuan Ini');
        }

        if(!$('.akuan_peribadi').is(':checked')) {
            valid = false;
            addInvalid('.akuan_peribadi', 'Sila Tandakan Pengakuan Ini');
        }

        if(!valid) {
            verticalStepper.to(12);
            return valid;
        }
    }

    if(valid) {
        if($('.pengguna-nokp').val() == '' || $('.pengguna-nokp').val() == undefined) {
            valid = false;
            addInvalid('.pengguna-nokp', 'Sila Pilih Ketua Bahagian Perkhidmatan / Kerani');
        }

        if($('.pegawai-nokp').val() == '' || $('.pengguna-nokp').val() == undefined) {
            valid = false;
            addInvalid('.pegawai-nokp', 'Sila Pilih Ketua Jabatan');
        }

        if(!valid) {
            verticalStepper.to(13);
            return valid;
        }

        if(!$('.radio-accept').is(':checked')) {
            valid = false;
            addInvalid('#label-radio-accept', 'Sila Pilih Keputusan Anda');
        }

        console.log('radio terima/tidak = '+$('input[name="terima_tawaran"]:checked').val());

        if($('input[name="terima_tawaran"]:checked').val() == 0 || $('input[name="terima_tawaran"]:checked').val() == '0') {
            if($('.alasan_tolak').val() == '' || $('.alasan_tolak').val() == undefined) {
                valid = false;
                addInvalid('.alasan_tolak', 'Sila Berikan Alasan Anda');
            }
        }

        if(!valid) {
            verticalStepper.to(14);
            return valid;
        }
    }

    return valid;
}

