<!-- Begin Page Content -->
<div class="container-fluid laman">
    <div class="judul">Master Data</div>
    <p class="katapengantar text-gray-800 mb-1">Customer</p>
    <hr class="mb-2 mt-1">
    <div class="row">
        <div class="col-md-4 font-kecil-13">
            <input type="text" name="urlsimpan" id="urlsimpan" value="<?= $urlsimpan; ?>" class="hilang">
            <input type="text" name="urledit" id="urledit" value="<?= $urledit; ?>" class="hilang">
            <form method="post" action="" name="formcustomer" id="formcustomer">
                <input type="text" class="hilang" name="id" id="id">
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="kode" name="kode" placeholder="Kode Customer" readonly>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Customer <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="nama" name="nama" placeholder="Nama Customer">
                    </div>
                </div>
                <div id="dataview">
                    <div class="form-group row mb-2">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <textarea class="form-control form-control-sm flat text-gray-900 font-kecil-13" rows="6" id="xalamat" name="xalamat" placeholder="Alamat Customer"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">No ID <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="xno_identitas" name="xno_identitas" placeholder="No Identitas">
                        </div>
                    </div>
                </div>
                <div id="dataedit" class="hilang">
                    <div class="form-group row mb-2">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <textarea class="form-control form-control-sm flat text-gray-900 font-kecil-13" rows="3" id="alamat" name="alamat" placeholder="Alamat Supplier"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis ID <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control form-control-sm flat text-gray-900 font-kecil-13" name="identitas" id="identitas">
                                <option value="">-- Pilih ID --</option>
                                <?php foreach ($identitas->result_array() as $iden) { ?>
                                    <option value="<?= $iden['jn_identitas'] ?>"><?= $iden['jn_identitas']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">No ID <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="no_identitas" name="no_identitas" placeholder="No Identitas">
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
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Telp <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm flat text-gray-900 font-kecil-13" id="telp" name="telp" placeholder="Telepon">
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Ket</label>
                    <div class="col-sm-10">
                        <textarea class="form-control form-control-sm flat text-gray-900 font-kecil-13" rows="2" id="deskripsi" name="deskripsi" placeholder="Keterangan"></textarea>
                    </div>
                </div>
            </form>
            <div class="form-group row">
                <div class="col-sm-12" style="text-align: right;">
                    <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="addcustomer">
                        <span class="icon text-white">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </a>
                    <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil hilang" id="simpancustomer">
                        <span class="icon text-white">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Simpan</span>
                    </a>
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm flat font-kecil" id="editcustomer">
                        <span class="icon text-white">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Ubah</span>
                    </a>
                    <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil hilang" id="batalcustomer">
                        <span class="icon text-white">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text">Batal</span>
                    </a>
                    <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="hapuscustomer" data-toggle="modal" data-target="#confirm-delete" data-href="http://localhost/jualan/kategori/hapus/x" data-news="Yakin akan menghapus data ini ?">
                        <span class="icon text-white">
                            <i class="fas fa-trash-alt"></i>
                        </span>
                        <span class="text">Hapus</span>
                    </a>
                    <a href="#" class="btn btn-info btn-icon-split btn-sm flat font-kecil" id="cetakcustomer">
                        <span class="icon text-white">
                            <i class="fas fa-print"></i>
                        </span>
                        <span class="text">Cetak</span>
                    </a>
                </div>
            </div>
            <div style="border: 1px solid #2E59D9;padding:5px;" class="font-kecil-12">
                Note : <br> Isi data sesuai dengan data identitas diri.
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered" id="tabelku">
                <thead class="bg-warning text-gray-900">
                    <tr>
                        <th scope="col" width="5%">NO</th>
                        <th scope=" col">NAMA CUSTOMER</th>
                        <th scope=" col">ALAMAT</th>
                        <th scope=" col">IDENTITAS</th>
                    </tr>
                </thead>
                <tbody id="data-tabelku" class="font-kecil-13">
                    <?php $no = 0;
                    if($customer->num_rows() > 0){
                        foreach ($customer->result_array() as $datacustomer) {
                            $no++;
                            if ($this->session->flashdata('kodecustomer') && $this->session->flashdata('kodecustomer') == $datacustomer['id']) {
                                $aktif = "aktif";
                            } else {
                                if ($no == 1) {
                                    $aktif = "aktif";
                                } else {
                                    $aktif = '';
                                }
                            }
                            $alamat = $datacustomer['alamat'] != null ? $datacustomer['alamat'] : ' ';
                            $alamat .= $datacustomer['blok'] != null ? ' Blok '.$datacustomer['blok'] : ' ';
                            $alamat .= $datacustomer['no'] != null ? 'No. '.$datacustomer['no'] : ' ';
                            $alamat .= ' RT/RW '.$datacustomer['rt'].'/'.$datacustomer['rw'];
                            $alamat .= $datacustomer['desa'] != null ? ' Ds. '.$datacustomer['desa'] : ' ';
                            $alamat .= $datacustomer['kec'] != null ? ' Kec. '.$datacustomer['kec'] : ' ';
                            $alamat .= $datacustomer['kab'] != null ? ' Kab/Kota. '.$datacustomer['kab'] : ' ';
                            $alamat .= $datacustomer['propinsi'] != null ? $datacustomer['propinsi'] : ' ';
                            $alamat .= $datacustomer['kodepos'] != null ? $datacustomer['kodepos'] : ' ';
                        ?>
                        <tr rel="<?= $datacustomer['id'] ?>" class="<?= $aktif; ?>">
                            <td><?= $no; ?></td>
                            <td class="dobel"><span><?= $datacustomer['kode']; ?></span><br><?= $datacustomer['nama']; ?></td>
                            <td><?= $alamat ?></td>
                            <td><?= '('.$datacustomer['identitas'].') '.$datacustomer['no_identitas']; ?></td>
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