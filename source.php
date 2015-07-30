<?php 
include('top.php');
$spec = "sourceName = '" . $_GET['sourceName'] . "'";
$pgsrc = get_all($spec)[0];
include('sidebar.php'); 


?>

<?php
echo "<section class='sourceTop'>";
echo "<h1>$pgsrc[sourceName]</h1>"; 
echo "<h2>$pgsrc[sourceWeb]</h2>";
echo "</section>";
$class = 'srccon';
get_one_rss($pgsrc['rss'],$pgsrc['alias']);
?>

<?php include('footer.php'); ?>