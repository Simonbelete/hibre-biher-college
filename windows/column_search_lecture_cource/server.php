<?php
     
$table = 'lecture_cours_view';
$primaryKey = 'All_Program';

$columns = array(
     array( 'db' => 'First_Name', 'dt' => 0 ),
    array( 'db' => 'Last_Name',  'dt' => 1 ),
    array( 'db' => 'Field_of_study',   'dt' => 2 ),
    array( 'db' => 'course_id',   'dt' => 3 ),
    array( 'db' => 'c_name','dt' => 4 ),
    array( 'db' => 'All_Program', 'dt' => 5 ),
    array( 'db' => 'Batch','dt' => 6 ),
    array( 'db' => 'Section', 'dt' => 7 ),
    array( 'db' => 'Semister','dt' => 8 )
   
);

// SQL server connection information
$sql_details = array(
    'user' => "hbceduet",
    'pass' => 'qazxsw',
    'db'   => "hbc",
    'host' => "10.180.50.214:3306"
);
 
 
require( 'vendor/DataTables/server-side/scripts/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);