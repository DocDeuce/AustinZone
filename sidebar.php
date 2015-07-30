<?php 
if(isset($_GET['sourceName'])){
    require_once('source.php');
    global $pgsrc;
}    


echo '<div id="sidebar">';
//echo "<h2>$pgsrc[sourceName]</h2>";
echo '</div>';
echo '<div class="rightside">';
echo "<div class='rscontent'>";
?>
