<?php require_once 'inc/header.php';

?>
    <!-- Sidebar menu-->
    <?php require_once 'inc/sidebar.php';

?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Yeni Mesajlar  </h1>
     
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo admin;?>"><i class="fa fa-home fa-lg"></i></a></li>
         
          <li class="breadcrumb-item active"><a href="#"> Yeni Mesajlar Listesi </a></li>
        </ul>
      </div>
      <div class="row">
  <form action="" method="POST" class="col-md-12">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Ürün Adı ya da   ürün idsine göre" >
    </div>
  </form>

  <form action="" method="GET" class="col-md-2">
    <div class="form-group">
      <input type="text" class="form-control" name="blim" placeholder="Listeleme sayısı" >
    </div>
  </form>
      
        <div class="col-md-12">
         <?php 
         $s=@intval(get('s'));
         if(!$s){
           $s=1;
         }
         $blim=@intval(get('blim'));
         if(!$blim){
           $blim=50;
         }

          $query=$db->prepare("SELECT * from mesajlar WHERE mesajdurum=:d ORDER BY id DESC ");
          $query->execute([':d'=>2]);
          $total=$query->rowCount();
          $lim=$blim;
          $show=$s*$lim-$lim;
          $query=$db->prepare("SELECT * from mesajlar  WHERE mesajdurum=:d  ORDER BY id DESC LIMIT :show,:lim");
          $query->bindValue(':show',(int)$show,PDO::PARAM_INT);
          $query->bindValue(':lim',(int)$lim,PDO::PARAM_INT);
          $query->bindValue(':d',(int) 1,PDO::PARAM_INT);
          $query->execute();

          if($s>ceil($total/$lim)){
            $s=1;
          }
          if($query->rowCount()){

         
         ?>
          <div class="tile">
            <h3 class="tile-title">Yeni Mesaj Listesi(<?php echo $total ; ?>)</h3>
            <div class="table-responsive">
              <table class="table table-hover ">
                <thead>
                  <tr>
                  <th>#ID</th>
                    <th>İsim</th>
                    <th>E Posta  </th>
                    <th> Konu</th>
                    <th> Tarih</th>
                    <th>Durum</th>
                    <td>Düzenle</td>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($query as $row){ ?>
                   <tr>
                   <td><?php echo $row['id'] ?></td>
                   <td><?php echo $row['mesajisim'] ?></td>
                   <td><?php echo $row['mesajposta'] ?></td>
                   <td><?php echo $row['mesajkonu'] ?></td>
                   <td><?php echo $row['mesajtarih'] ?></td>
                   <td><?php echo $row['mesajdurum'] ?></td>
                
                    <td ><span class="badge badge-danger">Yeni Mesaj</span></td>
                    <td>
                      
                      <a href="<?php istoc('messageread',$row['id']); ?>" title="Mesajı görüntüle" ><i class="fa fa-eye"></a>
                      <a href="<?php istoc('messagedel',$row['id']);?>"  onclick="return confirm('ONAYLIYOR MUSUNUZ');" title="Mesajı Sil" ><i class="fa fa-close"></a>
                    </td>
        
              
                  </tr>
                <?php }  ?>
               
                 
               
                </tbody>
              </table>
            </div>
          </div>
          <?php }else{
            alert("Yeni Mesaj Bulunmuyor","danger");
        }
            ?>
<div>
<ul class=pagination>
<?php 
if($total > $lim){
  pagination($s,ceil($total/$lim),'newmessage.php?s=');
}

?>
</ul>

</div>

        </div>

      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <?php require_once 'inc/footer.php';

?>