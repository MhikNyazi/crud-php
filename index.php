<?php
//connecting database
include('config.php');


if(isset($_POST['btn_sub']))
{
  

    if(isset($_POST['id']) && $_POST['id'])
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $phone = $_POST['phone'];
    
    
        $qry = "update users set name = '$name', fname = '$fname', phone = '$phone' where id='$id' ";
        $result = mysqli_query($cn,$qry);
       
    
        if($result)
        {
            echo "";
        }
        else{
            echo "something wronge with code";
        }
    }
    else{

    
//inserting data into database
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $phone = $_POST['phone'];

   
    $qry = "Insert into users(name,fname,phone) values('$name','$fname',' $phone')";
    $result = mysqli_query($cn,$qry);
     
    if(isset($result))
    {
        echo "data inserted";
    }
    else{
        echo "something wronge with code";
    }}
}
//displaying data from database
$qry = "select * from users";
$result = mysqli_query($cn,$qry);

//editing and updating data in database

if(isset($_GET['edit']))
{

    $qry = "select * from users where id=".$_GET['edit'];
    $result = mysqli_query($cn,$qry);
    $data =  mysqli_fetch_row($result);
    $qry = "select * from users";
    $result = mysqli_query($cn,$qry);

   
}


?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">




<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=number] 
{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>



<div class="container">


  <form action="" method="post">

  <input type="hidden" name="id" value="<?php if(isset($data)) { echo $data[0];}?>"> 
 
    <div class="row">
      <div class="col-25">
        <label for="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="Your Name.." value="<?php if(isset($data)) { echo $data[1];}?>" required>
      </div>
    </div>





    <div class="row">
      <div class="col-25">
        <label for="fname">Father Name</label>
      </div>
         <div class="col-75">
        <input type="text" id="fname" name="fname" placeholder="Your Father Name.." value="<?php if(isset($data)) { echo $data[2];}?>" required>
      </div>
    </div>






    <div class="row">
      <div class="col-25">
        <label for="phone">Your Number</label>
      </div>
      <div class="col-75">
        <input type="number" id="phone" name="phone" placeholder="Your Phone Number.." value="<?php if(isset($data)) { echo $data[3];}?>">
      </div>
    </div>




   
    <div class="row">
      <input type="submit" name="btn_sub">
    </div>




<!--displaying data in database-->

    <div class="row">
    <div class="col-md-12">
    <table class="table">
    <tr>
         <th>SR NO</th>
         <th>Name</th>
         <th>Father Name</th>
         <th>Phone Number</th>
    </tr>
    <?php
       while($row = mysqli_fetch_array($result))
       {
    ?>
    <tr>

    <td><?php echo $row['id'] ?> </td>
    <td><?php echo $row['name'] ?> </td>
    <td><?php echo $row['fname'] ?> </td>
    <td><?php echo $row['phone'] ?> </td>
   <td><a href="?edit=<?php echo $row['id']; ?>">Edit</a></td>    <!--editing data in database-->
   <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>  <!--deleting data in database-->
    
    
    </tr><?php
}

?>
    </table>
    
    </div>
    
    </div>





  </form>
</div>

</body>
</html>


