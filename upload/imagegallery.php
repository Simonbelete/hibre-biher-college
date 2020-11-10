    <style>
        .carousel{
            background: #2f4357;
            margin-top: 20px;
        }
        .carousel-item{
            text-align: center;
            min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
        }
    </style>
    <br> <br><br><br>     
        <div id="myCarousel" style="width: 100%" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                <?php
                    $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
                    $sql = "SELECT * FROM tbl_images where id=3 or id=4 or id=5 or id=6";
                    $sql2 = "SELECT * FROM tbl_images where id=7 or id=8 or id=10 or id=11";
                    $sql3 = "SELECT * FROM tbl_images where id=12 or id=13 or id=14 or id=15";  ?>
                                <div class="carousel-item active">
                                    <div class="row"> <?php
                                        if($result = mysqli_query($link, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){ ?>
                                                    <div class="col-3 img-thumbnail">
                                                        <img  src="change image/imgg/<?php echo $row['name']; ?>" 
				class="img-responsive" width="180px" height="180px" alt="Third Slide">
                                                        <h6><?php echo $row['Description']; ?></h6>
                                                    </div><?php
                                                }   mysqli_free_result($result);
                                            }
                                        }  ?>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row"> <?php
                                        if($result = mysqli_query($link, $sql2)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){ ?>
                                                    <div class="col-3 img-thumbnail">
                                                        <img src="change image/imgg/<?php echo $row['name']; ?>" class="img-responsive" width="180px" height="180px" alt="Second Slide">
                                                        <h6><?php echo $row['Description']; ?></h6>
                                                    </div><?php
                                                }   mysqli_free_result($result);
                                            }
                                        }  ?>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row"> <?php
                                        if($result = mysqli_query($link, $sql3)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){ ?>
                                                    <div class="col-3 img-thumbnail">
                                                        <img src="change image/imgg/<?php echo $row['name']; ?>" 
															 class="img-responsive" width="180px" height="180px" alt="First Slide">
                                                        <h6><?php echo $row['Description']; ?></h6>
                                                    </div><?php
                                                }   mysqli_free_result($result);
                                            }
                                        }  ?>
                                    </div>
                                </div>

            </div>
            <!-- Carousel controls -->
            <a class="carousel-control-prev btn-dark" href="#myCarousel"  style="width: 50px; height: 100px; margin: auto" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next btn-dark" href="#myCarousel"    style="width: 50px; height: 100px; margin: auto"  data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
