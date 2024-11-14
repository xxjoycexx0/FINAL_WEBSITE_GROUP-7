<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape the Nature!</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <header>
        <img src="../pngtree-women-nature-logo-png-image_4546651.png" alt="Logo" id="logo" />
        <span id="site-name">Sunset Glade</span>
        <div class="button-container">
            <a href="index.php"><button id="home-button">Home</button></a>
            <div class="dropdown">
                <button id="find-vacation-button">Find Your Vacation</button>
                <div class="dropdown-content">
                    <a href="../HTML/allhotel.html">Hotels</a>
                    <a href="../HTML/baguio.html">Baguio</a>
                    <a href="../HTML/Manila.html">Manila</a>
                    <a href="../HTML/Tagaytay.html">Tagaytay</a>
                    <a href="../FindVacation/">Boracay</a>
                    <a href="../FindVacation/">Palawan</a>
                </div>
            </div>
            <a href="../Service/service.html"><button id="about-button">About</button></a>
            <a href="../CONTACT/contact.html"><button id="contact-button">Contact Us</button></a>

            <?php if (isset($_SESSION['username'])): ?>
                <span id="welcome-message">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="../LOGINSIGNUP/logout.php"><button id="logout-button">Logout</button></a>
            <?php else: ?>
               
            <?php endif; ?>
        </div>
    </header>
    <div class="slider">

        <div class="list">
            <div class="item active">
                <img src="../TAGAYTAY/tourist_attractions_in_tagaytay.jpg">
                <div class="content">
                    <p>Escape of nature</p>
                    <h2>Tagaytay</h2>
                    <p>
                       Tagaytay is considered to be the second Summer capital of the Philippines with the first being Baguio due to its cool climate and, thus, is a favored destination from those relatively more humid areas of the Philippines. Tagaytay is also a destination for tourists seeking views of Taal Volcano and the surrounding lake.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../BAGUIO/istockphoto-917512366-612x612.jpg">
                <div class="content">
                    <p>Escape of nature</p>
                    <h2>Baguio</h2>
                    <p>
                        Especially during and after the pandemic, the city government carried the “Breathe Baguio” tagline not just for tourism promotion but also to encourage people to take in the relaxing impact of being with nature.Aug 5, 
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../PALAWAN/shutterstock_2432798391.webp">
                <div class="content">
                    <p>Escape of nature</p>
                    <h2>Palawan</h2>
                    <p>
                        This island province is an adventurer's dream, bursting with exotic flora and fauna, primeval caves, and secluded beaches. From exploring indigenous settlements to kayaking among limestone cliffs, Palawan offers endless opportunities for adventure.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../LAUNION/images.jpg">
                <div class="content">
                    <p>Escape of nature</p>
                    <h2>La union</h2>
                    <p>
                        The words, LOVE, UNION, CONCORD from an apt motto of the province. LOVE is the Christian law. The Holy Bible admonishes that “He who does not love does not know God for God is love.” (1 John 4:8) But people, even if they love one another cannot accomplish mush if they are poles apart. They must be united together.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../BORACAY/images.jpg">
                <div class="content">
                    <p>Escape of nature</p>
                    <h2>Boracay</h2>
                    <p>
                        Paradise found. Sun, sand, and endless memories. Living life one sunset at a time in Boracay. Beach, please!
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../MANILA/images.jpg">
                <div class="content">
                    <p>Escape of nature</p>
                    <h2>Manila</h2>
                    <p>
                        Paradise found. Sun, sand, and endless memories. Living life one sunset at a time in Boracay. Beach, please!
                    </p>
                </div>
            </div>
        </div>
 
        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
 
        <div class="thumbnail">
            <div class="item active">
                <img src="../TAGAYTAY/tourist_attractions_in_tagaytay.jpg">
                <div class="content">Tagaytay </div>
            </div>
            <div class="item">
                <img src="../BAGUIO/istockphoto-917512366-612x612.jpg">
                <div class="content">Baguio</div>
            </div>
            <div class="item">
                <img src="../PALAWAN/shutterstock_2432798391.webp">
                <div class="content">Palawan</div>
            </div>
            <div class="item">
                <img src="../LAUNION/images.jpg">
                <div class="content">La union</div>
            </div>
            <div class="item">
                <img src="../BORACAY/images.jpg">
                <div class="content">BORACAY</div>
            </div>
            <div class="item">
                <img src="../MANILA/images.jpg">
                <div class="content">Manila</div>
            </div>
        </div>
    </div>

    <script src="../JAVASCRIPT/script.js"></script>
</body>
</html>
