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

    if( tarikh_harta == 0 || tarikhAkhir_harta == '' || tarikhAkhir_harta == undefined) {
        valid = false;
        addInvalid('#tarikhAkhir_harta', 'Tiada Tarikh Pengisytiharan Harta Terkini!');
    }

    if( status_pinjam == "") {
        valid = false;
        addInvalid('#status_pinjam', 'Sila pilih pengakuan pinjaman pendidikan');
    }

    return valid;
}

