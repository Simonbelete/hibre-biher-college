


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="../boot/3.2.1_jquery.min.js"></script>
    <script src="../boot/3.3.7_js_bootstrap.min.js"></script>
     <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>



</head>
<body>


<div class="container">
    <h3 style="text-align: center">Select An Item  To Edit The Field</h3>
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Minimum Range</th>
            <th>Maximum Range</th>
            <th>Grade Value</th>
        </tr>


        <?php
       $connect = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc"
);
        $sql = "SELECT * FROM grade_scale";
        $users =mysqli_query($connect, $sql);
        while($user = $users->fetch_assoc()){
        ?>
            <tr> <td><a href="" data-name="Id" data-type="text"><?php echo $user['Id'] ?></a></td>
                 <td><a href="" class="update" data-name="minimum" data-type="text" data-pk="<?php echo $user['Id'] ?>" data-title="Enter Minimum Value"><?php echo $user['minimum'] ?></a></td>
                 <td><a href="" class="update" data-name="maximum" data-type="text" data-pk="<?php echo $user['Id'] ?>" data-title="Enter Maximum Value"><?php echo $user['maximum'] ?></a></td>
                <td><a href="" class="update" data-name="letter" data-type="text" data-pk="<?php echo $user['Id'] ?>" data-title="Enter Letter Grade"><?php echo $user['letter'] ?></a></td>

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
 