<?php

$db_connection= new mysqli('localhost', 'root', '' , 'sessions_homework');
if($db_connection->connect_error){

    die('no DB connecion');
}

if(isset($_POST['insert_car'])){
    $plate=$_POST['plate'];
    $model=$_POST['car_model'];
    $color=$_POST['car_color'];
    $price=$_POST['price'];

    $image_file=$_FILES['car_img'];
    $tmp_name=$image_file['tmp_name'];
    $img_name=$image_file['name'];
    
    move_uploaded_file($tmp_name, 'storage/cars_pic/'.$img_name);

    $query = "INSERT INTO cars (plate, model, color, price, image) VALUES($plate, '$model' , '$color' ,$price, '$img_name')";
    $db_connection->query($query);
    header('location: home.php');
}

else if(isset($_POST['update_cars'])){
    $car_plate=$_POST['update_cars'];
    $plate=$_POST['plate'];
    $model=$_POST['car_model'];
    $color=$_POST['car_color'];
    $price=$_POST['price'];

    if (isset($FILES['car_img'])) {
    $image_file=$_FILES['car_img'];
    $tmp_name=$image_file['tmp_name'];
    $img_name=$image_file['name'];

    move_uploaded_file($tmp_name, 'storage/cars_pic/'.$img_name);
    }
    $query = "UPDATE cars SET plate= '$plate' , model='$model', color='$color', price ='$price', image='$img_name' WHERE car_plate=$car_plate";
    $db_connection->query($query);
    header('location: home.php');
}

elseif (isset($_GET['delete_car'])) {
    $car_plate= $_GET['delete_car'];

    $image_car=" SELECT image FROM cars WHERE plate=$car_plate";
    $record = $db_connection->query($image_car);
    $car_data= $record->fetch_assoc();

    unlink ('storage/car_pic/'.$car_data['image_car']);

    $query= " DELETE FROM cars WHERE plate=$car_plate";
    $db_connection->query($query);
    header('location:home.php');
}