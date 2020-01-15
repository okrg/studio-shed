<section id="sub-menu">
    <div class="container">
        <nav class="navbar">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle btn-custom" data-toggle="collapse" data-target="#myNavsub">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
            </div>
             <div class="collapse navbar-collapse" id="myNavsub">
                 <?php wp_nav_menu(array('menu' => 'Product Menu', 'container' => '', 'menu_class' => 'nav navbar-nav')); ?>
            </div>
        </nav>
    </div>
</section>