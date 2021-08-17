<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Registracija</title>
</head>
<body>
    <form action="logika/registruj_se.php" method="post" enctype="multipart/form-data">
    <div class="mb-3 rounded border border-4 border-primary">
    <input type="text" name="korisnicko_ime" placeholder="Korisničko ime" class="inputs"><br>
    <input type="text" name="email" placeholder="Email" class="inputs"><br>
    <input type="password" name="password" placeholder="Lozinka" class="inputs"><br>
    <input type="password" name="ponovo_password" placeholder="Ponovite lozinku" class="inputs"><br>
    <input type="text" name="ime_prezime" placeholder="Ime i prezime" class="inputs"><br>
    <input type="text" name="telefon" placeholder="Telefon" class="inputs"><br>
    <input type="file" name="slika" id="slika">
    <input type="submit" value="Snimi" class="btn btn2 btn-primary"><br>
    <input type="submit" value="Registruj se" class="btn btn-primary">
    <?php if(isset($_GET['error'])) { ?>
    <p id="error">Već postoji korisnik sa tim korisničkim imenom.</p>
    <?php } ?> 
    <?php if(isset($_GET['error2'])) { ?>
    <p id="error2">Korisničko ime sme da sadrži samo velika i mala slova engleskog alfabeta, cifre i karakter tačku, najmanje 3 a najviše 30 karaktera.</p>
    <?php } ?> 
    <?php if(isset($_GET['error3'])) { ?>
    <p id="error3">Lozinke se ne podudaraju</p>
    <?php } ?> 
    </form>
    <a href="index.php" class="a2">Prijavi se</a>
    <a href="promena_lozinke.php" class="a2">Promeni lozinku</a>
        
</body>
</html>