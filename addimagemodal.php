<?php
     if(isset($_GET["error_img"])){ ?>
      <script type="text/javascript">
             $(document).ready(function(){ $("#myModalimage").modal('show'); });
       </script><?php
    } ?>
    <div id="myModalimage" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Image Upload Tab</h4>
                    <button style="display:block; margin: auto;" onclick="document.getElementById('fileSelect').click()">Add images</button>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                   <div class="modal-body">
                        <form action="upload/imagephp.php" method="post" enctype="multipart/form-data">
                            <script type="text/javascript">

                                function readURLimg(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                            $('#add_img').attr('src', e.target.result);
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                                $("#fileSelect").change(function(){
                                    readURLimg(this);
                                });
                            </script>
                           <div class="row ">
                                <div class="col-12 float-center"style="margin: auto;">
                                    <div class="form-group ">
                                        <input onchange="readURLimg(this);" style="visibility:hidden;"type="file" multiple="multiple"  name="photo" id="fileSelect">
                                    </div>
                                </div>
                            </div>
                              <div class="row">
                                <div class="col-12">
                                    <div class="form-group"id="selectedFiles">
                                        <img src="" id="add_img" style="max-width:400px; height: 300px" class="card-img-top"/>
                                    </div>
                                </div>
                            </div> <?php
                            if(isset($_GET["error_img"])){ ?>
                                <div class="alert alert-danger">
                                    <span class="help-block">
                                        <i class="small"><span style=""><?php ECHO $_GET["error_img"];?></span></i>
                                    </span>
                                 </div> <?php
                            } ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Upload" class="form-control btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
                     </div>
                    <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>