$(document).ready(function () {
	$("#data-tabelku tr.aktif").click();
	$('#tabelku').DataTable();
})

$("#addsupplier").click(function () {
	document.formsupplier.setAttribute('action', $("#urlsimpan").val());
	$(this).addClass('hilang');
	validfield('nama');
	validfield('alamat');
	$("#dataview").addClass('hilang');
	$("#dataedit").removeClass('hilang');
	$("#simpansupplier").removeClass('hilang');
	$("#batalsupplier").removeClass('hilang');
	$("#editsupplier").addClass('hilang');
	$("#hapussupplier").addClass('hilang');
	$("#cetaksupplier").addClass('hilang');
	$("#nama").val('');
	$("#alamat").val('');
	$("#blok").val('');
	$("#no").val('');
	$("#rt").val('');
	$("#rw").val('');
	$("#desa").val('');
	$("#kec").val('');
	$("#kab").val('');
	$("#kodepos").val('');
	$("#telp").val('');
	$("#cp").val('');
	$("#bank").val('');
	$("#norek").val('');
	$("#anbank").val('');
	$("#deskripsi").val('');
	$("#nama").focus();
})
$("#editsupplier").click(function () {
	document.formsupplier.setAttribute('action', $("#urledit").val());
	validfield('nama');
	validfield('alamat');
	$("#dataview").addClass('hilang');
	$("#dataedit").removeClass('hilang');
	$("#addsupplier").addClass('hilang');
	$("#simpansupplier").removeClass('hilang');
	$("#batalsupplier").removeClass('hilang');
	$(this).addClass('hilang');
	$("#hapussupplier").addClass('hilang');
	$("#cetaksupplier").addClass('hilang');
	$("#nama").focus();
})
$("#batalsupplier").click(function () {
	$(this).addClass('hilang');
	validfield('nama');
	validfield('alamat');
	$("#dataview").removeClass('hilang');
	$("#dataedit").addClass('hilang');
	$("#simpansupplier").addClass('hilang');
	$("#batalsupplier").addClass('hilang');
	$("#addsupplier").removeClass('hilang');
	$("#editsupplier").removeClass('hilang');
	$("#hapussupplier").removeClass('hilang');
	$("#cetaksupplier").removeClass('hilang');
	$("#data-tabelku tr.aktif").click();
})
$("#simpansupplier").click(function () {
	var isi = $("#nama").val();
	var alamat = $("#alamat").val();
	if (isi != '' && alamat != '') {
		document.formsupplier.submit();
	} else {
		if(isi == ''){
			invalidfield('nama');
		}
		if(alamat == ''){
			invalidfield('alamat');
		}
		pesan('error', 'Isi data dengan Lengkap !');
	}
})
$("#cetakkategori").click(function () {
	pesan('info', 'Sedang dalam pembuatan, Hubungi Programmer !');
})

$("#data-tabelku tr").on('click', function () {
	var ide = $(this).attr('rel')
	$("#data-tabelku tr").removeClass('aktif');
	$("#hapussupplier").attr('data-href', 'supplier/hapus/' + ide);
	$(this).addClass('aktif');
	$.ajax({
		dataType: 'json',
		type: "POST",
		url: "supplier/getdatasatu",
		data: { id: ide },
		success: function (data) {
			var alamat = data[0].alamat != null ? data[0].alamat : ''; 
			alamat += data[0].blok != '' ? ' Blok '+data[0].blok : ''; 
			alamat += data[0].no != null ? ' No '+data[0].no : ''; 
			alamat += ' RT/RW '+data[0].rt+'/'+data[0].rw; 
			alamat += data[0].desa != null ? '\rDesa. '+data[0].desa : ''; 
			alamat += data[0].kec != null ? '\rKec. '+data[0].kec : ''; 
			alamat += data[0].kab != null ? '\rKab/Kota. '+data[0].kab : ''; 
			alamat += data[0].kodepos != null ? '\r'+data[0].kodepos : ''; 
			alamat += data[0].telp != null ? '\rTelp. '+data[0].telp : ''; 
			$("#nama").val(data[0].nama);
			$("#id").val(data[0].id);
			$("#xalamat").val(alamat);
			$("#alamat").val(data[0].alamat);
			$("#blok").val(data[0].blok);
			$("#no").val(data[0].no);
			$("#rt").val(data[0].rt);
			$("#rw").val(data[0].rw);
			$("#desa").val(data[0].desa);
			$("#kec").val(data[0].kec);
			$("#kab").val(data[0].kab);
			$("#kodepos").val(data[0].kodepos);
			$("#telp").val(data[0].telp);
			$("#cp").val(data[0].cp);
			$("#bank").val(data[0].bank);
			$("#norek").val(data[0].norek);
			$("#anbank").val(data[0].anbank);
			$("#deskripsi").val(data[0].deskripsi);
		}
	})
})