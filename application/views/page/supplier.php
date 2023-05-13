<!-- Begin Page Content -->
<div class="container-fluid laman">
    <div class="judul">Master Data</div>
    <p class="katapengantar text-gray-800 mb-1">Supplier</p>
    <hr class="mb-2 mt-1">
    <div class="row">
        <div class="col-md-5 font-kecil-13">
            <input type="text" name="urlsimpan" id="urlsimpan" value="<?= $urlsimpan; ?>" class="hilang">
            <input type="text" name="urledit" id="urledit" value="<?= $urledit; ?>" class="hilang">
            <form method="post" action="" name="formkategori" id="formkategori">
                <input type="text" class="hilang" name="id" id="id">
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Supplier</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="nama" name="nama" placeholder="Nama Supplier">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control form-control-sm flat text-gray-900 font-kecil-13" rows="6" id="xalamat" name="xalamat" placeholder="Alamat Supplier"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kontak Person</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="xkontak" name="xkontak" placeholder="Kontak Person">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Bank</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="xbank" name="xbank" placeholder="Nama Bank">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Rekening</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="xnorek" name="xnorek" placeholder="Nomor Rekening">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Atas Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="xanbank" name="xanbank" placeholder="Atas Nama Bank">
                    </div>
                </div>
            </form>
            <div class="form-group row">
                <div class="col-sm-12" style="text-align: right;">
                    <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="addsupplier">
                        <span class="icon text-white">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </a>
                    <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil hilang" id="simpansupplier">
                        <span class="icon text-white">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Simpan</span>
                    </a>
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm flat font-kecil" id="editsupplier">
                        <span class="icon text-white">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Ubah</span>
                    </a>
                    <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil hilang" id="batalsupplier">
                        <span class="icon text-white">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text">Batal</span>
                    </a>
                    <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="hapussupplier" data-toggle="modal" data-target="#confirm-delete" data-href="http://localhost/jualan/kategori/hapus/x" data-news="Yakin akan menghapus data ini ?">
                        <span class="icon text-white">
                            <i class="fas fa-trash-alt"></i>
                        </span>
                        <span class="text">Hapus</span>
                    </a>
                    <a href="#" class="btn btn-info btn-icon-split btn-sm flat font-kecil" id="cetaksupplier">
                        <span class="icon text-white">
                            <i class="fas fa-print"></i>
                        </span>
                        <span class="text">Cetak</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <table class="table table-bordered" id="tabelku">
                <thead class="bg-warning text-gray-900">
                    <tr>
                        <th scope="col" width="5%">NO</th>
                        <th scope=" col">NAMA SUPPLIER</th>
                        <th scope=" col">ALAMAT</th>
                        <th scope=" col">DESKRIPSI</th>
                    </tr>
                </thead>
                <tbody id="data-tabelku" class="font-kecil-13">
                    <?php $no = 0;
                    if($supplier->num_rows() > 0){
                        foreach ($supplier->result_array() as $datasupplier) {
                            $no++;
                            if ($this->session->flashdata('kodesupplier') && $this->session->flashdata('kodesupplier') == $datasupplier['id']) {
                                $aktif = "aktif";
                            } else {
                                if ($no == 1) {
                                    $aktif = "aktif";
                                } else {
                                    $aktif = '';
                                }
                            }
                        ?>
                        <tr rel="<?= $datasupplier['id'] ?>" class="<?= $aktif; ?>">
                            <td><?= $no; ?></td>
                            <td style="font-weight: 700;"><?= $datasupplier['nama']; ?></td>
                            <td><?= $datasupplier['alamat'].' Blok/No '.$datasupplier['blok'].' RT/RW '.$datasupplier['rt'].'/'.$datasupplier['rw'].' Ds. '.$datasupplier['desa'].
                            ' Kec. '.$datasupplier['kec'].' Kab/Kota '.$datasupplier['kab'].' '.$datasupplier['propinsi'].' '.$datasupplier['kodepos']; ?></td>
                            <td><?= $datasupplier['deskripsi']; ?></td>
                        </tr>
                    <?php }}else{ ?>
                        <tr>
                            <td colspan="4" style="text-align: center;">Tidak ada data</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>