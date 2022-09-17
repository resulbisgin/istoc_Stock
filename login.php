<?php require_once'inc/header.php';
require_once 'system/function.php';
if( @$_SESSION['login'] == @sha1(md5(IP().$bcode)) ){
    go(site);
}

?>

<!-- Buradan İçerikler girilecek-->
<div class="register">
<div class="container">


    <form action=""  method="POST"  >
        <div class="user-detalist">
       
            
            <div class="input-box">
                <span class="details">Email</span>
                <input type="text " placeholder="E-Posta ya da Dükkan Kodu" name="bec"
                
                placeholder="Mail Adresiniz" >
            </div>
            <div class="input-box">
                <span class="details">Şifre</span>
                <input  placeholder="Şifrenizi Girin." name="bpass" type="password" 
                
                name="bpass"  placeholder="Sifreniz"  >
            </div>
            

    
        </div>
          <small style="color: red;" ></small>
        <div class="button">
                
            <input type="submit"  name="login" value="GİRİŞ  YAP">
        </div>
    </form>
   

</div>
<?php 




if($_POST){
    if(isset($_POST['login'])){
    $bec=post('bec');
    $bpass=post('bpass');
    $crypto=sha1(md5($bpass));
    if(!$bec || !$bpass){
        echo 'empty';
    }else{
        $login=$db->prepare("SELECT * FROM bayiler WHERE (bayikod=:k AND bayisifre=:s) OR (bayimail=:m AND bayisifre=:ss)");
        $login->execute([
            ':k'=>$bec,
            ':s'=>$crypto,
            ':m'=>$bec,
            ':ss'=>$crypto
          
        ]); 
        if($login->rowCount()){
            $par=$login->fetch(PDO::FETCH_OBJ);
            if($par->bayidurum==1){
                        $encode=sha1(md5(IP().$par->bayikod));
                    $_SESSION['login']=$encode;
                    $_SESSION['id']=$par->id;
                    $_SESSION['code']=$par->bayikod;
                    echo  "<div class='p-3 mb-2 bg-success text-dark'><p class='text-center'>Giriş Başarılı</p></div>";
                    header('Refresh: 2; url = profile.php');  
            }else{
               echo  "<div class='p-3 mb-2 bg-info text-dark'><p class='text-center'>Üyeliğiniz Pasif durumda.Onaylandığında Giriş Yapabilceksiniz.</p></div>";
            }
        }else{
            echo  "<div class='p-3 mb-2 bg-warning text-dark' ><p class='text-center'>Şifre Veya E-Posta Hatalı</p></div>";
        }
    }
}
}
?>
</div>

<?php require_once'inc/footer.php'; ?>