<?php 

$servername = "localhost" ;
$username = "root" ;
$password = "";
$database = "datapekerja" ;

$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$nama_pekerja =  "";
$no_kp = "";
$no_hp = "";
$jantina = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $nama_pekerja = $_POST["nama_pekerja"];
    $no_kp = $_POST["no_kp"];
    $no_hp = $_POST["no_hp"];
    $jantina = $_POST["jantina"];

    do {
        if (empty($id) || empty($nama_pekerja) || empty($no_kp) || empty($no_hp) || empty($jantina) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "INSERT INTO pekerja (id, nama_pekerja, no_kp, no_hp, jantina) " .
               "VALUES ('$id','$nama_pekerja','$no_kp', '$no_hp', '$jantina') ";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: ". $connection->error;
            break;
        }

        $id = "";
        $nama_pekerja = "";
        $no_kp = "";
        $no_hp = "";
        $jantina = "";

        $successMessage = "Pekerja berjaya ditambah";

        header("location:/anisholding/index.php");
        exit;

    } while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anis Holding</title>

    <style>
        input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
    }
    
    button{
  width: 50%;
  background-color: red;
  color: white;
  padding: 15px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}

    </style>
</head>
<body>
    <div class="container my-5">
        <h1>Tambah Pekerja</h1>

        <?php
        if (!empty($errorMessage) ) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>  
                 <strong>$errorMessage</strong>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
        <div class="row mb-3">
                <label class="col-sm-3 col-form-3">ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
        <div class="row mb-3">
                <label class="col-sm-3 col-form-3">Nama Pekerja</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_pekerja" value="<?php echo $nama_pekerja; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">No KP</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_kp" value="<?php echo $no_kp; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-3">No HP</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_hp" value="<?php echo $no_hp; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-3">Jantina</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="jantina" value="<?php echo $jantina; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage) ) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label> 
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">                
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/anisholding/index.php" role="buton">Cancel</a>
                </div>
                <div class="col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </form>

    </div>