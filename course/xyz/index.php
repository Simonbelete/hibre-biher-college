<?php session_start();
    if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
         if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin' ){
        $id=$_SESSION['username'];     ?>

<!DOCTYPE html>
<html>
<head>                                                                                        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="../../grade scale/boot/3.2.1_jquery.min.js"></script>
    <script src="../../grade scale/boot/3.3.7_js_bootstrap.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>


</head>
<body>


<div class="container">
     <h2 style="text-align: center"> All course liste in our collage </h2>
     <br>
     <h2 style="text-align: center"> Select an item if you want to edit the field </h2>
    <table class="table table-bordered">
        <tr>
            <th>Cource Code</th>
            <th>Cource Name</th>
            <th>Cource Credit hr</th>
            <th>Cource Ects</th>
        </tr>


        <?php
       $connect = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");
        $sql = "SELECT * FROM course";
        $users =mysqli_query($connect, $sql);     
        while($user = $users->fetch_assoc()){
        ?>
            <tr>
                 <td><a href="" data-name="c_id" data-type="text"><?php echo $user['c_id'] ?></a></td>
                 <td><a href="" class="update" data-name="c_name" data-type="text" data-pk="<?php echo $user['c_id'] ?>" data-title="Enter Cource name"><?php echo $user['c_name'] ?></a></td>
                 <td><a href="" class="update" data-name="c_credit" data-type="text" data-pk="<?php echo $user['c_id'] ?>" data-title="Enter Cource Credit"><?php echo $user['c_credit'] ?></a></td>
                 <td><a href="" class="update" data-name="c_ects" data-type="text" data-pk="<?php echo $user['c_id'] ?>" data-title="Enter Cource ects"><?php echo $user['c_ects'] ?></a></td>

            </tr>
        <?php } ?>
    </table>
</div> <!-- container / end -->


</body>
<script type="text/javascript">
    $('.update').editable({
           url: 'update.php',
           type: 'text',
           title: 'Enter the Correct Input',
            validate: function(value){
               if($.trim(value) == '')
               {
                return 'This field is required';
               }
              }
    });
</script>
</html>
<?php }}   else{ header('location:index.php'); }?>