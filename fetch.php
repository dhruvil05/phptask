<?php require 'db_connect.php'; ?>

<?php 
 
 if($_GET['search']){
    $search = $_GET['search'];
    $sql=" SELECT * FROM `data` WHERE `name` like '%".$search."%' OR `email` like '%".$search."%' OR `phone` like '%".$search."%' OR `gender` like '%".$search."%' OR `created_date` like '%".$search."%' OR `image` like '%".$search."%' ORDER BY `created_date` DESC;";
 }else{
    $sql = "SELECT * FROM `data` ORDER BY `created_date` DESC;";
 }
 
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);



if($result){
    while($data = mysqli_fetch_array($result)){
        // print_r($data['name']);
        // print("\n");
       echo  '<tr>
        <td>'.$data["name"].'</td>
        <td>'.$data["phone"].'</td>
        <td>'.$data["email"].'</td>
        <td>'.$data["gender"].'</td>
        <td style="justify-content: center; display: flex;">
        <img src="image/'.$data["image"].'" alt="image" class="img">
        </td>
        <td>'.$data["created_date"].'</td>
        <td><a href="" data-id="'.$data['sno'].'" id="delete" onclick="return confirm'.('Are you sure?').'"
        style="background-color:red;">Delete</a></td>
        <td> <a href="add_user.php?sno='. $data['sno'].'" style="background-color:green">Edit</a></td>

        </tr>';
    }
}
?>
