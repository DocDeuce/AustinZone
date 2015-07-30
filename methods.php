<?php
if(!class_exists('AZmethods')){
    class AZmethods {
        public function navigation($nav_array, $class){
            $nav = '<ul class="' . $class . '">';
            $nav .= '<a href="az.php"><img src="images/azlogo.png" alt="AustinZone Logo" class="escape"/></a>';
            foreach ($nav_array as $item){
                $nav .= '<li><a href="' . $item['url'] . '"><h3>' . $item['text'] . '</h3></a></li>';
            }
            $nav .= '</ul>';
            return $nav;
        }
        public function rss_feeds($entries, $class){
            foreach ($entries as $item){
                echo "<article class='$class'>";
                echo '<section class="sourceInfo">';
                echo "<a href='source.php?sourceName=" . urlencode($item['src']) . "'>";
                echo '<img class="avatar" src="http://www.google.com/s2/favicons?domain=' . $item['addy'] . '"/>';
                echo '</a>';
                //echo "<a class='srcName' href='source.php?sourceName=" . urlencode($item['src']) . "'>$item[src]</a>";
                echo "<a class='srcName' href='http://" . $item['addy'] . "' target='_blank'>$item[src]</a>";
                echo '<img class="platform" src="images/thin-rss.png"/>';
                //echo "<a class='handle' href='source.php?sourceName=" . urlencode($item['src']) . "'>$item[handle]</a>";
                echo "<a class='handle' href='$item[rssaddy]' target='_blank'>$item[handle]</a>";
                echo '</section><section class="rssShort">';
                if(array_key_exists('media',$item['nmspcs'])){
                    foreach ($item['nmspclmnts'][0] as $thumbnail){
                        $atts = $thumbnail->attributes();
                    }
                    foreach ($atts as $key => $value) {
                        $$key = $value;
                    }
                    echo "<a class='entryPhoto' href='$item[link]'>";
                    echo "<img  src='$url' alt=''></a>";  
                }
                echo "<h2><a target='_blank' href='$item[link]'>$item[title]</a></h2>";
                echo "<p class='desc'>$item[desc]</p>";

                if(array_key_exists('xml',$item['nmspcs'])){
                    //$constr = simplexml_load_string($item['desc']);
                    //print_r($item['desc']);
                }
                //var_dump($item['desc']);
//                var_dump($item['desc'][0]);
//                if(is_string($item['desc'][0])){
//                    echo "yo";
//                    if(stristr($info['desc'], "/>", true)){
//                    }
//                }
                echo '</section></article>';
            }
        }
        public function rss_feed($entries, $class){
            
              foreach ($entries as $item){
               
                echo "<article class='$class'>";
                echo '<section><img class="platform" src="images/thin-rss.png"/></section>';
                echo '<section class="rssEntry">';
                echo "<a href='source.php?sourceName=" . urlencode($item['src']) . "'>";
                echo '<img class="avatar" src="http://www.google.com/s2/favicons?domain=' . $item['addy'] . '"/>';
                echo '</a>';
                echo "<a class='srcName' href='source.php?sourceName=" . urlencode($item['src']) . "'>$item[src]</a>";
                echo '<img class="platform" src="images/thin-rss.png"/>';
                echo "<a class='handle' href='source.php?sourceName=" . urlencode($item['src']) . "'>$item[handle]</a>";
                echo '</section><section class="rssShort">';
                if(array_key_exists('media',$item['nmspcs'])){
                    foreach ($item['nmspclmnts'][0] as $thumbnail){
                        $atts = $thumbnail->attributes();
                    }
                    foreach ($atts as $key => $value) {
                        $$key = $value;
                    }
                    echo "<a class='entryPhoto' href='$item[link]'>";
                    echo "<img  src='$url' alt=''></a>";  
                }
                echo "<h2><a target='_blank' href='$item[link]'>$item[title]</a></h2>";
                echo "<p class='desc'>$item[desc]</p>";
                echo '</section></article>';
            }
        }
    }
}

$azm = new AZmethods;
