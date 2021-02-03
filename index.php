<?php
session_start();
 require_once('config.php');
//  phpinfo();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Excel</title>
</head>

<body>
    <form action="index.php" method="post">
        <p>Firma adı: <input type="text" name="firmaAdi" /></p>
        <p>Yetkili adı: <input type="text" name="yetkiliAdi" /></p>
        <p>Telefon: <input type="text" name="telefonNumarasi" /></p>
        <p>E-posta: <input type="text" name="eposta" /></p>
        <p>Fatura adresi: <input type="text" name="faturaAdresi" /></p>
        <p>Vergi Dairesi/No <input type="text" name="vergiDaireNo" /></p>
        <input class="btn btn-primary" type="submit" name="submit" value="Send to the database">
        <a href="urunDetay.php" class="mt-5 mb-3 text-muted">İleri</a>
    </form>
    <?php
   
    if (isset($_POST['submit'])) {
     
        $firmaAdi =  $_POST['firmaAdi'];
        //Setting session value 'firmaAdi'
        $_SESSION['firmaAdi']=$firmaAdi;
        header('Location: urunDetay.php');

        $yetkiliAdi =  $_POST['yetkiliAdi'];
        $telefonNumarasi =  $_POST['telefonNumarasi'];
        $eposta =  $_POST['eposta'];
        $faturaAdresi =  $_POST['faturaAdresi'];
        $vergiDaireNo =  $_POST['vergiDaireNo'];

        $sql="INSERT INTO form1 (firmaAdi,yetkiliAdi,telefonNumarasi,eposta,faturaAdresi,vergiDaireNo) 
        VALUES ('$firmaAdi','$yetkiliAdi','$telefonNumarasi','$eposta', '$faturaAdresi','$vergiDaireNo')";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute();
        if($result){
            echo '<script type="text/javascript"> alert(" Başarılı SQL...") </script>';
        }
        else
        echo '<script type="text/javascript"> alert(" Hata") </script>';


        // $sql2="INSERT INTO form2 (firmaAdi) 
        // VALUES ('$firmaAdi')";
        // $stmt = $db->prepare($sql2);
        // $result2 = $stmt->execute();
        // if($result2){
        //     echo '<script type="text/javascript"> alert(" Başarılı SQL...") </script>';
        // }
        // else
        // echo '<script type="text/javascript"> alert(" Hata") </script>';
        
       

    }
    ?>




</body>

</html>