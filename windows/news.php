
  <br><br><br><br><br><br>
<div id="news"class="tab-pane fade" style="margin-top: 20px" >
    <?php
    $con= $MYSQLI_CONNECTION;//mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc") or die(mysqli_error());
	mysqli_set_charset('utf8',$con);

    $d=mysqli_query($con,"SELECT * FROM notice");
     if($d){     $uu='e';
        while ($row=mysqli_fetch_object($d)) {
            $subject=$row->subject;
            $body=$row->Description;
            $date = $row->Date; ?>
            <div>
                <h6  id="news_title" style="width: 100%; text-align: center" ><?php echo "Date ".date("d.m.Y H:i:s",strtotime($date));  ?></h6><br>
                <h6  id="news_title" style="width: 100%; text-align: center"><?php echo $subject;  ?></h6>
                <p class="collapse" style="width: 100%; text-align: start end; font-style: normal; font-size: x-large" id="<?php echo $uu;?>"><?php echo $body;  ?></p>
                <p><a class="btn" style="width: 100%; text-align: center" data-toggle="collapse"data-target="#<?php echo $uu;?>">more&raquo;</a></p>
            </div> <?php  $uu++;
        }
    }
    else {   echo("no notification"); }  ?>
</div>