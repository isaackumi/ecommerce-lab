
<?php
  //start session
  session_start();
  require ('../controllers/productcontroller.php');

//  getOneBrand()
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
	        <ul>
	          <li class="active">
	           
                <li>
                    <a href="#../index.php">Home</a>
                </li>
                <li>
                    <a href="#addproduct.php">Add Produts</a>
                </li>
                <li>
                    <a href="#manage.php">Manage Products</a>
                </li>
                <li>
                    <a href="#addgallery.php">Gallery Upload</a>
                </li>
                <li>
                    <a href="#logout.php">Logout</a>
                </li>
	            </ul>
	          
	          
	          
	        

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>

                  <li class="nav-item">
                      <a class="nav-link btn" data-toggle="modal" data-target="#addBrandModal">Add Brand</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link btn" data-toggle="modal" data-target="#addCategoryModal">Add Category</a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" href="addproduct.php">Add Products</a>
                </li>
                <li class="nav-item">
<!--                    <a class="nav-link" href="manage.php">Manage Products</a>-->
                </li>
                <li class="nav-item">
<!--                    <a class="nav-link" href="addgallery.php">Gallery Upload</a>-->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

<!--          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBrandModal">-->
<!--              Launch demo modal-->
<!--          </button>-->

          <?php
          include ('../error/flash-message.php');
          ?>



<!--          category message end-->

          <!-- Modal -->


          <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div id="error_message" style="color: firebrick;"></div>
                          <form method="POST" action="../actions/add_brand.php" id="addBrandForm" onsubmit="return validateAddNewCategory();">
                              <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Category Name:</label>
                                  <input type="text" class="form-control" id="category_name" name="cat_name" required>
                              </div>
                              <div id="error_message" style="color: firebrick;"></div>
<!--                              <div class="form-group">-->
<!--                                  <label for="message-text" class="col-form-label">Message:</label>-->
<!--                                  <textarea class="form-control" id="message-text"></textarea>-->
<!--                              </div>-->
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit"  name="add_category" class="btn btn-primary">Submit</button>
                              </div>
                          </form>
                      </div>

                  </div>
              </div>
          </div>


          <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">

                          <form method="POST" action="../actions/add_brand.php" id="addBrandForm" onsubmit="return validateAddNewBrand();">
                              <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Brand Name:</label>
                                  <input type="text" class="form-control" id="brand_name" name="brand_name" required>
                                  <input type="hidden" class="form-control" id="brand_id" value="<?=isset($bid)?($bid):'' ?>" name="brand_id" required>
                              </div>
                              <div id="brand_error_message" style="color: firebrick;"></div>
                              <!--                              <div class="form-group">-->
                              <!--                                  <label for="message-text" class="col-form-label">Message:</label>-->
                              <!--                                  <textarea class="form-control" id="message-text"></textarea>-->
                              <!--                              </div>-->
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <input type="submit"  name="<?=isset($upname)? 'update_brand':'add_brand' ?>" value = "<?=isset($upname)?'Update Brand':'Add New Brand' ?>" class="btn btn-primary">
                              </div>
                          </form>
                      </div>

                  </div>
              </div>
          </div>


          <h2 class="mb-4"><?php if(!empty($_SESSION['admin_id'])){
                                echo ("Welcome"." ".$_SESSION["admin_name"]);
                                }else {
                                echo ""; 
                                } 
                            ?> </h2>
        <p>This is your dashboard you can do add products, and manage products added!!!!</p>

          <h5>All Brands</h5>
          <table class="table table-hover ">
              <thead>
              <tr>

                  <th>#</th>
                  <th>Brand</th>

                  <th>Action</th>

              </tr>
              </thead>
              <tbody>

              <?php



              $displaylist = getAllBrand();

              if ($displaylist) {
                  foreach ($displaylist as $value) {
                      $id = $value['brand_id'];
                      $name = $value['brand_name'];


                      $_SESSION['id']=$id;
                      $uid=$_SESSION['id'];

                      echo "<tr>";
                      echo "<td>$id</td>";
                      echo "<td>$name</td>";

                      echo "<td><a href='../actions/add_brand.php?delete_brand_id=$uid' class= 'btn btn-outline-danger delete_brand' >Delete</a>
        | <a href='brand.php?upid=$uid' id='addBrandModal' class= 'btn btn-outline-success update_brand' >Update</a>
  </td>";

                      echo "</tr>";


                  }
              }





              ?>
              </tbody>
          </table>

          <div class="mt-5">
              <h5>All Categories</h5>
              <table class="table table-hover ">
                  <thead>
                  <tr>

                      <th>#</th>
                      <th>Category</th>

                      <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>

                  <?php



                  $displaylist = getAllCategories();

                  if ($displaylist) {
                      foreach ($displaylist as $value) {
                          $id = $value['cat_id'];
                          $name = $value['cat_name'];


                          $_SESSION['id']=$id;
                          $uid=$_SESSION['id'];

                          echo "<tr>";
                          echo "<td>$id</td>";
                          echo "<td>$name</td>";

                          echo "<td><a href='../actions/add_brand.php?delete_category_id=$uid' class= 'btn btn-outline-danger delete_brand' >Delete</a>
        | <a href='update_category.php?upid=$uid' id='addBrandModal' class= 'btn btn-outline-success update_brand' >Update</a>
  </td>";

                          echo "</tr>";


                      }
                  }





                  ?>
                  </tbody>
              </table>
          </div>

      </div>

        </div>







    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/alert.js"></script>
    <script src="js/ajax.js"></script>

  </body>
</html>