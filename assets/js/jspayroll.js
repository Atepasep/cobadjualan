$(document).ready(function () {

})
// $('#persenthrbonus').on('change click keyup input paste',(function (event) {
//     $(this).val(function (index, value) {
//         return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
//     });
// }));
$("#carifilebonus").on('click', function () {
	$("#filebonus").click();
})
$("#filebonus").change(function () {
	$("#filepathbonus").val($(this).val());
})
$("#filepathbonus").on('click', function () {
	$("#carifilebonus").click();
})
$("#carifilethr").on('click', function () {
	$("#filethr").click();
})
$("#filethr").change(function () {
	$("#filepaththr").val($(this).val());
})
$("#filepaththr").on('click', function () {
	$("#carifilethr").click();
})
$("#carifiletransport").on('click', function () {
	$("#filetransport").click();
})
$("#filetransport").change(function () {
	$("#filepathtransport").val($(this).val());
})
$("#filepathtransport").on('click', function () {
	$("#carifiletransport").click();
})
$("#carifilekoperasi").on('click', function () {
	$("#filekoperasi").click();
})
$("#filekoperasi").change(function () {
	$("#filepathkoperasi").val($(this).val());
})
$("#filepathkoperasi").on('click', function () {
	$("#carifilekoperasi").click();
})
$("#prosespayroll").on('click', function () {
	var jadi = true;
	if ($("#code").val() == 'BONUS') {
		if ($("#filepathbonus").val() == '') {
			$("#filepathbonus").addClass('is-invalid');
			jadi = false;
		}
	}
	if ($("#code").val() == 'THR') {
		if ($("#filepaththr").val() == '') {
			$("#filepaththr").addClass('is-invalid');
			jadi = false;
		}
	}
	if (jadi) {
		document.formprosespayroll.submit();
	} else {
		pesan('warning', 'Isi data dengan Lengkap');
	}
})
$("#kodepayroll").on('change', function () {
	var kodepayroll = $(this).val();
	var bulanperiode = $("#bulanperiode").val();
	var tahunperiode = $("#tahunperiode").val();
	var namapt = $("#namapt").val();
	var namaloc = $("#namaloc").val();
	if (kodepayroll != "SALARY") {
		$("#bulanperiode").addClass('hilang');
	} else {
		$("#bulanperiode").removeClass('hilang');
	}
	$.ajax({
		dataType: 'json',
		type: "POST",
		url: "payroll/ubahperiode",
		data: { kode: kodepayroll, bulan: bulanperiode, tahun: tahunperiode, pt: namapt, loc: namaloc },
		success: function (data) {
			if (data == 1) {
				window.location.reload();
			}
		}
	})
})
$("#bulanperiode").on('change', function () {
	$("#kodepayroll").change();
})
$("#tahunperiode").on('change', function () {
	$("#kodepayroll").change();
})
$("#namapt").on('change', function () {
	$("#kodepayroll").change();
})
$("#namaloc").on('change', function () {
	$("#kodepayroll").change();
})
$(document).on('click', '#membuatpdf', function () {
	var rel = $(this).attr('rel');
	$("#spinnya").removeClass('hilang');
	$.ajax({
		dataType: 'json',
		type: "POST",
		url: "payroll/buatpdf",
		data: { id: rel },
		success: function (data) {
			if (data == 1) {
				$("#spinnya").addClass('hilang');
				pesan('info', 'kirim email berhasil');
			} else {
				pesan('danger', data);
			}
		}
	})
})