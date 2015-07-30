<?php
?>
<form id="daform" action="ntouch.php" method="post">
    <section>
        <label for="name_first" class="bald">What's your name?</label>
        <input type="text" name="name_first" id="name_first" value=""/>
    </section>
    <section>
        <label for="creatype">What kind of creator are you?</label>
        <select name="creatype" id="creatype">
            <option>Artist</option>
            <option>Business Owner</option>
            <option>Public Servant</option>
            <option>Other</option>
        </select>
    </section>
    <section>
        <label for="name_biz">What's your business/artist name?</label>
        <input type="text" name="name_biz" id="name_biz" value=""/>
    </section>
    <section>
        <label for="email">Which is the best email address to reach you?</label>
        <input type="text" name="email" id="email" value="" class="bald"/>
    </section>
    <section id="msg">
        <label for="textarea">How can we work together?</label>
        <textarea name="message" value=""></textarea>
    </section>
    <button type="submit" name="submit" class="button">Submit</button>
</form>
