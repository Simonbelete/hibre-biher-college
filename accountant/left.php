  <?php  if( isset($_SESSION['username'])&& isset($_SESSION['role'])&& $_SESSION['role']!='admin') {
    $id=$_SESSION['username'];?>
        <nav id="sidebar" >
            <?php require_once('img.php');?>
            <ul class="list-unstyled components">
                <li >
                    <a href="#gradeSubmenu"style="font-weight: bold;" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" >Manage Billing</a>
                    <ul style="" class="collapse list-unstyled"  id="gradeSubmenu">
                        <li>
                            <a href="stud_payment_index.php"class="btn btn-light"style='margin-left: 1px; width: 98%' id="drop_bottem">Students Payment</a>
                        </li>
                        <li>
                            <a href="student_search.php"class="btn btn-light"style='margin-left: 1px; width: 98%' id="drop_bottem">View Students Payment</a>
                        </li>
                    </ul>
                    <li>
                    <hr style="background: #008080">
                </li>
                <li>
                    <a href="index.php"class="btn btn-light"style='margin-left: 1px; width: 98%' id="drop_bottem">Titution</a>
                </li>
                </li>
            </ul>
        </nav>
            <?php
        }
        else{ header('location:../index.php'); }
?>