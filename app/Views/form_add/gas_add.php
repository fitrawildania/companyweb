<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title><?= isset($gas) ? 'Edit Data' : 'Add Data' ?></title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #224abe;
            color: #fff;
        }
        .card {
            border-radius: 2rem;
            background-color: #fff;
            color: #000;
        }
        .form-control, .form-select {
            border-radius: 0.5rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.5rem;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .alert {
            border-radius: 0.5rem;
        }
        .text-gray-900 {
            color: #343a40;
        }
        .font-weight {
            font-weight: 600;
        }
        .form-check-label {
            margin-left: 0.5rem;
        }
        .text-center a {
            color: #fff;
        }
        .text-center a:hover {
            color: #e2e6ea;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">                
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg">  
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h2 font-weight mb-4"><?= isset($gas) ? 'Edit Data' : 'Add Data' ?> GBMO Gas</h1>
                                    </div>
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="date">Date</label>
                                                        <input type="date" class="form-control" id="date" name="date" value="<?= isset($gas) ? $gas['date'] : date('Y-m-d') ?>" required>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="periode">Periode</label>
                                                        <select name="periode" class="form-select" required>
                                                            <option value="januari" <?= isset($gas) && $gas['periode'] == 'januari' ? 'selected' : '' ?>>Januari</option>
                                                            <option value="februari" <?= isset($gas) && $gas['periode'] == 'februari' ? 'selected' : '' ?>>Februari</option>
                                                            <option value="maret" <?= isset($gas) && $gas['periode'] == 'maret' ? 'selected' : '' ?>>Maret</option>
                                                            <option value="april" <?= isset($gas) && $gas['periode'] == 'april' ? 'selected' : '' ?>>April</option>
                                                            <option value="mei" <?= isset($gas) && $gas['periode'] == 'mei' ? 'selected' : '' ?>>Mei</option>
                                                            <option value="juni" <?= isset($gas) && $gas['periode'] == 'juni' ? 'selected' : '' ?>>Juni</option>
                                                            <option value="juli" <?= isset($gas) && $gas['periode'] == 'juli' ? 'selected' : '' ?>>Juli</option>
                                                            <option value="agustus" <?= isset($gas) && $gas['periode'] == 'agustus' ? 'selected' : '' ?>>Agustus</option>
                                                            <option value="september" <?= isset($gas) && $gas['periode'] == 'september' ? 'selected' : '' ?>>September</option>
                                                            <option value="oktober" <?= isset($gas) && $gas['periode'] == 'oktober' ? 'selected' : '' ?>>Oktober</option>
                                                            <option value="november" <?= isset($gas) && $gas['periode'] == 'november' ? 'selected' : '' ?>>November</option>
                                                            <option value="desember" <?= isset($gas) && $gas['periode'] == 'desember' ? 'selected' : '' ?>>Desember</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <input type="text" class="form-control" placeholder="IP Address" id="ip" name="ip" value="<?= isset($gas) ? $gas['ip'] : '' ?>" required>
                                                    </div>
                                                    <div class="col form-group">
                                                        <input type="text" class="form-control" placeholder="Average" id="average" name="average" value="<?= isset($gas) ? $gas['average'] : '' ?>" required>
                                                    </div>
                                                    <div class="col form-group">
                                                        <input type="text" class="form-control" placeholder="Max" id="max" name="max" value="<?= isset($gas) ? $gas['max'] : '' ?>" required>
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <div class="col form-group">
                                                        <input type="text" class="form-control" placeholder="CPU" id="cpu" name="cpu" value="<?= isset($gas) ? $gas['cpu'] : '' ?>" required>
                                                    </div>
                                                    <div class="col form-group">
                                                        <input type="text" class="form-control" placeholder="RAM" id="ram" name="ram" value="<?= isset($gas) ? $gas['ram'] : '' ?>" required>
                                                    </div>
                                                    <div class="col form-group">
                                                        <input type="text" class="form-control" placeholder="HDD" id="hdd" name="hdd" value="<?= isset($gas) ? $gas['hdd'] : '' ?>" required>
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="tagihan_sistem">Tagihan Sistem</label>
                                                        <input type="text" class="form-control" id="tagihan_sistem" name="tagihan_sistem" value="<?= isset($gas) ? $gas['tagihan_sistem'] : '' ?>" required>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="tagihan_user">Tagihan User</label>
                                                        <input type="text" class="form-control" id="tagihan_user" name="tagihan_user" value="<?= isset($gas) ? $gas['tagihan_user'] : '' ?>" required>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="backup">Backup</label>
                                                        <input type="text" class="form-control" id="backup" name="backup" value="<?= isset($gas) ? $gas['backup'] : '' ?>" required>
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="form-group">
                                                    <label for="file">Upload File</label>
                                                    <input type="file" class="form-control" id="file" name="file" <?= !isset($gas) ? 'required' : '' ?>>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="reset" class="btn btn-primary">Reset</button>
                                            </form>
                                        
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('date').value = document.getElementById('date').value || today;
        });
    </script>
</body>
</html>
