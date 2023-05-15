<!-- Begin Page Content -->
<div class="container-fluid laman" style="clear: both;">
    <div class="totaljual text-danger">Rp. 999,999,999.99</div>
    <div class="judul" >Transaksi</div>
    <p class="katapengantar text-gray-800 mb-1">Pembelian Barang</p>
    <hr class="mb-2 mt-1">
    <div class="row" >
        <div class="col-md-5 font-kecil-13">
            <input type="text" name="urlsimpan" id="urlsimpan" value="<?= $urlsimpan; ?>" class="hilang">
            <input type="text" name="urledit" id="urledit" value="<?= $urledit; ?>" class="hilang">
            <form method="post" action="" name="formkategori" id="formkategori">
                <input type="text" class="hilang" name="id" id="id">
                <input type="text" name="idsupplier" id="idsupplier" class="hilang">
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Supplier</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="supplier" name="supplier" placeholder="NAma Supplier">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="alamat" name="alamat" placeholder="Alamat Supplier">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <div class="col-sm-12" style="text-align: center;">
                        <a href="<?= base_url().'pembelian/carisupplier'; ?>" class="btn btn-warning btn-icon-split btn-sm flat font-kecil text-hitam" data-remote="false" style="margin-top: 5px;" data-toggle="modal" data-title="Cari Supplier" data-target="#modalBox" id="carisupplier" title="Search">
                            <span class="icon text-hitam">
                                <i class="fas fa-search"></i>
                            </span>
                            <span class="text">Cari Supplier</span>
                        </a>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Beli</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="kode" name="kode" value="<?= $this->session->userdata('kodebeli'); ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">No Bukti</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="nobukti" name="nobukti" placeholder="Bukti Pembelian">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tgl Beli</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="tglbeli" name="tglbeli" placeholder="Tgl Pembelian">
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
        <div class="col-md-7 font-kecil-13">
            <hr class="small mb-0">
            <div class="row mt-0 font-tebal text-gray-800" style="height: 35px;">
                <div class="col-sm-6 mt-2">Nama Barang</div>
                <div class="col-sm-3 mt-2">Jumlah</div>
                <div class="col-sm-3 mt-2">Harga Rp.</div>
            </div>
            <hr class="small">
        </div>
    </div>
</div>