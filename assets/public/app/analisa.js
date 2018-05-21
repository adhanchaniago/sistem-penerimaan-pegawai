/*!
*
*/

$(document).ready(function() {

	$(".select2").select2();
	
	$('a#delete-analisa').click(function() 
	{
		$('div#modal-delete').modal('show');

		$('a#delete-yes').attr('href', base_url + '/analisa/delete/' + $(this).data('id'))
	});

    //Date picker
    $('#datepicker, #datepicker1').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd"
    });

	$('.btn-print').printPage({
		url: $(this).attr('href'),
		message: "Tunggu sebentar ..."
	})

	$(function () {
    $("#table1").DataTable();
    $('#table2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

//<![CDATA[
$(document).ready(function(){
$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"auto"});
});
//]]>

});