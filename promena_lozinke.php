<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Promena lozinke</title>
</head>
<body>
    <form action="logika/promeni_lozinku.php" method="post">
    <div class="mb-3 rounded border border-4 border-primary">

    <input type="text" class="inputs" name="korisnicko_ime" placeholder="Korisničko ime"><br>
    <input type="password" class="inputs" name="old_password" placeholder="Stara lozinka"><br>
    <input type="password" class="inputs" name="new_password" placeholder="Nova lozinka"><br>
    <input type="password" class="inputs" name="new_password_repeat" placeholder="Ponovite novu lozinku"><br>
    <input type="submit" value="Promeni lozinku" class="btn btn-primary">
    <?php if(isset($_GET['error'])) { ?>
    <p id="error">Pogrešno korisničko ime ili stara lozinka</p>
    <?php } ?> 
    <?php if(isset($_GET['error2'])) { ?>
    <p id="error3">Nove lozinke se ne podudaraju</p>
    <?php } ?> 
    </form><br>
    <a href="index.php">Prijavi se</a>
    <a href="registracija.php">Registruj se</a>
</body>
</html>