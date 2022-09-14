<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

  
  form{
    width: 200px;
    height: 300px;
    padding: 20px;
    margin-left:auto;
    margin-right:auto;
    border: 4px solid pink;
    border-radius: 20px;
    background: linear-gradient( 100deg, lightblue 30%, rgba(0,0,0,0) 30%), url('6.jpg');
  }
  input{
    padding: 10px;
    color: purple;
    border:1px solid pink;
    border-radius: 20px;
    font-family:cursive;
  }
 label{
    color:purple;
    font-family: cursive;
   

 }
 button{
  cursor: pointer;
  font-family: cursive;
  padding: 10px;
    color: purple;
    border:1px solid pink;
    border-radius: 10px;
  
 }
  
</style>



<body>
    <form action="home.php" method="post">
      <label  > <b> Name </b></label> 
      <input type="text" name="name" placeholder="Enter Name">
      <br>
      <br>
      <label > <b> Email </b></label>
      <input type="email" name="email" placeholder="Enter Email">
      <br>
      <br>
      <label > <b>Password </b></label>
      <input type="password" name="pass" placeholder="Enter Password">
      <br>
      <br>
      <button>login</button>



    </form>
</body>
</html>







/*($cars_record=null;
  if(isset($_GET[' car_plate'])){
    $plate=$_GET[' car_plate'];
    $car_query="SELECT * FROM cars WHERE plate= ${plate}";
    $records= $db_connection->query($car_query);
    
    //var_dump($cars_record);
  }*/