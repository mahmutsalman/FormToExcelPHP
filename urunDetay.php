<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Product Details</title>
</head>
<body>

    <form action="action.php" method="post">
    <p>ÜRÜN ADI<input type="text" name="urunAdi" /></p>
    <p>MODEL <input type="text" name="model" /></p>
    <p>ÖLÇÜ <input type="text" name="olcu" /></p>
    <p>RENK <input type="text" name="renk" /></p>
    <p>MİKTAR <input type="text" name="miktar" /></p>
    <p>BİRİM FİYATI <input type="text" name="birimFiyati" /></p>
    <p>TUTAR <input type="text" name="tutar" /></p>
    <p>GÖRSEL <input type="text" name="görsel" /></p>
   
    <p><input type="submit" /></p>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $urunAdi=  $_POST['urunAdi'];
            $model=  $_POST['model'];
            $olcu=  $_POST['olcu'];
            $renk=  $_POST['renk'];
            $miktar=  $_POST['miktar'];
            $birim=  $_POST['urunAdi'];
            $birimFiyati=  $_POST['birimFiyati'];
            $tutar=  $_POST['tutar'];
            $görsel=  $_POST['görsel'];

            

        }
    ?>
    
</body>
</html>