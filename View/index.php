<?php $title = "Homepage" ;
$css = "./public/assets/css/style.css";

ob_start();
?>
    <h1>HOMEPAGE</h1>
    <!-- <header>
            <nav>
                <ul>
                    <li><a href="./people">people</a></li>
                </ul>
                <ul>
                    <li><a href="http://">moncul</a></li>
                </ul>
                <ul>
                    <li><a href="http://"></a></li>
                </ul>
                <ul>
                    <li><a href="http://"></a></li>
                    <a href="http://"></a>
                </ul> -->
            <!-- </nav> -->
    <!-- </header> -->
<?php
$content = ob_get_clean();

require("layout/template.php");

