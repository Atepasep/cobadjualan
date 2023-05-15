<!-- Begin Page Content -->
<div class="container-fluid laman" style="clear: both;">
    <div class="totaljual text-danger">Rp. 999,999,999.99</div>
    <div class="judul" >Transaksi</div>
    <p class="katapengantar text-gray-800 mb-1">Pembelian</p>
    <hr class="mb-2 mt-1">
    <div class="row" >
        <div class="col-md-5 font-kecil-13">
            <input type="text" name="urlsimpan" id="urlsimpan" value="<?= $urlsimpan; ?>" class="hilang">
            <input type="text" name="urledit" id="urledit" value="<?= $urledit; ?>" class="hilang">
            <form method="post" action="" name="formkategori" id="formkategori">
                <input type="text" class="hilang" name="id" id="id">
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="idsup" name="idsup" placeholder="Sup ID">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Supplier</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="supplier" name="supplier" placeholder="Nama Supplier">
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <div class="col-sm-12" style="text-align: center;">
                        <a href="#" class="btn btn-warning btn-icon-split btn-sm flat font-kecil text-hitam" id="addkategori">
                            <span class="icon text-hitam">
                                <i class="fas fa-search"></i>
                            </span>
                            <span class="text">Cari Supplier</span>
                        </a>
                    </div>
                </div>
                <hr class="mb-1 mt-1">
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Barcode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="idcust" name="idcust" placeholder="isi Barcode lalu tekan ENTER">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="kode" name="kode" placeholder="Kode Barang">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="barang" name="barang" placeholder="Nama Barang">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13 kanan" id="jml" name="jml" placeholder="Jumlah Barang">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="satuan" name="satuan" placeholder="Satuan Barang" readonly>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13 kanan" id="hrg" name="hrg" placeholder="Harga Barang">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-sm-12" style="text-align: center;">
                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="addkategori">
                            <span class="icon text-white">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah</span>
                        </a>
                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil hilang" id="simpankategori">
                            <span class="icon text-white">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </a>
                        <a href="#" class="btn btn-primary btn-icon-split btn-sm flat font-kecil" id="editkategori">
                            <span class="icon text-white">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="text">Ubah</span>
                        </a>
                        <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil hilang" id="batalkategori">
                            <span class="icon text-white">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Batal</span>
                        </a>
                        <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="hapuskategori" data-toggle="modal" data-target="#confirm-delete" data-href="http://localhost/jualan/kategori/hapus/x" data-news="Yakin akan menghapus data ini ?">
                            <span class="icon text-white">
                                <i class="fas fa-trash-alt"></i>
                            </span>
                            <span class="text">Hapus</span>
                        </a>
                        <a href="#" class="btn btn-info btn-icon-split btn-sm flat font-kecil" id="cetakkategori">
                            <span class="icon text-white">
                                <i class="fas fa-print"></i>
                            </span>
                            <span class="text">Cetak</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-7">
            <table class="table table-bordered" id="tabelku">
                <thead class="bg-warning text-gray-900">
                    <tr>
                        <th scope="col" width="10%">NO</th>
                        <th scope=" col">KATEGORI</th>
                    </tr>
                </thead>
                <tbody id="data-tabelku" class="font-kecil-13">
                    <?php $no = 0;
                    foreach ($kategori->result_array() as $datakategori) {
                        $no++;
                        if ($this->session->flashdata('kodekategori') && $this->session->flashdata('kodekategori') == $datakategori['id']) {
                            $aktif = "aktif";
                        } else {
                            if ($no == 1) {
                                $aktif = "aktif";
                            } else {
                                $aktif = '';
                            }
                        }
                    ?>
                        <tr rel="<?= $datakategori['id'] ?>" class="<?= $aktif; ?>">
                            <td><?= $no; ?></td>
                            <td><?= $datakategori['kategori']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>