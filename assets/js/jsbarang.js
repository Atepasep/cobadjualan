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
	$("#gbimage").attr('src', 'assets/images/barang/add-files.svg');
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
	$("#fotobarang").val('');
	$("#fotobarang").change();
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
	$("#hapusbarang").attr('data-href', 'barang/hapus/' + ide);
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
			$("#gbimage").attr('src', 'assets/images/barang/add-files.svg');
			if (data[0].gb != null) {
				$("#gbimage").attr('src', 'assets/images/barang/' + data[0].gb);
				$("#old_gb").val(data[0].gb);
			} else {
				$("#old_gb").val('add - files.svg');
			}
		}
	})
})
$("#addfoto").click(function (e) {
	if ($("#addbarang").hasClass('hilang')) {
		e.preventDefault();
		$("#fotobarang").click();
	}
});
$("#fotobarang").change(function () {
	$("#file_path").val($(this).val());
})
// $("#batalfotoprofile").click(function () {
// 	$("#fotobarang").val('');
// 	$("#fotobarang").change();
// })
// $("#simpanfotoprofile").click(function () {
// 	document.formprofile.submit();
// })
var loadFile = function (event) {
	var output = document.getElementById('gbimage');
	var isifile = event.target.files[0];
	if (!isifile) {
		output.src = 'assets/images/add-files.svg';
	} else {
		output.src = URL.createObjectURL(isifile);
		output.onload = function () {
			URL.revokeObjectURL(output.src) // free memory
		}
	}
};