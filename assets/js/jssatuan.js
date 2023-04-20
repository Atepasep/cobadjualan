$(document).ready(function () {
	$("#data-tabelku tr.aktif").click();
})

$("#addsatuan").click(function () {
	document.formsatuan.setAttribute('action', $("#urlsimpan").val());
	$(this).addClass('hilang');
	$("#simpansatuan").removeClass('hilang');
	$("#batalsatuan").removeClass('hilang');
	$("#editsatuan").addClass('hilang');
	$("#hapussatuan").addClass('hilang');
	$("#cetaksatuan").addClass('hilang');
	$("#kode").val('');
	$("#satuan").val('');
	$("#kode").focus();
})
$("#editsatuan").click(function () {
	document.formsatuan.setAttribute('action', $("#urledit").val());
	$("#addsatuan").addClass('hilang');
	$("#simpansatuan").removeClass('hilang');
	$("#batalsatuan").removeClass('hilang');
	$(this).addClass('hilang');
	$("#hapussatuan").addClass('hilang');
	$("#cetaksatuan").addClass('hilang');
	$("#satuan").focus();
})
$("#batalsatuan").click(function () {
	$(this).addClass('hilang');
	$("#simpansatuan").addClass('hilang');
	$("#batalsatuan").addClass('hilang');
	$("#addsatuan").removeClass('hilang');
	$("#editsatuan").removeClass('hilang');
	$("#hapussatuan").removeClass('hilang');
	$("#cetaksatuan").removeClass('hilang');
	$("#data-tabelku tr.aktif").click();
})
$("#simpansatuan").click(function () {
	var isi = $("#satuan").val();
	var kode = $("#kode").val();
	if (isi != '' && kode != '' && kode.length == 3) {
		document.formsatuan.submit();
	} else {
		pesan('error', 'Isi data dengan Lengkap (kode Satuan Pastikan 3 Digit) !');
	}
})
$("#cetaksatuan").click(function () {
	pesan('info', 'Sedang dalam pembuatan, Hubungi Programmer !');
})

$("#data-tabelku tr").on('click', function () {
	var ide = $(this).attr('rel')
	$("#data-tabelku tr").removeClass('aktif');
	$("#hapussatuan").attr('data-href', 'satuan/hapus/' + ide);
	$(this).addClass('aktif');
	$.ajax({
		dataType: 'json',
		type: "POST",
		url: "satuan/getdatasatu",
		data: { id: ide },
		success: function (data) {
			$("#satuan").val(data[0].satuan);
			$("#kode").val(data[0].kode);
			$("#id").val(data[0].id);
		}
	})
})