function table_data(){
	$('#datatable').DataTable({
	    'paging'      : false,
	    'lengthChange': false,
	    'searching'   : true,
	    'ordering'    : true,
	    'info'        : true,
	    'autoWidth'   : true,
	    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
	})
}

function show(){
	  $('input[data-form="table_row"]').each(function(){
		if($(this).is(':checked')){
			$("."+$(this).attr("name")).show();
		}else{
			$("."+$(this).attr("name")).hide();
		}
	  })

	  $(".buttons-excel").addClass("btn btn-success btn-sm");
	  $(".buttons-excel").html("<i class='fa fa-file-excel-o'></i>");

	  $(".buttons-pdf").addClass("btn btn-danger btn-sm");
	  $(".buttons-pdf").html("<i class='fa fa-file-pdf-o'></i>");

	  $(".buttons-print").addClass("btn btn-info btn-sm");
	  $(".buttons-print").html("<i class='fa fa-print'></i>");

	  $(".buttons-csv").addClass("btn btn-warning btn-sm");
	  $(".buttons-csv").html("<i class='fa fa-file-code-o'></i>");

	  $(".buttons-copy").addClass("btn btn-primary btn-sm");
	  $(".buttons-copy").html("<i class='fa fa-copy'></i>");
}

$(document).ready(function() {

	table_data();
	show();

});

$(document).on("change", 'input[data-form="table_row"]',function(e){
	
	if($(this).is(':checked')){
		$("."+$(this).attr("name")).show();
	}else{
		$("."+$(this).attr("name")).hide();
	}

	$("#datatable").dataTable().fnDestroy();
	table_data();
	show();
})

// delete record
$(document).on("click","#btn-delete",function(e){
  let action = $(this).data('action');
  let name = $(this).data('name');
  $.confirm({
      title: 'Hapus',
      content: 'Ingin menghapus '+name,
      buttons: {
          Ya: function () {
              window.location.href = action;
          },
          Batal: function () {
              $.alert('Dibatalkan');
          }
      }
  });
})