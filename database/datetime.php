<style>
    p {
        display: inline;
        font-size: 40px;
        margin-top: 0px;
    }
</style>
<script>
<?php
     $link = mysqli_connect("10.180.50.214:3306","hbceduet","qazxsw","hbc")  or die(mysqli_error());
        $sql= "select End_time from timer  where No=1";
        $result=mysqli_query($link, $sql);
        if(mysqli_num_rows($result)==1){
         $row = mysqli_fetch_array($result);
         $time=$row['End_time'];
?>
    var countDownDate = new Date("<?php echo $time; ?>").getTime();
    // Run myfunc every second
    var myfunc = setInterval(function() {
        var now = new Date().getTime();
        var timeleft = countDownDate - now;
        var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

        // Result is output to the specific element
        document.getElementById("days").innerHTML = days + "d : "
        document.getElementById("hours").innerHTML = hours + "h : "
        document.getElementById("mins").innerHTML = minutes + "m : "
        document.getElementById("secs").innerHTML = seconds + "s"
        if (timeleft < 0) {
            clearInterval(myfunc);
            document.getElementById("left_time").innerHTML = "Time Is Expired";
            document.getElementById("exp_div").innerHTML = "";
        }
    }, 1000);<?php } ?>
</script>