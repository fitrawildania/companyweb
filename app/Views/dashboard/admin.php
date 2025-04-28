<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15"></div>
                <div class="sidebar-brand-text mx-3">My Profile</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">Application</div>
            
            <li class="nav-item">
                <a class="nav-link" href="/users">
                    <i class="fas fa-folder-open"></i>
                    <span>List Users</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="dropdown">
                        <?php if (isset($user['username'])): ?>
                            <span class="mr-2 d-none d-lg-inline small"><?= esc($user['username']) ?></span>
                        <?php endif; ?>

                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline font-weight-bold"><?= session()->get('username') ?></span>
                            <i class="fas fa-regular fa-user"></i>
                        </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="profile/edit"><i class="fas fa-solid fa-user text-gray-500"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="login"><i class="fas fa-sign-out-alt text-gray-500"></i> Logout</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2>Dashboard</h1>
                        <button id="downloadPdf" class="btn btn-primary mb-3">
                            <i class="fas fa-download fa-sm"></i> Download PDF
                        </button>
                    </div>
                    
                    <!-- Cards Row -->
                    <ul class="nav nav-tabs" id="adminDashboardTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pembangkit-tab" data-bs-toggle="tab" data-bs-target="#pembangkit" type="button" role="tab" aria-controls="pembangkit" aria-selected="true">Pembangkit</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="proyek-tab" data-bs-toggle="tab" data-bs-target="#proyek" type="button" role="tab" aria-controls="proyek" aria-selected="false">Proyek</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="transmisi-tab" data-bs-toggle="tab" data-bs-target="#transmisi" type="button" role="tab" aria-controls="transmisi" aria-selected="false">Transmisi</button>
    </li>
</ul>
<div id="card">
<div class="tab-content" id="adminDashboardTabContent">
    <div class="tab-pane fade show active" id="pembangkit" role="tabpanel" aria-labelledby="pembangkit-tab">
    <!-- Cards Row -->
    <!-- Cards Row -->
    <div class="row">

<!-- ASET Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">EAM Aset Properti</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['asetData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="EAM Aset Properti" data-type="CPU" class="usage font-weight-bold"><?= $data['asetAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="EAM Aset Properti" data-type="RAM" class="usage font-weight-bold"><?= $data['asetAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="EAM Aset Properti" data-type="HDD" class="usage font-weight-bold"><?= $data['asetAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['asetAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['asetAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['asetTotal']->total ?? 0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- SIIPP Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">SIIPP</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['siippData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="SIIPP" data-type="CPU" class="usage font-weight-bold"><?= $data['siippAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="SIIPP" data-type="RAM" class="usage font-weight-bold"><?= $data['siippAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="SIIPP" data-type="HDD" class="usage font-weight-bold"><?= $data['siippAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['siippAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['siippAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['siippTotal']->total ?? 0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- GBMO Gas Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">GBMO GAS</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['gasData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="GBMO GAS" data-type="CPU" class="usage font-weight-bold"><?= $data['gasAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="GBMO GAS" data-type="RAM" class="usage font-weight-bold"><?= $data['gasAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="GBMO GAS" data-type="HDD" class="usage font-weight-bold"><?= $data['gasAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['gasAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['gasAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['gasTotal']->total ?? 0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- GBMO BBM Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">GBMO BBM</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['bbmData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="GBMO BBM" data-type="CPU" class="usage font-weight-bold"><?= $data['bbmAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="GBMO BBM" data-type="RAM" class="usage font-weight-bold"><?= $data['bbmAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="GBMO BBM" data-type="HDD" class="usage font-weight-bold"><?= $data['bbmAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['bbmAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['bbmAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['bbmTotal']->total ?? 0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- BBO Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">BBO</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['bboData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="BBO" data-type="CPU" class="usage font-weight-bold"><?= $data['bboAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="BBO" data-type="RAM" class="usage font-weight-bold"><?= $data['bboAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="BBO" data-type="HDD" class="usage font-weight-bold"><?= $data['bboAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['bboAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['bboAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                            Rp. <?= number_format($data['bboTotal']->total ?? 0, 0, ',', '.') ?>
                        </h5>

                                    
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- MAXIMO Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">EAM-KIT</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['maximoData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="EAM-KIT" data-type="CPU" class="usage font-weight-bold"><?= $data['maximoAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="EAM-KIT" data-type="RAM" class="usage font-weight-bold"><?= $data['maximoAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="EAM-KIT" data-type="HDD" class="usage font-weight-bold"><?= $data['maximoAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['maximoAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['maximoAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['maximoTotal']->total ?? 0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- MAPP Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">MAPP POWER</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['mappData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="MAPP POWER" data-type="CPU" class="usage font-weight-bold"><?= $data['mappAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="MAPP POWER" data-type="RAM" class="usage font-weight-bold"><?= $data['mappAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="MAPP POWER" data-type="HDD" class="usage font-weight-bold"><?= $data['mappAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['mappAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['mappAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['mappTotal']->total ?? 0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>
</div> 
    </div>
    <div class="tab-pane fade" id="proyek" role="tabpanel" aria-labelledby="proyek-tab">
    <!-- Cards Row -->
    <div class="row">

<!-- EIC Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">EIC</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['eicData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="EIC" data-type="CPU" class="usage font-weight-bold"><?= $data['eicAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="EIC" data-type="RAM" class="usage font-weight-bold"><?= $data['eicAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="EIC" data-type="HDD" class="usage font-weight-bold"><?= $data['eicAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['eicAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['eicAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['eicTotal']->total??0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- EC Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">EC</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['ecData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="EC" data-type="CPU" class="usage font-weight-bold"><?= $data['ecAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="EC" data-type="RAM" class="usage font-weight-bold"><?= $data['ecAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="EC" data-type="HDD" class="usage font-weight-bold"><?= $data['ecAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['ecAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['ecAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['ecTotal']->total??0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- EIQC Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">EIQC</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['eiqcData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="EIQC" data-type="CPU" class="usage font-weight-bold"><?= $data['eiqcAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="EIQC" data-type="RAM" class="usage font-weight-bold"><?= $data['eiqcAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="EIQC" data-type="HDD" class="usage font-weight-bold"><?= $data['eiqcAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['eiqcAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['eiqcAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['eiqcTotal']->total??0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- Mercusuar Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">Mercusuar</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['mercusuarData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="Mercusuar" data-type="CPU" class="usage font-weight-bold"><?= $data['mercusuarAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="Mercusuar" data-type="RAM" class="usage font-weight-bold"><?= $data['mercusuarAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="Mercusuar" data-type="HDD" class="usage font-weight-bold"><?= $data['mercusuarAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['mercusuarAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['mercusuarAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['mercusuarTotal']->total??0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- PMO Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">PMO</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['pmoData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="PMO" data-type="CPU" class="usage font-weight-bold"><?= $data['pmoAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="PMO" data-type="RAM" class="usage font-weight-bold"><?= $data['pmoAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="PMO" data-type="HDD" class="usage font-weight-bold"><?= $data['pmoAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['pmoAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['pmoAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['pmoTotal']->total??0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- SIDITA Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">SIDITA</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['siditaData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="SIDITA" data-type="CPU" class="usage font-weight-bold"><?= $data['siditaAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="SIDITA" data-type="RAM" class="usage font-weight-bold"><?= $data['siditaAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="SIDITA" data-type="HDD" class="usage font-weight-bold"><?= $data['siditaAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['siditaAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['siditaAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['siditaTotal']->total??0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- PLN CERDAS Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">PLN CERDAS</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['plncerdasData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="PLN CERDAS" data-type="CPU" class="usage font-weight-bold"><?= $data['plncerdasAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="PLN CERDAS" data-type="RAM" class="usage font-weight-bold"><?= $data['plncerdasAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="PLN CERDAS" data-type="HDD" class="usage font-weight-bold"><?= $data['plncerdasAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['plncerdasAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['plncerdasAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['plncerdasTotal']->total??0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- ETKDN Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">ETKDN</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['etkdnData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="ETKDN" data-type="CPU" class="usage font-weight-bold"><?= $data['etkdnAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="ETKDN" data-type="RAM" class="usage font-weight-bold"><?= $data['etkdnAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="ETKDN" data-type="HDD" class="usage font-weight-bold"><?= $data['etkdnAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['etkdnAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['etkdnAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['etkdnTotal']->total??0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- LISDES Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <p class="h5 font-weight-bold text-primary text-uppercase mb-3">LISDES</p>
                    <p class="h6 font-weight-bold text-gray-700">LPP</p>
                        <h6 class="font-weight-bold"><?= $data['lisdesData'] ?> Laporan</h6>
                    <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">CPU</p>
                                <h6 data-app="LISDES" data-type="CPU" class="usage font-weight-bold"><?= $data['lisdesAvgUsage']->avg_cpu ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">RAM</p>
                                <h6 data-app="LISDES" data-type="RAM" class="usage font-weight-bold"><?= $data['lisdesAvgUsage']->avg_ram ?> %</h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">HDD</p>
                                <h6 data-app="LISDES" data-type="HDD" class="usage font-weight-bold"><?= $data['lisdesAvgUsage']->avg_hdd ?> %</h6>
                            </div>
                        </div>
                        <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['lisdesAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                            </div>
                            <div class="col">
                                <p class="mb-1 text-gray-700">Tagihan User</p>
                                <h6 class="font-weight-bold">
                                    Rp. <?= number_format($data['lisdesAvgUsage']->avg_user, 0, ',','.') ?></h6>
                            </div>
                        </div><br>
                        <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                        <h5 class="font-weight-bold text-primary">
                                    Rp. <?= number_format($data['lisdesTotal']->total??0, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
</div>
</div> 
    </div>
    <div class="tab-pane fade" id="transmisi" role="tabpanel" aria-labelledby="transmisi-tab">
    <!-- Cards Row -->
    <div class="row">
                    <!-- Eam Transmisi Card -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <p class="h5 font-weight-bold text-primary text-uppercase mb-3">EAM Transmisi</p>
                                        <p class="h6 font-weight-bold text-gray-700">LPP</p>
                                            <h6 class="font-weight-bold"><?= $data['eamtData'] ?> Laporan</h6>
                                        <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">CPU</p>
                                                    <h6 data-app="EAM Transmisi" data-type="CPU" class="usage font-weight-bold"><?= $data['eamtAvgUsage']->avg_cpu ?> %</h6>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">RAM</p>
                                                    <h6 data-app="EAM Transmisi" data-type="RAM" class="usage font-weight-bold"><?= $data['eamtAvgUsage']->avg_ram ?> %</h6>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">HDD</p>
                                                    <h6 data-app="EAM Transmisi" data-type="HDD" class="usage font-weight-bold"><?= $data['eamtAvgUsage']->avg_hdd ?> %</h6>
                                                </div>
                                            </div>
                                            <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                                    <h6 class="font-weight-bold">
                                                        Rp. <?= number_format($data['eamtAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">Tagihan User</p>
                                                    <h6 class="font-weight-bold">
                                                        Rp. <?= number_format($data['eamtAvgUsage']->avg_user, 0, ',','.') ?></h6>
                                                </div>
                                            </div><br>
                                            <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                                            <h5 class="font-weight-bold text-primary">
                                                        Rp. <?= number_format($data['eamtTotal']->total??0, 0, ',', '.') ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <!-- PI Card -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <p class="h5 font-weight-bold text-primary text-uppercase mb-3">Power Inspect</p>
                                        <p class="h6 font-weight-bold text-gray-700">LPP</p>
                                            <h6 class="font-weight-bold"><?= $data['piData'] ?> Laporan</h6>
                                        <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">CPU</p>
                                                    <h6 data-app="Power Inspect" data-type="CPU" class="usage font-weight-bold"><?= $data['piAvgUsage']->avg_cpu ?> %</h6>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">RAM</p>
                                                    <h6 data-app="Power Inspect" data-type="RAM" class="usage font-weight-bold"><?= $data['piAvgUsage']->avg_ram ?> %</h6>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">HDD</p>
                                                    <h6 data-app="Power Inspect" data-type="HDD" class="usage font-weight-bold"><?= $data['piAvgUsage']->avg_hdd ?> %</h6>
                                                </div>
                                            </div>
                                            <br>
                                            <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                                    <h6 class="font-weight-bold">
                                                        Rp. <?= number_format($data['piAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">Tagihan User</p>
                                                    <h6 class="font-weight-bold">
                                                        Rp. <?= number_format($data['piAvgUsage']->avg_user, 0, ',','.') ?></h6>
                                                </div>
                                            </div><br>
                                            <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                                            <h5 class="font-weight-bold text-primary">
                                                        Rp. <?= number_format($data['piTotal']->total??0, 0, ',', '.') ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <!-- Neon Card -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <p class="h5 font-weight-bold text-primary text-uppercase mb-3">Neon</p>
                                        <p class="h6 font-weight-bold text-gray-700">LPP</p>
                                            <h6 class="font-weight-bold"><?= $data['neonData'] ?> Laporan</h6>
                                        <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">CPU</p>
                                                    <h6 data-app="Neon" data-type="CPU" class="usage font-weight-bold"><?= $data['neonAvgUsage']->avg_cpu ?> %</h6>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">RAM</p>
                                                    <h6 data-app="Neon" data-type="RAM" class="usage font-weight-bold"><?= $data['neonAvgUsage']->avg_ram ?> %</h6>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">HDD</p>
                                                    <h6 data-app="Neon" data-type="HDD" class="usage font-weight-bold"><?= $data['neonAvgUsage']->avg_hdd ?> %</h6>
                                                </div>
                                            </div>
                                            <br>
                                            <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                                    <h6 class="font-weight-bold">
                                                        Rp. <?= number_format($data['neonAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">Tagihan User</p>
                                                    <h6 class="font-weight-bold">
                                                        Rp. <?= number_format($data['neonAvgUsage']->avg_user, 0, ',','.') ?></h6>
                                                </div>
                                            </div><br>
                                            <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                                            <h5 class="font-weight-bold text-primary">
                                                        Rp. <?= number_format($data['neonTotal']->total ?? 0, 0, ',', '.') ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <!-- MM-NE Card -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <p class="h5 font-weight-bold text-primary text-uppercase mb-3">MM-NE</p>
                                        <p class="h6 font-weight-bold text-gray-700">LPP</p>
                                            <h6 class="font-weight-bold"><?= $data['mmData'] ?> Laporan</h6>
                                        <p class="h6 font-weight-bold text-gray-700">Storage Average</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">CPU</p>
                                                    <h6 data-app="MM-NE" data-type="CPU" class="usage font-weight-bold"><?= $data['mmAvgUsage']->avg_cpu ?> %</h6>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">RAM</p>
                                                    <h6 data-app="MM-NE" data-type="RAM" class="usage font-weight-bold"><?= $data['mmAvgUsage']->avg_ram ?> %</h6>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">HDD</p>
                                                    <h6 data-app="MM-NE" data-type="HDD" class="usage font-weight-bold"><?= $data['mmAvgUsage']->avg_hdd ?> %</h6>
                                                </div>
                                            </div>
                                            <br>
                                            <p class="h6 font-weight-bold text-gray-700">Tagihan</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">Tagihan Sistem</p>
                                                    <h6 class="font-weight-bold">
                                                        Rp. <?= number_format($data['mmAvgUsage']->avg_sistem, 0, ',', '.') ?></h6>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-1 text-gray-700">Tagihan User</p>
                                                    <h6 class="font-weight-bold">
                                                        Rp. <?= number_format($data['mmAvgUsage']->avg_user, 0, ',','.') ?></h6>
                                                </div>
                                            </div><br>
                                            <p class="mb-1 text-gray-700 font-weight-bold">Total</p>
                                            <h5 class="font-weight-bold text-primary">
                                                        Rp. <?= number_format($data['mmTotal']->total??0, 0, ',', '.') ?></h5></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
</div>

                    <!-- /.container-fluid -->
            <!-- End of Main Content -->
</div>
</div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PLN Divisi STI 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <script>function checkUsage() {
    const usageElements = document.querySelectorAll('.usage');

    usageElements.forEach((element) => {
        const value = parseFloat(element.textContent);

        // Tambahkan kelas 'high-usage' jika nilai penggunaan lebih dari 90%
        if (value > 90) {
            element.classList.add('high-usage');
        }
    });
}

window.onload = checkUsage;
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
   document.getElementById('downloadPdf').addEventListener('click', function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('landscape', 'px', 'a4');

    const cardElement = document.getElementById('card');

    html2canvas(cardElement).then(function (cardCanvas) {
        const cardImgData = cardCanvas.toDataURL('image/png');

        const pdfWidth = doc.internal.pageSize.getWidth();
        const pdfHeight = doc.internal.pageSize.getHeight();

        const imgWidth = pdfWidth - 20; 
        const imgHeight = (cardCanvas.height * imgWidth) / cardCanvas.width;

        const pageHeight = Math.min(imgHeight, pdfHeight - 20);

        doc.addImage(cardImgData, 'PNG', 10, 10, imgWidth, pageHeight);

        doc.save('report.pdf');
    });
});


</script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>