
<?php
$conn = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc");
if (! empty($_FILES)) {
    // Validating SQL file type by extensions
    if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type Please Select Correct .sql File."
        );
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
        }
    }
}

function restoreMysqlDB($filePath, $conn)
{
    $sql = '';
    $error = '';

    if (file_exists($filePath)) {
        $lines = file($filePath);

        foreach ($lines as $line) {

            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }

            $sql .= $line;

            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach

        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
        }
        exec('rm ' . $filePath);
    } // end if file exists

    return $response;
}

?>
        <style>
            #frm-restore {
            	padding: 20px;
            	border-radius: 2px;
            	border: #a3d7e0 1px solid;
            }


            .input-file {
            	background: #FFF;
            	padding: 10px;
            	margin-top: 5px;
            	border-radius: 2px;
            }

            .btn-action {
            	background: #333;
            	border: 0;
            	padding: 10px 40px;
            	color: #FFF;
            	border-radius: 2px;
            }

            .response {
            	padding: 10px;
            	margin-bottom: 20px;
                margin: auto;
                border-radius: 2px;
            }

            .error {
                background: #fbd3d3;
                border: #efc7c7 1px solid;
            }

            .success {
                background: #cdf3e6;
                border: #bee2d6 1px solid;
            }
        </style>
        <hr style="margin: 50px">
        <h4 style="color: #000000; margin-bottom: 50px">restore database</h4>
        <form method="post" action="" enctype="multipart/form-data"  style="margin: 10px; ">
            <input type="file" name="backup_file" class="form-control" style="margin: auto; width: 50%; input-file; margin-bottom: 20px" />
            <input type="submit" name="restore" value="Restore"style="margin: auto; width: 40%; margin-bottom: 10px"   class="form-control" />
             <?php
                if (! empty($response)) { ?>
                    <div class="response <?php echo $response["type"]; ?>">
                        <span class="help-block">
                            <i class="small"><span><h3>?</h3></span><h4><?php echo nl2br($response["message"]); ?></h4></i>
                        </span>
                    </div>  <?php
                }
            ?>
        </form>