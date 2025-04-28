<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Transmisi Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<body id="page-top">
    <!-- Page Wrapper -->
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

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Personal Info:</h6>
                        <a class="collapse-item" href="profile/show">My Profile</a>
                        <a class="collapse-item" href="profile/edit">Edit Profile</a>
                    </div>
                </div>
            </li>
    
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-folder"></i>
                    <span>Applications</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Transmisi:</h6>
                        <a class="collapse-item" href="eamt">EAM Transmisi</a>
                        <a class="collapse-item" href="pi">Power Inspect</a>
                        <a class="collapse-item" href="neon">Neon</a>
                        <a class="collapse-item" href="mm">MM-NE</a>
                    </div>
                </div>
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
    <?php if (session()->has('nama')): ?>
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline font-weight-bold"><?= esc(session()->get('nama')) ?></span>
            <?php
            // Menentukan foto pengguna, jika tidak ada foto, gunakan default.jpeg
            $foto = session()->get('foto') ? session()->get('foto') : 'default.jpeg';
            ?>
            <img src="<?= base_url('uploads/' . esc($foto)) ?>" alt="<?= esc(session()->get('nama')) ?>'s Foto" style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
        </a>

        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="logout"><i class="fas fa-sign-out-alt text-gray-500"></i> Logout</a></li>
        </ul>
    <?php else: ?>
        <a class="nav-link" href="login">Login</a>
    <?php endif; ?>
</li>

</ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2>Transmisi Dashboard</h2>
                        <a href="<?php echo site_url('generate_pdf') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm"></i> Generate Report
                        </a>
                    </div>

                    <h5 class="mb-4">Application</h5>
                    <div id="alert-container"></div>
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
                                                        Rp. <?= number_format($data['neonTotal']->total??0, 0, ',', '.') ?></h5>
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
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

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
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script>
    function checkUsage() {
        const usageElements = document.querySelectorAll('.usage');
        const alertContainer = document.getElementById('alert-container');
        alertContainer.innerHTML = '';

        usageElements.forEach((element) => {
            const usageType = element.getAttribute('data-type');
            const appName = element.getAttribute('data-app');
            const value = parseFloat(element.textContent);

            if (value > 90) {
                element.classList.add('high-usage');

                const alertHTML = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert"> <i class="fas fa-exclamation-triangle"></i>
                        <strong>Warning!</strong> ${appName} ${usageType.toUpperCase()} usage is above 90%. Consider adding more storage.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `;

                alertContainer.innerHTML += alertHTML;
            }
        });
    }

    window.onload = checkUsage;
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