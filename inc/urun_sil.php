
<?php require_once '../system/config.php';
if($row->sitedurum!=1){
  go($site.'/maintenance.php');
  die();
}

if(@$_SESSION['login']!=@sha1(md5(IP().$bcode))){
    go(site);
    }

?>
<?php 

    $id=$_GET["id"];
    $delete=$db->prepare("DELETE FROM urunler WHERE id=:id");
    $delete->bindParam(":id",$id,PDO::PARAM_INT);
    $delete->execute();
    if($delete){
        go('../urun.php');
    }

?>