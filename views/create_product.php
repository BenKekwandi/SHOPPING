<?php

require_once('header.php');

?>

    <div class="container-fluid">
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Create A Product</h2>
                </div>
              </div>
              
            </div>
          </div>

        <div class="col-lg-12">

            <form method="post" action="" enctype="multipart/form-data">
                <div class="card-style mb-30">
                    <h6 class="mb-25">New Product</h6>
                    <div class="input-style-1">
                        <label>Product Name</label>
                        <input type="text" name="name" placeholder="Product Name" />
                    </div>
                    <div class="input-style-2">
                        <label>Product Category</label>
                        <select name="category" id="category" class="form-select">
                           
                        </select>
                    </div>
                    <div class="input-style-1">
                        <label>Product Description</label>
                        <input type="text" name="description" placeholder="Product Description" />
                    </div>
                    <div class="input-style-3">
                        <label>Product Picture</label>
                        <input type="file" name="picture"/>
                    </div>

                    <div class="input-style-3 col-md-3">
                        <input type="submit" name="Submit" class="btn btn-success" placeholder="Picture" />
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script src='././assets/scripts/create_product.js'></script>
<?php

require_once('footer.php');

?>