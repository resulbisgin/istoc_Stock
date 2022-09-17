<?php require_once'systemadmin/function.php';


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>İsoc-Admin Panel</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>İstoc Admin Panel</h1>
      </div>
      <?php 
      if(isset($_POST["adminlogin"])){
        $email=post('email');
        $pass=post('pass');
        $crypto=sha1(md5($pass));
        if(!$email || !$pass){
          alert("Lütfen Boş Alan Bırakmayınız","danger");
        }else{
          if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            alert("E-Posta Formatı Hatalı","danger");
          }else{
            $alogin=$db->prepare("SELECT * FROM admin WHERE admin_posta=:p AND admin_sifre=:s");
            $alogin->execute([":p"=>$email,":s"=>$crypto]);
            if($alogin->rowCount()){
              $adminrow=$alogin->fetch(PDO::FETCH_OBJ);
              if($adminrow->admin_durum==1){
                $_SESSION['adminlogin']=sha1(md5(IP().$adminrow->adminid));
                $_SESSION['adminid']=$adminrow->adminid;
                alert("Yönetici Girişi Başarılı","succsess");

                $logadd=$db->prepare("INSERT INTO adminlog SET 
                alogadmin=:ad,
                alogaciklama=:ac");
                $logadd->execute([':ad'=>$adminrow->adminid,':ac'=>'Yönetici Girişi Yapıldı']);
               
                go(admin,2);
              }else{
                alert( "Yöneticiliğiniz Pasiftir.","danger"  );
              }
            }else{
              alert("Böyle Bir Yönetici Bulunmuyor","danger");
            }

          }
        }
      }
      ?>
      <div class="login-box">

   
        <form class="login-form" method="POST" action="">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>YÖNETİCİ GİRİŞİ</h3>
          <div class="form-group">
            <label class="control-label">E-Posta</label>
            <input name="email" class="form-control" type="text" placeholder="E-Posta Adresi" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Şifre</label>
            <input class="form-control" name="pass" type="password" placeholder="Şifreniz">
          </div>
         
          <div class="form-group btn-container">
            <button type="submit" name="adminlogin" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Giriş Yap</button>
          </div>
        </form>
       
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
   
  </body>
</html>