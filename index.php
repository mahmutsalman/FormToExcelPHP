<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Excel</title>
</head>

<body>
    <form action="urunDetay.php" method="post">
        <p>Firma adı: <input type="text" name="firmaAdi" /></p>
        <p>Yetkili adı: <input type="text" name="yetkiliAdi" /></p>
        <p>Telefon: <input type="text" name="telefonNumarasi" /></p>
        <p>E-posta: <input type="text" name="eposta" /></p>
        <p>Fatura adresi: <input type="text" name="faturaAdresi" /></p>
        <p>Vergi Dairesi/No <input type="text" name="vergiDaireNo" /></p>
        <p><input type="submit" /></p>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $firmaAdi =  $_POST['firmaAdi'];
        $yetkiliAdi =  $_POST['yetkiliAdi'];
        $telefonNumarasi =  $_POST['telefonNumarasi'];
        $eposta =  $_POST['eposta'];
        $faturaAdresi =  $_POST['faturaAdresi'];
        $vergiDaireNo =  $_POST['vergiDaireNo'];
    }
    ?>




</body>

</html>