<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>"AustinZone: Austin's Own Everything from A to Z"</title>
        <link rel="stylesheet" href="styles/land.css"/>
    <body>
        


        <div id="about">
            <a href="az.php">
            <img src="images/azlogo.png" alt="AustinZone Logo" class="escape"/>
        </a>
            <section>
                <aside id="vid">
                <h1 id="tagline">- Austin's Own Everything<span class="lower">:</span> From A to Z-</h1>
                <iframe src="https://www.youtube.com/embed/HiCKcAt2oA0" frameborder="0" allowfullscreen></iframe>
                </aside>
                <article>
                    <h2>AustinZone </h2>
                    <p> aims to highlight all that makes the city awesome by speaking with the people who make it so. Get to know our artists, entrepreneurs, public servants, trendsetters and more by tuning in and joining in.</p>
                    <aside id="cta">
                        <form id="miniform" action="email.php" method="post">
                            <input type="text" name="email" value="" placeholder="Enter your email address"/>
                            <p class="privacy">Your email address will not be sold, shared, or traded with anyone outside of AustinZone <a href="">Privacy Policy</a></p>
                            <button type="submit" name="submit" class="button">GET IN TOUCH</button>
                        </form>
                    </aside>
                </article>
            </section>
        </div>

        <div id="why">
            <section>
                <article>
                    <h3>PR and Promotion</h3>
                    <p>AustinZone is all about providing relevant content to our audience. Your podcast interview will be part of the content that we will be promoting.</p>
                </article>
                <article>
                    <h3>Share Your Experience</h3>
                    <p>Your accomplishments and insights not only inspire entrepreneurs and artists, but they also help others trust you and your brand.</p>
                </article>
                <article>
                    <h3>Meaningful Content</h3>
                    <p>Your current audience will have something new and interesting to share with their networks.</p>
                </article>
            </section>
        </div>
        <div id="contact">

            <section>
                <article>
                    <h1>Let's Talk</h1>
                    <p>If you help to make Austin awesome, I want to hear from you and help everyone else in the city hear from you too. Please get in touch with me by completing the form below. I look forward to our conversation!</p>
                </article>
                <?php include('form.php') ?>
            </section>
        </div>
    </body>
</html>
