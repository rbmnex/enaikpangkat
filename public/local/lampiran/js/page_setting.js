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

function separateComma(val) {
    // remove sign if negative
    var sign = 1;
    if (val < 0) {
      sign = -1;
      val = -val;
    }
    // trim the number decimal point if it exists
    let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();
    let len = num.toString().length;
    let result = '';
    let count = 1;

    for (let i = len - 1; i >= 0; i--) {
      result = num.toString()[i] + result;
      if (count % 3 === 0 && count !== 0 && i !== 0) {
        result = ',' + result;
      }
      count++;
    }

    // add number after decimal point
    if (val.toString().includes('.')) {
      result = result + '.' + val.toString().split('.')[1];
    }
    // return result with - sign if negative
    return sign < 0 ? '-' + result : result;
  }
