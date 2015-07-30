<?php
try{
    require_once 'includes/pdo_connect.php';
    $sql = 'SELECT * FROM sources';
    $result = $db -> query($sql);
    $all = $result -> fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $e){
    $error = $e->getMessage();
}

$url = $all[0]['rss'];
$cache = 'xml/' . $all[0]['alias'] . '.xml';
$lifetime = 60 * 60;

// find out when the cache was last updated
if (file_exists($cache)) {
    $modified = filemtime($cache);
}
// create or update the cache if necessary
if (!isset($modified) || $modified + $lifetime < time()) {
    if ($xml = @ file_get_contents($url)) {
        file_put_contents($cache, $xml);
    }
}
// if the cache file exists, suppress errors
// and load it as SimpleXML
if (file_exists($cache)) {
    libxml_use_internal_errors(true);
    $feed = simplexml_load_file($cache);
} else {
    $feed = false;
}
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $all[0]['sourceName']; ?></title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <h1><?php 
            $source = $feed -> channel -> title;
            echo $source; 
        ?></h1>
        <?php
        if ($feed === false){
            echo '<p>oops</p>';
        }else{
            foreach ($feed -> channel -> item as $item){
                echo '<article>';
                echo "<h2><a href='$item->link'>$item->title</a></h2>";
                $thumbnail = $item->children('media', true)[1];
                $atts = $thumbnail->attributes();
                print_r($atts);
                foreach ($atts as $key => $value) {
                    $$key = $value;
                    print_r($value);
                }
                echo "<figure><a href='$item->link'>";
                echo "<img src='$url' alt=''></a></figure>";
                $date = new DateTime($item->pubDate);
                echo '<p>' . $date->format('g:i a, F j, Y') . '</p>';
                echo "<p>$item->description</p>";
                echo '</article>';
            }
        }
        ?>
    </body>
</html>
