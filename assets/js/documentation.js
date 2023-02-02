$(document).on('click', '.lnk-opt', function(e){
	e.preventDefault();

	var id = $(this).attr('id');
	console.log("id", id);
	var id2 = id.split('_')[0];
	console.log("id2", id2);

	$('.lnk').removeClass('active');
	$('#'+id2).addClass('active');
	$('.my-card').attr('hidden', true);
	$('#div_'+id).attr('hidden', false);
	
	
});