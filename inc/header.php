<?php require_once './system/config.php';
if($row->sitedurum!=1){
  go($site.'/maintenance.php');
  die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/reset.css">
    <link rel="stylesheet" href="Css/about.css">
    <link rel="stylesheet" href="Css/contact.css">

    <!--<link rel="stylesheet" href="Css/collapse.css">-->
    <link rel="stylesheet" href="Css/card.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>İstoç Stok</title>
</head>
<body>
<header class="header " >
     <div class="container">
          <div class="header-logo">
              <a href="index.php">
            <h2>İSTOÇ</h2>
        </a>
          </div>
          
          <nav class="menu">
              <ul>
                <li><a href="index.php">Ana Sayfa</a></li>
                <li><a href="about.php">Hakkımızda</a></li>
                
                <li><a href="contact.php">İletişim</a></li>
                <li><a href="product.php">Ürünlerimiz</a></li>
              

                  <li><a class="dp-btn" href="#">Kurumsal Giriş<i class="fas fa-angle-down"></i></a>
                   <ul class="dropdown">
                       <li>
                           <a id="modal-open" href="login.php">Giriş Yap
                             <i class="fas fa-sign-in-alt"></i>
                                
                            </a>
                           
                       </li>
                       <li>
                        <a href="kayit.php">Kayıt Ol <i class="fas fa-user-plus"></i></a>
                    </li>
                   </ul>
                </li>
                <div class="modalPopup">
                   
                        
               

              
                </div>

              </ul>
          </nav>

      
  </div>
</header>
<br>
<br>