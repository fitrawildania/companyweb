<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
        .profile-content {
            display: flex;
            align-items: center;
        }
        .profile-content img {
            border-radius: 20%;
            width: 200px;
            height: 200px;
            object-fit: cover;
            margin-right: 30px; /* Beri jarak antara gambar dan info profil */
        }
        .profile-info h4 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .profile-info p {
            font-size: 16px;
            margin-bottom: 5px;
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
        .arrow-back {
            display: flex;
            align-items: center;
            font-size: 30px;
            color: black;
            text-decoration: none;
            margin-bottom: 20px;
        }
        .arrow-back i {
            margin-right: 10px;
        }
        .arrow-back:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="profile-container">
                <div class="profile-content">
                    <!-- Profile Picture -->
                    <?php if ($user['foto']) : ?>
                        <img src="<?= base_url('uploads/' . esc($user['foto'])) ?>" alt="Profile Photo">
                    <?php else : ?>
                        <img src="<?= base_url('uploads/default.jpeg') ?>" alt="Default Photo">
                    <?php endif; ?>

                    <!-- Profile Information -->
                    <div class="profile-info">
                        <h4><strong><?= esc($user['nama']) ?></strong></h4>
                        <p><strong>Username :</strong> <?= esc($user['username']) ?></p>
                        <p><strong>Role :</strong> <?= esc($user['role']) ?></p>
                        <a href="<?= base_url('/dashboard') ?>"class="btn btn-edit">Kembali</a>
                        <a href="<?= base_url('/profile/edit') ?>" class="btn btn-edit">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
