$(document).ready(function(){

})
$("#kodepayroll").on('change',function(){
	var kodepayroll = $(this).val();
	var bulanperiode = $("#bulanperiode").val();
	var tahunperiode = $("#tahunperiode").val();
	var kodevalid = $("#validby").val();
	if(kodepayroll!="SALARY"){
		$("#bulanperiode").addClass('hilang');
	}else{
		$("#bulanperiode").removeClass('hilang');
	}
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "validasi/ubahperiode",
		data : {kode : kodepayroll,bulan:bulanperiode,tahun:tahunperiode,valid:kodevalid},
		success : function(data){
			if(data==1){
				window.location.reload();
			}
		}
	})
})
$("#bulanperiode").on('change',function(){
	$("#kodepayroll").change();
})
$("#tahunperiode").on('change',function(){
	$("#kodepayroll").change();
})
$("#validby").on('change',function(){
	$("#kodepayroll").change();
})