<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="http://localhost/phpArashy/Review_php"> < Kembali</a>
    <!-- Prosessor PHP -->
    <?php
    if(isset($_POST["gajiKotor"])) {
        // Deklarasi Variabel
        $gajiKotor = $_POST["gajiKotor"];
        $gajiKotorTahunan = $gajiKotor*12;
        $tanggungan = $_POST["tanggungan"];
        $statusKawin = $_POST["statusKawin"];
        
        if($statusKawin == "true"){
            switch ($tanggungan) {
            case "3":
                $PTKP = 72000000;
                break;
            case "2":
                $PTKP = 67500000;
                break;
            case "1":
                $PTKP = 63000000;
                break;
            default:
                $PTKP = 58500000;
        }}
        else {
            switch ($tanggungan) {
                case "3":
                    $PTKP = 67500000;
                    break;
                case "2":
                    $PTKP = 63000000;
                    break;
                case "1":
                    $PTKP = 58500000;
                    break;
                default:
                    $PTKP = 54000000;
            }
        }
        
        $PKP = $gajiKotorTahunan - $PTKP;
        if($PKP < 0){
            $PKP = 0;
        }

    }
    ?>

    <div class="container row mx-auto">
    <h1 class="text-center fw-bold">Kalkulator Gaji</h1>
    <p class="text-center">Kalkulator Gaji membantu kamu menghitung gaji bersih bulanan dengan lebih mudah</p>
        <!-- Kiri -->
        <div class="col-12 col-md-6 mb-3 mb-md-0">
            <form action="" method="POST" id="form">
                
                <!-- gaji kotor -->
                <label for="gajiKotor" class="form-label">Gaji Kotor Bulanan</label>
                <input type="number" class="form-control" name="gajiKotor" id="gajiKotor" placeholder="Rp." required>
                
                <!-- status kawin -->
                <label for="statusKawin" class="form-label">Status Perkawinan</label>
                <select name="statusKawin" id="statusKawin" class="form-select">
                    <option value="false">Tidak Kawin</option>
                    <option value="true">Kawin</option>
                </select>

                <!-- jumlah tanggungan -->
                <label for="tanggungan">Jumlah Tanggungan</label>
                <select name="tanggungan" id="tanggungan" class="form-select">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>

                <!-- Submit -->
                <button type="submit" class="btn btn-primary mt-3">Hitung</button>
            </form>
        </div>
        <!-- Kanan -->
        <?php 
        if(isset($_POST["gajiKotor"]))
            {echo '<div class="col-12 col-md-6">
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="alert"></button>
            <p>Gaji Bulanan: '.number_format($gajiKotor).'</p>
            <p>Gaji di Setahunkan: '.number_format($gajiKotorTahunan).'</p>
            <p>Penghasilan Tidak Kena Pajak (PTKP): '.number_format($PTKP).'</p>
            <p>Penghasilan Kena Pajak (PKP): '.$PKP.'</p>
            <hr>
            <p>Pajak Penghasilan Tahunan (PPh 21): 3,000,000</p>
            <p>Pajak Penghasilan Bulanan: $pajak</p>
            <p>BPJS Kesehatan:</p>
            <p>BPJS Ketenagakerjaan:</p>
            <hr>
            <p>Gaji bersih bulanan (Take Home Pay)</p>
            <h1>$gajiBersih</h1>
            </div>
            </div>';}
        ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>