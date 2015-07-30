<?php
include('methods.php');
include('includes/pdo_connect.php');

function do_main_nav(){
    global $azm;
    $class = "main_nav";
    $nav_array = array(
        array('text' => 'About','url' => '/AustinZone/about.php'),
        array('text' => 'Podcast','url' => '/AustinZone/podcast.php'),
        array('text' => 'Contact','url' => '#contact'),
        array('text' => '- Get Featured-','url' => '/AustinZone/acq.php')
    );  
    return $azm->navigation($nav_array,$class);
}
function get_all($spec){
    global $db;
    $sql = "SELECT * FROM sources WHERE " . $spec;
    $result = $db -> query($sql);
    $all = $result -> fetchAll(PDO::FETCH_ASSOC);
    return $all;
}
function get_all_rss($spec, $class){
    global $db;   
    $sql = "SELECT sourceid, sourceName, sourceWeb, rss, alias FROM sources WHERE " . $spec;
    $result = $db -> query($sql);
    $all = $result -> fetchAll(PDO::FETCH_ASSOC);    
//Empty array for pushing xml feeds into as they are discovered by the loop
    $feeds = array();
//Check for rss feed link
    foreach ($all as $source) {
        $srcfeed = array();
        $srcfeed['src'] = $source['sourceName'];
        $srcfeed['addy'] = $source['sourceWeb'];
        $url = $source['rss'];
        $cache = 'xml/' . $source['alias'] . '.xml';
        $lifetime = 60 * 10;
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
    // if the cache file exists, suppress errors and load it as SimpleXML
        if (file_exists($cache)) {
            libxml_use_internal_errors(true);
            $srcfeed['cache'] = $cache;
            $srcfeed['feed'] = simplexml_load_file($cache);
        }
        array_push($feeds, $srcfeed);     
    }
    parss($feeds, $class);
}

function get_one_rss($rssrc, $alias){
        $cache = 'xml/' . $alias . '.xml';
        $lifetime = 60 * 60;
    // find out when the cache was last updated
        if (file_exists($cache)) {
            $modified = filemtime($cache);
        }
    // create or update the cache if necessary
        if (!isset($modified) || $modified + $lifetime < time()) {
            if ($xml = @ file_get_contents($rssrc)) {
                file_put_contents($cache, $xml);
            }
        }
    // if the cache file exists, suppress errors and load it as SimpleXML
        if (file_exists($cache)) {
            libxml_use_internal_errors(true);
            //$srcfeed['cache'] = $cache;
            $srcfeed = simplexml_load_file($cache);
            //return $srcfeed;
        }
        artclink($srcfeed);
}


function artclink($srcfeed){
    global $azm;
    $grablink = $srcfeed->channel->item;
    $entries = array();
    
    foreach($grablink as $entry){
        array_push($entries, $entry->link);
    }
    domgrab($entries);
}

function domgrab($entries){
    $rtcls = array();
    foreach ($entries as $entry){
        
        $get_html = file_get_contents($entry);
        $dom = new DOMDocument();
        $dom->loadHTML($get_html);
        $ntri = $dom->getElementsByTagName('article');
        $thestuff = $ntri->item(0)->nodeValue;
        echo hasChildNodes($ntri);
//        for ($i = 0; $i < $ntri->length; $i++) {
//            $thestuff = $ntri->item($i)->nodeValue;
//            echo $thestuff->saveHTML();
//        }
        //echo "<pre>" . $thestuff . "</pre>";
        
//$domnh = $dom->saveHTML();
        //array_push($rtcls, );
    }
    print_r($rtcls);
//    echo '<pre>';
//    print_r($rtcls);
//    echo '</pre>';
//    foreach ($rtcls as $rtcl){
//        var_dump($rtcl);
//        $see = $rtcl->nodeValue;
//        echo $see;
//    }
    
}

function parss($feeds, $class){
    global $azm;
    $entries = array();
    foreach($feeds as $feed){
        $src = $feed['src'];
        $addy = $feed['addy'];
        $entry = $feed['feed'];
        $namespaces = $entry->getNamespaces(true);
        $nametypes = array_keys($namespaces);
        $handle = $entry->channel->title;
        $rssaddy = $entry->channel->link;
        $stories = $entry->channel->item;
        foreach($stories as $story){
            $nmspclmnts = array();
            foreach($nametypes as $nt){
                array_push($nmspclmnts, $story->children($namespaces[$nt]));
            }
            $storypost = array (
                'src' => $src,
                'addy' => $addy,
                'nmspcs' => $namespaces,
                'nmspclmnts' => $nmspclmnts,
                'handle' => $handle,
                'rssaddy' => $rssaddy,
                'title' => $story->title,
                'desc' => $story->description,
                'link' => $story->link,
                'date' => strtotime($story->pubDate)            
            );
            array_push($entries, $storypost);
        }
    }
    return $azm->rss_feeds($entries, $class);
}

function new_email($userEmail){
    global $db;
    $sql = "INSERT INTO contacts (email) VALUES ('{$userEmail}')";
    $result = $db -> query($sql);
    header("Location: thanks.php"); /* Redirect browser */
    exit();
}
function new_contact($cntct){
    global $db;
    $n = $cntct['name_first'];
    $c = $cntct['creatype'];
    $b = $cntct['name_biz'];
    $e = $cntct['email'];
    $m = $cntct['message'];
    switch ($cntct['creatype']){
        case "Artist":
            $c = "1";
            break;
        case "Business Owner":
            $c = "2";
            break;
        case "Public Servant":
            $c = "3";
            break;
        case "Other":
            $c = "4";
            break;
    }
    $sql = "INSERT INTO contacts (name, creatorTypeId, bizName, email, message) VALUES ('{$n}','{$c}','{$b}','{$e}','{$m}')";
    $result = $db -> query($sql);
    header("Location: thanks.php"); /* Redirect browser */
    exit();
}
?>