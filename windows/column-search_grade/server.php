<?php
     
$table = 'student_course_view';
$primaryKey = 'All_Program';

$columns = array(
     array( 'db' => 'student_id', 'dt' => 0 ),
    array( 'db' => 'All_Program',  'dt' => 1 ),
    array( 'db' => 'Batch',   'dt' => 2 ),
    array( 'db' => 'Section',   'dt' => 3 ),
    array( 'db' => 'Semister', 'dt' => 4 ),
    array( 'db' => 'Course_id','dt' => 5 ),
    array( 'db' => 'mid', 'dt' => 6 ),
    array( 'db' => 'quize','dt' => 7 ),
    array( 'db' => 'assignment','dt' => 8 ),
    array( 'db' => 'final','dt' => 9 ),
    array( 'db' => 'total','dt' => 10 ),
    array( 'db' => 'letter_grade','dt' => 11 )
   
);

// SQL server connection information
$sql_details = array(
    'user' => 'hbceduet',
    'pass' => 'qazxsw',
    'db'   => 'hbc',
    'host' => '10.180.50.214:3306');
 
require( 'vendor/DataTables/server-side/scripts/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);