<?php require_once'inc/header.php';
    require_once'system/config.php';
?>
     <!-- Buradan İçerikler girilecek--> 
     <!-- iletişim formu start--> 
    <br> 
    <br>
    <div class="contact-in">
        <div class="contact-map"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3008.1765935521635!2d28.8293868148073!3d41.06513237929505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa53c23acedcb%3A0x56d81a6061e5aeaf!2s%C4%B0sto%C3%A7%20Ticaret%20Merkezi!5e0!3m2!1str!2sro!4v1640566457953!5m2!1str!2sro" width="98%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe> </div>
        <div class="contact-form">
            <h1 class="contact-form-h1"><b>İletişim Formu</b></h1> <br>
            <form method="post">  
                <input class="contact-form-txt" type="text" name="ad" placeholder="Ad">
             <input class="contact-form-txt" type="text" name="email" placeholder="E-Posta"> 
             <input class="contact-form-txt" type="text" name="konu" placeholder="Mesaj Konu"> 
            
             <textarea class="contact-form-textarea" type="text" name="icerik" placeholder="Mesaj İçeriği ">

             </textarea>
              <button class="contact-form-btn" type="submit">Gönder</button> 
            </form>
        </div>
    </div> 
    <br> 
    <br>
    <?php 
    if($_POST){
    $ad=post('ad');
    $eposta=post('email');
    $konu=post('konu');
    $icerik=post('icerik');
    $sql = $db->prepare("INSERT into mesajlar set mesajisim=:ad,mesajposta=:mesajposta,mesajkonu=:mesajkonu,mesajicerik=:mesajicerik");
    $ekle = $sql->execute(array(
        "ad" => $ad,
        "mesajposta" => $eposta,
        "mesajkonu" => $konu,
        "mesajicerik" => $icerik
    ));
    if ($ekle){
        echo "Kayıt eklendi";
    }
    else{
        echo "Kayıt eklenemedi";
}
}
    ?>
    <!-- iletişim formu end-->
    <!--FOOTER-->
    <?php require_once'inc/footer.php' ?>