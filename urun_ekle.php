<?php require_once './system/config.php';
if($row->sitedurum!=1){
  go($site.'/maintenance.php');
  die();
}

if(@$_SESSION['login']!=@sha1(md5(IP().$bcode))){
    go(site);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/table.css">
    <link rel="stylesheet" href="Css/reset.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Ürün Ekle</title>
</head>
<body>
<header class="header">
     <div class="container">
          <div class="header-logo">
              <a href="#">
            <h2>İSTOÇ</h2>
        </a>
          </div>
          
          <nav class="menu">
              <ul>
                  <li><a href="profile.php">Profil Düzenleme</a></li>
                  <li><a href="urun.php">Ürün Ekle</a></li>
                  <li><a href="urun_sil.php">Ürün Ekle</a></li>
                  <li><a href="sifredegistir.php">Şifremi  Değiştir</a></li>
                  <li><a href="logout.php">Çıkış</a></li>

              </ul>
          </nav>     
  </div>
</header>

<div class="center">
      <h1>Ürün Ekle</h1>
      <form method="GET" action="">
     
 
          <div class="txt_field">
            
            <input type="text" name="ad"  >
            <span></span>
            <label for=""> Ürün Adı</label>
          </div>
       

          <div class="txt_field">
            
            <input type="text" name="fiyat"   >
            <span></span>
            <label for=""> Ürün Fiyatı</label>
          </div>
          <div class="txt_field">
            
            <input type="text" name="stok"   >
            <span></span>
            <label for=""> Ürün Stoğu</label>
          </div>
        <input type="submit" name="update" value="Ekle">
        
      </form>
    <?php 
    if($_GET){
        
   
    $ad=$_GET['ad'];
    $fiyat=$_GET['fiyat'];
    $stok=$_GET['stok'];
    $data=array(
        "urunbaslik"=>$ad,
        "urunfiyat"=>$fiyat,
        "urunstok"=>$stok,
        "urunekleyen"=>$bcode

    );
    $insert=$db->prepare("INSERT INTO urunler SET 
    urunbaslik=:urunbaslik,
    urunfiyat=:urunfiyat,
    urunstok=:urunstok,
    urunekleyen=:urunekleyen
    ");
    $resul=$insert->execute($data);
    if($resul){
        echo "<div class='alert alert-primary' role='alert'>Kayıt Başarılı </div>";
    }else{
        echo "<div class='alert alert-danger' role='alert'>Kayıt Başarılı </div>";
    }
}
    ?>

    </div>

</body>
</html>