<?php

echo "<h2> welcome Dear user</h2>";
 $db_connection= new mysqli('localhost', 'root', '' , 'sessions_homework');
 //$query= 'INSERT INTO cars VALUES (" ", "HILUX", " White", "127689")';
 //$query= 'INSERT INTO cars VALUES ("56784 ", "corolla", " White", "9689")';
 $query = "SELECT * FROM cars";
  $result=$db_connection->query($query);
  $products= $result->fetch_all( MYSQLI_ASSOC);
  //var_dump($products);
?>


<?php
// $cars_record=null;
// if(isset($_GET['$car_plate'])){
//   $plate=$_GET['$car_plate'];
//   $query = "SELECT * FROM  cars WHERE plate= ${plate}";
//    $records=$db_connection->query($query);
//   $cars_record=$records->fetch_assoc();
// }
if(isset($_GET['car_plate'])){
  $plate=$_GET['car_plate'];
  // var_dump($plate);
  // exit;
  $query = "SELECT * FROM cars WHERE plate= ${plate}";
   $records=$db_connection->query($query);
  $cars_record=$records->fetch_assoc();
  // var_dump($cars_record);
  // exit;
}

?>

<form action="products_page.php" method="post"  enctype="multipart/form-data">
  <input type="hidden" name="car_plate" value ="<?php echo isset($cars_record) ? $cars_record['plate']: ''?>">
<label >plate</label>
<input type="number" name="plate" value ="<?php echo isset($cars_record) ? $cars_record['plate']: ''?>">
<label > model</label> 
<input type="text" name="car_model"  value ="<?php echo isset($cars_record) ? $cars_record['model']: ''?>">

<label > color</label>
<input type="text" name="car_color" value ="<?php echo isset($cars_record) ? $cars_record['color']: ''?>">

<label > price</label>
<input type="number" name="price" value ="<?php echo isset($cars_record) ? $cars_record['price']: ''?>">



<?php
        if(isset($_GET['car_plate'])){
            echo '
            <img width="50px" src="storage/cars_pic/'.$cars_record['image'].'">
            ';
        }
        ?>
<br>
<input type="hidden" name="old_img" value ="<?php echo isset($cars_record) ? $cars_record['image']: ''?>">
<label> image</label>
<input type="file" name ="car_img" >

<button type='submit' name ="<?php if(isset($cars_record)) echo 'update_cars'; else echo 'insert_car'; ?>">add</button>
</form>


  

<table>
<thead>
<tr>
  <th> plate</th>
  <th> model</th>
  <th> color</th>
  <th> price</th>
  <th> image</th>
  <th> Action</th>
</tr>
</thead>

<tbody>
  <?php 
   foreach($products as $cars){
    echo "<tr>
         <td> ".$cars['plate']."</td>
         <td> ".$cars['model']."</td>
         <td> ".$cars['color']."</td>
         <td> ".$cars['price']."</td>
         <td> 
         <img src='storage/cars_pic/{$cars['image']}'/>
         </td>
         <td> 
              <a href= 'home.php?car_plate={$cars['plate']}' >Edit</a>
             <a href='products_page.php?delete_car={$cars['plate']}'>Delete</a>
         </tr>";
  
  }?>
</tbody>
</table>











<style>
  table{
    
   margin-left:800px;
    border-radius: 10px;
    border:4px solid black;
  }
  th{
    padding:9px;
    margin:5px;
    border-radius: 5px;
    border: 1px solid blue;
  }
  td{
    padding:9px;
    margin:3px;
    border-radius: 5px;
    border: 1px solid blue;

  }
  td img{
    width: 50px
  }
  form{
    background-color:lightblue;
    width: 250px;
    height: 400px;
    padding: 20px;
    margin-right:auto;
    margin-bottom:400px;
    border: 4px solid pink;
    border-radius: 20px;
  }
  input{
    padding: 9px;
    color: purple;
    border:1px solid pink;
    border-radius: 20px;
    font-family:cursive;
  }
  button{
    background-color:white;
   cursor: pointer;
    padding: 10px;
    color: black;
    border:1px solid pink;
    border-radius: 10px;
  }
  body{
    display-content:block;
  }

</style>






