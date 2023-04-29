<?php
    $psn ="";
    if(isset($_POST["txNama"])){
        $PASS1 = $_POST["txPASS1"];
        $PASS2 = $_POST["txPASS2"];

        if($PASS1==$PASS2){
            $nama = $_POST["txNama"];
            $email = $_POST["txEmail"];
            $user = $_POST["txUser"];
            $iduser = md5($email);

            $sql = "INSERT INTO tbuser(nama, email, username, passkey, iduser) VALUES('$nama','$email','$user','$PASS1','$iduser');";
            include_once ("koneksi.php");
            $hsl = mysqli_query($cnn, $sql);
            if($hsl){
                $psn = "User Name berhasil ditambahkan";
            }else{
                $psn = "User Name gagal ditambahkan";
            }
        }else{
            $psn = "password tidak sama dengan konfirmasi password";
        }
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
</head>
<body>

<?php
   echo "<div>$psn</div>";
?>

    <form method="POST" action="Registrasi.php">

    <div>
        Nama lengkap
        <input type="text" name="txNama">
    </div>
    
    <div>
        Email
        <input type="email" name="txEmail">
    </div>
    
    <div>
        User Name
        <input type="text" name="txUser">
    </div>
    
    <div>
        Password
        <input type="password" name="txPASS1">
    </div>
    
    <div>
        Password<sup>konfirmasi</sup>
        <input type="password" name="txPASS2">
    </div>
        <div>
            <button type="submit"> Registrasi </button>
</form>
    
</body>
</html>