<?php require_once 'inc/header.php';?>
<?php require_once 'inc/sidebar.php';?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> <?php @get('process');?> </h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">İşlemler</li>
          <li class="breadcrumb-item"><a href="#"><?php @get('process');?></a></li>
        </ul>
      </div>
      <div class="row">


        <div class="col-md-12">

        <?php 
          $process=@get('process');
          if(!$process){
            go(admin);
            
          }
          switch($process){

            case 'contact':


              if(isset($_POST['uppp'])){
                $tel=post('tele');
                $eposta=post('eposta');
                $adres=post('adres');
                if(!$tel || !$eposta || !$adres){
                  alert('boş Alan Bırakmayınız','danger');
                }else{
                  $up=$db->prepare("UPDATE ayarlar set 
                  tel=:a,
                  eposta=:b,
                  adres=:c WHERE id=:id
                  ");
                $result=  $up->execute([
                    ':a'=>$tel,
                    ':b'=>$eposta,
                    ':c'=>$adres,
                    ':id'=>1
                  ]);
                  if($result){
                    alert('Genel Ayarlar Güncellendi','success');
                    go($_SERVER['HTTP_REFERER'],2);
   
                  }else{
                    alert('Genel Ayarlar Güncellenemedi','danger'); 
                  }
                }
              }



              ?>
  <div class="tile">
            <h3 class="tile-title">İletişim Ayarlar </h3>
            <form method="POST">
            <div class="tile-body">
  
           




            <div class="form-group">
                  <label class="control-label">Telefon  </label>
                  <input class="form-control" name="tele"  value="<?php echo $arow->tel;?>" type="text" placeholder="Telefon  Numarası ">
                </div>



                <div class="form-group">
                  <label class="control-label">E Posta  </label>
                  <input class="form-control" name="eposta"  value="<?php echo $arow->eposta;?>" type="text" placeholder="E - Posta  ">
                </div>


             
              
                <div class="form-group">
                  <label class="control-label"> Adres  </label>
                  <input class="form-control" name="adres"  value="<?php echo $arow->adres;?>" type="text" placeholder=" Adres ">
                </div>

             

  

              
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" name="uppp" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Kayıt  Güncelle </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo admin; ?>/index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Ana SAyfa </a>
            </div>
            </form>
          </div>
        </div>



              <?php 
              break;


          case 'general':
           if(isset($_POST['upp'])){
             $title=post('title');
             $siteurl=post('url');
             $sitestatus=post('sitestatus');
             if(!$title || !$siteurl || !$sitestatus){
               alert('boş Alan Bırakmayınız','danger');
             }else{
               $up=$db->prepare("UPDATE ayarlar set 
               sitebaslik=:b,
               siteurl=:u,
               sitedurum=:du WHERE id=:id
               ");
             $result=  $up->execute([
                 ':b'=>$title,
                 ':u'=>$siteurl,
                 ':du'=>$sitestatus,
                 ':id'=>1
               ]);
               if($result){
                 alert('Genel Ayarlar Güncellendi','success');
                 go($_SERVER['HTTP_REFERER'],2);

               }else{
                 alert('Genel Ayarlar Güncellenemedi','danger'); 
               }
             }
           }

         

           
              ?>
            
            
            <div class="tile">
            <h3 class="tile-title">General Ayarlar </h3>
            <form method="POST">
            <div class="tile-body">
  
           




            <div class="form-group">
                  <label class="control-label">Site Başlık </label>
                  <input class="form-control" name="title"  value="<?php echo $arow->sitebaslik;?>" type="text" placeholder="Site Başlık ">
                </div>

                <div class="form-group">
                  <label class="control-label">Site Url </label>
                  <input class="form-control" name="url"  value="<?php echo $arow->siteurl;?>" type="text" placeholder="Site Başlık ">
                </div>


             
              
                <div class="form-group">
                  <label class="control-label">Site  Durum</label>
                  <select name="sitestatus" class="form-control" >
                    <option value="1" <?php echo $arow->sitedurum==1 ? 'selected':null?>>Aktif</option>
                    <option value="2" <?php echo $arow->sitedurum !==1 ? 'selected':null?>>Pasif</option>
                  </select>
                </div>

             

  

              
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" name="upp" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Kayıt  Güncelle </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo admin; ?>/index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Ana SAyfa </a>
            </div>
            </form>
          </div>
        </div>




              <?php
              
            break;
            case 'messageread':
              
                
              $code=get('id');
              if(!$code){
                 go(admin);
 
               }
               $message=$db->prepare("SELECT * from mesajlar WHERE id=:id");
               $message->execute([':id'=>$code]);
               if($message->rowCount()){
                $messagerow= $message->fetch(PDO::FETCH_OBJ);
                $up=$db->prepare("UPDATE mesajlar SET mesajdurum=:d  WHERE id=:id");
                $up->execute([':d'=>2,':id'=>$code]);
                $up
                ?>

<div class="tile">
          <h3 h3 class="tile-tile"><?php echo $messagerow->mesajisim; ?> adlı kişinin mesajı</h3>
         <div class="tile-body">
                <p> <b>İsim : <?php  echo $messagerow->mesajisim;?></b></p>
                <p> <b>Konu : <?php echo $messagerow->mesajkonu;?></b></p>
                <p> <b>Mesaj İçerik :  <?php echo $messagerow->mesajicerik;?></b></p>
                <p> <b>Mesaj Tarih : <?php echo dt($messagerow->mesajtarih);?></b></p>
                <p> <b>E Posta : </b><a href="mailto:<?php echo $messagerow->mesajposta;?>" target="_blank"><?php echo $messagerow->mesajposta;?></a></p>

        
               
              

</div>

</div>


              <div class="tile-footer">
                <a href="<?php echo admin;?>/oldmessage.php" class="btn btn-secondary"><i class="fa fa-fw fa-lg  fa-times-circle"></i>Listeye Dön</a>
              </div>
                <?php 
              }else{
                go(admin);
              }
              break;

            case 'messagedel':
                $code=get('id');
                if($code){
                  go(admin);
                }
                $query =$db->prepare("SELECT id FROM  mesajlar WHERE id=:b");
                $query->execute([':b'=>$code]);
                if($query->rowCount()){
                  $delete =$db->prepare("DELETE FROM mesajlar WHERE id=:b");
                  $result=$delete->execute([':b'=>$code]);
                  if($result){
                    alert('Mesaj Silindi','success');
                    go(admin.'/newmessage.php',2);
                  }else{
                    alert('Hata Oluştu','danger');
                  }
                }

              break;

            case 'bayiedit':
             $code=get('id');
              if(!$code){
                go(admin);
              }
              $query=$db->prepare("SELECT * from bayiler Where bayikod=:k");
              $query->execute([':k'=>$code]);
              if($query->rowCount()){
                $row =$query->fetch(PDO::FETCH_OBJ);
                if(isset($_POST['upp'])){
                  $bname=post('bname');
                  $bmail=post('mail');
                  $bpass=post('pass');
                  $bdrum=post('durum');
                  $btel=post('tel');
                  $bvn=post('bvn');
                  $bvd=post('bvd');
                  $bsite=post('site');
                  if(!$bname || !$bmail || !$btel || !$bvn || !$bvd || !$bdrum){
                    alert('Web Sitesi ve Şifre Alanı dışındakileri doldurmak zorunludur.','danger');

                  }else{
                   if (!filter_var($bmail,FILTER_VALIDATE_EMAIL)){
                      alert('Hatalı E-posta','danger');
                    }else{
                      $already=$db->prepare("SELECT bayikod,bayimail FROM bayiler WHERE bayimail=:m AND bayikod !=:k");
                      $already->execute([':m'=>$bmail,':k'=>$code]);
                      if($already->rowCount()){
                        alert('Bu E Posta adresi Sistemde kayıtlı ','danger');
                      }else{
                        if($_POST['pass']==""){
                            $up=$db->prepare("UPDATE bayiler SET 
                              bayiadi=:a,
                              bayimail=:m,
                              bayidurum=:b,
                              bayitel=:t,
                              bayivergino=:v,
                              bayivergidairesi=:d,
                              bayisite=:si,
                              bayisifre=:sif WHERE bayikod =:k

                            ");
                            $up->execute([':a'=>$bname,
                                          ':m'=>$bmail,
                                          ':b'=>$bdrum,
                                          ':t'=>$btel,
                                          ':v'=>$bvn,
                                          ':d'=>$bvd,
                                          ':si'=>$bsite,
                                          ':k'=>$code
                                          
                                          
                        ]);
                        }else{
                          $up=$db->prepare("UPDATE bayiler SET 
                          bayiadi=:a,
                          bayimail=:m,
                          bayidurum=:b,
                          bayitel=:t,
                          bayivergino=:v,
                          bayivergidairesi=:d,
                          bayisite=:si,
                          bayisifre=:sif  WHERE bayikod =:k

                        ");
                        $up->execute([':a'=>$bname,
                                      ':m'=>$bmail,
                                      ':b'=>$bdrum,
                                      ':t'=>$btel,
                                      ':v'=>$bvn,
                                      ':d'=>$bvd,
                                      ':si'=>$bsite,
                                      ':sif'=>sha1(md5($bpass)),
                                      ':k'=>$code
                                      
                    ]);
                        }
                        if($up){
                          alert('Bayi başarıyla  güncellendi','success');
                          go($_SERVER['HTTP_REFERER']);
                        }else{
                          alert('hata oluştu ','danger');
                        }
                      }
                    }
                  }
                }
               
                ?>

                  <div class="tile">
            <h3 class="tile-title"><?php echo $row->bayiadi."(".$code.")";?>Kişiyi Düzenliyorsunuz</h3>
            <form method="POST">
            <div class="tile-body">
  
           
            <div class="form-group">
                  <label class="control-label">Bayi Kodu</label>
                  <input class="form-control" name="bcode" value="<?php echo $row->bayikod;?>" type="text" placeholder="Bayi Adı ">
                </div>

                <div class="form-group">
                  <label class="control-label">Bayi Adı</label>
                  <input class="form-control" name="bname" value="<?php echo $row->bayiadi;?>" type="text" placeholder="Bayi Adı ">
                </div>
            
           

         
                <div class="form-group">
                  <label class="control-label">Bayi Mail</label>
                  <input class="form-control" value="<?php echo $row->bayimail;?>" name="mail" type="text" placeholder=" Bayi Mail">
                </div>
                
                <div class="form-group">
                  <label class="control-label">Bayi  Şifre</label>
                  <input class="form-control" value="<?php echo $row->bayisifre;?>" name="pass" type="password" placeholder=" Bayi Şifre">
                </div>
               
                <div class="form-group">
                  <label class="control-label">Bayi  Tel</label>
                  <input class="form-control" name="tel" value="<?php echo $row->bayitel;?>" type="text"  placeholder=" Bayi Durum">
                </div>
              
                <div class="form-group">
                  <label class="control-label">Bayi  Durum</label>
                  <select name="durum" class="form-control" >
                    <option value="1" <?php echo $row->bayidurum==1 ? 'selected':null?>>Aktif</option>
                   <option value="2"   <?php echo $row->bayidurum==2 ? 'selected':null?> >Pasif</option>
                  </select>
                </div>

                <div class="form-group">
                  <label class="control-label">Bayi  Vergi No:</label>
                  <input class="form-control" name="bvn" value="<?php echo $row->bayivergino;?>" type="text" placeholder=" Bayi Vergi No">
                </div>

                <div class="form-group">
                  <label class="control-label">Bayi  Vergi Dairesi:</label>
                  <input class="form-control" name="bvd" type="text" value="<?php echo $row->bayivergidairesi;?>" placeholder=" Bayi Vergi No">
                </div>

                <div class="form-group">
                  <label class="control-label">Bayi   Site:</label>
                  <input class="form-control" name="site" type="text" value="<?php echo $row->bayisite;?>" placeholder=" Bayi Site ">
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" name="upp" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Bayi Güncelle </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo admin; ?>/bayiler.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>İptal</a>
            </div>
            </form>
          </div>
        </div>

                <?php
              }else{
                go(admin);
              }

              break;
                 
              

                ?>


            <?php 
               
             


            case 'productsdel':

              $code=get('id');
              if(!$code){
                go(admin);
              }
              $query =$db ->prepare("SELECT id FROM urunler WHERE id=:c");
              $query->execute([":c"=>$code]);
              if($query->rowCount()){
                $delete=$db->prepare("DELETE FROM urunler WHERE id = :c");
                 $result= $delete->execute([':c'=>$code]);
               if($result){
                 alert('Ürün Silindi','success');
                 go(admin."/products.php",2);
               }else{
                 alert('Hata Oluştu','danger');
               }

              }else{
                go(admin);
              }

              break;

              case 'bayidel':
                  $code=get('id');
                  if(!$code){
                    go(admin);
                  }
                  $query =$db ->prepare("SELECT id FROM bayiler WHERE id=:b");
                  $query->execute([":b"=>$code]);
                  if($query->rowCount()){
                    $delete=$db->prepare("UPDATE bayiler SET bayidurum=:d WHERE id=:b ");
                   $result= $delete->execute([':d'=>2,':b'=>$code]);
                   if($result){
                     alert('Bayi Pasife Alındı','success');
                     go(admin."/bayiler.php",2);
                   }else{
                     alert('Hata Oluştu','danger');
                   }

                  }else{
                    go(admin);
                  }
                break;

            case 'newproduct':

              if(isset($_POST['add'])){
             
                $ad=post('ad');
                $fiyat=post('fiyat');
                $stok=post('stok');
                $ekleyen=post('ekleyen');
                if(!$ad || !$fiyat || !$stok || !$ekleyen){
                  alert('Tüm Alanları Doldurunuz.','danger');

                } else{
                  $add=$db->prepare("INSERT INTO urunler set 
                    urunbaslik=:k,
                    urunfiyat=:f,
                    urunstok=:s,
                    urunekleyen=:u
                  ");
                $result =  $add->execute([
                    ':k'=>$ad,
                    ':f'=>$fiyat,
                    ':s'=>$stok,
                    ':u'=>$ekleyen
                  ]);
                  if($result){
                    alert('Ürün Eklendi','success');
                    go(admin."/products.php",2);
                  }else{
                    alert('Hata Oluştu','danger');
                    print_r($add->errorInfo());
                  }
                }
              }
              ?>
  <div class="tile">
            <h3 class="tile-title">Ürüz Düzenle Form</h3>
            <form method="POST">
            <div class="tile-body">
  
                <div class="form-group">
                  <label class="control-label">Ürün Adı</label>
                  <input class="form-control" name="ad" type="text" placeholder="Ürün Adı ">
                </div>
            
           

                <div class="form-group">
                  <label class="control-label">Ürün Fiyat</label>
                  <input class="form-control" type="text" name="fiyat" placeholder="  Ürün Fiyatı">
                </div>
                <div class="form-group">
                  <label class="control-label">Ürün Stok</label>
                  <input class="form-control" name="stok" type="text" placeholder=" Ürün Stok">
                </div>
                
                <div class="form-group">
                  <label class="control-label">Ürün Ekleyen</label>
                  <input class="form-control" name="ekleyen" type="text" placeholder=" Ürün Ekleyen">
                </div>
               
               
              
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" name="add" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Ürün Ekle</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?php echo admin; ?>/products.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>İptal</a>
            </div>
            </form>
          </div>
        </div>
              <?php 
              break;
          }
        ?>
        
        
        <div class="clearix"></div>
      
      </div>
    </main>
    <?php require_once'inc/footer.php'?>