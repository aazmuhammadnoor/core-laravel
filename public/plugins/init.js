$(document).ready(function () {

	$('.sidebar-menu').tree()

	$('.select2').select2()

	$('.date-mask').inputmask('yyyy-dd-mm', { 
		'placeholder': 'yyyy-dd-mm' 
	})

	$('.date-mask2').inputmask('yyyy-dd-mm', { 
		'placeholder': 'yyyy-dd-mm' 
	})

	$('[data-mask]').inputmask()

	$('.date-range-picker').daterangepicker({
		locale: { 
			format: 'YYYY-MM-DD' 
		}
	})

	$('.date-range-time-picker').daterangepicker({ 
		timePicker: true, 
		timePickerIncrement: 1, 
		timePicker24Hour : true,
		locale: { 
			format: 'YYYY-MM-DD hh:mm' 
		}
	})

	$('.date-range-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment(),
        locale: { 
			format: 'YYYY-MM-DD' 
		}
      },
      function (start, end) {
        $('.date-range-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    $('.date-picker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })

    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    $('.my-colorpicker1').colorpicker()

    $('.my-colorpicker2').colorpicker()

    $('.timepicker').timepicker({
      showInputs: false
    })


})