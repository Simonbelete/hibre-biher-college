<?php
 $connect = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");
 $query = "SELECT * FROM payment ";
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
                               <tr> <th >Student Id</th>
                                    <th >Field</th>
                                    <th>Batch</th>
                                    <th>Semister</th>
                                    <th style="width:15%">Month</th>
                                    <th style="width:8%">Amount</th>
                                    <th style="width:8%">Date</th>
                               </tr>
                               <?php
                               while($row = mysqli_fetch_array($result))
                               {
                               ?>
                               <tr> <td><a href="" data-name="stud_id"><?php echo $row["stud_id"]; ?></a></td>
                                    <td><a href=""  class="update" data-name="field_of_edu" data-type="text" data-pk="<?php echo $row['No']; ?>" data-title="Enter Department" data-name="field_of_edu"><?php echo $row["field_of_edu"]; ?></a></td>
                                    <td><a href="" class="update" data-name="batch" data-type="text" data-pk="<?php echo $row['No']; ?>" data-title="Enter batch"><?php echo $row['batch'] ?></a></td>
                                    <td><a href="" class="update" data-name="semister" data-pk="<?php echo $row['No']; ?>" data-title="Enter Semister"><?php echo $row['semister']; ?></a></td>
                                    <td><a href="" class="update" data-name="month" data-type="text" data-pk="<?php echo $row['No']; ?>" data-title="Enter Month"><?php echo $row['month'] ?></a></td>
                                    <td><a href="" class="update" data-name="amount" data-type="text" data-pk="<?php echo $row['No']; ?>" data-title="Enter Amount"><?php echo $row['amount'] ?></a></td>
                                    <td><a href="" data-name="date"><?php echo $row['date']; ?></a></td>
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
  <?php if(isset($_GET["error_p"]) || isset($_GET["valid"])){ ?>
       <script type="text/javascript">
           $(document).ready(function(){ $("#add_data_Modal").modal('show'); });
       </script>
   <?php } ?>    
 <div id="add_data_Modal" class="modal fade">
      <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Add New Students Payment</h4>
                </div>
                <div class="modal-body">
                    <?php if(isset($_GET["error_p"])){ ?>
                    <div class="alert alert-danger">
                        <span class="help-block">
                            <i class="small"><span style="">?</span><?php echo $_GET["error_p"]; ?></i>
                        </span>
                     </div>
                    <?php } ?>
                    <?php if(isset($_GET["valid"])){ ?>
                    <div class="alert alert-success">
                        <span class="help-block">
                            <i class="small"><span style="">?</span><?php echo $_GET["valid"]; ?></i>
                        </span>
                     </div>
                    <?php } ?>
                     <form method="post" action="insert.php" id="form1">
                         <div class="row">
                             <div class="col-lg-6">
                               <div class="form-group">
                                    <label>Student Id</label>
                                    <select name="sid" id="sid"  class="form-control"required>
                                        <?php
                                            $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                            if($link === false){
                                                die("ERROR: Could not connect. " . mysqli_connect_error());
                                            }
                                            $sql = "SELECT DISTINCT Student_id FROM student_enrollment_semister";
                                            if($result = mysqli_query($link, $sql)){
                                                if(mysqli_num_rows($result) > 0){
                                                    while($row = mysqli_fetch_array($result)){
                                                        $pro=$row['Student_id'];
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
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Field</label>
                                    <select name="fofedu" id="fofedu"  class="form-control"required>
                                            <?php
                                                    $link = $MYSQLI_CONNECTION; //mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                                                    $sql = "SELECT  Field_of_education FROM tuition ";
                                                        if($result = mysqli_query($link, $sql)){
                                                        if(mysqli_num_rows($result) > 0){
                                                        while($row = mysqli_fetch_array($result)){
                                                        $pro=$row['Field_of_education'];
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
                             </div>
                         </div>

                            <br>
                            <div class="row">
                                <div class="col-lg-6">
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
                                </div>
                            </div>
                          <br />
                          <label ><b>Payments    </b></label><br/>
                          <div class="row">
                              <div class="col-lg-3"> <input class=" form-control"  type="radio"  name="crhr" value="Monthly" id="month" ></div>
                              <div class="col-lg-3"><i  class=" form-control">Monthly: </i></div>
                              <div class="col-lg-6">
                               <select name="month" id="month" class="form-control">
                                   <option value="null">Select Month</option>
                                   <option value="September">September</option>
                                   <option value="October">October</option>
                                   <option value="November">November</option>
                                   <option value="December">December</option>
                                   <option value="January">January</option>
                                   <option value="February">February</option>
                                   <option value="March">March</option>
                                   <option value="April">April</option>
                                   <option value="May">May</option>
                                   <option value="June">June</option>
                                   <option value="Julay">Julay</option>
                                   <option value="Augest">Augest</option>
                               </select>
                              </div>
                          </div>
                           <br>
                           <div class="row">
                               <div class="col-lg-3"><input class="form-control"  type="radio" name="crhr" value="Semisterly" id="semister" /></div>
                               <div class="col-lg-3"><i class="form-control">Semisterly: </i></div>
                               <div class="col-lg-6">
                                   <select name="semister" id="semister" class="form-control">
                                       <option value="null">Select A Semister</option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                   </select>
                               </div>
                           </div>
                           <br/> <br/> <br/>
                          <label>Ammount</label>
                          <input required="required"  type="number" name="amt" id="amt" class="form-control" />
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

 </script>