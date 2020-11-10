        <?php
            session_start();
            if( isset($_SESSION['username'])&& isset($_SESSION['role'])){
                $id=$_SESSION['username'];
                 if(  $_SESSION['role']=='dean'|| $_SESSION['role']=='admin'|| $_SESSION['role']=='vice dean'|| $_SESSION['role']=='head'  ){ ?>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="style5.css">
        <link rel="stylesheet" href="bootstrap/css.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        		<link rel="stylesheet" href="bootstrap/fontawesome.min.css">
<style>
input, textarea {
  text-align: center;
}

</style>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th class="form-control" style="text-align:center">Notice Board Page</th>
                </tr>
            </thead>
            <tbody>
                <form action="database/notice.php" method="post" class="form-control">
                    <tr>
                        <td  style="text-align:center">Date:</td>
                    </tr>
					<tr>
                        <td>
							<input type="date" class="form-control" style="width:50%; margin-left:25%" name="day">
						</td>
                    </tr>
                    <tr>
                        <td style="text-align:center">Notice Title:</td>
                    </tr>
                    <tr>
                        <td style="text-align:center; text-emphasis: circle">
                            <input type="text" class="form-control" style="width:50%; margin-left:25%" name="title">
                        </td>
                    </tr>
                     <tr>
                        <td style="text-align:center">
                            <div class="md-form">
                              <i class="fas fa-pencil-alt prefix"></i><label for="form10">Notice Body</label>
                              <textarea id="form1011" name="body" class="md-textarea form-control" rows="7"></textarea>

                            </div>
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <label for="form10" >Signature:</label>
                            <input type="text" class="form-control"  style="width:50%; margin-left:25%" name="Signature">
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <label for="form10" >Designation:</label>
                            <input type="text"class="form-control"  style="width:50%; margin-left:25%" name="Designation">
                        </td>
                    </tr>
                     <tr>
                         <?php
                        if(isset($_GET["error_dept"])){
                           if($_GET["error_dept"]==15)   {  ?>
                                <div class="alert alert-success">
                                    <span class="help-block">
                                        <i class="small"><span style="">?</span>Your data saved successfully.</i>
                                    </span>
                                 </div> <?php
                           }
                           if($_GET["error_dept"]==25) {  ?>
                                <div class="alert alert-danger">
                                    <span class="help-block">
                                        <i class="small"><span style="">?</span>Your data is not saved successfully.</i>
                                    </span>
                                 </div> <?php
                           }} ?>
                        <td style="text-align:center">
                            <input type="submit" name="upload" class="btn btn-outline-success">
                        </td>
                    </tr>

                </form>
            </tbody>
        </table>
 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
            tinymce.init({
                selector: '#form1011'
            });
        </script>
        <?php }} else{  header('location:index.php'); } ?>