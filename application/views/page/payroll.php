<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-coklat shadow h-100 py-0 flat">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="float: left;">
                                    Payroll Management <?= namabulan($this->session->flashdata('bulanperiode')), ' ' . $this->session->flashdata('tahunperiode') ?>
                                    <br><span style="color: red;">Jumlah Rec <?= $count ?>, Total THP Rp. <?= rupiah($jmthp['thp'], 0) ?></span>
                                </div>
                                <div style="float: right;">
                                    <div class="form-inline">
                                        <select class="form-control small flat kecil mr-1 font-kecil hitam" id="kodepayroll" name="kodepayroll">
                                            <?= $k = $this->session->flashdata('kodepayroll'); ?>
                                            <option <?php if ($k == 'SALARY') {
                                                        echo "selected";
                                                    } ?>>SALARY</option>
                                            <option <?php if ($k == 'THR') {
                                                        echo "selected";
                                                    } ?>>THR</option>
                                            <option <?php if ($k == 'BONUS') {
                                                        echo "selected";
                                                    } ?>>BONUS</option>
                                        </select>
                                        <select class="form-control small flat kecil mr-1 font-kecil hitam <?php if ($this->session->flashdata('kodepayroll') != 'SALARY') {
                                                                                                                echo "hilang";
                                                                                                            } ?>" id="bulanperiode" name="bulanperiode">
                                            <?= $l = $this->session->flashdata('bulanperiode'); ?>
                                            <option <?php if ($l == 1) {
                                                        echo "selected";
                                                    } ?> value="01">Januari</option>
                                            <option <?php if ($l == 2) {
                                                        echo "selected";
                                                    } ?> value="02">Februari</option>
                                            <option <?php if ($l == 3) {
                                                        echo "selected";
                                                    } ?> value="03">Maret</option>
                                            <option <?php if ($l == 4) {
                                                        echo "selected";
                                                    } ?> value="04">April</option>
                                            <option <?php if ($l == 5) {
                                                        echo "selected";
                                                    } ?> value="05">Mei</option>
                                            <option <?php if ($l == 6) {
                                                        echo "selected";
                                                    } ?> value="06">Juni</option>
                                            <option <?php if ($l == 7) {
                                                        echo "selected";
                                                    } ?> value="07">Juli</option>
                                            <option <?php if ($l == 8) {
                                                        echo "selected";
                                                    } ?> value="08">Agustus</option>
                                            <option <?php if ($l == 9) {
                                                        echo "selected";
                                                    } ?> value="09">September</option>
                                            <option <?php if ($l == 10) {
                                                        echo "selected";
                                                    } ?> value="10">Oktober</option>
                                            <option <?php if ($l == 11) {
                                                        echo "selected";
                                                    } ?> value="11">Nopember</option>
                                            <option <?php if ($l == 12) {
                                                        echo "selected";
                                                    } ?> value="12">Desember</option>
                                        </select>
                                        <input type="text" class="form-control small flat kecil font-kecil mr-1" style="width: 60px;" name="tahunperiode" id="tahunperiode" value="<?= $this->session->flashdata('tahunperiode') ?>">
                                        <?php
                                        $send = 0;
                                        $sendmail = 0;
                                        foreach ($hitungkirim as $kirim) {
                                            $send = $kirim['send'];
                                            $sendmail = $kirim['sendmail'];
                                            $vlhg = $kirim['validhg'];
                                            $vlmh = $kirim['validmh'];
                                        }
                                        ?>
                                        <select class="form-control small flat kecil mr-1 font-kecil hitam" style="background-color: yellow; color: black !important" id="namapt" name="namapt" title="PT">
                                            <?= $lm = $this->session->flashdata('namapt'); ?>
                                            <option <?php if ($lm == 'I') {
                                                        echo "selected";
                                                    } ?> value="I">IFN</option>
                                            <option <?php if ($lm == 'L') {
                                                        echo "selected";
                                                    } ?> value="L">LIN</option>
                                            <option <?php if ($lm == 'M') {
                                                        echo "selected";
                                                    } ?> value="M">MDL</option>
                                            <option <?php if ($lm == 'S') {
                                                        echo "selected";
                                                    } ?> value="S">Semua</option>
                                        </select>
                                        <select class="form-control small flat kecil mr-1 font-kecil hitam" style="background-color: rgb(127,255,212);" id="namaloc" name="namaloc" title="LOC">
                                            <?= $lc = $this->session->flashdata('namaloc'); ?>
                                            <option <?php if ($lc == 'G') {
                                                        echo "selected";
                                                    } ?> value="G">General</option>
                                            <option <?php if ($lc == 'F') {
                                                        echo "selected";
                                                    } ?> value="F">Factory</option>
                                            <option <?php if ($lc == '') {
                                                        echo "selected";
                                                    } ?> value="">Semua</option>
                                        </select>
                                        <?php if ($count > 0) { ?>
                                            <?php if ($send < $count && ($vlhg == 0 && $vlmh == 0)) { ?>
                                                <a href="<?= base_url() . 'payroll/prosespayroll/1' ?>" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="resetpayroll">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-sync-alt"></i>
                                                    </span>
                                                    <span class="text kode">Reset</span>
                                                </a>
                                            <?php } ?>
                                            <?php if ($send < $count) { ?>
                                                <a class="btn btn-secondary btn-icon-split btn-sm flat font-kecil ml-1" data-toggle="modal" data-target="#confirm-task" data-href="<?= base_url() . '/payroll/sendall' ?>" title="Send semua data" data-news="Apakah Anda yakin akan kirim semua data periode ini ?" style="cursor: pointer;">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-mail-bulk"></i>
                                                    </span>
                                                    <span class="text kode">Kirim Validasi</span>
                                                </a>
                                            <?php } ?>
                                            <?php if ($count == $vlhg && $count == $vlmh && $cekrilis == 0) { ?>
                                                <a class="btn btn-warning btn-icon-split btn-sm flat font-kecil ml-1" data-toggle="modal" data-target="#confirm-task" data-href="<?= base_url() . '/payroll/rilisportal' ?>" title="Rilis Portal" data-news="Apakah Anda yakin akan Rilis data ini ke PORTAL ?" style="cursor: pointer;">
                                                    <span class="icon text-black-50">
                                                        <i class="fas fa-info"></i>
                                                    </span>
                                                    <span class="text kode text-black-50">Rilis Portal</span>
                                                </a>
                                            <?php } ?>
                                            <?php if ($count == $vlhg && $count == $vlmh && $cekrilis >= 1) { ?>
                                                <a class="btn btn-danger btn-icon-split btn-sm flat font-kecil ml-1" data-toggle="modal" data-target="#confirm-task" data-href="<?= base_url() . '/payroll/unrilisportal' ?>" title="Rilis Portal" data-news="Apakah Anda yakin akan Hapus Rilis ke PORTAL ?" style="cursor: pointer;">
                                                    <span class="icon text-black-50">
                                                        <i class="fas fa-info"></i>
                                                    </span>
                                                    <span class="text kode text-black-50">Hapus Rilis Portal</span>
                                                </a>
                                            <?php } ?>
                                            <?php if ($send == $count && $count == $vlhg && $count == $vlmh && $sendmail != $count) { ?>
                                                <a class="btn btn-info btn-icon-split btn-sm flat font-kecil ml-1" href="<?= base_url() . '/payroll/getalldatatomail' ?>" data-remote="false" data-toggle="modal" data-title="Kirim eMail ke Semua Personil" data-target="#modalBox-lg" title="portal release" data-news="Apakah Anda yakin akan kirim email ke semua Personil ?" style="cursor: pointer;">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-paper-plane"></i>
                                                    </span>
                                                    <span class="text kode">Kirim ke Mail</span>
                                                </a>
                                            <?php } ?>
                                            <?php if ($send == $count && $vlhg == 0 && $vlmh == 0) { ?>
                                                <a class="btn btn-danger btn-icon-split btn-sm flat font-kecil ml-1" data-toggle="modal" data-target="#confirm-task" data-href="<?= base_url() . '/payroll/getbacksend' ?>" title="Batalkan Send data" data-news="Apakah Anda yakin akan membatalkan kirim semua data periode ini ?" style="cursor: pointer;">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-redo-alt"></i>
                                                    </span>
                                                    <span class="text kode">Batal Kirim Validasi</span>
                                                </a>
                                            <?php } ?>
                                            <?php if ($sendmail == $count && $vlhg == $count && $vlmh == $count) { ?>
                                                <!-- disini awal nya report -->
                                            <?php } ?>
                                            <a class="btn btn-success btn-icon-split btn-sm flat font-kecil ml-1" data-toggle="modal" data-target="#modalBox-task" href="<?= base_url() . 'payroll/taxreport' ?>" data-href="<?= base_url() . '/payroll/buatfile' ?>" title="Create Tax Report" data-news="Apakah Anda yakin akan mengexport data ke Excel ?" style="cursor: pointer;">
                                                <span class="icon text-white">
                                                    <i class="fas fa-file-excel"></i>
                                                </span>
                                                <span class="text kode">Tax Report</span>
                                            </a>
                                            <a class="btn btn-danger btn-icon-split btn-sm flat font-kecil ml-1" href="<?= base_url() . 'payroll/buatlapfinance' ?>" title="Create Finace Report" style="cursor: pointer;">
                                                <span class="icon text-white">
                                                    <i class="fas fa-file-pdf"></i>
                                                </span>
                                                <span class="text kode">Finance Report</span>
                                            </a>
                                            <a class="btn btn-light btn-icon-split btn-sm flat font-kecil ml-1" data-toggle="modal" data-target="#modalBox-task" href="<?= base_url() . 'payroll/txtreport' ?>" data-href="<?= base_url() . '/payroll/buatfile' ?>" title="Create Txt Report" data-news="Backup data ke Txt ?" style="cursor: pointer;">
                                                <span class="icon text-primary">
                                                    <i class="fas fa-file"></i>
                                                </span>
                                                <span class="text kode">Txt Report</span>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url() . 'payroll/prosespayroll' ?>" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="xprosespayroll">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <span class="text kode">Proses</span>
                                            </a>
                                        <?php } ?>
                                        <?php if ($this->session->flashdata('kodepayroll') == 'BONUS') { ?>
                                            <a class="btn btn-success btn-icon-split btn-sm flat font-kecil ml-1" href="<?= base_url() . 'payroll/downloadexcelbonus' ?>" style="cursor: pointer;">
                                                <span class="icon text-white">
                                                    <i class="fas fa-file-excel"></i>
                                                </span>
                                                <span class="text kode">Format Bonus</span>
                                            </a>
                                        <?php } ?>
                                        <?php if ($this->session->flashdata('kodepayroll') == 'THR') { ?>
                                            <a class="btn btn-success btn-icon-split btn-sm flat font-kecil ml-1" href="<?= base_url() . 'payroll/downloadexcelthr' ?>" style="cursor: pointer;">
                                                <span class="icon text-white">
                                                    <i class="fas fa-file-excel"></i>
                                                </span>
                                                <span class="text kode">Format THR</span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <hr class="small mb-1" style="clear: both;">
                            <?php if (isset($_SESSION['msgupload'])) {
                                echo $_SESSION['msgupload'];
                            } ?>
                            <div class="row" style="clear: both;">
                                <div class="col-sm-12">
                                    <div class="table-responsive cekfreeze">
                                        <table class="table table-bordered datatable table-hover" id="tabelku" width="100%" cellspacing="0">
                                            <thead class="bg-secondary text-light" style="position: sticky; top:0;">
                                                <tr>
                                                    <th class="stik" data-priority="1">Ind</th>
                                                    <!-- <th data-priority="1">NIK</th> -->
                                                    <th class="stik" data-priority="2">Nama</th>
                                                    <th class="stik" data-priority="3" style="width: 10px;">H G</th>
                                                    <th class="stik" data-priority="4" style="width: 10px;">M H</th>
                                                    <!-- <th data-priority="9">Loc</th> -->
                                                    <th class="stik" data-priority="6">Position</th>
                                                    <th class="stik">Basic Salary</th>
                                                    <th class="stik">Pos Allowance</th>
                                                    <th class="stik">Skill Allowance</th>
                                                    <th class="stik" data-priority="5">Gross Salary</th>
                                                    <th class="stik"><?php if ($_SESSION['kodepayroll'] != 'SALARY') {
                                                                            echo 'Prc ' . ucfirst(strtolower($_SESSION['kodepayroll']));
                                                                        } else {
                                                                            echo 'Other';
                                                                        } ?></th>
                                                    <th class="stik"><?php if ($_SESSION['kodepayroll'] != 'SALARY') {
                                                                            echo 'Real ' . ucfirst(strtolower($_SESSION['kodepayroll']));
                                                                        } else {
                                                                            echo 'Astek';
                                                                        } ?></th>
                                                    <th class="stik">Jp</th>
                                                    <th class="stik">Pph Month</th>
                                                    <th class="stik">Pph Incentive</th>
                                                    <th class="stik">Meal</th>
                                                    <th class="stik">Transport</th>
                                                    <th class="stik">Koperasi</th>
                                                    <th class="stik" data-priority="5">Thp</th>
                                                    <th class="stik">Loan</th>
                                                    <th class="stik">BPJS</th>
                                                    <th class="stik" data-priority="8">Real Thp</th>
                                                    <th class="stik" data-priority="7">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Ind</th>
                                                    <!-- <th>NIK</th> -->
                                                    <th>Nama</th>
                                                    <th>H G</th>
                                                    <th>M H</th>
                                                    <!-- <th>Loc</th> -->
                                                    <th>Position</th>
                                                    <th>Basic Salary</th>
                                                    <th>Pos Allowance</th>
                                                    <th>Skill Allowance</th>
                                                    <th>Gross Salary</th>
                                                    <th><?php if ($_SESSION['kodepayroll'] != 'SALARY') {
                                                            echo 'Prc ' . ucfirst(strtolower($_SESSION['kodepayroll']));
                                                        } else {
                                                            echo 'Other';
                                                        } ?></th>
                                                    <th><?php if ($_SESSION['kodepayroll'] != 'SALARY') {
                                                            echo 'Real ' . ucfirst(strtolower($_SESSION['kodepayroll']));
                                                        } else {
                                                            echo 'Astek';
                                                        } ?></th>
                                                    <th>Jp</th>
                                                    <th>PPh Month</th>
                                                    <th>PPh Insentive</th>
                                                    <th>Meal</th>
                                                    <th>Transport</th>
                                                    <th>Koperasi</th>
                                                    <th>Thp</th>
                                                    <th>Loan</th>
                                                    <th>BPJS</th>
                                                    <th>Real Thp</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="data-tabelku">
                                                <?php
                                                $jmgaji = 0;
                                                $jmtunjab = 0;
                                                $jmtunskil = 0;
                                                $jmother = 0;
                                                $jmastek = 0;
                                                $jmjp = 0;
                                                $jmpphmonth = 0;
                                                $jmpphgov = 0;
                                                $jmmeal = 0;
                                                $jmtrans = 0;
                                                $jmkop = 0;
                                                $jmthp = 0;
                                                $jmloan = 0;
                                                $jmbpjs = 0;
                                                $jmrealthp = 0;
                                                foreach ($datapayroll as $data) {
                                                    $jmgaji += $data['gaji'];
                                                    $jmtunjab += $data['tunjab'];
                                                    $jmtunskil += $data['tunskill'];
                                                    if ($_SESSION['kodepayroll'] == 'SALARY') {
                                                        $jmother += $data['other'];
                                                        $jmastek += $data['astek'];
                                                    } else {
                                                        $jmastek += $data['thr_bonus'];
                                                    }
                                                    $jmjp += $data['jp'];
                                                    $jmpphmonth += $data['pphmonth'];
                                                    $jmpphgov += $data['pphgovmnt'];
                                                    $jmmeal += $data['meal'];
                                                    $jmtrans += $data['transport'];
                                                    $jmkop += $data['koperasi'];
                                                    $jmthp += $data['thp'];
                                                    $jmloan += $data['loan'];
                                                    $jmbpjs += $data['bpjs'];
                                                    $jmrealthp += $data['realthp'];
                                                ?>
                                                    <tr>
                                                        <td class="font-kecil font-tebal kanan"><?= $data['ind'] ?></td>
                                                        <td class="font-kecil font-tebal"><?= potong($data['nama'], 15) ?></td>
                                                        <td class="font-kecil" style="text-align: center;"><img src="<?php if ($data['hg'] == 1) {
                                                                                                                            echo base_url() . 'assets/images/sign-check.png';
                                                                                                                        } else {
                                                                                                                            echo base_url() . 'assets/images/sign-error.png';
                                                                                                                        } ?>"></td>
                                                        <td class="font-kecil" style="text-align: center;"><img src="<?php if ($data['mh'] == 1) {
                                                                                                                            echo base_url() . 'assets/images/sign-check.png';
                                                                                                                        } else {
                                                                                                                            echo base_url() . 'assets/images/sign-error.png';
                                                                                                                        } ?>"></td>
                                                        <td><?= $data['jabatan'] ?></td>
                                                        <td class="kanan font-kecil"><?= rupiah($data['gaji'], 0, ',', '.') ?></td>
                                                        <td class="kanan font-kecil"><?= rupiah($data['tunjab'], 0, ',', '.') ?></td>
                                                        <td class="kanan font-kecil"><?= rupiah($data['tunskill'], 0, ',', '.') ?></td>
                                                        <td class="kanan font-kecil"><?= rupiah($data['gaji'] + $data['tunjab'] + $data['tunskill'], 0, ',', '.') ?></td>
                                                        <td class="kanan font-kecil" id="kolomother<?= $data['id'] ?>"><?php if ($_SESSION['kodepayroll'] == 'SALARY') {
                                                                                                                            echo rupiah($data['other'], 0, ',', '.');
                                                                                                                        } else {
                                                                                                                            echo rupiah($data['prc_bonus'], 2, ',', '.');
                                                                                                                        } ?></td>
                                                        <td class="kanan font-kecil" id="kolomastek<?= $data['id'] ?>"><?php if ($_SESSION['kodepayroll'] == 'SALARY') {
                                                                                                                            echo rupiah($data['astek'], 0, ',', '.');
                                                                                                                        } else {
                                                                                                                            echo rupiah($data['thr_bonus'], 0, ',', '.');
                                                                                                                        } ?></td>
                                                        <td class="kanan font-kecil" id="kolomjp<?= $data['id'] ?>"><?= rupiah($data['jp'], 0, ',', '.') ?></td>
                                                        <td class="kanan font-kecil" id="kolompphmonth<?= $data['id'] ?>"><?= rupiah($data['pphmonth'], 0, ',', '.') ?></td>
                                                        <td class="kanan font-kecil" id="kolompphgov<?= $data['id'] ?>"><?= rupiah($data['pphgovmnt'], 0, ',', '.') ?></td>
                                                        <td class="kanan font-kecil" id="kolommeal<?= $data['id'] ?>"><?= rupiah($data['meal'], 0, ',', '.') ?></td>
                                                        <td class="kanan font-kecil" id="kolomtransport<?= $data['id'] ?>"><?= rupiah($data['transport'], 0, ',', '.') ?></td>
                                                        <td class="kanan font-kecil" id="kolomkoperasi<?= $data['id'] ?>"><?= rupiah($data['koperasi'], 0, ',', '.') ?></td>
                                                        <td class="kanan font-kecil font-tebal text-danger" id="kolomthp<?= $data['id'] ?>"><?= rupiah($data['thp'], 0, ',', '.') ?></td>
                                                        <td class="kanan font-kecil" id="kolomloan<?= $data['id'] ?>"><?= rupiah($data['loan'], 0, ',', '.') ?></td>
                                                        <td class="kanan font-kecil" id="kolombpjs<?= $data['id'] ?>"><?= rupiah($data['bpjs'], 0, ',', '.') ?></td>
                                                        <td class="kanan font-kecil font-tebal" id="kolomrealthp<?= $data['id'] ?>"><?= rupiah($data['realthp'], 0, ',', '.') ?></td>
                                                        <td>
                                                            <a class="<?php if ($data['send'] == 1) {
                                                                            echo "hilang";
                                                                        }  ?>" id="tb1gambar<?= $data['id'] ?>" href="<?= base_url() . 'payroll/editview/' . $data['id'] ?>" title="Edit payroll <?= $data['nama'] ?>" data-remote="false" data-toggle="modal" data-title="Edit Payroll" data-target="#modalBox"><img id="gambar<?= $data['id'] ?>" src="<?php if ($data['editke'] >= 1) {
                                                                                                                                                                                                                                                                                                                                                                echo base_url() . 'assets/images/pencil-valid.png';
                                                                                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                                                                                echo base_url() . 'assets/images/pencil.png';
                                                                                                                                                                                                                                                                                                                                                            } ?>"></a>
                                                            <a class="<?php if ($data['send'] == 1) {
                                                                            echo "hilang";
                                                                        }  ?>" id="tb2gambar<?= $data['id'] ?>" data-toggle="modal" data-target="#modalBox-task" href="<?= base_url() . 'payroll/senddata/' . $data['id'] ?>" title="Kirim data" data-title="Kirim data" data-news="Apakah Anda yakin akan mengirim data <strong>'<?= $data['nama'] ?>'</strong> ?" style="cursor: pointer;"><img src="<?= LOK_FOTO . 'paper-plane.png' ?>"></a>
                                                            <a href="<?= base_url() . 'payroll/getview/' . $data['id'] ?>" title="View Detail" data-remote="false" data-toggle="modal" data-title="View Detail" data-target="#modalBox-lg"><img src="<?= base_url() . 'assets/images/file-pdf-icon.png' ?>"></a>
                                                            <a class="<?php if ($data['send'] == 0 || ($data['hg'] == 1 || $data['mh'] == 1)) {
                                                                            echo "hilang";
                                                                        }  ?>" id="tb3gambar<?= $data['id'] ?>" data-toggle="modal" data-target="#modalBox-task" data-title="Batalkan Kirim Data" href="<?= base_url() . 'payroll/unsenddata/' . $data['id'] ?>" title="Batal Kirim Validasi" data-news="Apakah Anda yakin akan menarik data <strong>'<?= $data['nama'] ?>'</strong> ?" style="cursor: pointer;"><img src="<?= LOK_FOTO . 'sync.png' ?>"></a>
                                                            <a class="<?php if (($data['hg'] == 0 || $data['mh'] == 0) || $data['sendmail'] == 1) {
                                                                            echo "hilang";
                                                                        }  ?>" id="tb4gambar<?= $data['id'] ?>" data-toggle="modal" data-target="#modalBox-task" data-title="Kirim email" href="<?= base_url() . 'payroll/kirimemail/' . $data['id'] ?>" title="Kirim email" data-news="Kirim email ke <strong>'<?= $data['nama'] ?>'</strong> ?" style="cursor: pointer;"><img src="<?= LOK_FOTO . 'mail-icon.png' ?>"></a>
                                                            <a class="<?php if ($data['sendmail'] == 0) {
                                                                            echo "hilang";
                                                                        }  ?>" rel="<?= $data['id'] ?>" id="tb5gambar<?= $data['id'] ?>" href="#" style="cursor: pointer;"><img src="<?= LOK_FOTO . 'mail-icon-cek.png' ?>"></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tr style="background-color:rgb( 249, 231, 159 )" class="font-tebal kanan">
                                                <td colspan="5" style="text-align:center">Total</td>
                                                <td><?= rupiah($jmgaji, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmtunjab, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmtunskil, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmgaji + $jmtunskil + $jmtunjab, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmother, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmastek, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmjp, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmpphmonth, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmpphgov, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmmeal, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmtrans, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmkop, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmthp, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmloan, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmbpjs, 0, ',', '.') ?></td>
                                                <td><?= rupiah($jmrealthp, 0, ',', '.') ?></td>
                                                <td>Aksi</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid