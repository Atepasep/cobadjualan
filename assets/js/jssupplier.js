$(document).ready(function () {
	$("#data-tabelku tr.aktif").click();
	$('#tabelku').DataTable();
})

// $("#addkategori").click(function () {
// 	document.formkategori.setAttribute('action', $("#urlsimpan").val());
// 	$(this).addClass('hilang');
// 	$("#simpankategori").removeClass('hilang');
// 	$("#batalkategori").removeClass('hilang');
// 	$("#editkategori").addClass('hilang');
// 	$("#hapuskategori").addClass('hilang');
// 	$("#cetakkategori").addClass('hilang');
// 	$("#kategori").val('');
// 	$("#kategori").focus();
// })
// $("#editkategori").click(function () {
// 	document.formkategori.setAttribute('action', $("#urledit").val());
// 	$("#addkategori").addClass('hilang');
// 	$("#simpankategori").removeClass('hilang');
// 	$("#batalkategori").removeClass('hilang');
// 	$(this).addClass('hilang');
// 	$("#hapuskategori").addClass('hilang');
// 	$("#cetakkategori").addClass('hilang');
// 	$("#kategori").focus();
// })
// $("#batalkategori").click(function () {
// 	$(this).addClass('hilang');
// 	$("#simpankategori").addClass('hilang');
// 	$("#batalkategori").addClass('hilang');
// 	$("#addkategori").removeClass('hilang');
// 	$("#editkategori").removeClass('hilang');
// 	$("#hapuskategori").removeClass('hilang');
// 	$("#cetakkategori").removeClass('hilang');
// 	$("#data-tabelku tr.aktif").click();
// })
// $("#simpankategori").click(function () {
// 	var isi = $("#kategori").val();
// 	if (isi != '') {
// 		document.formkategori.submit();
// 	} else {
// 		pesan('error', 'Isi data dengan Lengkap !');
// 	}
// })
// $("#cetakkategori").click(function () {
// 	pesan('info', 'Sedang dalam pembuatan, Hubungi Programmer !');
// })

$("#data-tabelku tr").on('click', function () {
	var ide = $(this).attr('rel')
	$("#data-tabelku tr").removeClass('aktif');
	$("#hapussupplier").attr('data-href', 'supplier/hapus/' + ide);
	$(this).addClass('aktif');
	alert('data');
	$.ajax({
		dataType: 'json',
		type: "POST",
		url: "supplier/getdatasatu",
		data: { id: ide },
		success: function (data) {
			$("#nama").val(data[0].nama);
			$("#id").val(data[0].id);
			$("#xalamat").val(data[0].alamat+' Blok/No. '+data[0].blok);
		}
	})
})