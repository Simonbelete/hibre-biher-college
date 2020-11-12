

<?php
//action.php
if(isset($_POST["action"]))
{
 $connect = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");

 if(isset($_FILES["image"])){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["image"]["name"];
                $description= $_POST["description"];
                $filetype = $_FILES["image"]["type"];
                $filesize = $_FILES["image"]["size"];

                $maxsize = 5 * 1024 * 1024;
                if(in_array($filetype, $allowed)){
                    // Check whether file exists before uploading it
                    if(file_exists("imgg/" . $filename)){
                       echo $filename .  'is already exists.';

                    } else{
                            if($_POST["action"] == "insert") {
                              $query = "INSERT INTO tbl_images  VALUES ('','$filename','$description')";
                              if(mysqli_query($connect, $query) && move_uploaded_file($_FILES["image"]["tmp_name"], "imgg/" . $filename))
                              {
                               echo 'Image Inserted into Database';
                              }
                              echo mysqli_error($connect)  ;
                            }
                            if($_POST["action"] == "update") {
                              $query = "UPDATE tbl_images SET name = '$filename' , Description = '$description' WHERE id = '".$_POST["image_id"]."'";
                              if(mysqli_query($connect, $query) && move_uploaded_file($_FILES["image"]["tmp_name"], "imgg/" . $filename))
                              {
                               echo 'Image Updated into Database';
                              }
                            }
                    }
                }else echo "extension is not allowed";
            }




 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM tbl_images ORDER BY id DESC";
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-striped">
    <tr>
     <th width="10%">ID</th>
     <th width="20%">Image</th>
     <th width="50%">Description</th>
     <th width="10%">Change</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
     <td style="text-align:center">'.$row["id"].'</td>
     <td> <img src="imgg/'.$row['name'].'" height="20px" width="150px" class="img-thumbnail" /> </td>
     <td style="text-align:center"> <label >'.$row['Description'].'</label> </td>
     <td  style="text-align:center"><button type="button" name="update" class="btn  bt-xs update"  id="'.$row["id"].'"><img src="Edit.png" /> </button></td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }




 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM tbl_images WHERE id = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Deleted from Database';
  }
 }
}
?>
