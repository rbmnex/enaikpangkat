var bsStepper = document.querySelectorAll('.bs-stepper'),
verticalWizard = document.querySelector('.vertical-wizard-example'),
select = $('.select2');

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
    select.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this.select2({
          placeholder: '-- Sila Pilih --',
          dropdownParent: $this.parent()
        });
      });

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
