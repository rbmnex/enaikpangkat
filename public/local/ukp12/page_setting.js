(function (window, document, $) {

}) (window, document, jQuery);

$('.div-loan-1').hide();
$('.div-loan-2').hide();
$('.div-loan-3').hide();
$('.div-loan-4').hide();
$('.div-loan-5').hide();
$('.div-loan-6').hide();
$('.div-loan-7').hide();

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
    basicPickr.flatpickr();
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

function validate_form() {
    let valid = true;

    var tarikh_harta = $('#tarikhAkhir_harta').val();
    var status_pinjam = $('#status_pinjam').val();
    var tatatertib = $('.tatatertib');

    if( tarikh_harta == 0 || tarikhAkhir_harta == '' || tarikhAkhir_harta == undefined) {
        valid = false;
        addInvalid('#tarikhAkhir_harta', 'Tiada Tarikh Pengisytiharan Harta Terkini!');
        verticalStepper.to(3);
    } else if($('.harta-file').is(':empty')) {
        valid = false;
        addInvalid('#harta-file', 'Sila Muat Naik Lampiran E dari yang dijana dari HRMIS!');
        verticalStepper.to(3);
    } else if( status_pinjam == "") {
        valid = false;
        addInvalid('#status_pinjam', 'Sila pilih pengakuan pinjaman pendidikan');
        verticalStepper.to(11);
    } else if(status_pinjam != '0' || status_pinjam != 0) {
        var nama_tabung = $('.nama_tabung').val();
        var jumlah_pinjaman = $('.jumlah_pinjaman').val();
        var mula_pinjam = $('.mula_pinjam').val();
        var akhir_pinjam = $('.akhir_pinjam').val();
        var bayar_mula = $('.bayar_mula').val();
        var selesai_bayar = $('.selesai_bayar').val();
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
        if($('.loan-file').is(':empty')) {
            valid = false;
            addInvalid('.selesai_bayar', 'Sila Muat Naik Penyata Pembayaran Pinjaman Terkini atau Surat Pengesahan Menyelesaikan Pinjaman Pendidikan');
        }
        if(!valid) {
            verticalStepper.to(11);
        } else {
            if(!tatatertib.is(':checked')) {
                valid = false;
                addInvalid('#label-tatatertib', 'Sila Pilih Akuan Ini');
                verticalStepper.to(12);
            } else if(!$('.denda').is(':checked')) {
                valid = false;
                addInvalid('#label-denda', 'Sila Pilih Akuan Ini');
                verticalStepper.to(12);
            } else if(!$('.cuti_check').is(':checked')) {
                valid = false;
                addInvalid('#label-cuti_check', 'Sila Pilih Akuan Ini');
                verticalStepper.to(12);
            } else if(!$('.akuan_peribadi').is(':checked')) {
                valid = false;
                addInvalid('.akuan_peribadi', 'Sila Tandakan Akuan');
                verticalStepper.to(12);
            } else if($('.pengguna-nokp').val() == '' || $('.pengguna-nokp').val() == undefined) {
                valid = false;
                addInvalid('.pengguna-nokp', 'Sila Pilih Ketua Bahagian Perkhidmatan / Kerani');
                verticalStepper.to(13);
            } else if($('.pegawai-nokp').val() == '' || $('.pengguna-nokp').val() == undefined) {
                valid = false;
                addInvalid('.pegawai-nokp', 'Sila Pilih Ketua Jabatan');
                verticalStepper.to(13);
            } else if(!$('.radio-accept').is(':checked')) {
                valid = false;
                addInvalid('#label-radio-accept', 'Sila Berikan Jawapan Anda');
                verticalStepper.to(14);
            } else if($('input[name="terima_tawaran"]:checked').val() == 1 || $('input[name="terima_tawaran"]:checked').val() == '1') {
                if($('.alasan_tolak').val() == '' || $('.palasan_tolak').val() == undefined) {
                    valid = false;
                    addInvalid('.alasan_tolak', 'Sila Berikan Alasan Anda');
                    verticalStepper.to(14);
                }
            } else {
                valid = true;
            }
        }
    } else {
        valid = true;
    }




    return valid;
}

