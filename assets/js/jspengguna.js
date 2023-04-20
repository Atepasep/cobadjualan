$(document).ready(function(){
	$("#data-tabelku tr.aktif").click();
})
$("#addpengguna").click(function(){
	//alert('Anda mengklik tambah');
	document.formpengguna.setAttribute('action',$("#urlsimpan").val());
	$(this).addClass('hilang');
	$("#editpengguna").addClass('hilang');
	$("#hapuspengguna").addClass('hilang');
	$("#cetakpengguna").addClass('hilang');
	$("#savepengguna").removeClass('hilang');
	$("#batalpengguna").removeClass('hilang');
	$("#nama").val('');
	$("#jabatan").val('');
	$("#username").val('');
	$("#pass").val('');
	document.getElementById("aktiv").checked = false;
	for(x=1;x<=10;x++){
		document.getElementById("modul"+x).checked = false;
	}
	$('#foto-profil').attr('src',$("#lokfile").attr('rel')+'nophoto.png');
	$('#foto-profil').attr('alt', $("#lokfile").attr('rel')+'nophoto.png');
	nonaktifkanmodul();
	$("#nama").focus();
})
//TOmbol Edit
$("#editpengguna").click(function(){
	//alert('Anda mengklik tambah');
	document.formpengguna.setAttribute('action',$("#urledit").val());
	$(this).addClass('hilang');
	$("#addpengguna").addClass('hilang');
	$("#hapuspengguna").addClass('hilang');
	$("#cetakpengguna").addClass('hilang');
	$("#savepengguna").removeClass('hilang');
	$("#batalpengguna").removeClass('hilang');
	$("#jabatan").focus();
})
//Tombol Cetak
$("#cetakpengguna").click(function(){
	pesan('info','dalam pembuatan, hubungi programmer');
})
// Tombol batal
$("#batalpengguna").click(function(){
	$(this).addClass('hilang');
	$("#editpengguna").removeClass('hilang');
	$("#hapuspengguna").removeClass('hilang');
	$("#cetakpengguna").removeClass('hilang');
	$("#addpengguna").removeClass('hilang');
	$("#savepengguna").addClass('hilang');
	$("#data-tabelku tr.aktif").click();
})
$("#savepengguna").click(function(){
	document.formpengguna.submit();
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
$("#aktiv").on('click',function(){
	var onof = document.getElementById('aktiv').checked;
	if (onof==true) {
		aktifkanmodul();
	}else{
		nonaktifkanmodul();
	}
})
$("#pass").on('dblclick',function(){
	var tip = $(this).attr('type');
	if (tip=='password') {
		$(this).attr('type','input');
	}else{
		$(this).attr('type','password');
	}
})
$("#foto-profil").on('dblclick',function(){
	if($("#addpengguna").hasClass('hilang')){
		$("#file").click();
	}
})
$("#file").change(function(){
	$("#file_path").val($(this).val());
	bacaGambar(this); 
})
$("#data-tabelku tr").on('click',function(){
	var ide = $(this).attr('rel')
	var lokfile = $("#lokfile").attr('rel');
	$("#data-tabelku tr").removeClass('aktif');
	$("#hapuspengguna").attr('data-href','pengguna/hapuspengguna/'+ide);
	$(this).addClass('aktif');
	document.getElementById('aktiv').checked = false;
	nonaktifkanmodul();
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "pengguna/getdatasatu",
		data : {id : ide},
		success : function(data){
			$("#nama").val(data[0].nama);
			$("#jabatan").val(data[0].jabatan);
			$("#id").val(data[0].id);
			$("#username").val(data[0].username);
			$("#pass").val(data[0].pass);
			getpass(data[0].id);
			if(data[0].aktiv==1){
				document.getElementById('aktiv').checked = true;
				aktifkanmodul();
			}
			var xmodul = data[0].modul;
			for(ex=1;ex<=11;ex++){
				var cek_ = xmodul.substr(ex,1);
				if (cek_=='1') {
					document.getElementById("modul"+ex).checked = true;
				}else{
					document.getElementById("modul"+ex).checked = false;
				}
			}
			$("#old_logo").val(data[0].profil);
			$("#lokfile").val(lokfile+data[0].profil);
			$("#foto-profil").attr('src',lokfile+data[0].profil);
			$("#validasi").val(data[0].validasi);
			//$("#pass").val(data[0].pass);
			//getpass(data[0].id);
		}
	})
})
function getpass(id){
	var idx = id;
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "pengguna/getpass",
		data : {ide:idx},
		success : function(data){
			//alert(data);
			$("#pass").val(data);
		}
	})
}
function aktifkanmodul(){
	$("#username").attr('disabled',false);
	$("#pass").attr('disabled',false);
	for(ex=1;ex<=10;ex++){
		$("#modul"+ex).attr('disabled',false);
	}
}
function nonaktifkanmodul(){
	$("#username").attr('disabled',true);
	$("#pass").attr('disabled',true);
	for(ex=1;ex<=10;ex++){
		$("#modul"+ex).attr('disabled',true);
	}
}
function bacaGambar(input) {
   if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#foto-profil').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
   }
}
