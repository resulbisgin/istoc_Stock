<?php require_once 'inc/header.php';

?>
    <!-- Sidebar menu-->
    <?php require_once 'inc/sidebar.php';

?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Ürün  Listesi</h1>
     
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo admin;?>"><i class="fa fa-home fa-lg"></i></a></li>
         
          <li class="breadcrumb-item active"><a href="#">Ürün Listesi </a></li>
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

          $query=$db->prepare("SELECT * from urunler ORDER BY id DESC ");
          $query->execute();
          $total=$query->rowCount();
          $lim=$blim;
          $show=$s*$lim-$lim;
          $query=$db->prepare("SELECT * from urunler ORDER BY id DESC LIMIT :show,:lim");
          $query->bindValue(':show',(int)$show,PDO::PARAM_INT);
          $query->bindValue(':lim',(int)$lim,PDO::PARAM_INT);
          $query->execute();

          if($s>ceil($total/$lim)){
            $s=1;
          }
          if($query->rowCount()){

         
         ?>
          <div class="tile">
            <h3 class="tile-title">Ürün Listesi(<?php echo $total ; ?>)</h3>
            <div class="table-responsive">
              <table class="table table-hover ">
                <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Ürün Adı </th>
                    <th>Ürün Fiyat</th>
                    <th>Ürün Stok</th>
                    <th>Ürün Bayi</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($query as $row){ ?>
                   <tr>
                   <td><?php echo $row['id'] ?></td>
                   <td><?php echo $row['urunbaslik'] ?></td>
                   <td><?php echo $row['urunfiyat'] ?></td>
                   <td><?php echo $row['urunstok'] ?></td>
                   <td><?php echo $row['urunekleyen'] ?></td>
                <td>

                <a href=""><i class="fa fa-edit"></a>
                <a onclick=" confirm('Onaylıyor musunuz?');" href="<?php istoc('productsdel',$row['id']);?>"><i class="fa fa-close"></a>
                </td>
                  </tr>
                <?php }  ?>
               
                 
               
                </tbody>
              </table>
            </div>
          </div>
          <?php }else{
            alert("Ürünler Bulunmuyor","danger");
        }
            ?>



<div>
<ul class=pagination>
<?php 
if($total > $lim){
  pagination($s,ceil($total/$lim),'products.php?s=');
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