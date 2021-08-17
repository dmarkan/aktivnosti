<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Lista korisnika</title>
</head>
<body>
<a href="logika/logout.php">Odjavi se</a>
<table class="table table-striped table-hover table-bordered">
    <tr>
        <th>Ime i prezime</th>
        <th>Email</th>
        <th>Telefon</th>
        <th>Korisničko ime</th>
        <th>Lozinka</th>
        <th>Slika</th>
    </tr>
    <?php 
    $conn = mysqli_connect("localhost", "root", "", "ispit");
    if ($conn-> connect_error) {
        die();
    }

    $sql = "SELECT ime_prezime, email, telefon, korisnicko_ime, password, slika from korisnici";
    $result = $conn-> query($sql);

    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<tr><td>". $row["ime_prezime"] ."</td><td>". $row["email"] ."</td><td>". $row["telefon"] ."</td><td>". $row["korisnicko_ime"] ."</td><td>". $row["password"] ."</td><td>". $row["slika"] ."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 rezultata";
    }
    ?>
</table>
</body>
</html>