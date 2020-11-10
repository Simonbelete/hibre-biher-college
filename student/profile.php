     <link rel="stylesheet" href="../style5.css">
                <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
                <link rel="stylesheet" href="../../bootstrap/css.css">
                <script src="../../bootstrap/jquery.min.js"></script>
                <script src="../../bootstrap/popper.min.js"></script>
                <script src="../../bootstrap/bootstrap.min.js"></script>
                <link rel="stylesheet" href="../user_profile.css" />
                <link rel="stylesheet" href="../../bootstrap/fontawesome.min.css">
    <div class="portlet light bordered">
         <script>
             $(document).ready(function(){
                    $('#Outline').addClass('show');
                });
        </script> <?php    if(isset($_POST['CourseId'])){
                $CourseId=$_POST['CourseId'];} ?>
        <nav class="nav nav-tabs" style="width: 100%">
            <a href="#Outline" data-toggle="tab" class="nav-item nav-link active ">Course Outline</a>
            <a href="#Grade" data-toggle="tab"  class="nav-item nav-link">Grade</a>
            <a href="#Shelfe" data-toggle="tab"  class="nav-item nav-link">Shelfe </a>
            <a href="#assignment" data-toggle="tab"  class="nav-item nav-link">Assignments </a>
            </div>
        </nav>
        <div class="container">
            <div class="tab-content">
                <?php require_once('tab/Shelfe.php');
                    require_once('tab/Grade.php');
                    require_once('tab/Outline.php');
                    require_once('tab/assignment.php');
                ?>
            </div>
        </div>
    </div>