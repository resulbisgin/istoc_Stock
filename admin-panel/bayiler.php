<?php require_once 'inc/header.php';

?>
    <!-- Sidebar menu-->
    <?php require_once 'inc/sidebar.php';

?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Bayi Listesi</h1>
     
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo admin;?>"><i class="fa fa-home fa-lg"></i></a></li>
         
          <li class="breadcrumb-item active"><a href="#">Bayi Listesi </a></li>
        </ul>
      </div>
      <div class="row">
  <form action="" method="POST" class="col-md-12">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Bayi Adi veya Bayi Kodu Giriniz." >
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

          $query=$db->prepare("SELECT * from bayiler ORDER BY id DESC ");
          $query->execute();
          $total=$query->rowCount();
          $lim=$blim;
          $show=$s*$lim-$lim;
          $query=$db->prepare("SELECT * from bayiler ORDER BY id DESC LIMIT :show,:lim");
          $query->bindValue(':show',(int)$show,PDO::PARAM_INT);
          $query->bindValue(':lim',(int)$lim,PDO::PARAM_INT);
          $query->execute();

          if($s>ceil($total/$lim)){
            $s=1;
          }
          if($query->rowCount()){

         
         ?>
          <div class="tile">
            <h3 class="tile-title">Bayi Listesi(<?php echo $total ; ?>)</h3>
            <div class="table-responsive">
              <table class="table table-hover ">
                <thead>
                  <tr>
                    <th>#Kodu</th>
                    <th>İD</th>
                    <th>Bayi Adı </th>
                    <th>Bayi Mail</th>
                    <th>Telefon</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($query as $row){ ?>
                   <tr>
                   <td><?php echo $row['id'] ?></td>
                   <td><?php echo $row['bayikod'] ?></td>
                   <td><?php echo $row['bayiadi'] ?></td>
                   <td><?php echo $row['bayimail'] ?></td>
                   <td><?php echo $row['bayitel'] ?></td>
                   <td><?php echo $row['bayidurum']==1 ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Pasif</span>' ?></td>
                <td>

                <a title="Düzenle" href="<?php istoc('bayiedit',$row['bayikod']);?>"><i class="fa fa-edit"></a>
                <a title="sil" onclick=" confirm('Onaylıyor musunuz?');" href="<?php istoc('bayidel',$row['id']);?>"><i class="fa fa-close"></a>
               
                </td>
                  </tr>
                <?php }  ?>
               
                 
               
                </tbody>
              </table>
            </div>
          </div>
          <?php }else{
            alert("Bayi Bulunmuyor","danger");
        }
            ?>
<div>
<ul class=pagination>
<?php 
if($total > $lim){
  pagination($s,ceil($total/$lim),'bayiler.php?s=');
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