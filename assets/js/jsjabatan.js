$(document).ready(function(){
	$("#data-tabelku tr.aktif").click();
})
$("#addjabatan").click(function(){
	//alert('Anda mengklik tambah');
	document.formjabatan.setAttribute('action',$("#urlsimpan").val());
	$(this).addClass('hilang');
	$("#editjabatan").addClass('hilang');
	$("#hapusjabatan").addClass('hilang');
	$("#cetakjabatan").addClass('hilang');
	$("#savejabatan").removeClass('hilang');
	$("#bataljabatan").removeClass('hilang');
	$("#jabatan").val('');
	$("#jabatan").focus();
})
//TOmbol Edit
$("#editjabatan").click(function(){
	//alert('Anda mengklik tambah');
	document.formjabatan.setAttribute('action',$("#urledit").val());
	$(this).addClass('hilang');
	$("#addjabatan").addClass('hilang');
	$("#hapusjabatan").addClass('hilang');
	$("#cetakjabatan").addClass('hilang');
	$("#savejabatan").removeClass('hilang');
	$("#bataljabatan").removeClass('hilang');
	$("#jabatan").focus();
})
//Tombol Cetak
$("#cetakjabatan").click(function(){
	alert('dalam pembuatan, hubungi programmer');
})
// Tombol batal
$("#bataljabatan").click(function(){
	$(this).addClass('hilang');
	$("#editjabatan").removeClass('hilang');
	$("#hapusjabatan").removeClass('hilang');
	$("#cetakjabatan").removeClass('hilang');
	$("#addjabatan").removeClass('hilang');
	$("#savejabatan").addClass('hilang');
	$("#data-tabelku tr.aktif").click();
})
$("#savejabatan").click(function(){
	document.formjabatan.submit();
	// var a = $("#kode").val();
	// var b = $("#pendidikan").val();
	// $.ajax({
	// 	dataType : 'json',
	// 	type : "POST",
	// 	url : "didik/simpandidik",
	// 	data : {kode:a,pendidikan:b},
	// 	success : function(data){
	// 		if (data.length > 0) {
	// 			alert('Data berhasil disimpan');
	// 			$("#data-tabelku tr").removeClass('aktif');
	// 			var row = '<tr class="aktif" rel="'+data[0].id+'"><td>'+data[0].kode+'</td><td>'+data[0].pendidikan+'</td></tr>';
	// 			$("#data-tabelku tr:last").after(row);
	// 			$("#bataldidik").click();
	// 		}else{
	// 			alert('Data tidak berhasil di simpan');
	// 		}
	// 	}
	// })
})
$("#data-tabelku tr").on('click',function(){
	var ide = $(this).attr('rel')
	$("#data-tabelku tr").removeClass('aktif');
	$("#hapusjabatan").attr('data-href','jabatan/hapusjabatan/'+ide);
	$(this).addClass('aktif');
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "jabatan/getdatasatu",
		data : {id : ide},
		success : function(data){
			$("#jabatan").val(data[0].jabatan);
			$("#id").val(data[0].id);
		}
	})
})
