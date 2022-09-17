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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/table.css">
    <link rel="stylesheet" href="Css/reset.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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
      <h1>Şifremi  Değiştir</h1>
      <form method="GET" action="" >
     
            
          
       
         
         
       
      
          <div class="txt_field">
            
            <input type="password" name="password"  >
            <span></span>
            <label for=""> Yeni Şifreniz</label>
          </div>
       

          <div class="txt_field">
            
            <input type="password" name="password2"   >
            <span></span>
            <label for=""> Yeni Şifreniz Tekrar</label>
          </div>
       
        <input type="submit" name="chage" value="Kaydet">
        
      </form>
    </div>

<?php
    if($_GET){
    $bpass=get('password');
    $bpass2=get('password2');
    $crypto=sha1(md5($bpass));
    if(!$bpass || !$bpass2 ){
      echo  "<div class='p-3 mb-2 bg-warning text-dark' ><p class='text-center'>Lütfen Boş Alan bırakmayınız</p></div>";
    }
    else {
       
            
        if($bpass != $bpass2){
          echo  "<div class='p-3 mb-2 bg-warning text-dark' ><p class='text-center'>Şifreler eşit Değil</p></div>";
        }else{
                    $result=$db->prepare("UPDATE   bayiler SET 
                   
                       bayisifre=:s  WHERE  bayikod=:kod AND id=:id

                    "); 
                    $result->execute([
                        
                        ':s'=>$crypto,
                        ':kod'=>$bcode,
                        ':id'=>$pid
                    ]);
                    if($result){
                      echo  "<div class='p-3 mb-2 bg-success text-dark'><p class='text-center'>Değişme  Başarılı</p></div>";
                      header('Refresh: 2; url = profile.php'); 
                    }else{
                      echo  "<div class='p-3 mb-2 bg-warning text-dark' ><p class='text-center'>Bir hata oluştu</p></div>";
                    }
                
                }
        
    }

}
?>
</body>
</html>