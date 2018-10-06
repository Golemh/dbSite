
<!DOCTYPE html>

<?php
  session_start();
  include 'connection.php';
  if (!isset($_SESSION['username'])):
    header("Location: http://localhost/Retailer/LoginPage/LoginPage.php");
  
 else:
;?>

<HTML>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="theme.css">
   </head>

<body>
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Ninja Retailors(NinRe)</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/Retailer/LoginPage/AdminPanel.html">
              <i class="fa d-inline fa-lg fa-bookmark-o"></i> Admin panel</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id=navbarDropdown role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa d-inline fa-lg fa-envelope-o"></i> Go to</a>
          
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/dbSite/Retailer/customers/index.php">Customers</a>
            <a class="dropdown-item" href="/dbSite/Retailer/Salesperson/index.php">Salesperson</a>
            <a class="dropdown-item" href="/dbSite/Retailer/Product/index.php">Product</a>
            <a class="dropdown-item" href="/dbSite/Retailer/Users/index.php">Users</a>
          </div>
          </li>
        </ul>
        <?php 
          if (isset($_SESSION['username'])) : ?>
        
          <a class="btn navbar-btn btn-primary ml-2 text-white" href="http://localhost/Retailer/LoginPage/logout.php">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Log out</a>
          <?php else : ?>
        <a class="btn navbar-btn btn-primary ml-2 text-white" href="http://localhost/Retailer/LoginPage/LoginPage.php">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Log in</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>
  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-4 text-center text-light">Products list</h1>
        </div>
      </div>
    </div>
  </div>
 
 <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
 
<!-- CRUD -->
<script src="CRUD.js"></script>

		
	 <?php

    $product_list = mysqli_query($mysqli, "SELECT * FROM product_13100");

    
    ?>

      <div id="Add-entry" style="text-align: right; padding: 5px">
        <button class="btn btn-primary btn-small" data-toggle="modal" data-target="#addModal"> Add
        </button>
      </div>
       

     <table id="DBTable" style="text-align: center;" class="table text-light">
        <thead>
             <tr">
                <th>pcode</th>
                <th>brand</th>
                <th>type</th>
                <th>shade</th>
                <th>size</th>
                <th>price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($product_list)) {
              $id = $row['pcode'];
                echo
                 "<tr>
          			<td>{$row['pcode']}</td>
          			<td>{$row['brand']}</td>
          			<td>{$row['type']}</td>
          			<td>{$row['shade']}</td>
          			<td>{$row['size']}</td>
          			<td>{$row['price']}</td>
                <td>
                  <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
                  <button  id=\"edit\" class=\"edit_class btn-primary\" data-toggle=\"modal\" data-target=\"#editModal\">Edit</button>
                  <button class=\"delete_class btn-primary\" value = '$id'  \>Delete</button>
                  </div> 
                </td>
        		</tr>";
            

            }
            ?>
        </tbody>
    </table>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add entry</h5>
        <button type="button" class="close" data-dismiss="modal">
            <span >×</span>
        </mybutton>
      </div>
      <div class="modal-body">
          
          <!-- Form -->
        <form >
          <div class="form-group">
            <label class="sr-only" for="brand">Brand</label>
            <input type="text" class="form-control" id="brand" placeholder="Brand">
          </div>

          <div class="form-group">
            <label class="sr-only" for="type">Type</label>
            <input type="text" class="form-control" id="type" placeholder="Type">
          </div>

          <div class="form-group">
            <label class="sr-only" for="shade">Shade</label>
            <input type="text" class="form-control" id="shade" placeholder="Shade">
          </div>

          <div class="form-group">
            <label class="sr-only" for="size">Size</label>
            <input type="text" class="form-control" id="size" placeholder="Size">
          </div>

          <div class="form-group">
            <label class="sr-only" for="price">Price</label>
            <input type="text" class="form-control" id="price" placeholder="Price">
          </div>
        </form>


      </div>
      <div class="modal-footer">
        <button type="submit" id="update" class="btn btn-default btn-primary">
        Ok</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit entry</h5>
        <button type="button" class="close" data-dismiss="modal">
            <span >×</span>
      </div>
      <div class="modal-body">
          
          <!-- Form -->
        <form >
          <div class="form-group">
            <label class="sr-only" for="brand">Brand</label>
            <input type="text" class="form-control" id="ebrand" placeholder="Brand">
          </div>

          <div class="form-group">
            <label class="sr-only" for="type">Type</label>
            <input type="text" class="form-control" id="etype" placeholder="Type">
          </div>

          <div class="form-group">
            <label class="sr-only" for="shade">Shade</label>
            <input type="text" class="form-control" id="eshade" placeholder="Shade">
          </div>

          <div class="form-group">
            <label class="sr-only" for="size">Size</label>
            <input type="text" class="form-control" id="esize" placeholder="Size">
          </div>

          <div class="form-group">
            <label class="sr-only" for="price">Price</label>
            <input type="text" class="form-control" id="eprice" placeholder="Price">
          </div>
        </form>


      </div>
      <div class="modal-footer">
        <button type="submit" id="eUpdate" class="btn btn-default btn-primary">
        Ok</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- 
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
<?php endif; ?>
