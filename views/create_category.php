<?php

require_once('header.php');

?>

<div class="container-fluid">
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Create A Category</h2>
                </div>
              </div>
              
            </div>
          </div>

        <div class="col-lg-12">

            <form method="post" action="" enctype="multipart/form-data">
                <div class="card-style mb-30">
                    <h6 class="mb-25">New Category</h6>
                    <div class="input-style-1">
                        <label>Category Name</label>
                        <input type="text" name="name" placeholder="Category Name" />
                    </div>
                    <div class="input-style-2">
                        <label>Category Description</label>
                        <input type="text" name="description" placeholder="Description" />
                    </div>
                    <div class="input-style-3">
                        <label>Category Picture</label>
                        <input type="file" name="picture" placeholder="Picture" />
                    </div>
                    <div class="input-style-3 col-md-3">
                        <input type="submit" name="Submit" class="btn btn-success" placeholder="Picture" />
                    </div>
                </div>
            </form>
                
             
        </div>

    </div>


<?php

require_once('footer.php');

?>