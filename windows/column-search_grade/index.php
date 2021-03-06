<!DOCTYPE html>
<head>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script> 

    <link href="style.css" rel="stylesheet" type="text/css" />

    <script>
        $(document).ready(function ()
        {
            $('#tbl-contact thead th').each(function () {
                var title = $(this).text();
                $(this).html(title+' <input type="text" class="col-search-input"  style="width: 50px" placeholder="Search " />');
            });

            var table = $('#tbl-contact').DataTable({
            	"scrollX": true,
            	"scrollX": true,
        		"pagingType": "numbers",
                "processing": true,
                "serverSide": true,
                "ajax": "server.php",
                order: [[2, 'asc']],
                columnDefs: [{
                    targets: "_all",
                    orderable: false
                 }]
            });

            table.columns().every(function () {
                var table = this;
                $('input', this.header()).on('keyup change', function () {
                    if (table.search() !== this.value) {
                    	   table.search(this.value).draw();
                    }
                });
            });
        });

    </script>
</head>

<body>
    <div class="datatable-container" style="width: 100%" >
        <h2 style="text-align: center">Search Grade by using Students grade Information</h2>
        <table name="tbl-contact" id="tbl-contact" class="display" cellspacing="0" width="100%">

            <thead>
                <tr>
                    
                    <th>Student Id</th>
                    <th>Program</th>
                    <th>Batch</th>
                    <th>Section</th>
                    <th>Semister</th>
                    <th>Course Code</th>
                    <th>Mid</th>
                    <th>Quize</th>
                    <th>Assignment</th>
                    <th>Final</th>
                    <th>Total</th>
                    <th>Letter Grade</th>

                </tr>
            </thead>
            
        </table>
    </div>
</body>