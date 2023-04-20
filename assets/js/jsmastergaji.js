$("#savegaji").click(function(){
	var valid = true;
	if($("#gaji").val()=="" || $("#gaji").val()=='0'){
		$("#gaji").addClass('is-invalid');
		valid = false;
	}
	if(valid){
		document.formgaji.submit();
	}
})

$('#gaji').on('change click keyup input paste',(function (event) {
    $(this).val(function (index, value) {
        return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
    hitunggakot();
}));

$('#tunjab').on('change click keyup input paste',(function (event) {
    $(this).val(function (index, value) {
        return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
    hitunggakot();
}));

$('#tunskill').on('change click keyup input paste',(function (event) {
    $(this).val(function (index, value) {
        return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
    hitunggakot();
}));

$('#loan').on('change click keyup input paste',(function (event) {
    $(this).val(function (index, value) {
        return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
}));

$('#bpjs').on('change click keyup input paste',(function (event) {
    $(this).val(function (index, value) {
        return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
}));

$('#umak').on('change click keyup input paste',(function (event) {
    $(this).val(function (index, value) {
        return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
}));

$('.jumlah').on('change click keyup input paste',(function (event) {
    $(this).val(function (index, value) {
        return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
    if($(this).val() != ''){
        var rel = $(this).attr('rel');
        var jml = parseFloat(toAngka($("#jml"+rel).text()));
        var jadi = (parseFloat(toAngka($(this).val()))-jml)/jml;
        $("#persen"+rel).val(rupiah(jadi*100,'.',',',2));
        hitunggajibaru(rel);
    }else{
        $("#persen"+rel).val('');
        hitunggajibaru(rel);
    }
}));

$('.tunjab').on('change click keyup input paste',(function (event) {
    $(this).val(function (index, value) {
        return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
        var rel = $(this).attr('rel');
        hitunggajibaru(rel);
}));
$('.tunskil').on('change click keyup input paste',(function (event) {
    $(this).val(function (index, value) {
        return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
        var rel = $(this).attr('rel');
        hitunggajibaru(rel);
}));

$(document).on('keyup','.persen',function(){
    var rel = $(this).attr('rel');
    var jml = parseFloat(toAngka($("#jml"+rel).text()));
    var jadi = jml+(jml*parseFloat($(this).val()/100));
    if($(this).val() != ''){
        $("#jumlah"+rel).val(rupiah(jadi,'.',',',0));
        hitunggajibaru(rel);
    }else{
        $("#jumlah"+rel).val('');
        hitunggajibaru(rel);
    }
})

$(document).on('click','#savegaji',function(){
    for(x=1;x<=100;x++){
        // var c = $("#total"+x).hasClass('text-primary');
        if(document.getElementById('jumlah'+x)){
            var j = $("#jumlah"+x).val();
            var b = $("#tunjab"+x).val();
            var s = $("#tunskil"+x).val();
            var c = ((j+b+s)!='');
            if(c){
                var rel = $("#total"+x).attr('rel');
                simpangajiall(rel,x);
            }
        }
        if(x==100){
            alert('Tes');
            $("#kembalikemastergaji").click();
        }
    }
})
$(document).on('click','#simpangaji',function(){
    var k = 0;
    var jumlahrek = $("#jumlahrek").val();
    for(x=1;x<=100;x++){
        // var c = $("#total"+x).hasClass('text-primary');
        if(document.getElementById('jumlah'+x)){
            k++;
            // var j = ($("#jumlah"+x).val()=='') ? $("#jml"+x).text() : $("#jumlah"+x).val();
            // var b = ($("#tunjab"+x).val()=='') ? $("#tj"+x).text() : $("#tunjab"+x).val();
            // var s = ($("#tunskil"+x).val()=='') ? $("#ts"+x).text() : $("#tunskil"+x).val();
            // var p = ($("#persen"+x).val()=='') ? 0 : $("#persen"+x).val();
            var j = $("#jumlah"+x).val();
            var b = $("#tunjab"+x).val();
            var s = $("#tunskil"+x).val();
            var p = $("#persen"+x).val();
            var rel = $("#total"+x).attr('rel');
            var urlsimpangaji = $("#urlsimpangaji").val();
            $.ajax({
                dataType : 'json',
                type : "POST",
                url : urlsimpangaji,
                data : {id : rel, gaji : j, tunjab : b, tunskil : s,persen : p},
                success : function(data){
                    if(data.length==1){
                    // pesan('info','Simpan gaji '+data[0]['id_karyawan']+' berhasil');
                        // k += 1;
                    }
                } //,
                // error: function (xhr, ajaxOptions, thrownError) {
                //     alert('Kode Error '+xhr.status+' '+thrownError);
                // }
            })
        }
    }
    if(k==jumlahrek){
        pesan('info','Berhasil disimpan');
        // alert('Berhasil disimpan');
        // window.location.href = $("#urldef").val();
    }
})
$("#namaaju").change(function(){
    var namaaju = $(this).val();
    var urlpindahaju = $("#urlpindahaju").val();
    $.ajax({
		dataType : 'json',
		type : "POST",
		url : urlpindahaju,
		data : {aju : namaaju},
		success : function(data){
            //pesan('info','Update gaji '+data[0].nama+' berhasil');
            if(data == 1){
                document.location.reload();
            }
		}//,
        // error: function (xhr, ajaxOptions, thrownError) {
        //     alert('Kode Error '+xhr.status);
        //   }
	})
})

function simpangajiall(id,ind){
    var gaji = ($("#jumlah"+ind).val()=='') ? $("#jml"+ind).text() : $("#jumlah"+ind).val();
    var tunj = ($("#tunjab"+ind).val()=='') ? $("#tj"+ind).text() : $("#tunjab"+ind).val();
    var tuns = ($("#tunskil"+ind).val()=='') ? $("#ts"+ind).text() : $("#tunskil"+ind).val();
    var urltujuan = $("#urltujuan").val();
    $.ajax({
		dataType : 'json',
		type : "POST",
		url : urltujuan,
		data : {ide : id, gapok : gaji, tunjab : tunj, tunskil : tuns},
		success : function(data){
            pesan('info','Update gaji '+data[0].nama+' berhasil');
		}//,
        // error: function (xhr, ajaxOptions, thrownError) {
        //     alert('Kode Error '+xhr.status);
        //   }
	})
}

function hitunggajibaru(rel){
    var jml = $("#jml"+rel).text().trim();
    var xjml = $("#xjml"+rel).text().trim();
    var jumlah = ($("#jumlah"+rel).val()=='') ?  $("#jml"+rel).text() : $("#jumlah"+rel).val();
    var tunjab = ($("#tunjab"+rel).val()=='') ? $("#tj"+rel).text() : $("#tunjab"+rel).val();
    var tunskill = ($("#tunskil"+rel).val()=='') ? $("#ts"+rel).text() : $("#tunskil"+rel).val();
    if(jumlah.trim()=='' || jumlah.trim() == '-'){
        jumlah = '0';
    }
    if(tunjab.trim()=='' || tunjab.trim() == '-'){
        tunjab = '0';
    }
    if(tunskill.trim() =='' || tunskill.trim() == '-'){
        tunskill = '0';
    }
    var total = parseFloat(toAngka(jumlah))+parseFloat(toAngka(tunjab))+parseFloat(toAngka(tunskill));
    if(total==0){
        $("#total"+rel).text(rupiah(jml,'.',',',0));
    }else{
        $("#total"+rel).text(rupiah(total,'.',',',0));
    }
    if(total != toAngka(xjml.trim())){
        $("#total"+rel).addClass('text-primary');
    }else{
        $("#total"+rel).removeClass('text-primary');
    }
}

function hitunggakot(){
    var gaji;
    if($("#gaji").val()==''){
        gaji = 0;
    }else{
        gaji = toAngka($("#gaji").val());
    }
    var tunjab;
    if($("#tunjab").val()==''){
        tunjab = 0;
    }else{
        tunjab = toAngka($("#tunjab").val());
    }
    var tunskill;
    if($("#tunskill").val()==''){
        tunskill = 0;
    }else{
        tunskill = toAngka($("#tunskill").val());
    }
    var hitung = parseFloat(gaji)+parseFloat(tunjab)+parseFloat(tunskill);
    $("#gakot").val(rupiah(hitung,'.',',',0));
}
