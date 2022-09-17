<?php require_once 'inc/header.php';

?>
    <!-- Sidebar menu-->
  <?php require_once 'inc/sidebar.php';?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> İSTOC ADMİN PANEL</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Ana Sayfa</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>BAyiler</h4>
              <p><b><?php echo rowresult('bayiler');?></b></p>
            </div>
          </div>
        </div>
      
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Mesajlar</h4>
              <p><b><?php echo rowresult('mesajlar');?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Ürünler</h4>
              <p><b><?php echo rowresult('urunler');?></b></p>
            </div>
          </div>
        </div>
      </div>
     <div class="col-md-6">
       <div class="tile">
         <h3 class="tile-title">Son 10 Yeni Mesaj</h3>
         <?php $lastmessages =$db->prepare("SELECT * FROM mesajlar WHERE mesajdurum=:d
         ORDER BY id DESC LIMIT 10");
         $lastmessages->execute([":d"=>2]);
         if($lastmessages->rowCount()){
           ?>
           <div class="table-responsive">
             <table class="table table-hover">
               <thead>
               <td> ID</td>
                 <td> İSİM</td>
                 <td> EPOSTA</td>
                 <td> TARİH</td>
                
               </thead>
               <tbody>
                 <?php foreach ($lastmessages as $last){?>
                  <tr>
                    <td><a href="#"><?php echo $last['id'];?></a></td>
                    <td><a href="#"><?php echo $last['mesajisim'];?></a></td>
                    <td><a href="#"><?php echo $last['mesajposta'];?></a></td>
                    <td><a href="#"><?php echo dt($last['mesajtarih']);?></a></td>
                  </tr>
                  <?php }?>
               </tbody>
             </table>
             <?php }else{
               alert("Mesaj","danger");
             }?>
           </div>
       </div>
     </div>

     <div class="col-md-12">
       <div class="tile">
         <h3 class="tile-title">Son 10 Bayi</h3>
         <?php $bayiler =$db->prepare("SELECT * FROM bayiler
         ORDER BY id DESC LIMIT 10");
         $bayiler->execute();
         if($bayiler->rowCount()){
           ?>
           <div class="table-responsive">
             <table class="table table-hover">
               <thead>
                <td> ID</td>
            
                 <td> Bayi Adı </td>
                 <td> Bayi mail</td>
                 <td> Bayi Durum</td>
                 <td> Bayi Telefonu</td>
                 <td> Bayi Sitesi</td>
               </thead>
               <tbody>
                 <?php foreach ($bayiler as $bayi){?>
                  <tr>
                    <td><a href="#"><?php echo $bayi['id'];?></a></td>
                    <td><a href="#"><?php echo $bayi['bayiadi'];?></a></td>
                    <td><a href="#"><?php echo $bayi['bayimail'];?></a></td>
                    <td><a href="#"><?php echo $bayi['bayidurum'];?></a></td>
                    <td><a href="#"><?php echo $bayi['bayitel'];?></a></td>
                    <td><a href="#"><?php echo $bayi['bayisite'];?></a></td>
                  </tr>
                  <?php }?>
               </tbody>
             </table>
             <?php }else{
               alert("Mesaj","danger");
             }?>
           </div>
       </div>
     </div>

     <div class="col-md-12">
       <div class="tile">
         <h3 class="tile-title">Son 10 Ürün</h3>
         <?php $urunler =$db->prepare("SELECT * FROM urunler
         ORDER BY id DESC LIMIT 10");
         $urunler->execute();
         if($urunler->rowCount()){
           ?>
           <div class="table-responsive">
             <table class="table table-hover">
               <thead>
                  <td> ID</td>            
                 <td> Ürün Adı</td>
                 <td> Ürün Fiyat</td>
                 <td> Ürün Stok</td>
                 <td> Ürün Ekleyen</td>
                
               </thead>
               <tbody>
                 <?php foreach ($urunler as $urun){?>
                  <tr>
                    <td><a href="#"><?php echo $urun['id'];?></a></td>
                    <td><a href="#"><?php echo $urun['urunbaslik'];?></a></td>
                    <td><a href="#"><?php echo $urun['urunfiyat'];?></a></td>
                    <td><a href="#"><?php echo $urun['urunstok'];?></a></td>
                    <td><a href="#"><?php echo $urun['urunekleyen'];?></a></td>
                    
                  </tr>
                  <?php }?>
               </tbody>
             </table>
             <?php }else{
               alert("Mesaj","danger");
             }?>
           </div>
       </div>
     </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
<?php require_once 'inc/footer.php';?>