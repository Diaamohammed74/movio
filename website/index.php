<?php
include "../database/db.php";
$sql = " SELECT * FROM `films`";
$result = mysqli_query($connection, $sql);
?>
<?php include "layouts/header.php";?>
    <!---WELCOME REGION-->
    <div id="welcome">
        <div id="heading">ALL YOUR FAVOURITE MOVIES IN ONE PLACE!</div>
        <div id="motto">We will help you find what your heart truly desire and fix your mood every now and then</div>
        <a href=Register.html id=join>SIGN UP TODAY</a>
    </div>
    <!---SUBSCRIBE REGION-->
    <div id="filmcontent">
        <fieldset>
            <legend id="legend">Choose your desired Film </legend>
            <ul>
                <?php foreach ($result as $item): ?>
                    <li>
                        <p class="pp">
                            <?= $item['name'] ?>
                        </p>
                        <a href="film.html"> <img
                                src="<?= "../dashboard/uploads/images/" ?><?= $item['film_img'] ?>"></img></a>
                        <p>
                            <?= $item['desc'] ?>
                        </p>
                        <a href="https://youtu.be/alQlJDRnQkE"><button>Watch Trailer</button></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </fieldset>
    </div>
    <div id="buttom">
        <div id="emailer">
            <div id="ready">Ready to watch? Enter your email to create or restart your membership.</div>
            <div id="search_region">
                <input type="text" name="email" placeholder="Email address" id="email">
                <button type="submit" id="buttoner"><a href="Register.html" id="regy">Get Started!</a></button>
            </div>
        </div>
        <div id="footer">
            <div id="questions">Questions? <a href="about.html" id="conta">Contact Us</a></div>
            <div id="lists">
                <ul id="list_one">
                    <li class="liste">FAQ</li>
                    <li class="liste">Investor Relations</li>
                    <li class="liste">Jobs</li>
                </ul>
                <ul id="list_two">
                    <li class="liste">Help Center</li>
                    <li class="liste">Cookies Policies</li>
                    <li class="liste">Legal Notices</li>
                </ul>
                <ul id="list_three">
                    <li class="liste">Terms of use</li>
                    <li class="liste">Media center</li>
                    <li class="liste">Privacy Policies</li>
                </ul>
            </div>
        </div>
    </div>
<?php include "layouts/footer.php";?>