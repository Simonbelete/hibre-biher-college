<div id="Grade" class="tab-pane fade ">
    <br>
    <style>
        th{
            text-align:center;
        }
         td{
            text-align:center;
        }
    </style>
    <div >
        <h1  align="center">well come to Results page</h1>
        <p class="lead"  align="center"> here are list of your progress results </p>
         <?php
            if(isset($_POST['CourseId'])){
                $CourseId=$_POST['CourseId'];
                $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                if($link === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }
                $sql="select mid,quize,assignment,final,total,letter_grade   from student_course_view where Course_Id='$CourseId'";
                $result = mysqli_query($link, $sql);
                if(mysqli_num_rows($result) ==1) {  ?>
                    <table class='table table-bordered table-striped table-dark'>
                        <thead>
                            <tr class=" alert-info">
                               <th>#</th>
                                <th>Assesment</th>
                                <th>Value</th>
                                <th>Outof(%)</th>
                            </tr>
                        </thead>
                        <tbody><?php
                            $row = mysqli_fetch_array($result);
                            echo "<tr >";
                                echo "<td>1</td>";
                                echo "<td>Mid Exam</td>";
                                echo "<td>" . $row['mid'] . "</td>";
                                echo "<td>15%</td>";
                            echo "</tr>";
                             echo "<tr>";
                                echo "<td>2</td>";
                                echo "<td>quize Exam</td>";
                                echo "<td>" . $row['quize'] . "</td>";
                                echo "<td>5%</td>";
                            echo "</tr>";
                             echo "<tr>";
                                echo "<td>3</td>";
                                echo "<td>Assignment</td>";
                                echo "<td>" . $row['assignment'] . "</td>";
                                echo "<td>30%</td>";
                            echo "</tr>";
                             echo "<tr>";
                                echo "<td>4</td>";
                                echo "<td>Final Exam</td>";
                                echo "<td>" . $row['final'] . "</td>";
                                echo "<td>50%</td>";
                            echo "</tr>";
                             echo "<tr>";
                                echo "<td>5</td>";
                                echo "<td> Total Result</td>";
                                echo "<td>" . $row['total'] . "</td>";
                                echo "<td>100%</td>";
                            echo "</tr>";
                             echo "<tr>";
                                echo "<td>6</td>";
                                echo "<td>Grade</td>";
                                echo "<td>" . $row['letter_grade'] . "</td>";
                                echo "<td>100%</td>";
                            echo "</tr>";
                        echo "</tbody>";
                    echo "</table>"; 
                }
            }
        ?>
    </div>
</div>