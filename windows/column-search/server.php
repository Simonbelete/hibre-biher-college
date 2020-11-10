<?php

$table = 'student_batch_dept_pro_view';
$primaryKey = 'Student_id';

$columns = array(
    array( 'db' => 'First_Name', 'dt' => 0 ),
    array( 'db' => 'Last_Name',  'dt' => 1 ),
    array( 'db' => 'Grand_Father_Name',   'dt' => 2 ),
    array( 'db' => 'gender', 'dt' => 3 ),
    array( 'db' => 'program', 'dt' => 4 ),
    array( 'db' => 'Student_id','dt' => 5 ),
    array( 'db' => 'Batch','dt' => 6 ),
    array( 'db' => 'Section','dt' => 7 ),
    array( 'db' => 'Status','dt' => 8 ),
    array( 'db' => 'First_Semister','dt' => 9 ),
    array( 'db' => 'Second_Semister','dt' => 10 )
   
);

// SQL server connection information
$sql_details = array(
    'user' => "hbceduet",
    'pass' => "qazxsw",
    'db'   => "hbc",
    'host' => "10.180.50.214:3306"
);
 

 
require( 'vendor/DataTables/server-side/scripts/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);