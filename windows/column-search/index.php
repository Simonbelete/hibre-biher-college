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
                $(this).html(title+' <input type="text" class="col-search-input"  style="width: 100px" placeholder="Search" />');
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
    <div class="datatable-container" style="width: 100%">
         <h2 style="text-align: center"> Search A student that you wants by using The following Students Information</h2> 
        <table name="tbl-contact" id="tbl-contact" class="display" cellspacing="0" width="100%">   

            <thead>
                <tr>
                    
                    <th>FName</th>
                    <th>Last Name</th>
                    <th>Grand Father name</th>
                    <th>Gender</th>   
                    <th>Program</th>
                    <th>Student id</th>
                    <th>Batch</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>First Semister</th>
                    <th>Second Semister</th> 

                </tr>
            </thead>
            
        </table>
    </div>
</body>