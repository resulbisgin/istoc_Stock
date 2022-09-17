<?php require_once './system/config.php';
require_once 'system/function.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/table.css">
    <link rel="stylesheet" href="Css/reset.css">

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
                  <li><a href="urun.php">Ürünleri Listele</a></li>
                  <li><a href="urun_ekle.php">Ürün Ekle</a></li>
                  <li><a href="sifredegistir.php">Şifremi  Değiştir</a></li>
                  <li><a href="logout.php">Çıkış</a></li>

              </ul>
          </nav>     
  </div>
</header>

<div class="center">
      <h1>Profil  Düzenle</h1>
      <form method="GET" action=""   >
      <div class="txt_field">
            
            <input type="text" name="bec" disabled value="<?php echo $bcode;?>" >
            <span></span>
            <label for="">Bayi Kodu:</label>
          </div>
          <div class="txt_field">
            
            <input type="text" name="bname"  value="<?php echo $bname;?>" >
            <span></span>
            <label for="">Bayi Adı:</label>
          </div>
          <div class="txt_field">
            
            <input type="text" name="bmail"  value="<?php echo $bmail;?>" >
            <span></span>
            <label for="">Bayi Mail:</label>
          </div>
          <div class="txt_field">
            
            <input type="text" name="bphone"  value="<?php echo $bphone;?>" >
            <span></span>
            <label for="">Bayi Telefon:</label>
          </div>
          <div class="txt_field">
            
            <input type="text" name="bvno"  value="<?php echo $bcno;?>" >
            <span></span>
            <label for=""> Bayi Vergi No:</label>
          </div>
          <div class="txt_field">
            
            <input type="text" name="bvd"  value="<?php echo $bvd;?>" >
            <span></span>
            <label for=""> Bayi Vergi Dairesi:</label>
          </div>
          <div class="txt_field">
            
            <input type="text" name="bwebsite"  value="<?php echo $bweb;?>" >
            <span></span>
            <label for=""> Bayi Web Sitesi</label>
          </div>
       
       
        <input type="submit" name="profilupdate" value="Kaydet">
        
      </form>
    </div>
<?php 
    if($_GET){
    $bname=get('bname');
    $bmail=get('bmail');
    
    $bphone=get('bphone');
    $bvno=get('bvno');
    $bvd=get('bvd');
    $bweb=get('bwebsite');
    if(!$bname || !$bmail || !$bphone || !$bvno || !$bvd){
        echo 'empty';
    }
    else {
        if(!filter_var($bmail,FILTER_VALIDATE_EMAIL)){
            echo 'format';
        }
        else{
            
                $already=$db->prepare("SELECT bayikod,bayimail FROM bayiler WHERE bayimail=:b AND bayikod!=:bayikod");
                $already->execute([':b'=>$bmail,':bayikod'=>$bcode]);
                if($already->rowCount()){
                  echo  "<div class='p-3 mb-2 bg-warning text-dark' ><p class='text-center'>Bu E-Posta Mevcut</p></div>";
                }else{
                    $result=$db->prepare("UPDATE   bayiler SET 
                   
                        bayiadi=:bname,
                        bayimail=:bmail,                   
                        bayitel=:bphone,
                        bayisite=:bweb,
                        bayivergino=:bvno,
                        bayivergidairesi=:bvd   WHERE  bayikod=:kod AND id=:id

                    "); 
                    $result->execute([
                        
                        ':bname'=>$bname,
                        ':bmail'=>$bmail,                  
                        ':bphone'=>$bphone,
                        ":bweb"=>$bweb,
                        ':bvno'=>$bvno,
                        ':bvd'=>$bvd,
                        ':kod'=>$bcode,
                        ':id'=>$pid
                    ]);
                    if($result){
                      echo  "<div class='p-3 mb-2 bg-success text-dark'><p class='text-center'>Güncelleme Başarılı</p></div>";
                    }else{
                      echo  "<div class='p-3 mb-2 bg-warning text-dark' ><p class='text-center'>Güncelleme Başarısız</p></div>";
                    }
                }
            
        }
    }

}

?>

</body>
</html>