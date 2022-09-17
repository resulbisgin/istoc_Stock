<?php 
require_once'../system/config.php';

if($row->sitedurum!=1){
    go($site.'/maintenance.php');
    die();
  }
  
  if(@$_SESSION['login']!=@sha1(md5(IP().$bcode))){
      go(site);
      }
      ?>
      <?php
$select= $db->prepare("SELECT * from urunler WHERE id=:id");
$select->bindParam(":id",$id,PDO::PARAM_INT);
$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);
    if($_GET){
        
   
    $ad=$_GET['ad'];
    $fiyat=$_GET['fiyat'];
    $stok=$_GET['stok'];
    $id=$_GET['id'];

    $data=array(
        "urunbaslik"=>$ad,
        "urunfiyat"=>$fiyat,
        "urunstok"=>$stok,
        "urunekleyen"=>$bcode,
        "id"=>$id

    );
    $update=$db->prepare("UPDATE urunler SET 
    urunbaslik=:urunbaslik,
    urunfiyat=:urunfiyat,
    urunstok=:urunstok,
    urunekleyen=:urunekleyen
    WHERE id=:id
    ");
    $resul=$update->execute($data);
    if($resul){
       go('../urun.php');
    }else{
        echo "<div class='alert alert-danger' role='alert'>Güncelleme Başarısız </div>";
    }
}
    ?>