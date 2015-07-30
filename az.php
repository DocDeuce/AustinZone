<?php include('header.php'); ?>

<section  class="infostrip">
    <h3 id="thedate">
        <script type="text/javascript">
            d = new Date();
            dy = d.getDay();
            m = d.getMonth;
            dt = d.getDate();
            
            switch (d.getDay()) {
                case 0:
                    day = "Sunday";
                    break;
                case 1:
                    day = "Monday";
                    break;
                case 2:
                    day = "Tuesday";
                    break;
                case 3:
                    day = "Wednesday";
                    break;
                case 4:
                    day = "Thursday";
                    break;
                case 5:
                    day = "Friday";
                    break;
                case 6:
                    day = "Saturday";
                    break;
            } 
            switch (d.getMonth()) {
                case 0:
                    month = "Jan";
                    break;
                case 1:
                    month = "Feb";
                    break;
                case 2:
                    month = "Mar";
                    break;
                case 3:
                    month = "Apr";
                    break;
                case 4:
                    month = "May";
                    break;
                case 5:
                    month = "Jun";
                    break;
                case 6:
                    month = "Jul";
                    break;
                case 7:
                    month = "Aug";
                    break;
                case 8:
                    month = "Sep";
                    break;
                case 9:
                    month = "Oct";
                    break;
                case 10:
                    month = "Nov";
                    break;
                case 11:
                    month = "Dec";
                    break;
            } 
            
            document.getElementById("thedate").innerHTML = day + ", " + month + " " + d.getDate();
        </script>
    </h3>
</section>
<div class="content">

<?php
$spec = 'rss is not null';
$class = 'halfcon';
get_all_rss($spec, $class);
include('footer.php');
?>


    