<?php require_once'./systemadmin/function.php';
if( @$_SESSION['adminlogin'] != sha1(md5(IP().$aid)) ){
go(admin."/adminlogin.php");

}

$lastmessages =$db->prepare("SELECT * FROM mesajlar WHERE mesajdurum=:d
         ORDER BY id DESC LIMIT 10");
         $lastmessages->execute([":d"=>2]);
        
          
?>

<!DOCTYPE html>
<html lang="en">
  <head>

  <title>İsoc-Admin Panel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">İstoc Admin </a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
     
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">


            <li class="app-notification__title">Mesajlar(<?php echo  $lastmessages->rowCount()  ?>)</li>
            <div class="app-notification__content">

            <?php if($lastmessages->rowCount()){
                foreach($lastmessages as $lm){

               
             ?>
              <li><a class="app-notification__item" href="<?php istoc('messageread',$lm['id']); ?>">
                
    
              
                  <div>
                    <p class="app-notification__message"><?php echo $lm['mesajkonu']; ?></p>
                    <p class="app-notification__meta"><?php echo dt($lm['mesajtarih']); ?></p>
                  </div>
                </a>
              </li>
             <?php  } }  else{
               alert("Mesaj Bulunmuyor","danger");
             }?>
            </div>
            <li class="app-notification__footer"><a href="#">Tüm Yeni Mesajlar</a></li>
          </ul>
        </li>


        
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i><?php echo $aname;?></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
          
            
            <li><a onclick="return confirm('Çıkış Yapmak İstiyor musunuz?')" class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out fa-lg"></i> Çıkış yap</a></li>
          </ul>
        </li>
      </ul>
    </header>