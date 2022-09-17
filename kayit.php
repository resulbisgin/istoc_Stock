<?php require_once'inc/header.php'; 
require_once'system/function.php';
?>

<!-- Buradan İçerikler girilecek-->


<div class="register">
<div class="container">
    
    <form action=""  method="POST" >
        <div class="user-detalist">
       
            <div class="input-box">
                <span class="details">İşletme Adı</span>
                <input type="text"
                
                name="bname" placeholder="Dükkan Adınızı Girin" >
            </div>
            <div class="input-box">
                <span class="details">Email</span>
                <input type="text" name="bmail"
                
                placeholder="Mail Adresiniz" >
            </div>
            <div class="input-box">
                <span class="details">Şifre</span>
                <input  type="password" 
                
                name="bpass"  placeholder="Sifreniz"  >
            </div>
            <div class="input-box">
                <span class="details">Şifre Tekrar</span>
                <input  type="password" 
              
                name="bpass2"  placeholder="Şifre Tekrar"  >
            </div>
            <div class="input-box">
                <span class="details">Telefon Numaranız</span>
                <input type="text" name="bphone" 
                
                placeholder="Telefon numarası" >
            </div>
           
            
          
            <div class="input-box">
                <span class="details"> Dükkan Vergi No</span>
                <input type="text" name="bvno" 
                
                placeholder="Vergi No" >
            </div>
            <div class="input-box">
                <span class="details"> Dükkan Vergi Dairesi</span>
                <input type="text" name="bvd" 
                
                placeholder="Vergi Dairesi" >
            </div>
    
        </div>
          <small style="color: red;" ></small>
        <div class="button">
                
            <input type="submit"  name="register"  value="KAYIT OL">
        </div>
    </form>
    

</div>
<?php 



if($_POST){
 
    $bname=post('bname');
    $bmail=post('bmail');
    $bpass=post('bpass');
    $bpass2=post('bpass2');
    $bphone=post('bphone');
    $bvno=post('bvno');
    $bvd=post('bvd');
    $bcode=uniqid();
    $crypto=sha1(md5($bpass));
    if(!$bname || !$bmail || !$bpass || !$bpass2 || !$bphone || !$bvno || !$bvd){
      echo  "<div class='p-3 mb-2 bg-warning text-dark' ><p class='text-center'>Boş Geçilmez</p></div>";
    }
    else {
        if(!filter_var($bmail,FILTER_VALIDATE_EMAIL)){
            echo   "<div class='p-3 mb-2 bg-warning text-dark' ><p class='text-center'>E Posta Formatı Hatalı</p></div>";
        }
        else{
            if($bpass != $bpass2){
                echo  "<div class='p-3 mb-2 bg-warning text-dark' ><p class='text-center'>Şifreler Uyuşmuyor</p></div>";
            }else{
                $already=$db->prepare("SELECT bayimail FROM bayiler WHERE bayimail=:b");
                $already->execute([':b'=>$bmail]);
                if($already->rowCount()){
                    echo    "<div class='p-3 mb-2 bg-warning text-dark' ><p class='text-center'>By E-postaya ait Bir Kullanıcı Mevcut </p></div>";
                }else{
                    $result=$db->prepare("INSERT INTO bayiler SET 
                        bayikod=:bcode,
                        bayiadi=:bname,
                        bayimail=:bmail,
                        bayisifre=:bpass,
                        bayitel=:bphone,
                        bayivergino=:bvno,
                        bayivergidairesi=:bvd   

                    "); 
                    $result->execute([
                        ':bcode'=>$bcode,
                        ':bname'=>$bname,
                        ':bmail'=>$bmail,
                        ':bpass'=>$crypto,
                        ':bphone'=>$bphone,
                        ':bvno'=>$bvno,
                        ':bvd'=>$bvd
                    ]);
                    if($result->rowCount()){
                        "<div class='p-3 mb-2 bg-success text-dark' ><p class='text-center'>Üyelik İşleminiz Başarılı Yönetici Onaylayınca Giriş Yapabilceksiniz.</p></div>";
                        echo    header('Refresh: 2; url = index.php');  
                    }else{
                        echo     "<div class='p-3 mb-2 bg-warning text-dark' ><p class='text-center'>Bir Hata Oluştu</p></div>";
                    }
                }
            }
        }
    }
}


?>

</div>






<?php require_once'inc/footer.php'; ?>
