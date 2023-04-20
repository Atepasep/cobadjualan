$(document).ready(function () {
	//$("#data-tabelku tr.aktif").click();
	$("#bagian").change();
})
$("#savepersonil").click(function () {
	var jadi = true;
	$("#noinduk").removeClass('is-invalid');
	$("#nama").removeClass('is-invalid');
	$("#tempatlahir").removeClass('is-invalid');
	$("#tgllahir").removeClass('is-invalid');
	$("#alamat").removeClass('is-invalid');
	$("#ptkp").removeClass('is-invalid');
	$("#ind").removeClass('is-invalid');
	$("#cardcode").removeClass('is-invalid');
	if ($("#noinduk").val() == '') {
		$("#noinduk").addClass('is-invalid');
	}
	if ($("#nama").val() == '') {
		$("#nama").addClass('is-invalid');
		jadi = false;
	}
	// if($("#tempatlahir").val()==''){
	// 	$("#tempatlahir").addClass('is-invalid');
	// 	jadi = false;
	// }
	// if($("#tgllahir").val()==''){
	// 	$("#tgllahir").addClass('is-invalid');
	// 	jadi = false;
	// }
	// if($("#alamat").val()==''){
	// 	$("#alamat").addClass('is-invalid');
	// 	jadi = false;
	// }
	if ($("#ptkp").val() == '') {
		$("#ptkp").addClass('is-invalid');
		jadi = false;
	}
	if ($("#ind").val() == '') {
		$("#ind").addClass('is-invalid');
		jadi = false;
	}
	if ($("#cardcode").val() == '') {
		$("#cardcode").addClass('is-invalid');
		jadi = false;
	}
	if ($("#email").val() == '') {
		$("#email").addClass('is-invalid');
		jadi = false;
	} else {
		if (!validasiEmail($("#email").val())) {
			$("#email").addClass('is-invalid');
			document.getElementById('feedbackemail').innerHTML = 'alamat email tidak valid, cek email';
			jadi = false;
		}
	}
	if (jadi) {
		document.formpersonil.submit();
	} else {
		pesan('warning', 'Semua data harus diisi');
	}
})
$("#bagian").change(function () {
	var idx = $(this).val();
	var ule = $("#urll").val();
	var xgr = $("#xgrp").val();
	$.ajax({
		dataType: 'json',
		type: "POST",
		url: ule,
		data: { id: idx, gr: xgr },
		success: function (data) {
			// opt += '<select class="form-control form-control-sm flat warnahitam" id="grp" name="grp">';
			//          opt += '<option>-- Pilih Group --</option>';
			//          for(x=0 ; x < data.length ; x++){
			//          	opt += '<option value="'+data[x].id+'">'+data[x].grp+'</option>';
			//          }
			//          opt += '</select>';

			$("#grp").html(data.datagroup).show();
		}
	})
})
$("#kontrak").on('change', function () {
	var kontrak = $(this).val();
	if (kontrak == 1) {
		$("#kontrakuntil").removeClass('hilang');
	} else {
		$("#kontrakuntil").addClass('hilang');
	}
})
$("#foto-profil").on('dblclick', function () {
	$("#file").click();
})
$("#file").change(function () {
	$("#file_path").val($(this).val());
	bacaGambar(this);
})
function bacaGambar(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#foto-profil').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
function validasiEmail(email) {
	const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}
// $(document).on('change','#bagian',function(){
// 	var idx = $("#bagian").val();
// 	$.ajax({
// 		dataType : 'json',
// 		type : "POST",
// 		url : "personil/datagrup",
// 		data : {id : idx},
// 		success : function(data){
// 			alert(data);
// 		},
// 		fail: function(data){
//        		alert('request failed');
//     	}
// 	})
// })