
  <!DOCTYPE html>

<?php
  session_start();
  include '../connection.php';
  if (!isset($_SESSION['username'])):
    header("Location: ../LoginPage/LoginPage.php");
  
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
              <a class="nav-link" href="../LoginPage/AdminPanel.html">
                <i class="fa d-inline fa-lg fa-bookmark-o"></i> Admin panel</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id=navbarDropdown role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa d-inline fa-lg fa-envelope-o"></i> Go to</a>
            
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../customers/index.php">Customers</a>
            <a class="dropdown-item" href="../Salesperson/index.php">Salesperson</a>
            <a class="dropdown-item" href="../product/index.php">Product</a>
            <a class="dropdown-item" href="../Users/index.php">Users</a>
            </div>
            </li>
          </ul>
          <?php 
          if (isset($_SESSION['username'])) : ?>
        
          <a class="btn navbar-btn btn-primary ml-2 text-white" href="../LoginPage/logout.php">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Log out</a>
          <?php else : ?>
        <a class="btn navbar-btn btn-primary ml-2 text-white" href="../LoginPage/LoginPage.php">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Log in</a>
        <?php endif; ?>
        </div>
      </div>
    </nav>
    <div class="py-2">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="display-4 text-center text-light">Users list</h1>
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

      $users_list = mysqli_query($mysqli, "SELECT * FROM users_13100");

      
      ?>

        <div id="Add-entry" style="text-align: right; padding: 5px">
          <button class="btn btn-primary btn-small" data-toggle="modal" data-target="#addModal"> Add
          </button>
        </div>
         

       <table id="DBTable" style="text-align: center;" class="table text-light">
          <thead>
               <tr">
                  <th>User ID</th>
                  <!-- <th>Password</th> -->
                  <th>Active</th>
                  <th>Saleperson ID</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
            <!-- <td>{$row['sid']}</td> -->
              <?php
              // <td>{$row['password']}</td>
              while ($row = mysqli_fetch_assoc($users_list)) {
                $id = $row['uid'];
                $sid = $row['sid'];
                $name = mysqli_query($mysqli, "SELECT name FROM salesperson_13100 where sid='$sid'");
                $salesperson_name = mysqli_fetch_assoc($name)['name'];
                
                if ($row['active'] == 1) 
                  $active = "yes";
                else $active = "no";
                

                  echo
                   "<tr>
            			<td>{$row['uid']}</td>
            			
            			<td>".$active."</td>
            			
                  <td>{$salesperson_name}</td>
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
              <label class="sr-only" for="uid">User ID</label>
              <input type="text" class="form-control" id="uid" placeholder="User ID">
            </div>

            <div class="form-group">
              <label class="sr-only" for="password">Password</label>
              <input type="text" class="form-control" id="password" placeholder="Password">
            </div>

            <div class="form-group">
            <?php 
            $salesperson_list = mysqli_query($mysqli, "SELECT name, sid FROM salesperson_13100");
            ?>
            <SELECT class="form-control" name="Salesperson" id="sid" onchange="GetNameId">
              <?php 
                while ($row =  mysqli_fetch_assoc($salesperson_list)) {
                $id = $row['sid'];
                echo '<option nameid="'.$id.'">'.$row['name'].'</option>';
          }?>
          </SELECT> 
          </div>
  

            <div class="form-check">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id ="active" value="1">
                Active
              </label>
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
              <label class="sr-only" for="uid">User ID</label>
              <input type="text" class="form-control" id="euid" placeholder="User ID">
            </div>

            <div class="form-group">
              <label class="sr-only" for="password">Password</label>
              <input type="text" class="form-control" id="epassword" placeholder="Password">
            </div>

          <div class="form-group">
            <?php 
            $salesperson_list = mysqli_query($mysqli, "SELECT name, sid FROM salesperson_13100");
            ?>
            <SELECT class="form-control" name="Salesperson" id="sid" onchange="GetNameId">
              <?php 
                while ($row =  mysqli_fetch_assoc($salesperson_list)) {
                $id = $row['sid'];
                echo '<option nameid="'.$id.'">'.$row['name'].'</option>';
          }?>
          </SELECT> 
          </div>

            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id ="active" value="1">
                Active
              </label>
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