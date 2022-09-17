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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Ürün Listele</title>
</head>
<body>

<?php
$rows=$db->query("SELECT * from urunler WHERE urunekleyen='$bcode'",PDO::FETCH_ASSOC);



?>
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

<table style="margin-top: 20px;" class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Ürün Adı</th>
      <th scope="col">Fiyat</th>
      <th scope="col">Stok</th>
      <th scope="col">Düzenle</th>
    </tr>
  </thead>
  <tbody>
<?php 

foreach($rows as $prod){;?>
    <tr scope="row">
   
      <td><?php echo  $prod["id"];?></td>
      <td><?php echo  $prod["urunbaslik"];?></td>
      <td><?php echo  $prod["urunfiyat"];?></td>
      <td><?php echo  $prod["urunstok"];?></td>
      <td><a href="inc/urun_sil.php?id=<?php echo $prod["id"];?>" style="margin-right:10px ;color:red;"><i class="fa fa-trash" aria-hidden="true"></i></a> <a href="urun_edit.php?id=<?php echo  $prod["id"];?>"><i class="fas fa-edit"></i>
</a></td>
    </tr>
    <?php }?>

    
  </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>