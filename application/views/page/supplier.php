<!-- Begin Page Content -->
<div class="container-fluid laman">
    <div class="judul">Master Data</div>
    <p class="katapengantar text-gray-800 mb-1">Supplier</p>
    <hr class="mb-2 mt-1">
    <div class="row">
        <div class="col-md-4 font-kecil-13">
            <input type="text" name="urlsimpan" id="urlsimpan" value="<?= $urlsimpan; ?>" class="hilang">
            <input type="text" name="urledit" id="urledit" value="<?= $urledit; ?>" class="hilang">
            <form method="post" action="" name="formsupplier" id="formsupplier">
                <input type="text" class="hilang" name="id" id="id">
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Supplier</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="nama" name="nama" placeholder="Nama Supplier">
                    </div>
                </div>
                <div id="dataview">
                    <div class="form-group row mb-2">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control form-control-sm flat text-gray-900 font-kecil-13" rows="6" id="xalamat" name="xalamat" placeholder="Alamat Supplier"></textarea>
                        </div>
                    </div>
                </div>
                <div id="dataedit" class="hilang">
                    <div class="form-group row mb-2">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control form-control-sm flat text-gray-900 font-kecil-13" rows="3" id="alamat" name="alamat" placeholder="Alamat Supplier"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Blok</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="blok" name="blok" placeholder="Blok">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">No</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="no" name="no" placeholder="No Rumah">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">RT</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="rt" name="rt" placeholder="RT">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">RW</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="rw" name="rw" placeholder="RW">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="desa" name="desa" placeholder="Desa/Kelurahan">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="kec" name="kec" placeholder="Kecamatan">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kab/Kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="kab" name="kab" placeholder="Kabupaten / Kota">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kodepos</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="kodepos" name="kodepos" placeholder="Kodepos">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Telp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="telp" name="telp" placeholder="Telepon">
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kontak</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="cp" name="cp" placeholder="Kontak Person">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Bank</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="bank" name="bank" placeholder="Nama Bank">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">No Rekening</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="norek" name="norek" placeholder="Nomor Rekening">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Atas Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="anbank" name="anbank" placeholder="Atas Nama Bank">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control form-control-sm flat text-gray-900 font-kecil-13" rows="2" id="deskripsi" name="deskripsi" placeholder="Deskripsi Spesialisasi Supplier"></textarea>
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
        <div class="col-md-8">
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
                            $alamat = $datasupplier['alamat'] != null ? $datasupplier['alamat'] : ' ';
                            $alamat .= $datasupplier['blok'] != null ? ' Blok '.$datasupplier['blok'] : ' ';
                            $alamat .= $datasupplier['no'] != null ? 'No. '.$datasupplier['no'] : ' ';
                            $alamat .= ' RT/RW '.$datasupplier['rt'].'/'.$datasupplier['rw'];
                            $alamat .= $datasupplier['desa'] != null ? ' Ds. '.$datasupplier['desa'] : ' ';
                            $alamat .= $datasupplier['kec'] != null ? ' Kec. '.$datasupplier['kec'] : ' ';
                            $alamat .= $datasupplier['kab'] != null ? ' Kab/Kota. '.$datasupplier['kab'] : ' ';
                            $alamat .= $datasupplier['propinsi'] != null ? $datasupplier['propinsi'] : ' ';
                            $alamat .= $datasupplier['kodepos'] != null ? $datasupplier['kodepos'] : ' ';
                        ?>
                        <tr rel="<?= $datasupplier['id'] ?>" class="<?= $aktif; ?>">
                            <td><?= $no; ?></td>
                            <td style="font-weight: 700;"><?= $datasupplier['nama']; ?></td>
                            <td><?= $alamat ?></td>
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