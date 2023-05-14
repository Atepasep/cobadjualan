$(document).ready(function () {
	$("#data-tabelku tr.aktif").click();
	$('#tabelku').DataTable();
})

$("#addcustomer").click(function () {
	document.formcustomer.setAttribute('action', $("#urlsimpan").val());
	$(this).addClass('hilang');
	validfield('nama');
	validfield('alamat');
	$("#dataview").addClass('hilang');
	$("#dataedit").removeClass('hilang');
	$("#simpancustomer").removeClass('hilang');
	$("#batalcustomer").removeClass('hilang');
	$("#editcustomer").addClass('hilang');
	$("#hapuscustomer").addClass('hilang');
	$("#cetakcustomer").addClass('hilang');
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
	$("#deskripsi").val('');
	$("#no_identitas").val('');
	$("#identitas").val('');
	$("#nama").focus();
	$.ajax({
		// dataType: 'json',
		type: "POST",
		url: "customer/kode",
		data: {},
		success: function (data) {
			$("#kode").val(data);
		}
	})
})
$("#editcustomer").click(function () {
	document.formcustomer.setAttribute('action', $("#urledit").val());
	validfield('nama');
	validfield('alamat');
	validfield('jn_identitas');
	validfield('identitas');
	validfield('telp');
	$("#dataview").addClass('hilang');
	$("#dataedit").removeClass('hilang');
	$("#addcustomer").addClass('hilang');
	$("#simpancustomer").removeClass('hilang');
	$("#batalcustomer").removeClass('hilang');
	$(this).addClass('hilang');
	$("#hapuscustomer").addClass('hilang');
	$("#cetakcustomer").addClass('hilang');
	$("#nama").focus();
})
$("#batalcustomer").click(function () {
	$(this).addClass('hilang');
	validfield('nama');
	validfield('alamat');
	validfield('jn_identitas');
	validfield('identitas');
	validfield('telp');
	$("#dataview").removeClass('hilang');
	$("#dataedit").addClass('hilang');
	$("#simpancustomer").addClass('hilang');
	$("#batalcustomer").addClass('hilang');
	$("#addcustomer").removeClass('hilang');
	$("#editcustomer").removeClass('hilang');
	$("#hapuscustomer").removeClass('hilang');
	$("#cetakcustomer").removeClass('hilang');
	$("#data-tabelku tr.aktif").click();
})
$("#simpancustomer").click(function () {
	validfield('nama');
	validfield('alamat');
	validfield('jn_identitas');
	validfield('identitas');
	validfield('telp');
	var isi = $("#nama").val();
	var alamat = $("#alamat").val();
	var jniden = $("#jn_identitas").val();
	var iden = $("#identitas").val();
	var telp = $("#telp").val();
	if (isi != '' && alamat != '' && jniden != '' && iden != '' && telp != '') {
		document.formcustomer.submit();
	} else {
		if(isi == ''){
			invalidfield('nama');
		}
		if(alamat == ''){
			invalidfield('alamat');
		}
		if(jniden == ''){
			invalidfield('jn_identitas');
		}
		if(iden == ''){
			invalidfield('identitas');
		}
		if(telp == ''){
			invalidfield('telp');
		}
		pesan('error', 'Isi data dengan Lengkap !');
	}
})
$("#cetakcustomer").click(function () {
	pesan('info', 'Sedang dalam pembuatan, Hubungi Programmer !');
})

$("#data-tabelku tr").on('click', function () {
	var ide = $(this).attr('rel')
	$("#data-tabelku tr").removeClass('aktif');
	$("#hapuscustomer").attr('data-href', 'customer/hapus/' + ide);
	$(this).addClass('aktif');
	$.ajax({
		dataType: 'json',
		type: "POST",
		url: "customer/getdatasatu",
		data: { id: ide },
		success: function (data) {
			var alamat = data[0].alamat != null ? data[0].alamat : ''; 
			alamat += data[0].blok != '' ? ' Blok '+data[0].blok : ''; 
			alamat += data[0].no != '' ? ' No '+data[0].no : ''; 
			alamat += ' RT/RW '+data[0].rt+'/'+data[0].rw; 
			alamat += data[0].desa != '' ? '\rDesa. '+data[0].desa : ''; 
			alamat += data[0].kec != '' ? '\rKec. '+data[0].kec : ''; 
			alamat += data[0].kab != '' ? '\rKab/Kota. '+data[0].kab : ''; 
			alamat += data[0].kodepos != '' ? '\r'+data[0].kodepos : ''; 
			alamat += data[0].telp != '' ? '\rTelp. '+data[0].telp : ''; 
			$("#kode").val(data[0].kode);
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
			$("#no_identitas").val(data[0].no_identitas);
			$("#identitas").val(data[0].identitas);
			$("#xno_identitas").val('('+data[0].identitas+') '+data[0].no_identitas);
		}
	})
})