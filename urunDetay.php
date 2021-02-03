<?php
    session_start();
    require_once('config.php');
    // static $index=0;
    
    
    if(isset($_POST['submit'])){
            $urunAdi=  $_POST['urunAdi'];
            // $_SESSION['urunAdi'] =$urunAdi;
            // $_SESSION['index']++;
            

            $firmaAdi=$_SESSION['firmaAdi'];// seems unnecessary

            $model=  $_POST['model'];
            $olcu=  $_POST['olcu'];
            $renk=  $_POST['renk'];
            $miktar=  $_POST['miktar'];
            $birimFiyati=  $_POST['birimFiyati'];
            $tutar=  $_POST['tutar'];
            // $gorsel=  $_POST['gorsel'];
            //TODO does its location in the code matter ? -header-
            
        
        //TODO There is already firmaAdi in form2. We need to overwrite on that. WHERE $firmaAdi= `firmaAdi`
        $sql="INSERT INTO form2 (firmaAdi,urunAdi,model,olcu,renk,miktar,birimFiyati,tutar) 
        VALUES ('$firmaAdi','$urunAdi','$model','$olcu', '$renk','$miktar','$birimFiyati','$tutar')";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute();
        if($result){
            echo '<script type="text/javascript"> alert(" Başarılı SQL...") </script>';
        }
        else
        echo '<script type="text/javascript"> alert(" Hata") </script>';
            

        }
        if(isset($_POST['sendToExcel'])){

            header('Location: action.php');

        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Product Details</title>
</head>
<body>

    <form action="urunDetay.php"  method="post">
    <p>ÜRÜN ADI<input type="text" name="urunAdi" /></p>
    <p>MODEL <input type="text" name="model" /></p>
    <p>ÖLÇÜ <input type="text" name="olcu" /></p>
    <p>RENK <input type="text" name="renk" /></p>
    <p>MİKTAR <input type="text" name="miktar" /></p>
    <p>BİRİM FİYATI <input type="text" name="birimFiyati" /></p>
    <p>TUTAR <input type="text" name="tutar" /></p>
    <p>GÖRSEL <input type="text" name="görsel" /></p>
   
    <p>Add to the database<input type="submit" name="submit" /></p>
    </form>


    <form action="action.php">
        <p>Send to the excel<input type="submit" name="sendToExcel" /></p>
    
    </form>
    <a href="index.php" class="mt-5 mb-3 text-muted">Return to index.php</a>

   
    
</body>
</html>