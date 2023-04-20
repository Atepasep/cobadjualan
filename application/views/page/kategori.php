<!-- Begin Page Content -->
<div class="container-fluid laman">
    <div class="judul">Master Data</div>
    <p class="katapengantar text-gray-800 mb-1">Kategori</p>
    <hr class="mb-2 mt-1">
    <div class="row">
        <div class="col-md-6 font-kecil-13">
            <input type="text" name="urlsimpan" id="urlsimpan" value="<?= $urlsimpan; ?>" class="hilang">
            <input type="text" name="urledit" id="urledit" value="<?= $urledit; ?>" class="hilang">
            <form method="post" action="" name="formkategori" id="formkategori">
                <input type="text" class="hilang" name="id" id="id">
                <div class="form-group row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="kategori" name="kategori" placeholder="Nama Kategori">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12" style="text-align: right;">
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
        <div class="col-md-6">
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