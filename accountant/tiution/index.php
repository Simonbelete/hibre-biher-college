<?php
 $connect = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");
 $query = "SELECT * FROM tuition ";
 $result = mysqli_query($connect, $query);
 ?>
 <!DOCTYPE html>
 <html>
      <head>
            <link rel="stylesheet" href="../../grade scale/boot/3.3.7_css_bootstrap.min.css">
            <script src="../../grade scale/boot/3.2.1_jquery.min.js"></script>
            <script src="../../grade scale/boot/3.3.7_js_bootstrap.min.js"></script>
            <link href="../../grade scale/boot/1.5.0_bootstrap3-editable_css_bootstrap-editable.css" rel="stylesheet"/>
            <script src="../../grade scale/boot/1.5.0_bootstrap3-editable_js_bootstrap-editable.min.js"></script>
      </head>
      <body>
           <br /><br />
           <div class="container" style="width:100%;">
                <h3 align="center">Refreshe The Page After Edit the field</h3>
                <br />
                <div class="table-responsive">
                     <div align="right">
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
                     </div>
                     <br />
                     <style>
                            th{  text-align: center;   }
                     </style>
                     <div id="employee_table">
                          <table style="text-align: center" class="table table-hover table-striped "  >
                               <tr> <th>Batch</th>
                                    <th>Semister</th>
                                    <th style="width:30%">Field</th>
                                    <th style="width:8%">Credit hr</th>
                                    <th>payment/CHR</th>
                                    <th>Total Chr payment</th>
                                    <th>Registeration Fee</th>
                                    <th>Total</th>
                               </tr>
                               <?php
                               while($row = mysqli_fetch_array($result))
                               {
                               ?>
                               <tr> <td><a href="" data-name="Batch"><?php echo $row["Batch"]; ?></a></td>
                                    <td><a href="" data-name="c_name"><?php echo $row['Semister'] ?></a></td>
                                    <td><a href=""  data-name="Field of education"><?php echo $row['Field_of_education'] ?></a></td>
                                    <td><a href="" class="update" data-name="Credit_hr" data-type="text" data-pk="<?php echo $row['Id'] ?>" data-title="Enter Cource ects"><?php echo $row['Credit_hr'] ?></a></td>
                                    <td><a href="" class="update" data-name="payment_per_Credit_hr" data-type="text" data-pk="<?php echo $row['Id'] ?>" data-title="Enter Cource name"><?php echo $row['payment_per_Credit_hr'] ?></a></td>
                                    <td><a href=""  data-name="Total_Credit_hr_payment" ><?php echo $row['Total_Credit_hr_payment'] ?></a></td>
                                    <td><a href="" class="update" data-name="To_register" data-type="text" data-pk="<?php echo $row['Id'] ?>" data-title="Enter Cource ects"><?php echo $row['To_register'] ?></a></td>
                                    <td><a href=""  data-name="Total" ><?php echo $row['Total'] ?></a></td>
                               </tr>
                               <?php
                               }
                               ?>
                          </table>
                     </div>
                </div>
           </div>
      </body>
 </html>
 <?php if(isset($_GET["error_t"]) || isset($_GET["validd"])){ ?>
       <script type="text/javascript">
           $(document).ready(function(){ $("#add_data_Modal").modal('show'); });
       </script>
   <?php } ?>
 <div id="add_data_Modal" class="modal fade">
      <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Add New Titution</h4>
                </div>
                <div class="modal-body">
                    <?php if(isset($_GET["error_t"])){ ?>
                    <div class="alert alert-danger">
                        <span class="help-block">
                            <i class="small"><span style="">?</span><?php echo $_GET["error_t"]; ?></i>
                        </span>
                     </div>
                    <?php } ?>
                    <?php if(isset($_GET["validd"])){ ?>
                    <div class="alert alert-success">
                        <span class="help-block">
                            <i class="small"><span style="">?</span><?php echo $_GET["validd"]; ?></i>
                        </span>
                     </div>
                    <?php } ?>
                     <form method="post" action="insert.php" id="form1">
                          <div class="form-group">
                                <label>Enter Batch</label>
                                <select name="Batch" id="Batch" class="form-control"required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                          <br />
                          <div class="form-group">
                                <label>Enter Semister</label>
                                <select name="Semister" id="Semister" class="form-control"required>
                                    <option value="1">1</option>
                                     <option value="2">2</option>
                                </select>
                            </div>
                             <br />
                          <div class="form-group">
                                <label>Field</label>
                                <select name="fofedu" id="fofedu" class="form-control"required>
                                    <?php
                                        $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                        if($link === false){
                                            die("ERROR: Could not connect. " . mysqli_connect_error());
                                        }
                                        $sql = "SELECT DISTINCT program  FROM student_batch_dept_pro_view";
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                    $pro= $row['program']  ;
                                                    echo "<option value='$pro'>$pro</option>";
                                                }
                                                mysqli_free_result($result);
                                            }
                                            else{ echo "No records matching your query were found."; }
                                        }
                                        else{ echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); }
                                        mysqli_close($link);
                                    ?>
                                </select>
                            </div>
                          <br />
                          <label>Enter Credit hr</label>
                          <input required="required"  type="number" name="crhr" id="crhr" class="form-control" />
                          <br />
                          <label>Enter paymrnt per Credit hr</label>
                          <input required="required"  type="number" name="s_cr_pay" id="s_cr_pay" class="form-control" />
                          <br />
                          <label>Enter Total Credit hr payment</label>
                          <input required="required"  type="number" name="t_cr_pay" id="t_cr_pay" class="form-control" />
                          <br />
                          <label>To register</label>
                          <input  required="required" type="number" name="register" id="register" class="form-control" />
                          <br />
                          <label>Total</label>
                          <input required="required"  type="number" name="Total" id="Total" class="form-control" />
                          <br />
                          <input type="hidden" name="employee_id" id="employee_id" />
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                     </form>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
           </div>
      </div>
 </div>
 <script>


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

 $( "#t_cr_pay" ).focus(function() {
   document.getElementById("t_cr_pay").value = document.getElementById("crhr").value * document.getElementById("s_cr_pay").value;
});

 $( "#Total" ).focus(function() {
   document.getElementById("Total").value = +document.getElementById("t_cr_pay").value + + document.getElementById("register").value;
});

 </script>