<?php
require('connection.php');
if (isset($_POST['add'])) {
    $targetDir = "./img/"; 
    $dname = $_POST['destination'];
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $place = $_POST['place'];
    $days = $_POST['days'];
    $image1 = $_FILES['image1']['name'];
    $name1 = $_POST['name1'];
    $description1 = $_POST['description1'];
    $image2 = $_FILES['image2']['name'];
    $name2 = $_POST['name2'];
    $description2 = $_POST['description2'];
    $image3 = $_FILES['image3']['name'];
    $name3 = $_POST['name3'];
    $description3 = $_POST['description3'];
    $image4 = $_FILES['image4']['name'];
    $name4 = $_POST['name4'];
    $description4 = $_POST['description4'];
    $image5 = $_FILES['image5']['name'];
    $name5 = $_POST['name5'];
    $description5 = $_POST['description5'];
    $image6 = $_FILES['image6']['name'];
    $name6 = $_POST['name6'];
    $description6 = $_POST['description6'];

    $day1 = $_POST['day1'];
    $day2 = $_POST['day2'];
    $day3 = $_POST['day3'];
    $day4 = $_POST['day4'];
    $day5 = $_POST['day5'];
    $day6 = $_POST['day6'];
    $day7 = $_POST['day7'];
    $day8 = $_POST['day8'];
    $day9 = $_POST['day9'];
    $day10 = $_POST['day10'];
    $day11 = $_POST['day11'];
    $day12 = $_POST['day12'];

    $image7 = $_FILES['image7']['name'];

    if (!empty($image7)) {
        $fileName7 = basename($_FILES['image7']['name']);
        $targetFilePath7 = $targetDir . $fileName7;
        if (move_uploaded_file($_FILES["image7"]["tmp_name"], $targetFilePath7)) {

            $update_filename7 = $fileName7;
        }
    }

    $name7 = $_POST['name7'];
    $desc7 = $_POST['desc7'];

    $image8 = $_FILES['image8']['name'];

    if (!empty($image8)) {
        $fileName8 = basename($_FILES['image8']['name']);
        $targetFilePath8 = $targetDir . $fileName8;
        if (move_uploaded_file($_FILES["image8"]["tmp_name"], $targetFilePath8)) {

            $update_filename8 = $fileName8;
        }
    }

    $name8 = $_POST['name8'];
    $desc8 = $_POST['desc8'];

    $image9 = $_FILES['image9']['name'];

    if (!empty($image9)) {
        $fileName9 = basename($_FILES['image9']['name']);
        $targetFilePath9 = $targetDir . $fileName9;
        if (move_uploaded_file($_FILES["image9"]["tmp_name"], $targetFilePath9)) {

            $update_filename9 = $fileName9;
        }
    }

    $name9 = $_POST['name9'];
    $desc9 = $_POST['desc9'];


    $image10 = $_FILES['image10']['name'];

    if (!empty($image10)) {
        $fileName10 = basename($_FILES['image10']['name']);
        $targetFilePath10 = $targetDir . $fileName10;
        if (move_uploaded_file($_FILES["image10"]["tmp_name"], $targetFilePath10)) {

            $update_filename10 = $fileName10;
        }
    }

    $name10 = $_POST['name10'];
    $desc10 = $_POST['desc10'];


    $image11 = $_FILES['image11']['name'];

    if (!empty($image11)) {
        $fileName11 = basename($_FILES['image11']['name']);
        $targetFilePath11 = $targetDir . $fileName11;
        if (move_uploaded_file($_FILES["image11"]["tmp_name"], $targetFilePath11)) {

            $update_filename11 = $fileName11;
        }
    }

    $name11 = $_POST['name11'];
    $desc11 = $_POST['desc11'];


    $image12 = $_FILES['image12']['name'];

    if (!empty($image12)) {
        $fileName12 = basename($_FILES['image12']['name']);
        $targetFilePath12 = $targetDir . $fileName12;
        if (move_uploaded_file($_FILES["image12"]["tmp_name"], $targetFilePath12)) {

            $update_filename12 = $fileName12;
        }
    }

    $name12 = $_POST['name12'];
    $desc12 = $_POST['desc12'];


 $sql = "INSERT INTO add_package (dname, pname, price, image, place, days, image1, name1, description1, image2, name2, description2, image3, name3, description3, image4, name4, description4, image5, name5, description5, image6, name6, description6, image7, name7, description7, image8, name8, description8, image9, name9, description9, image10, name10, description10, image11, name11, description11, image12, name12, description12,day1,day2,day3,day4,day5,day6,day7,day8,day9,day10,day11,day12)
VALUES ('$dname', '$pname', '$price', '$image', '$place', '$days', '$image1', '$name1', '$description1', '$image2', '$name2', '$description2', '$image3', '$name3', '$description3', '$image4', '$name4', '$description4', '$image5', '$name5', '$description5', '$image6', '$name6', '$description6', '$image7', '$name7', '$desc7', '$image8', '$name8', '$desc8', '$image9', '$name9', '$desc9', '$image10', '$name10', '$desc10', '$image11', '$name11', '$desc11', '$image12', '$name12', '$desc12','$day1','$day2','$day3','$day4','$day5','$day6','$day7','$day8','$day9','$day10','$day11','$day12')";

if ($conn->query($sql) === TRUE) {
  echo  'New record created successfully';
  header("Location: admin-edit-pakage.php");
} else {
  echo 'Error: ' . $sql . '<br>' . $conn->error;
}

}
