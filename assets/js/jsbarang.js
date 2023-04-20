$(document).ready(function () {
	$("#data-tabelku tr.aktif").click();
	$('#tabelku').DataTable();
})

$("#addbarang").click(function () {
	document.formbarang.setAttribute('action', $("#urlsimpan").val());
	$(this).addClass('hilang');
	$("#simpanbarang").removeClass('hilang');
	$("#batalbarang").removeClass('hilang');
	$("#editbarang").addClass('hilang');
	$("#hapusbarang").addClass('hilang');
	$("#cetakbarang").addClass('hilang');
	$("#kode").val('');
	$("#barang").val('');
	$("#id_kategori").val('');
	$("#id_satuan").val('');
	$("#barcode").val('');
	$("#kode").focus();
	$.ajax({
		// dataType: 'json',
		type: "POST",
		url: "barang/kode",
		data: {},
		success: function (data) {
			$("#kode").val(data);
		}
	})

})
$("#editbarang").click(function () {
	document.formbarang.setAttribute('action', $("#urledit").val());
	$("#addbarang").addClass('hilang');
	$("#simpanbarang").removeClass('hilang');
	$("#batalbarang").removeClass('hilang');
	$(this).addClass('hilang');
	$("#hapusbarang").addClass('hilang');
	$("#cetakbarang").addClass('hilang');
	$("#nama").focus();
})
$("#batalbarang").click(function () {
	$(this).addClass('hilang');
	$("#simpanbarang").addClass('hilang');
	$("#batalbarang").addClass('hilang');
	$("#addbarang").removeClass('hilang');
	$("#editbarang").removeClass('hilang');
	$("#hapusbarang").removeClass('hilang');
	$("#cetakbarang").removeClass('hilang');
	$("#data-tabelku tr.aktif").click();
})
$("#simpanbarang").click(function () {
	var isi = $("#barang").val();
	var kode = $("#kode").val();
	var sat = $("#id_satuan").val();
	var kat = $("#id_kategori").val();
	if (isi != '' && kode != '' && sat != '' && kat != '') {
		document.formbarang.submit();
	} else {
		pesan('error', 'Isi data dengan Lengkap (kode Satuan Pastikan 3 Digit) !');
	}
})
$("#cetakbarang").click(function () {
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
		url: "barang/getdatasatu",
		data: { id: ide },
		success: function (data) {
			$("#barang").val(data[0].nama_barang);
			$("#kode").val(data[0].kode);
			$("#id").val(data[0].id);
			$("#id_kategori").val(data[0].id_kategori);
			$("#id_satuan").val(data[0].id_satuan);
			$("#barcode").val(data[0].barcode);
		}
	})
})