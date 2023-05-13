<!-- Begin Page Content -->
<div class="container-fluid laman">
    <div class="judul">Master Data</div>
    <p class="katapengantar text-gray-800 mb-1">Barang</p>
    <hr class="mb-2 mt-1">
    <div class="row">
        <div class="col-md-4 font-kecil-13">
            <input type="text" name="urlsimpan" id="urlsimpan" value="<?= $urlsimpan; ?>" class="hilang">
            <input type="text" name="urledit" id="urledit" value="<?= $urledit; ?>" class="hilang">
            <input type="text" name="mode" id="mode" value="" class="hilang">
            <form method="post" action="" name="formbarang" id="formbarang" enctype="multipart/form-data">
                <input type="text" class="hilang" name="id" id="id">
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="kode" name="kode" placeholder="Kode Barang" value="<?= $this->session->flashdata('kode'); ?>">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Barcode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="barcode" name="barcode" placeholder="Barcode">
                        <div class="invalide text-danger hilang" id="invalidbarcode">Barcode harus diisi <i class="fa fa-exclamation-circle"></i></div>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="barang" name="barang" placeholder="Nama Barang">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control form-control-sm flat text-gray-900 font-kecil-13" name="id_kategori" id="id_kategori">
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($kategori->result_array() as $kateg) { ?>
                                <option value="<?= $kateg['id'] ?>"><?= $kateg['kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                        <select class="form-control form-control-sm flat text-gray-900 font-kecil-13" name="id_satuan" id="id_satuan">
                            <option value="">-- Pilih Satuan --</option>
                            <?php foreach ($satuan->result_array() as $satua) { ?>
                                <option value="<?= $satua['id'] ?>"><?= $satua['satuan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Foto Barang</label>
                    <div class="col-sm-10">
                        <div style="border: 2px dashed #adadad; text-align:center;" id="addfoto">
                            <a href="#" style="text-decoration: none;">
                                <?php $fotoprofile = $this->session->userdata('foto')=='' ? LOK_BARANG.'add-files.svg' : LOK_BARANG.$this->session->userdata('foto'); ?> 
                                <img src="<?= $fotoprofile ?>" style="width: auto; height: 150px; min-height: 150px;" id="gbimage" >
                                <div style="font-size: 10px; color:black;">Tarik gambar kesini atau <strong class="text-red"><u>Cari</u></strong> (max 2MB)</div>
                            </a>
                        </div>
                        <input type="file" class="hilang" accept="image/*" id="fotobarang" name="fotobarang" onchange="loadFile(event)">
                        <input type="text" class="hilang" id="file_path" name="file_path" >
                        <input type="text" class="hilang" id="old_gb" name="old_gb" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12" style="text-align: right;">
                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="addbarang">
                            <span class="icon text-white">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah</span>
                        </a>
                        <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil hilang" id="simpanbarang">
                            <span class="icon text-white">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </a>
                        <a href="#" class="btn btn-primary btn-icon-split btn-sm flat font-kecil" id="editbarang">
                            <span class="icon text-white">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="text">Ubah</span>
                        </a>
                        <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil hilang" id="batalbarang">
                            <span class="icon text-white">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Batal</span>
                        </a>
                        <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="hapusbarang" data-toggle="modal" data-target="#confirm-delete" data-href="http://localhost/jualan/barang/hapus/x" data-news="Yakin akan menghapus data ini ?">
                            <span class="icon text-white">
                                <i class="fas fa-trash-alt"></i>
                            </span>
                            <span class="text">Hapus</span>
                        </a>
                        <a href="#" class="btn btn-info btn-icon-split btn-sm flat font-kecil" id="cetakbarang">
                            <span class="icon text-white">
                                <i class="fas fa-print"></i>
                            </span>
                            <span class="text">Cetak</span>
                        </a>
                    </div>
                </div>
            </form>
            <div style="border: 1px solid #2E59D9;padding:5px;" class="font-kecil-12">
                Note : <br>Kode Barang akan otomatis terisi (otomatis) apabila anda klik tombol tambah, tetapi anda bisa merubahnya secara manual.
                <br>ingat, kode barang dan Barcode harus unik.
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered" id="tabelku">
                <thead class="bg-warning text-gray-900">
                    <tr>
                        <th scope="col" width="10%">NO</th>
                        <th scope="col">KODE</th>
                        <th scope="col">NAMA BARANG</th>
                        <th scope="col">KATEGORI</th>
                        <th scope="col">SATUAN</th>
                    </tr>
                </thead>
                <tbody id="data-tabelku" class="font-kecil-13">
                    <?php $no = 0;
                    foreach ($barang->result_array() as $databarang) {
                        $no++;
                        if ($this->session->flashdata('kodebarang') && $this->session->flashdata('kodebarang') == $databarang['id']) {
                            $aktif = "aktif";
                        } else {
                            if ($no == 1) {
                                $aktif = "aktif";
                            } else {
                                $aktif = '';
                            }
                        }
                    ?>
                        <tr rel="<?= $databarang['id'] ?>" class="<?= $aktif; ?>">
                            <td><?= $no; ?></td>
                            <td class="dobel"><span><?= $databarang['barcode']; ?></span><br><?= $databarang['kode']; ?></td>
                            <td><?= $databarang['nama_barang']; ?></td>
                            <td><?= $databarang['kategori']; ?></td>
                            <td><?= $databarang['satuan']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>