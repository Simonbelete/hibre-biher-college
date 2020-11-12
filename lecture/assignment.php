
                <div  style="margin: auto">
                    <h1  align="center">well come to file resource page</h1>
                    <p class="lead" align="center">
                         double click on a file if you want to download a file
                    </p>
                    <?php
                            $link = $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                            if($link === false){
                                die("ERROR: Could not connect. " . mysqli_connect_error());
                            }
                            $sql="select file_name from file where course_id='$CourseId'";
                            $result = mysqli_query($link, $sql);
                            if(mysqli_num_rows($result)>0) {
                                echo "<table class='table table-bordered table-striped table-dark' style='border-width: 200px;border: #000000'>";
                                    echo "<thead>";
                                        echo "<tr class='alert-info'>";
                                            echo "<th>#</th>";
                                            echo "<th>File Name</th>";
                                            echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                       $no=1;
                                       while($row = mysqli_fetch_array($result)){
                                            $file= $row['file_name'];
                                            if(file_exists("../../main/upload/file/" . $file)) {
                                            echo "<tr>";
                                                echo "<td> $no</td>";
                                                echo "<td><a href='../../main/upload/file/$file'>$file</a></td>";
                                            echo "</tr>";
                                                    ++$no;  }
                                       }
                                    echo "</tbody>";
                                echo "</table>";
                                echo  mysqli_free_result($result);
                            }
                    ?>
                </div>         