$(document).ready(function () {
	$("#data-tabelku tr.aktif").click();
})

$("#addkategori").click(function () {
	document.formkategori.setAttribute('action', $("#urlsimpan").val());
	$(this).addClass('hilang');
	$("#simpankategori").removeClass('hilang');
	$("#batalkategori").removeClass('hilang');
	$("#editkategori").addClass('hilang');
	$("#hapuskategori").addClass('hilang');
	$("#cetakkategori").addClass('hilang');
	$("#kategori").val('');
	$("#kategori").focus();
})
$("#editkategori").click(function () {
	document.formkategori.setAttribute('action', $("#urledit").val());
	$("#addkategori").addClass('hilang');
	$("#simpankategori").removeClass('hilang');
	$("#batalkategori").removeClass('hilang');
	$(this).addClass('hilang');
	$("#hapuskategori").addClass('hilang');
	$("#cetakkategori").addClass('hilang');
	$("#kategori").focus();
})
$("#batalkategori").click(function () {
	$(this).addClass('hilang');
	$("#simpankategori").addClass('hilang');
	$("#batalkategori").addClass('hilang');
	$("#addkategori").removeClass('hilang');
	$("#editkategori").removeClass('hilang');
	$("#hapuskategori").removeClass('hilang');
	$("#cetakkategori").removeClass('hilang');
	$("#data-tabelku tr.aktif").click();
})
$("#simpankategori").click(function () {
	var isi = $("#kategori").val();
	if (isi != '') {
		document.formkategori.submit();
	} else {
		pesan('error', 'Isi data dengan Lengkap !');
	}
})
$("#cetakkategori").click(function () {
	pesan('info', 'Sedang dalam pembuatan, Hubungi Programmer !');
})

$("#data-tabelku tr").on('click', function () {
	var ide = $(this).attr('rel')
	$("#data-tabelku tr").removeClass('aktif');
	$("#hapuskategori").attr('data-href', 'kategori/hapus/' + ide);
	$(this).addClass('aktif');
	$.ajax({
		dataType: 'json',
		type: "POST",
		url: "kategori/getdatasatu",
		data: { id: ide },
		success: function (data) {
			$("#kategori").val(data[0].kategori);
			$("#id").val(data[0].id);
		}
	})
})