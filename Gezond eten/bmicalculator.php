<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../Gezond eten/styles/style.css">
</head>
<body>
    <div class="navbar">
        <div class="title">
            <h1>Gezond eten</h1>
        </div>
        <div class="buttons">
            <div class="home"><a href="index.html" ><button id="home">Home</button></a></div>
            <div class="calculator"><a href="bmicalculator.php" ><button id="calculator" class="active">BMI calculator</button></a></div>
            <div class="recepten"><a href="recepten.html" ><button id="recepten">Recepten</button></a></div>
        </div>
    </div>
    
    <div class="content">
        <p></p>
        <div class="pagetitle">BMI calculator</div>
        <p></p>
        <div class="calculator">
            <div class="calculatorinput">
                <form action="calculate.php" method="POST">
                    <h2>Lengte</h2>
                    <input type="number" name="lengte" id="lengte" placeholder="Lengte"> cm
                    <p></p>
                    <h2>Gewicht</h2>
                    <input type="number" name="gewicht" id="gewicht" placeholder="Gewicht"> kg
                    <p></p>
                    <h2>Geslacht</h2>
                    <input type="radio" id="man" name="geslacht" value="man"> Man
                    <br>
                    <input type="radio" id="vrouw" name="geslacht" value="vrouw"> Vrouw
                    <p></p>
                    <h2>Leeftijd</h2>
                    <input type="number" id="leeftijd" name="leeftijd" value="leeftijd" placeholder="Leeftijd"> Jaar
                    <p></p>
                    <input type="submit" id="submit" name="submit" value="Bereken BMI">
                    <br>
                </form>
            </div>

            <div class="bmiresults">
                <?php
                
                    session_start();
                    if (!empty($_SESSION["results"])) {
                        echo $_SESSION["results"];
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footertext">

            <div class="socialmedia">
                <h4>Social media:</h4>
                <p></p>
                <div class="twitter">
                    <img src="images/twitterlogo.png" alt="twitter" id="image7">
                    <a href="https://twitter.com/Notarealtwitteraccount" id="twitterlink">Notarealtwitteraccount</a>
                </div>
            </div>

            <div class="madeby">
                <h4>Gemaakt door:</h4>
                <p></p>
                Donnie Engelgeer
            </div>

            <div class="email">
                <h4>Email:</h4>
                <p></p>
                notarealemail@gmail.com
            </div>
        </div>
        <img src="images/banaan.png" alt="banaan" id="image6">
    </div>
</body>
</html>