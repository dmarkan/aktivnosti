<?php 
require_once __DIR__ . '/tabele/Korisnik.php';
require_once __DIR__ . '/tabele/Aktivnost.php';
$aktivnosti = Aktivnost::sve_aktivnosti();
$korisnici = Korisnik::svi_korisnici();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Prijavljen korisnik</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $(function () {
            $('#unesi_aktivnost').on('submit', function (e) {
                e.preventDefault();
                let form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: {
                        'naslov': $('[name="naslov"]').val(),
                        'sadrzaj': $('[name="sadrzaj"]').val()
                    },
                    dataType: 'json',
                    success: function (aktivnost) {
                        console.log(aktivnost);
                        $('.aktivnost:first-of-type').before(
                            '<div class="aktivnost">' +
                            '<h2>' + aktivnost.created_at + '</h2>' +
                            '<h3>' + aktivnost.korisnik.ime + '</h3>' +
                            '<h1>' + aktivnost.naslov + '</h1>' +
                            '<p>' + aktivnost.sadrzaj + '</p>' +
                            '</div>'
                        );
                        form.find('input, textarea').val('');
                    },
                    error: function (odgovor) {
                        console.log(odgovor);
                    }
                })
            });
            $('.obrisi_aktivnost').on('submit', function (e) {
                e.preventDefault();
                let form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: {
                        'aktivnost_id': form.find('[name="aktivnost_id"]').val()
                    },
                    dataType: 'json',
                    success: function (odgovor) {
                        form.parent().parent().remove();
                    },
                    error: function (odgovor) {
                        console.log(odgovor);
                    }
                })
            });
        });
    </script>
</head>

<body>
    <a href="logika/logout.php">Odjavi se</a>
    <a href="promena_lozinke.php" class="a2">Promeni lozinku</a>

    <form action="logika/unesi_aktivnost.php" method="post" id="unesi_aktivnost">
        <div class="mb-3 rounded border border-4 border-primary">
            <input type="text" name="naslov" class="inputs" placeholder="Naziv aktivnosti"><br>
            <textarea name="sadrzaj" id="" cols="30" rows="10" placeholder="Opis aktivnosti"></textarea><br>
                <label for="korisnici">Izaberi korisnika:</label>
<select name="korisnici" id="korisnici">
       <?php foreach ($korisnici as $korisnik): ?>
  <option>
                <?= $korisnik->korisnicko_ime ?></option>
                <?php endforeach ?>
</select> 
              
            <div class="form-check">
            <input type="radio" class="form-check-input" id="hitno" name="hitnost" value="hitno">
            <label for="hitno" class="form-check-label">hitno</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="form-check-inline">
            <input type="radio" class="form-check-input" id="nije_hitno" name="hitnost" value="nije_hitno">
            <label for="nije_hitno" class="form-check-label">nije hitno</label>
            </div><br>
            <label for="datum" class="form-check-label">Rok izvršenja:</label>
            <input type="date" id="datum" name="datum"> 
            <button type="submit" class="btn btn-primary">Kreiraj aktivnost</button>
        </div>
    </form>
</div>


    <?php foreach ($aktivnosti as $aktivnost): ?>
    <div class="aktivnost">
        <div class="mb-3 rounded border border-4 border-primary">
            <h3>
                <img src="<?= $aktivnost->korisnik()->slika ?>" width="50px" height="50px">
                <?= $aktivnost->korisnik()->korisnicko_ime ?></h3>
            <h1><?= $aktivnost->naslov ?></h1><br>
            <h6><?= date('d.m.Y. H:i', strtotime($aktivnost->created_at)) ?>
            </h6><br>
            <button class="btn btn-success">Pročitano</button>
            <hr>
            <form action="logika/obrisi_aktivnost.php" method="post" class="obrisi_aktivnost">
                <div class="mb-3">
                    <input type="hidden" name="aktivnost_id" value="<?= $aktivnost->id ?>">
                    <div class="sadrzaj">
                        <h5><?= $aktivnost->sadrzaj ?></h5>
                    </div><br>
                    <input type="submit" value="Obriši" class="btn btn3 btn-danger">
            </form>

        </div>
    </div>
    <?php endforeach ?>

    <script>
        let procitano = document.querySelector(".btn-success");
        let aktivnost = document.querySelector(".aktivnost");
        let white = false;
        $(document).ready(function () {
            $(".btn-success").click(function () {
                if (white = !white) {
                    bgcolor = $(".aktivnost").css('backgroundColor');
                    $(".aktivnost").css("background-color", "#FFF");
                } else {
                    $(".aktivnost").css("background-color", "green");
                }
            });
        });

        let hitno = document.querySelector("#hitno");
        let nije_hitno = document.querySelector("#nije_hitno");

        if(hitno.checked) {
            aktivnost.style.background = "orange";
        } else if(nije_hitno.checked) {
            aktivnost.style.background = "yellow";
        }
    </script>
</body>

</html>