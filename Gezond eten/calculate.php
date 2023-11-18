<?php

if (isset($_POST['submit'])) {
    if (!empty($_POST['lengte']) AND !empty($_POST['gewicht']) AND !empty($_POST['geslacht']) AND !empty($_POST['leeftijd']) AND $_POST['leeftijd'] >= 6) {
        $lengte = $_POST['lengte'];
        $lengte = $lengte / 100;
        $gewicht = $_POST['gewicht'];
        $geslacht = $_POST['geslacht'];
        $leeftijd = $_POST['leeftijd'];
        if ($leeftijd >= 17) {
            $leeftijd = 17;
        }
        $meisjestelicht = array(13.92, 14.00, 14.16, 14.42, 14.78, 15.25, 15.83, 16.43, 17.01, 17.52, 17.95, 18.50);
        $jongenstelicht = array(14.03, 14.06, 14.20, 14.41, 14.69, 15.03, 15.47, 15.98, 16.54, 17.13, 17.70, 18.50);
        $meisjestezwaar = array(17.34, 17.75, 18.35, 19.07, 19.86, 20.74, 21.68, 22.58, 23.34, 23.94, 24.37, 25.00);
        $jongenstezwaar = array(17.55, 17.92, 18.44, 19.10, 19.84, 20.55, 21.22, 21.91, 22.62, 23.29, 23.90, 25.00);
        $meisjesobesitas = array(19.65, 20.51, 21.57, 22.81, 24.11, 25.42, 26.67, 27.76, 28.57, 29.11, 29.43, 30.00);
        $jongensobesitas = array(19.78, 20.63, 21.60, 22.77, 24.00, 25.10, 26.02, 26.84, 27.63, 28.30, 28.88, 30.00);
        $arrayvalue = $leeftijd - 6;
        $bmi = $gewicht / ($lengte * $lengte);
        $roundedbmi = round($bmi, 2);
        if ($geslacht == 'vrouw') {
            if ($bmi <= $meisjestelicht[$arrayvalue]) {
                $results = "<div class='bmitext'>U BMI waarde is: " . $roundedbmi . "<p>U bent ondergewicht.</p></div>";
            } else if ($bmi >= $meisjestezwaar[$arrayvalue]) {
                if ($bmi >= $meisjesobesitas[$arrayvalue]) {
                    $results = "<div class='bmitext'>U BMI waarde is: " . $roundedbmi . "<p>U bent zwaar overgewicht (obesitas).</p></div>";
                } else {
                    $results = "<div class='bmitext'>U BMI waarde is: " . $roundedbmi . "<p>U bent licht overgewicht.</p></div>";
                }
            } else {
                $results = "<div class='bmitext'>U BMI waarde is: " . $roundedbmi . "<p>U heeft een gezond gewicht.</p></div>";
            }
        } else if ($geslacht == 'man') {
            if ($bmi <= $jongenstelicht[$arrayvalue]) {
                $results = "<div class='bmitext'>U BMI waarde is: " . $roundedbmi . "<p>U bent ondergewicht.</p></div>";
            } else if ($bmi >= $jongenstezwaar[$arrayvalue]) {
                if ($bmi >= $jongensobesitas[$arrayvalue]) {
                    $results = "<div class='bmitext'>U BMI waarde is: " . $roundedbmi . "<p>U bent zwaar overgewicht (obesitas).</p></div>";
                } else {
                    $results = "<div class='bmitext'>U BMI waarde is: " . $roundedbmi . "<p>U bent licht overgewicht.</p></div>";
                }
            } else {
                $results = "<div class='bmitext'>U BMI waarde is: " . $roundedbmi . "<p>U heeft een gezond gewicht.</p></div>";
            }
        }
    } else {
        $results = "<br><div class='errortext'>Sommige waarden zijn niet ingevoerd!</div>";
    }
    if ($_POST['leeftijd'] <= 5) {
        $results = "<br><div class='errortext'>Voor leeftijd worden alleen waardes van 6 of hoger ondersteund!</div>";
    }
    session_start();
    $_SESSION["results"] = $results;
    header('Location: bmicalculator.php');
}
?>