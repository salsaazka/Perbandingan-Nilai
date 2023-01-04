<?php
$alert = false;
$emot = "";

if (isset($_POST['Simpan'])) {
    if (!empty($_POST['nama']) && !empty($_POST['np'])) {
        $alert = false;
        $nilai = $_POST['np'];
        $nama = $_POST['nama'];
        if ($_POST['np'] <= 100) {
            if ($nilai >= 75) {
                $emot = "K";
                $text = "Kompeten";
            } else {
                $emot = "B";
                $text = "Belum Kompeten";
            }
        } else {
            $alert = true;
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perbandingan Nilai</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background-color: #FFF9CA;
        }

        .hasil {
            width: 50%;
            background-color: #FF8585;
            border-radius: 15px 0 0 15px; 
        }
        .form {
            width: 50%;
            background-color: #EF9F9F;
            border-radius: 0 15px 15px 0;
        }

        .main {
            margin-top: 6rem;
        }

        @media screen and (max-width:767px) {
            .main {
             flex-direction:column;
               }
            .hasil {
            width: 100%;
            background-color: #FF8585;
            border-radius: 15px 15px 0 0;
            }
           .form {
            width: 100%;
            background-color: #EF9F9F;
            border-radius: 0 0 15px 15px;
           }
        }

        .content {
            width: 85%;
            min-height: 400px;
            background-color: #FCD2D2;
            border-radius: 15px;
        }

        .form-label {
            color: #FF8585;
            font-weight: bold;
        }

        input {
            border-radius: 8px !important;
        }

        .button {
            background-color: #FF8585;
            border-radius: 8px !important;
            border: none;
            color: white;
        }

        .text {
            color: #FF8585;
            font-weight: bold;
            margin: 0;
        }

        .nilai {
            color: #fff;
            font-weight: bold;
            margin: 0;
        }
        .alert-danger{
            background: white !important;
        }
    </style>

</head>

<body>

    <div class="container pad">
        <div class="d-flex main">
            <div class="hasil py-5">
                <center>
                    <div class="content p-4">
                        <h2 class="text-white fw-bold mb-4">
                            Cek Keterangan <br> Nilai
                        </h2>
                        <?php
                        if ($emot == "K") {
                        ?>
                        <img src='./100.png'>
                        <?php
                        } elseif($emot == "B") {
                        ?>
                          <img src='./70.png'>
                        <?php
                        }else{
                        ?>
                           <img src='./80.png'>
                        <?php
                        }
                        ?>
                         <h3>
                                <?php
                                if ($emot == "") {
                                    echo "<h4 class='text'>Anda belum memasukkan nilai</h4>";
                                } else {
                                    echo "<h3 class='text'>$text</h3>";
                                }
                                ?>
                                <?php
                                if ($emot == "K" || $emot == "B") {
                                ?>
                                    <h3 class='text'><?= $nilai ?></h3>
                                <?php
                                }
                                ?>
                         </h3>
                    </div>
                </center>
            </div>
            <div class="form py-5">
                <center>
                    <div class="content p-4">
                        <?php
                        if ($alert == true) {
                        ?>
                            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle text-danger " style="margin-right: 10px;"></i>
                                <div>
                                    Input Tidak Boleh Lebih dari 100
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>    
                         <?php
                         }
                         ?>
                        <form action="" method="post">
                        <h2 class="text-white fw-bold mb-5">
                            Input Nilai
                        </h2>
                        <div class=" mb-1">
                            <label for="" class="form-label"><b>Nama Siswa</b></label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Silahkan masukkan nama *" required="required" data-error="Firstname is required.">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label" ><b>Nilai</b></label>
                            <input type="number" name="np" class="form-control" id="np" placeholder="Silahkan masukkan nilai *" required="required" data-error="Firstname is required.">
                        </div>
                        <button type="submit" name="Simpan" class="btn btn-danger">Cek Hasil</button>
                    </form>
                    </div>
                </center>
            </div>
        </div>
    </div>
</body>
</html>

