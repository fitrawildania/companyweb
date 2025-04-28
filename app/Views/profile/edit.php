<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .profile-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            text-align: left;
            margin-bottom: 30px;
        }
        .profile-header img {
            border-radius: 20%;
            width: 200px;
            height: 200px;
            object-fit: cover;
        }
        .profile-header h2 {
            margin-top: 20px;
            font-size: 28px;
        }
        .btn-primary {
            width: 100%;
            border-radius: 30px;
            padding: 10px;
        }
        .custom-file-label {
            overflow: hidden;
        }
        .arrow{
            color: black;
            font-size: 30px;
        }
        .btn-edit {
            margin-top: 20px;
            border-radius: 20px;
            padding: 10px 20px;
            background-color: blue;
            color: white;
            font-weight: 500px;
            border: none;
            font-size: 14px;
        }
        .btn-edit:hover {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="profile-container">
            <a href="/dashboard" class="arrow"><i class="fas fa-angle-left"></i></a>
                <!-- Flash Messages -->
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col">
                        <!-- Profile Header -->
                        <div class="profile-header">
                            <?php if ($user['foto']) : ?>
                                <img src="<?= base_url('uploads/' . esc($user['foto'])) ?>" alt="Profile Photo">
                            <?php else : ?>
                                <img src="<?= base_url('uploads/default.jpeg') ?>" alt="Default Photo">
                            <?php endif; ?>
                            <h2><?= esc($user['nama']) ?></h2>
                        </div>
                    </div>
                    
                    <div class="col">
                                <!-- Profile Edit Form -->
                        <form action="<?= base_url('/profile/update') ?>" method="post" enctype="multipart/form-data">
                            <!-- Name Input -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Name</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($user['nama']) ?>" required>
                            </div>

                            <!-- Username Input -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['username']) ?>" required>
                            </div>

                            <!-- Password Input -->
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password (Optional)</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                            </div>

                            <!-- Confirm Password Input -->
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm new password">
                            </div>

                            <!-- Profile Picture Upload -->
                            <div class="mb-3">
                                <label for="foto" class="form-label">Profile Picture</label>
                                <input class="form-control" type="file" id="foto" name="foto">
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-edit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // File input label change on select
    document.querySelector('.form-control[type="file"]').addEventListener('change', function (e) {
        var fileName = e.target.files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
</body>
</html>
