<?php
 $connect = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");
 $query = "SELECT * FROM tuition ";
 $result = mysqli_query($connect, $query);
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      </head>
      <body>
           <br /><br />
           <div class="container" style="width:700px;">
                <h3 align="center">PHP Ajax Update MySQL Data Through Bootstrap Modal</h3>
                <br />
                <div class="table-responsive">
                     <div align="right">
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
                     </div>
                     <br />
                     <div id="employee_table">
                          <table class="table table-bordered">
                               <tr>
                                    <th>Batch</th>
                                    <th>Semister</th>
                                    <th>Field of education</th>
                                    <th>Credit hr</th>
                                    <th>paymrnt per Credit hr</th>
                                    <th>Total Credit hr payment</th>
                                    <th>To register</th>
                                    <th>Total</th>
                                    <th>Edit</th>
                                    <th>View</th>
                               </tr>
                               <?php
                               while($row = mysqli_fetch_array($result))
                               {
                               ?>
                               <tr>
                                    <td><a href="" data-name="Batch" data-type="text"><?php echo $row["Batch"]; ?></a></td>
                                    <td><a href="" class="update" data-name="c_name" data-type="text" data-pk="<?php echo $row['Batch'] ?>" data-title="Enter Cource name"><?php echo $row['Semister'] ?></a></td>
                                    <td><a href="" class="update" data-name="c_credit" data-type="text" data-pk="<?php echo $row['Batch'] ?>" data-title="Enter Cource Credit"><?php echo $row['Field of education'] ?></a></td>
                                    <td><a href="" class="update" data-name="c_ects" data-type="text" data-pk="<?php echo $row['Batch'] ?>" data-title="Enter Cource ects"><?php echo $row['Credit hr'] ?></a></td>
                                    <td><a href="" class="update" data-name="c_name" data-type="text" data-pk="<?php echo $row['Batch'] ?>" data-title="Enter Cource name"><?php echo $row['paymrnt per Credit hr'] ?></a></td>
                                    <td><a href="" class="update" data-name="c_credit" data-type="text" data-pk="<?php echo $row['Batch'] ?>" data-title="Enter Cource Credit"><?php echo $row['Total Credit hr payment'] ?></a></td>
                                    <td><a href="" class="update" data-name="c_ects" data-type="text" data-pk="<?php echo $row['Batch'] ?>" data-title="Enter Cource ects"><?php echo $row['To register'] ?></a></td>
                                    <td><a href="" class="update" data-name="c_ects" data-type="text" data-pk="<?php echo $row['Batch'] ?>" data-title="Enter Cource ects"><?php echo $row['Total'] ?></a></td>
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["Batch"]; ?>" class="btn btn-info btn-xs edit_data" /></td>
                                    <td><input type="button" name="view" value="view" id="<?php echo $row["Batch"]; ?>" class="btn btn-info btn-xs view_data" /></td>
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
 <div id="dataModal" class="modal fade">
      <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Employee Details</h4>
                </div>
                <div class="modal-body" id="employee_detail">
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
           </div>
      </div>
 </div>
 <div id="add_data_Modal" class="modal fade">
      <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Add New Titution</h4>
                </div>
                <div class="modal-body">
                     <form method="post" id="insert_form">
                          <label>Enter Batch</label>
                          <input type="number" name="Batch" id="Batch" class="form-control" />
                          <br />
                          <label>Enter Semister</label>
                          <input type="number" name="Semister" id="Semister" class="form-control" />
                          <br />
                          <label>Field of education</label>
                          <input type="text" name="fofedu" id="fofedu" class="form-control" />
                          <br />
                          <label>Enter Credit hr</label>
                          <input type="number" name="crhr" id="crhr" class="form-control" />
                          <br />
                          <label>Enter paymrnt per Credit hr</label>
                          <input type="number" name="s_cr_pay" id="s_cr_pay" class="form-control" />
                          <br />
                          <label>Enter Total Credit hr payment</label>
                          <input onclick="clicked()" type="number" name="t_cr_pay" id="t_cr_pay" class="form-control" />
                          <br />
                          <label>To register</label>
                          <input type="number" name="register" id="register" class="form-control" />
                          <br />
                          <label>Total</label>
                          <input type="number" name="Total" id="Total" class="form-control" />
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
        function clicked() {
            var input_crhr = document.getElementById('crhr').value;
            var input_payment_crhr = document.getElementById('s_cr_pay').value;
            var total_crhr_payment=input_crhr * input_payment_crhr;
            document.getElementById('t_cr_pay').innerHTML = total_crhr_payment;
        }

 $(document).ready(function(){
      $('#add').click(function(){
           $('#insert').val("Insert");
           $('#insert_form')[0].reset();
      });
      $(document).on('click', '.edit_data', function(){
           var employee_id = $(this).attr("id");
           $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{employee_id:employee_id},
                dataType:"json",
                success:function(data){
                     $('#name').val(data.name);
                     $('#address').val(data.address);
                     $('#gender').val(data.gender);
                     $('#designation').val(data.designation);
                     $('#age').val(data.age);
                     $('#employee_id').val(data.id);
                     $('#insert').val("Update");
                     $('#add_data_Modal').modal('show');
                }
           });
      });
      $('#insert_form').on("submit", function(event){
           event.preventDefault();
           if($('#name').val() == "")
           {
                alert("Name is required");
           }
           else if($('#address').val() == '')
           {
                alert("Address is required");
           }
           else if($('#designation').val() == '')
           {
                alert("Designation is required");
           }
           else if($('#age').val() == '')
           {
                alert("Age is required");
           }
           else
           {
                $.ajax({
                     url:"insert.php",
                     method:"POST",
                     data:$('#insert_form').serialize(),
                     beforeSend:function(){
                          $('#insert').val("Inserting");
                     },
                     success:function(data){
                          $('#insert_form')[0].reset();
                          $('#add_data_Modal').modal('hide');
                          $('#employee_table').html(data);
                     }
                });
           }
      });
      $(document).on('click', '.view_data', function(){
           var employee_id = $(this).attr("id");
           if(employee_id != '')
           {
                $.ajax({
                     url:"select.php",
                     method:"POST",
                     data:{employee_id:employee_id},
                     success:function(data){
                          $('#employee_detail').html(data);
                          $('#dataModal').modal('show');
                     }
                });
           }
      });
 });
 </script>