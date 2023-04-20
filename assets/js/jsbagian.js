$(document).ready(function(){
	$("#data-tabelku tr.aktif").click();
})
$("#addbagian").click(function(){
	//alert('Anda mengklik tambah');
	document.formbagian.setAttribute('action',$("#urlsimpan").val());
	$(this).addClass('hilang');
	$("#editbagian").addClass('hilang');
	$("#hapusbagian").addClass('hilang');
	$("#cetakbagian").addClass('hilang');
	$("#savebagian").removeClass('hilang');
	$("#batalbagian").removeClass('hilang');
	$("#kode").val('');
	$("#bagian").val('');
	$("#kode").focus();
})
//TOmbol Edit
$("#editbagian").click(function(){
	//alert('Anda mengklik tambah');
	document.formbagian.setAttribute('action',$("#urledit").val());
	$(this).addClass('hilang');
	$("#addbagian").addClass('hilang');
	$("#hapusbagian").addClass('hilang');
	$("#cetakbagian").addClass('hilang');
	$("#savebagian").removeClass('hilang');
	$("#batalbagian").removeClass('hilang');
	$("#kode").focus();
})
//Tombol Cetak
$("#cetakbagian").click(function(){
	alert('dalam pembuatan, hubungi programmer');
})
// Tombol batal
$("#batalbagian").click(function(){
	$(this).addClass('hilang');
	$("#editbagian").removeClass('hilang');
	$("#hapusbagian").removeClass('hilang');
	$("#cetakbagian").removeClass('hilang');
	$("#addbagian").removeClass('hilang');
	$("#savebagian").addClass('hilang');
	$("#data-tabelku tr.aktif").click();
})
$("#savebagian").click(function(){
	document.formbagian.submit();
})
$("#data-tabelku tr").on('click',function(){
	var ide = $(this).attr('rel')
	$("#data-tabelku tr").removeClass('aktif');
	$("#hapusbagian").attr('data-href','bagian/hapusbagian/'+ide);
	$(this).addClass('aktif');
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "bagian/getdatasatu",
		data : {id : ide},
		success : function(data){
			$("#kode").val(data[0].kode);
			$("#bagian").val(data[0].bagian);
			$("#id").val(data[0].id);
			getgroup(data[0].id);
		}
	})
})

function getgroup(kode){
	var rowgroup = '';
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "bagian/getgroup",
		data : {id : kode},
		success : function(data){
			if(data.length > 0){
				for(var i = 1; i <= data.length; i++) {
					rowgroup += '<tr>';
					rowgroup += '<td>'+i+'</td>';
					rowgroup += '<td>'+data[i-1].grp+'</td>';
					rowgroup += '<td>';
					rowgroup += '<a data-toggle="modal" data-target="#confirm-delete" data-href="bagian/hapusgroup/'+data[i-1].id+'" title="Delete data" id="hapusgroup" data-news="Apakah Anda yakin ingin menghapus data <strong>'+data[i-1].grp+'</strong> ?" style="cursor: pointer;">';
					rowgroup += '<img src="assets/images/del.png">';
					rowgroup += '</a>';
					rowgroup += '</td>';
					rowgroup += '</tr>';
				}
			}else{
				rowgroup += '<tr><td colspan="3" style="text-align: center;">No Record Found</td></tr>';
			}
			rowgroup += '<tr>';
			rowgroup += '<td colspan="3" style="text-align: center;">';
   			rowgroup += '<a href="bagian/addgroup/'+kode+'" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="addgroup" title="Tambah Group" data-remote="false" data-toggle="modal" data-title="Tambah Group" data-target="#modalBox-lg">';
   			rowgroup += '<span class="icon text-white-50"><i class="fas fa-plus"></i></span>';
			rowgroup += '<span class="text">Tambah Group</span>';
   			rowgroup += '</a>';
            rowgroup += '</td>';
            rowgroup += '</tr>';
			$("#data-tabelku2").html(rowgroup).show();
		}
	})
}