<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jualan</title>
    <link rel="shortcut icon" href="<?= base_url() . 'assets/images/favicon.png' ?>">
    <!-- Custom fonts for this template-->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="<?= base_url() . 'assets/plugins/fontawesome-free/css/all.min.css' ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/plugins/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/plugins/toast/jquery.toast.min.css' ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/plugins/datatables/datatables.min.css' ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/plugins/datatables/fixHeader.min.css' ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,600" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url() . 'assets/css/sb-admin-2.css' ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/css/style.css' ?>" rel="stylesheet">

    <link href="<?= base_url() . 'assets/plugins/datepicker/dist/css/bootstrap-datepicker.css' ?>" rel="stylesheet">

</head>

<body id="page-top">
    <div class="modal fade" id="modalBox" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class='modal-dialog modal-xl'>
            <div class='modal-content'>
                <div class='modal-header bg-info'>
                    <!-- <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button> -->
                    <h4 class='modal-title text-white' id='myModalLabel'> Pengaturan Pengguna</h4>
                </div>
                <div class="fetched-data"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalBox-lg" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <div class='modal-header bg-info'>
                    <!-- <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button> -->
                    <h4 class='modal-title2 text-white' id='myModalLabel2'> Pengaturan Pengguna</h4>
                </div>
                <div class="fetched-data"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalBox-task" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header bg-info'>
                    <!-- <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button> -->
                    <h4 class='modal-title3 text-white' id='myModalLabel3'> Pengaturan Pengguna</h4>
                </div>
                <div class="fetched-data"></div>
            </div>
        </div>
    </div>
    <div class='modal fade' id='confirm-delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header btn-info'>
                    <!-- <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button> -->
                    <h4 class='modal-title' id='myModalLabel'><i class='fa fa-exclamation-triangle text-danger'></i> Konfirmasi</h4>
                </div>
                <div class='modal-body' id="test">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class='modal-footer'>
                    <a href="#" class="btn-ok btn btn-danger btn-icon-split btn-sm flat font-kecil" id="ok-delete">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash-alt"></i>
                        </span>
                        <span class="text">Hapus</span>
                    </a>
                    <a href="#" class="btn btn-warning btn-icon-split btn-sm flat font-kecil" data-dismiss="modal">
                        <span class="icon text-white-50">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span class="text">Batal</span>
                    </a>
                    <!-- <button type="button" class="btn btn-social btn-flat btn-warning btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button> -->
                </div>
            </div>
        </div>
    </div>
    <div class='modal fade' id='confirm-task' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header btn-info'>
                    <!-- <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button> -->
                    <h4 class='modal-title' id='myModalLabel'><i class='fa fa-exclamation-triangle text-info'></i> Konfirmasi</h4>
                </div>
                <div class='modal-body' id="test2">
                    Apakah Anda yakin ingin menghapus data ini kah?
                </div>
                <div class='modal-footer'>
                    <a href="#" class="btn-oke btn btn-danger btn-icon-split btn-sm flat font-kecil" id="ok-delete">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash-alt"></i>
                        </span>
                        <span class="text">Ya</span>
                    </a>
                    <a href="#" class="btn btn-warning btn-icon-split btn-sm flat font-kecil" data-dismiss="modal">
                        <span class="icon text-white-50">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span class="text">Tidak</span>
                    </a>
                    <!-- <button type="button" class="btn btn-social btn-flat btn-warning btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar accordion sisinya toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
                <!--                 <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> -->
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url() . 'assets/images/logodjualanutama.png' ?>">
                    <div class="sidebar-brand-text mx-1">Payroll</div>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php
            $tif1 = "";
            $tif2 = "";
            $tif3 = "";
            $tif4 = "";
            $tif5 = "";
            $tif6 = "";
            switch ($submodul) {
                case 1:
                    $tif1 = "active";
                    break;
                case 2:
                    $tif2 = "active";
                    break;
                case 3:
                    $tif3 = "active";
                    break;
                case 4:
                    $tif4 = "active";
                    break;
                case 5:
                    $tif5 = "active";
                    break;
                case 6:
                    $tif6 = "active";
                    break;
                default:
                    $tif1 = "active";
                    break;
            }
            ?>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $tif1 ?>">
                <a class="nav-link" href="<?= base_url() ?>">
                    <i class="fas fa-fw fa-city"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading text-coklat">
                Master
            </div>
            <li class="nav-item <?= $tif2 ?>">
                <a class="nav-link collapsedk" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-fw fa-bars"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-warning py-2 collapse-inner flat" style="border-radius: 0px;">
                        <h6 class="collapse-header text-dark">Pilih Modul</h6>
                        <a class="collapse-item font-kecil-12" href="<?= base_url() . 'kategori' ?>">Kategori</a>
                        <a class="collapse-item font-kecil-12" href="<?= base_url() . 'satuan' ?>">Satuan</a>
                        <a class="collapse-item font-kecil-12" href="<?= base_url() . 'barang' ?>">Barang</a>
                        <a class="collapse-item font-kecil-12" href="<?= base_url() . 'ptkp' ?>">Bill Of Material</a>
                        <a class="collapse-item font-kecil-12" href="<?= base_url() . 'supplier' ?>">Supplier</a>
                        <a class="collapse-item font-kecil-12" href="<?= base_url() . 'customer' ?>">Customer</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading text-coklat">
                Penerimaan
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item <?= $tif3 ?>">
                <a class="nav-link collapsed" href="#">
                    <i class="fas fa-fw fa-chevron-left"></i>
                    <span>Pembelian</span>
                </a>
            </li>
            <!-- <li class="nav-item <?= $tif3 ?>">
                <a class="nav-link collapsed" href="#">
                    <i class="fas fa-fw fa-angle-double-left"></i>
                    <span>Ret.Pembelian</span>
                </a>
            </li> -->

            <hr class="sidebar-divider">
            <div class="sidebar-heading text-coklat">
                Pengeluaran
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item <?= $tif3 ?>">
                <a class="nav-link collapsed" href="#">
                    <i class="fas fa-fw fa-chevron-right"></i>
                    <span>Penjualan</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading text-coklat">
                Stock
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item <?= $tif4 ?>">
                <a class="nav-link collapsed" href="#">
                    <i class="fas fa-fw fa-chain-broken"></i>
                    <span>Inventory</span>
                </a>
            </li>
            <!-- <li class="nav-item <?= $tif4 ?>">
                <a class="nav-link collapsed" href="#">
                    <i class="fas fa-fw fa-angle-double-right"></i>
                    <span>Ret.Penjualan</span>
                </a>
            </li> -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading text-coklat">
                Report
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item <?= $tif5 ?>">
                <a class="nav-link" href="<?= base_url() . 'payroll/clear' ?>">
                    <i class="fas fa-fw fa-file-text"></i>
                    <span>Report</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading text-coklat">
                System
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Log Out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-1 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-0 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small form-control-sm" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->
                    <!-- <div class="text-danger hilang" id="spinnya">
                        <i class="fas fa-circle-notch fa-lg fa-spin"></i> Loading, Silahkan tunggu
                    </div> -->


                    <ul class="navbar-nav ml-auto">


                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li> -->

                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src=""
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li> -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-900 small">wow</span>
                                <img class="img-profile rounded-circle" src="<?= base_url() . 'assets/images/undraw_profile.svg' ?>">
                                <!-- base_url().'assets/images/undraw_profile.svg' -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->