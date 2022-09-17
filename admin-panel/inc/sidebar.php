<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name">Hoşgeldiniz,<?php echo $aname;?></p>

        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item " href="<?php echo admin; ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Ana Sayfa</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Bayiler</span><i class="treeview-indicator fa fa-angle-right"></i></a>

        <ul class="treeview-menu">
           
         
           <li>
             <a class="treeview-item" href="<?php echo admin?>/bayiler.php "><i class="icon fa fa-circle-o"></i> Bayileri Listele </a>
           </li>
           <li>
             <a class="treeview-item" href="<?php istoc('bayiedit');?>"><i class="icon fa fa-circle-o"></i> Bayi Düzenle </a>
           </li>
           <li>
             <a class="treeview-item" href="<?php istoc('bayidel');?>"><i class="icon fa fa-circle-o"></i> Bayi Sil </a>
           </li>
         </ul>


        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-gift"></i><span class="app-menu__label">Ürünler</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
           
         
            <li>
              <a class="treeview-item" href="<?php echo admin?>/products.php "><i class="icon fa fa-circle-o"></i> Ürünler Listesi</a>
            </li>
            <li>
              <a class="treeview-item" href="<?php istoc('newproduct');?>"><i class="icon fa fa-circle-o"></i> Ürün Ekle </a>
            </li>
            <li>
              <a class="treeview-item" href="<?php istoc('productsdel');?>"><i class="icon fa fa-circle-o"></i> Ürün Sil </a>
            </li>
          </ul>
          </li>  
      
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Ayarlar</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
           
         
            <li>
              <a class="treeview-item" href="<?php istoc('general')?>"><i class="icon fa fa-circle-o"></i> Genel Ayarlar </a>
            </li>           
            <li>
              <a class="treeview-item" href="<?php istoc('contact')?>"><i class="icon fa fa-circle-o"></i> İletişim Ayarlar </a>
            </li>
          </ul>
          </li>  

          <ul class="app-menu">
   
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Mesajlar</span><i class="treeview-indicator fa fa-angle-right"></i></a>

        <ul class="treeview-menu">
           
         
           <li>
             <a class="treeview-item" href="<?php echo admin?>/newmessage.php "><i class="icon fa fa-circle-o"></i> Yeni  Mesahları  Listele </a>
           </li>
           <li>
             <a class="treeview-item" href="<?php echo admin?>/oldmessage.php "><i class="icon fa fa-circle-o"></i> Eski  Listele </a>
           </li>
          
         </ul>
      </ul>
      
    </aside>