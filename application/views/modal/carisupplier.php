<div class="inner-wrapp">
	<div class="row">
		<div class="col-sm-12 font-kecil-13">
			<div class="panel panel-dark">
				<div class="panel-body pan">
					<div class="col-sm-12 mt-2">
						<div class="form-group row mb-0">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Kode/Nama</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="carinamasupplier" name="carinamasupplier" placeholder="Kode / Nama Supplier">
							</div>
						</div>
						<hr class="small">
						<div class="table-responsive tabler">
							<table class="table table-bordered table-striped table-hover responsive nowrap datatable">
								<thead class="bg-info text-kecil-13 text-hitam">
									<th>Kode</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Kontak</th>
									<th>Aksi</th>
								</thead>
								<tbody id="hasilcari">
									<div class="hasilpencariansupplier" id="hasilpencariansupplier">
										<tr class="tabel-bodi">
											<td style="vertical-align: middle; text-align: center;" colspan="5">
												Lakukan Pencarian
											</td>
										</tr>
									</div>
								</tbody>
							</table>
						</div>
						<div class="mb-4" style="text-align: right;">
							<a href="#" class="btn btn-sm btn-danger flat font-kecil-13" id="batalcari" data-dismiss="modal">Batal</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			// alert($("#carinamasupplier").val());
			setTimeout(
				fokuse, 100);
		})

		function fokuse() {
			document.getElementById("carinamasupplier").focus();
		}
		$(document).on('change', '#carinamasupplier', function() {
			var len = $(this).val().length;
			if (len > 2) {
				var kode = $(this).val();
				$.ajax({
					dataType: 'json',
					type: "POST",
					url: base_url + "pembelian/caridatasupplier",
					data: {
						kodd: kode
					},
					success: function(data) {
						// alert(data.datagroup);
						$("#hasilcari").html(data.datagroup).show();
					}
				})
			} else {
				alert('Minimal 3 karakter untuk melakukan pencarian data');
			}
		})
		$(document).on('click', '#pilihsupplier', function(data) {
			var rel = $(this).attr('rel');
			$.ajax({
				dataType: 'json',
				type: "POST",
				url: base_url + "pembelian/getdatasupplier",
				data: {
					kodd: rel
				},
				success: function(data) {
					// alert(data);
					$("#idsupplier").val(data[0]['id']);
					$("#supplier").val(data[0]['nama']);
					$("#alamat").val(data[0]['alamat']);
					// isisupplier(data[0]['id']);
					
					$("#batalcari").click();
					// setTimeout(
					// 	fokuse, 100);
				}
			})
		})

		function isisupplier(data) {
			var rel = data;
			$.ajax({
				type: "POST",
				url: base_url + "pembelian/isisupplier",
				data: {
					kodd: rel
				},
				success: function(data) {
					$("#batalcari").click();
				}
			})
		}
	</script>