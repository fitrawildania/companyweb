<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=$title;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.3/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        <h6 class="collapse-header">Proyek:</h6>
                        <a class="collapse-item" href="eic">EIC</a>
                        <a class="collapse-item" href="ec">EC</a>
                        <a class="collapse-item" href="eiqc">EIQC</a>
                        <a class="collapse-item" href="mercusuar">MERCUSUAR</a>
                        <a class="collapse-item" href="pmo">PMO</a>
                        <a class="collapse-item" href="sidita">SIDITA</a>
                        <a class="collapse-item" href="plncerdas">PLN CERDAS</a>
                        <a class="collapse-item" href="etkdn">ETKDN</a>
                        <a class="collapse-item" href="lisdes">LISDES</a>
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

                <?= $this->renderSection('content');?>
            </div>

            <!-- End of Footer -->
        </div>
    </div>
</div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.datatables.net/v/dt/dt-2.1.3/datatables.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
</body>
</html>
