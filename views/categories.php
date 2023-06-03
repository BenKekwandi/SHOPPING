<?php
require_once('header.php');
?>


<div class="container">
<div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>All Categories</h2>
                </div>
              </div>
              
            </div>
          </div>

        <div class="col-lg-12">
  <div class="row">
    <?php
    $counter = 0;
    foreach ($data as $key => $value) {
      if ($counter % 3 == 0 && $counter != 0) {
        echo '</div><div class="row">';
      }
      ?>
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
        <div class="card-style-1 mb-30">
          <div class="card-meta">
            
            <div class="image">
              <img src="assets/images/cards/code.jpg" alt="" />
            </div>
            <div class="text">
            
              <p class="text-sm text-medium">
                Posted by: <a href="#0">Jonathan</a>
              </p>
            </div>
          </div>
          <div class="card-image">
            <a href="#0">
              <img height=350 src="././uploads/categories/<?php echo $value['picture']; ?>" alt="" />
            </a>
          </div>
          <div class="card-content">
            <h4><a href="#0"><?php echo $value['name']; ?></a></h4>
            <p>
              <?php echo $value['description']; ?>
            </p>
          </div>
        </div>
      </div>
      <?php
      $counter++;
    }
    ?>
  </div>
</div>


<?php
require_once('footer.php');
?>