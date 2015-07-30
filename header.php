<?php include('functions.php')?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>"AustinZone: Austin's Own Everything from A to Z"</title>
        <link rel="stylesheet" href="styles/style.css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!--<script src="js/style.js"></script>-->
    </head>
    <body>
        
        <header id="container">
            <img src="http://www.alteredperspectives.us/wp-content/uploads/2011/12/DW_Austin_Skyline_Panorama-11.jpg" alt="ATXpan"/>
            <article><?php ?>
                <h1>Welcome to AustinZone</h1>
                <p>Thanks for stopping by! Click play below to listen to AustinZone's first podcast. Scroll down to see how other Austinites are keeping our city interesting.</p>
            </article>
<!--            <iframe><?php ?></iframe>    -->
            <iframe id="audio" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/216859012%3Fsecret_token%3Ds-NqS9R&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe> 
        </header>
        <?php echo do_main_nav(); ?>
        <div class="main">
