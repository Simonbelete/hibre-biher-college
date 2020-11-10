  <?php if(isset($_GET["error"])){ ?>
       <script type="text/javascript">
           $(document).ready(function(){ $("#myModal").modal('show'); });
       </script>
   <?php } ?>
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title center">Login page</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">    
                    <?php if(isset($_GET["error"])){ ?>
                    <div class="alert alert-danger">
                        <span class="help-block">
                            <i class="small"><span style="">×</span><?php echo $_GET["error"]; ?></i>
                        </span>
                     </div>
                    <?php } ?>
                    <form action="database/login.php" method="post">
                        <div class="form-group">
                            <label class="control-label">Username:</label>
                            <input type="text" name="uname" required="required" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password:</label>
                            <input type="password" name="Password" required="required" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <input type="Submit" name="Cancel" value="Cancel" class="btn btn-secondary" data-dismiss="modal">
                            <input type="Submit" id="submit" name="Submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>