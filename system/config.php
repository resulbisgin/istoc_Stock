<?php 
require_once 'function.php'; 
    session_start();
    ob_start('compress');

  try{
    $db=new PDO("mysql:host=localhost;dbname=istoc;charset=utf8;","root","");
  

  }catch(PDOException $e){
    print_r($e->getMessage());
  }
  $query=$db->prepare("SELECT * from ayarlar LIMIT :lim");
  $query->bindValue(':lim',(int) 1,PDO::PARAM_INT);
  $query->execute();
  if($query->rowCount()){
      $row=$query->fetch(PDO::FETCH_OBJ);
      $site=$row->siteurl;


      #sabit
      define('site',$site);
      define('baslik',$row->sitebaslik);
      #sabit
  }
  #giris 
  if( @$_SESSION['login'] == @sha1(md5(IP().$_SESSION['code'])) ){
  $logincontrol=$db->prepare("SELECT * FROM bayiler WHERE id=:id AND bayikod=:k");
  $logincontrol->execute([':id' => @$_SESSION['id'],':k'=> @$_SESSION['code']]);
  if($logincontrol->rowCount()){
    $par= $logincontrol->fetch(PDO::FETCH_OBJ);  
    if($par->bayidurum==1){
   
    $pid=$par->id;
    $bcode=$par->bayikod;
    $bmail=$par->bayimail;
    $bname=$par->bayiadi;
    $bphone=$par->bayitel;
    $bcno=$par->bayivergino;
    $bvd=$par->bayivergidairesi;
    $bweb=$par->bayisite; 
    $bstatus=$par->bayidurum;
    }
    else{
      @session_destroy();
    }
  }
  else{
    @session_destroy();
  }
  }
?>