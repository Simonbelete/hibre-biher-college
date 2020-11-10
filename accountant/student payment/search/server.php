<?php 
$table = 'payment';
$primaryKey = 'stud_id';
$columns = array(
    array( 'db' => 'stud_id', 'dt' => 0 ),
    array( 'db' => 'field_of_edu',  'dt' => 1 ),
    array( 'db' => 'batch',   'dt' => 2 ),
    array( 'db' => 'semister', 'dt' => 3 ),
    array( 'db' => 'month','dt' => 4 ),
    array( 'db' => 'amount', 'dt' => 5 ),
    array( 'db' => 'date','dt' => 6 )

);

$sql_details = array(
    'user' => 'hbceduet',
    'pass' => 'qazxsw',
    'db'   => 'hbc',
    'host' => '10.180.50.214:3306'
);


require( '../../../windows/column-search/vendor/DataTables/server-side/scripts/ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);