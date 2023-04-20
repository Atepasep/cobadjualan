$("#bulanperiode").on('change',function(){
	var bulanperiode = $(this).val();
	var tahunperiode = $("#tahunperiode").val();
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "addtlist/ubahperiode",
		data : {bulan:bulanperiode,tahun:tahunperiode},
		success : function(data){
			if(data==1){
				window.location.reload();
			}
		}
	})
})