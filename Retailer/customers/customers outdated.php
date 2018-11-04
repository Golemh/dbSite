<!DOCTYPE html>

<?php include 'connection.php';?>


<HTML>
<head>
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 -->
 <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
 

 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>



 



<!-- bootstrap -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- CRUD -->
<script src="CRUD.js"></script>

<link rel="stylesheet" type="text/css" href="buttons.css">

<style>
	table {
		table-layout: fixed;
	}
	table, td {
    	border-collapse: collapse;
		padding: 10px;
		font-size: 15

	}

	th {
		padding-left: 20px;
		padding-right: 20px;
		padding-bottom: 5px;
		padding-top: 7px;
	}

	
</style>

	<title>Customers' info</title>

</head>

 <body style="background-image: url(backgrounds-blank-blue-953214.jpg);">
		<header style="text-align: center;color: #f5f5f5"> 
			<h1>Customers' data</h1>
		</header>
	
	 <?php

    $customer_list = mysqli_query($mysqli, "SELECT * FROM customers_13100");

    
    ?>

      <div id="Add-entry" style="text-align: right; padding: 5px">
        <button class="btn btn-primary btn-small" data-toggle="modal" data-target="#addModal"> Add
        </button>
      </div>
       

     <table id="DBTable" style="text-align: center;" width="100%">
        <thead>
             <tr style="background-color: #4CB5F5; border-bottom: solid; width: 200px">
                <th>Customer ID</th>
                <th>Shop Name</th>
                <th>Customer Name</th>
                <th>Contact no.</th>
                <th>Address</th>
                <th>Area</th>
                <th>Geographic Coordinates</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($customer_list)) {
              $id = $row['CID'];
                echo
                 "<tr style=\"background-color: #A1D6E2;\">
          			<td>{$row['CID']}</td>
          			<td>{$row['SNAME']}</td>
          			<td>{$row['CNAME']}</td>
          			<td>{$row['CNO']}</td>
          			<td>{$row['ADDRESS']}</td>
          			<td>{$row['AREA']}</td>
          			<td>{$row['GC']}</td>
                <td>// Assume $db is a PDO object
                    $query = $db->query("YOUR QUERY HERE"); // Run your query

                    echo '<select name="DROP DOWN NAME">'; // Open your drop down box

                    // Loop through the query results, outputing the options one by one
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                       echo '<option value="'.$row['something'].'">'.$row['something'].'</option>';
                    }

                    echo '</select>';// Close your drop down box</td>
                <td>
                  <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
                  <button type=\"button\" id=\"edit\" class=\"btn btn-default edit_class\" data-toggle=\"modal\" data-target=\"#editModal\">Edit</button>
                  <button class=\"delete_class\" value = '$id' type=\"button\" class=\"btn btn-default\">Delete</button>
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
        <mybutton type="button" class="close btn-small" data-dismiss="modal" aria-label="Close" style="">
          <span aria-hidden="true">&times;</span>
        </mybutton>
      </div>
      <div class="modal-body">
          
          <!-- Form -->
        <form >
          <div class="form-group">
            <label class="sr-only" for="CID">Customer ID</label>
            <input type="email" class="form-control" id="CID" placeholder="Customer ID">
          </div>

          <div class="form-group">
            <label class="sr-only" for="SNAME">Shop name</label>
            <input type="text" class="form-control" id="SNAME" placeholder="Shop name">
          </div>

          <div class="form-group">
            <label class="sr-only" for="CNAME">Customer name</label>
            <input type="text" class="form-control" id="CNAME" placeholder="Customer name">
          </div>

          <div class="form-group">
            <label class="sr-only" for="CNO">Contact number</label>
            <input type="text" class="form-control" id="CNO" placeholder="Contact number">
          </div>

          <div class="form-group">
            <label class="sr-only" for="Address">Address</label>
            <input type="text" class="form-control" id="Address" placeholder="Address">
          </div>

          <div class="form-group">
            <label class="sr-only" for="Area">Area</label>
            <input type="text" class="form-control" id="Area" placeholder="Area">
          </div>

          <div class="form-group">
            <label class="sr-only" for="GC">Geographic coordinates</label>
            <input type="text" class="form-control" id="GC" placeholder="Geographic Coordinates">
          </div>
        </form>


      </div>
      <div class="modal-footer">
        <button type="submit" id="update" class="btn btn-default btn-secondary">
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
        <mybutton type="button" class="close btn-small" data-dismiss="modal" aria-label="Close" style="">
          <span aria-hidden="true">&times;</span>
        </mybutton>
      </div>
      <div class="modal-body">
          
          <!-- Form -->
        <form >
          <div class="form-group">
            <label class="sr-only" for="CID">Customer ID</label>
            <input type="email" class="form-control" id="eCID" placeholder="Customer ID">
          </div>

          <div class="form-group">
            <label class="sr-only" for="SNAME">Shop name</label>
            <input type="text" class="form-control" id="eSNAME" placeholder="Shop name">
          </div>

          <div class="form-group">
            <label class="sr-only" for="CNAME">Customer name</label>
            <input type="text" class="form-control" id="eCNAME" placeholder="Customer name">
          </div>

          <div class="form-group">
            <label class="sr-only" for="CNO">Contact number</label>
            <input type="text" class="form-control" id="eCNO" placeholder="Contact number">
          </div>

          <div class="form-group">
            <label class="sr-only" for="Address">Address</label>
            <input type="text" class="form-control" id="eAddress" placeholder="Address">
          </div>

          <div class="form-group">
            <label class="sr-only" for="Area">Area</label>
            <input type="text" class="form-control" id="eArea" placeholder="Area">
          </div>

          <div class="form-group">
            <label class="sr-only" for="GC">Geographic coordinates</label>
            <input type="text" class="form-control" id="eGC" placeholder="Geographic Coordinates">
          </div>
        </form>


      </div>
      <div class="modal-footer">
        <button type="submit" id="eUpdate" class="btn btn-default btn-secondary">
        Ok</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</body>
