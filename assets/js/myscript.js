$(document).ready(function(){
	modalBox();
	modalBox2();
	modalBox3();

	$(".sparkline").each(function () {
		var $this = $(this);
		$this.sparkline('html', $this.data());
	  });

	$("#tgllahir").datepicker({autoclose: true,todayHighlight: true,format: 'dd-mm-yyyy'});
	$("#tglmasuk").datepicker({autoclose: true,todayHighlight: true,format: 'dd-mm-yyyy'});
	$("#kontrakuntil").datepicker({autoclose: true,todayHighlight: true,format: 'dd-mm-yyyy'});

	$('#confirm-delete').on('show.bs.modal', function(e) {
		var string = document.getElementById("confirm-delete").innerHTML;
		var hasil = string.replace("fa fa-text-width text-yellow","fa fa-exclamation-triangle text-red");
		document.getElementById("confirm-delete").innerHTML = hasil;

		var string2 = document.getElementById("confirm-delete").innerHTML;
		var hasil2 = string2.replace("Konfirmasi", "&nbspKonfirmasi");
		document.getElementById("confirm-delete").innerHTML = hasil2;
		document.getElementById("test").innerHTML = $(e.relatedTarget).data('news');
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});
	$('#confirm-task').on('show.bs.modal', function(e) {
		var string = document.getElementById("confirm-task").innerHTML;
		var hasil = string.replace("fa fa-exclamation-triangle text-danger","fa fa-exclamation-triangle text-info");
		document.getElementById("confirm-task").innerHTML = hasil;

		var string2 = document.getElementById("confirm-task").innerHTML;
		var hasil2 = string2.replace("Konfirmasi", "&nbspKonfirmasi");
		document.getElementById("confirm-task").innerHTML = hasil2;
		document.getElementById("test2").innerHTML = $(e.relatedTarget).data('news');
		$(this).find('.btn-oke').attr('href', $(e.relatedTarget).data('href'));
	});

	// var tabel = $(".datatable").DataTable({
	// 	//paging : false,
	// 	//searching: false,
	// 	//info: false,
	// 	//scrollY: false
	// 	"pageLength" :50,
	// 	"language": {
    //         "lengthMenu": "Tampilkan _MENU_ rekod per halaman",
    //         "zeroRecords": "- Data belum tersedia -",
    //         "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
    //         "infoEmpty": "-",
    //         "infoFiltered": "(filtered from _MAX_ total records)",
    //         "search":         "Cari:",
    //         "paginate": {
	// 	        "first":      "Pertama",
	// 	        "last":       "Terakhir",
	// 	        "next":       "Selanjutnya",
	// 	        "previous":   "Sebelumnya"
	// 	    }
    //     },
    //     resposive : true,
	// 	fixedHeader: {
    //         header: true,
    //         footer: true
    //     }
	// });

	// new $.fn.dataTable.FixedHeader( table );
	// $(".cekfreeze").freezeTable({
	// 	'container' : '.card-body.cekfreeze',
	// });
})
function modalBox(){
	$('#modalBox').on('show.bs.modal', function(e){
		var link = $(e.relatedTarget);
		var title = link.data('title');
		var modal = $(this)
		modal.find('.modal-title').text(title)
		$(this).find('.fetched-data').load(link.attr('href'));
	});
	return false;
}
function modalBox2(){
	$('#modalBox-lg').on('show.bs.modal', function(e){
		var link = $(e.relatedTarget);
		var title = link.data('title');
		var modal = $(this)
		modal.find('.modal-title2').text(title)
		$(this).find('.fetched-data').load(link.attr('href'));
	});
	return false;
}
function modalBox3(){
	$('#modalBox-task').on('show.bs.modal', function(e){
		var link = $(e.relatedTarget);
		var title = link.data('title');
		var modal = $(this)
		modal.find('.modal-title3').text(title)
		$(this).find('.fetched-data').load(link.attr('href'));
	});
	return false;
}
function pesan(jenis,pesan){
	if(jenis == 'info'){
		var warna = "#17A2B8";
		var head = "Information";
	}else{
		if(jenis == 'warning'){
			var warna = "#F6C23E";
			//var warna = "#17A2B8";
			var head = "Warning";
		}else{
			if(jenis == 'error'){
				var warna = "#E74A3B";
				var head = "Peringatan";
			}
		}
	}
	//warning = #F6C23E
	$.toast({
			heading: head,
			text: pesan,
			showHideTransition: 'slide',
			icon: jenis,
			hideAfter: 4000,
			position: 'bottom-right',
			bgColor: warna,
			loader : false
		});
}
function rupiah(amount, decimalSeparator, thousandsSeparator, nDecimalDigits){  
	if (amount==0) {
		return '';
	}else{
      var num = parseFloat( amount ); //convert to float  
      //default values  
      decimalSeparator = decimalSeparator || '.';  
      thousandsSeparator = thousandsSeparator || ',';  
      nDecimalDigits = nDecimalDigits == null? 2 : nDecimalDigits;  
      
      var fixed = num.toFixed(nDecimalDigits); //limit or add decimal digits  
      //separate begin [$1], middle [$2] and decimal digits [$4]  
      var parts = new RegExp('^(-?\\d{1,3})((?:\\d{3})+)(\\.(\\d{' + nDecimalDigits + '}))?$').exec(fixed);   
      
      if(parts){ //num >= 1000 || num < = -1000  
        return parts[1] + parts[2].replace(/\d{3}/g, thousandsSeparator + '$&') + (parts[4] ? decimalSeparator + parts[4] : '');  
      }else{  
        return fixed.replace('.', decimalSeparator);  
      }  
       }
    }
  function toAngka(rp){
    return rp.replace(/,*|\D/g,'');
  }

  function randomScalingFactor(){
  	return Math.round(Samples.utils.rand(-100, 100));
  }