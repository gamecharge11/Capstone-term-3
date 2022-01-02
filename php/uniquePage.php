<?php 
include '../config/conf.ini.php';
$template = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$username</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family:sans-serif;
            font-weight:lighter;
            color:white;
        }
        .name {
            text-align: center;
            font-size:3em;
        }
        body {
            height: 100vh;
            background:linear-gradient(45deg,#5DC2FF,#85D1FF,#61C1FF);
            display: flex;
            flex-direction:column;
            justify-content: space-evenly;
        }
        .wrap {
            width:100vw;
            height:70vh;
            display:flex;
            justify-content:space-between;
        }
        .left,
        .right {
            width:470px;
            height:500px;
            background:#6ecdff;
            border:3px solid rgba(255,255,255,0.2);
            margin-left:50px;
            margin-right:50px;
            border-radius:20px;
            display: flex;
            flex-direction:column;
            justify-content:space-evenly;
            align-items:flex-start;
            box-shadow: 5px 5px 34px 0px rgba(0,0,0,0.1);
            -webkit-box-shadow: 5px 5px 34px 0px rgba(0,0,0,0.1);
            -moz-box-shadow: 5px 5px 34px 0px rgba(0,0,0,0.1);
        }
        .ct {
            font-size:1.9em;
        }
        .ds {
            font-size:1.7em;
        }
        .ct,.ds,.ct-rep,.ds-rep,.ct-l,.ds-l,.ct-rep {
            margin-left:20px;
        }
        .ct-l {
            font-size:2em;
        }
        .ds-l {
            font-size:1.6em;
        }
        .ds-rep {
            font-size:1.9em;
            font-weight:bold;
        }
    </style>
</head>
<body>
    <h1 class="name">$username</h1>
    <div class="wrap">
        <div class="left">
            <div class="group">
                <h1 class="ct">Questions Asked:</h1>
                <h3 class="ds">$asked</h3>
            </div>
            <div class="group">
                <h1 class="ct">Questions Attempted:</h1>
                <h3 class="ds">$attempted</h3>
            </div>
            <div class="group">
                <h1 class="ct">Questions marked correct:</h1>
                <h3 class="ds">$correct</h3>
            </div>
        </div>
        <div class="right">
            <div class="group">
                <h1 class="ct-rep">Reputation:</h1>
                <h3 class="ds-rep">$reputation</h3>
            </div>
            <div class="group">
                <h1 class="ct-l">Last Online:</h1>
                <h3 class="ds-l">$online</h3>
            </div>
            <div class="group">
                <h1 class="ct-l">Correct Answer Rate:</h1>
                <h3 class="ds-l">$perc</h3>
            </div>
        </div>
    </div>
</body>
</html>';
$email = '';
if (isset($_COOKIE['email']) && $_COOKIE['email'] != 'None') {
    $email = $_COOKIE['email'];
}else {
    $email = $_SESSION['email'];
}
$r = mysqli_query($con,"SELECT * from users WHERE email = '$email'");
$ref = $r -> fetch_assoc();

$vars = array(
    '$username' => $ref['username'],
    '$asked' => $ref['asked'],
    '$attempted' => $ref['attempted'],
    '$correct' => $ref['correct'],
    '$reputation' => $ref['reputation'],
    '$online' => $ref['online'],
    '$perc' => (intval($ref['attempted']) == 0 && intval($ref['correct']) == 0 || intval($ref['attempted']) == 0 ) ? "0%" : strval(round((intval($ref['correct'])/intval($ref['attempted']))*100,1))."%",
);

$html = strtr($template,$vars);

// NEW FILE 

$flName = $ref['username'];

$flName = preg_replace('/\s*/', '', $flName);

$flName = strtolower($flName);

$name = "../users/".$flName.".html";

$fl = fopen($name,'w');
fwrite($fl,$html);
fclose($fl);
echo "1";
?>