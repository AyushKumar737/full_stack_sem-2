<?php
include('connection.php');
if (isset($_POST['update'])) {
    $post_id = $_POST['post_id'];

    $dname = $_POST['destination'];
    $targetDir = "./img/"; 


    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $old_filename = $_POST['old_image'];
    $image = $_FILES['image']['name'];
    $targetDir = "./img/"; 
    if(!empty($image))
    {
            $fileName = basename($_FILES['image']['name']); 
            $targetFilePath = $targetDir . $fileName; 
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){ 
                
                $update_filename =$fileName; 
            }
        
    }else {
        $update_filename = $old_filename;
    }

    $place = $_POST['place'];
    $days = $_POST['days'];
    $old_filename1 = $_POST['old_image1'];
    $image1 = $_FILES['image1']['name'];
    if(!empty($image1))
    {
            $fileName2 = basename($_FILES['image1']['name']); 
            $targetFilePath2 = $targetDir . $fileName2; 
            if(move_uploaded_file($_FILES["image1"]["tmp_name"], $targetFilePath2)){ 
                
                $update_filename1 = $fileName2; 
            }
        
    }else {
        $update_filename1 = $old_filename1;
    }
    $name1 = $_POST['name1'];
    $desc1 = $_POST['desc1'];
    $old_filename2 = $_POST['old_image2'];
    $image2 = $_FILES['image2']['name'];
    if(!empty($image2))
    {
            $fileName3 = basename($_FILES['image2']['name']); 
            $targetFilePath3 = $targetDir . $fileName3; 
            if(move_uploaded_file($_FILES["image2"]["tmp_name"], $targetFilePath3)){ 
                
                $update_filename2 = $fileName3; 
            }
        
    }else {
        $update_filename2 = $old_filename2;
    }
    $name2 = $_POST['name2'];
    $desc2 = $_POST['desc2'];
    $old_filename3 = $_POST['old_image3'];
    $image3 = $_FILES['image3']['name'];
     if(!empty($image3))
    {
            $fileName4 = basename($_FILES['image3']['name']); 
            $targetFilePath4 = $targetDir . $fileName4; 
            if(move_uploaded_file($_FILES["image3"]["tmp_name"], $targetFilePath4)){ 
                
                $update_filename3 = $fileName4; 
            }
        
    }else {
        $update_filename3 = $old_filename3;
    }
    $name3 = $_POST['name3'];
    $desc3 = $_POST['desc3'];
    $old_filename4 = $_POST['old_image4'];
    $image4 = $_FILES['image4']['name'];
    if(!empty($image4))
    {
            $fileName5 = basename($_FILES['image4']['name']); 
            $targetFilePath5 = $targetDir . $fileName5; 
            if(move_uploaded_file($_FILES["image4"]["tmp_name"], $targetFilePath5)){ 
                
                $update_filename4 = $fileName5; 
            }
        
    }else {
        $update_filename4 = $old_filename4;
    }
    $name4 = $_POST['name4'];
    $desc4 = $_POST['desc4'];
    $old_filename5 = $_POST['old_image5'];
    $image5 = $_FILES['image5']['name'];
    if(!empty($image5))
    {
            $fileName6 = basename($_FILES['image5']['name']); 
            $targetFilePath6 = $targetDir . $fileName6; 
            if(move_uploaded_file($_FILES["image5"]["tmp_name"], $targetFilePath6)){ 
                
                $update_filename5 = $fileName6; 
            }
        
    }else {
        $update_filename5 = $old_filename5;
    }
    $name5 = $_POST['name5'];
    $desc5 = $_POST['desc5']; 
    $old_filename6 = $_POST['old_image6'];
    $image6 = $_FILES['image6']['name'];
    
    if(!empty($image6))
    {
            $fileName7 = basename($_FILES['image6']['name']); 
            $targetFilePath7 = $targetDir . $fileName7; 
            if(move_uploaded_file($_FILES["image6"]["tmp_name"], $targetFilePath7)){ 
                
                $update_filename6 = $fileName7; 
            }
        
    }else {
        $update_filename6 = $old_filename6;
    }
    $name6 = $_POST['name6'];
    $desc6 = $_POST['desc6'];
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

    $old_filename7 = $_POST['old_image7'];
    $image7 = $_FILES['image7']['name'];
    
    if(!empty($image7))
    {
            $fileName8 = basename($_FILES['image7']['name']); 
            $targetFilePath7 = $targetDir . $fileName7; 
            if(move_uploaded_file($_FILES["image7"]["tmp_name"], $targetFilePath8)){ 
                
                $update_filename7 = $fileName8; 
            }
        
    }else {
        $update_filename7 = $old_filename7;
    }

    $name7 = $_POST['name7'];
    $desc7 = $_POST['desc7'];

    $old_filename8 = $_POST['old_image8'];
    $image8 = $_FILES['image8']['name'];
    
    if(!empty($image8))
    {
            $fileName9 = basename($_FILES['image8']['name']); 
            $targetFilePath8 = $targetDir . $fileName8; 
            if(move_uploaded_file($_FILES["image8"]["tmp_name"], $targetFilePath9)){ 
                
                $update_filename8 = $fileName9; 
            }
        
    }else {
        $update_filename8 = $old_filename8;
    }

    $name8 = $_POST['name8'];
    $desc8 = $_POST['desc8'];

    $old_filename9 = $_POST['old_image9'];
    $image9 = $_FILES['image9']['name'];
    
    if(!empty($image9))
    {
            $fileName10 = basename($_FILES['image9']['name']); 
            $targetFilePath9 = $targetDir . $fileName9; 
            if(move_uploaded_file($_FILES["image9"]["tmp_name"], $targetFilePath10)){ 
                
                $update_filename9 = $fileName10; 
            }
        
    }else {
        $update_filename9 = $old_filename9;
    }

    $name9 = $_POST['name9'];
    $desc9 = $_POST['desc9'];

    $old_filename10 = $_POST['old_image10'];
    $image10 = $_FILES['image10']['name'];
    
    if(!empty($image10))
    {
            $fileName11 = basename($_FILES['image10']['name']); 
            $targetFilePath10 = $targetDir . $fileName10; 
            if(move_uploaded_file($_FILES["image10"]["tmp_name"], $targetFilePath11)){ 
                
                $update_filename10 = $fileName11; 
            }
        
    }else {
        $update_filename10 = $old_filename10;
    }
    
    $name10 = $_POST['name10'];
    $desc10 = $_POST['desc10'];

    $old_filename11 = $_POST['old_image11'];
    $image11 = $_FILES['image11']['name'];
    
    if(!empty($image11))
    {
            $fileName12 = basename($_FILES['image11']['name']); 
            $targetFilePath11 = $targetDir . $fileName12; 
            if(move_uploaded_file($_FILES["image11"]["tmp_name"], $targetFilePath12)){ 
                
                $update_filename11 = $fileName12; 
            }
        
    }else {
        $update_filename11 = $old_filename11;
    }

    $name11 = $_POST['name11'];
    $desc11 = $_POST['desc11'];

    $old_filename12 = $_POST['old_image12'];
    $image12 = $_FILES['image12']['name'];
    
    if(!empty($image12))
    {
            $fileName13 = basename($_FILES['image12']['name']); 
            $targetFilePath12 = $targetDir . $fileName13; 
            if(move_uploaded_file($_FILES["image12"]["tmp_name"], $targetFilePath12)){ 
                
                $update_filename12 = $fileName13; 
            }
        
    }else {
        $update_filename12 = $old_filename12;
    }

    $name12 = $_POST['name12'];
    $desc12 = $_POST['desc12'];

     
     $query = "UPDATE add_package SET dname='$dname', pname='$pname', price='$price', image='$update_filename', place='$place', days='$days', image1='$update_filename1', name1='$name1', description1='$desc1', image2=' $update_filename2', name2='$name2', description2='$desc2', image3=' $update_filename3', name3='$name3', description3='$desc3', image4=' $update_filename4', name4='$name4', description4='$desc4', image5=' $update_filename5', name5='$name5', description5='$desc5', image6=' $update_filename6', name6='$name6', description6='$desc6' , image7=' $update_filename7', name6='$name7', description6='$desc7', image8=' $update_filename8', name6='$name8', description6='$desc8'  , image9=' $update_filename9', name9='$name9', description9='$desc9' , image10=' $update_filename10', name10='$name10', description10='$desc10' , image11=' $update_filename11', name11='$name11', description11='$desc11' , image12=' $update_filename12', name12='$name12', description12='$desc12' , day7='$day7', day8='$day8', day9='$day9', day10='$day10', day11='$day11', day12='$day12'    
   WHERE Id='$post_id' "; 
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        if ($image != NULL) {
            if (file_exists('img/' . $old_filename)) {
                unlink("'img/'.$old_filename");
            }
            move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $update_filename);
        }
        move_uploaded_file($_FILES['dimage']['tmp_name'], 'img/'.$update_filename0);
        move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$update_filename);
        move_uploaded_file($_FILES['image1']['tmp_name'], 'img/'.$update_filename1);
        move_uploaded_file($_FILES['image2']['tmp_name'], 'img/'.$update_filename2);
        move_uploaded_file($_FILES['image3']['tmp_name'], 'img/'.$update_filename3);
        move_uploaded_file($_FILES['image4']['tmp_name'], 'img/'.$update_filename4);
        move_uploaded_file($_FILES['image5']['tmp_name'], 'img/'.$update_filename5);
        move_uploaded_file($_FILES['image6']['tmp_name'], 'img/'.$update_filename6);
        move_uploaded_file($_FILES['image7']['tmp_name'], 'img/'.$update_filename7);
        move_uploaded_file($_FILES['image8']['tmp_name'], 'img/'.$update_filename8);
        move_uploaded_file($_FILES['image9']['tmp_name'], 'img/'.$update_filename9);
        move_uploaded_file($_FILES['image10']['tmp_name'], 'img/'.$update_filename10);
        move_uploaded_file($_FILES['image11']['tmp_name'], 'img/'.$update_filename11);
        move_uploaded_file($_FILES['image12']['tmp_name'], 'img/'.$update_filename12);
        $_SESSION['message'] = "package updated succesfully";
        header('Location: admin-view-details.php?Id=' . $post_id);
        exit(0);
    } else {
        $_SESSION['message'] = "package not added succesfully";
        header('Location: admin-table-package-edit.php?id=' . $post_id);
        exit(0);
    }
}
