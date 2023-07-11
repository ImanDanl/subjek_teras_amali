<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anis Holding</title>

    <style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: grey;
  color: white;
}

a{
    width: 20%;
  background-color: grey;
  color: white;
  padding: 5px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
</style>
    
</head>
<body>
<div class="container my-5">
        <h1>Senarai Maklumat Pekerja</h1>
        <a class="btn btn-primary" href="/anisholding/addpekerja.php" role="button">Tambah Pekerja</a>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pekerja</th>
                    <th>No Kp</th>
                    <th>No Hp</th>
                    <th>Jantina</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $servername = "localhost" ;
                $username = "root" ;
                $password = "";
                $database = "datapekerja" ;

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM pekerja";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid querry: " . $connection->error);
                }

                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    
                    <td>$row[id]</td>
                    <td>$row[nama_pekerja]</td>
                    <td>$row[no_kp]</td>
                    <td>$row[no_hp]</td>
                    <td>$row[jantina]</td>
                    <td>
                        <a class='btn btn-danger btn-sm' href='/anisholding/update.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/anisholding/delete.php?id=$row[id]'>Padam</a>
                    </td>
                </tr>
                    " ;
                    
                }
                ?>
            </tbody>
        </table>

    </div>
    
</body>
</html>