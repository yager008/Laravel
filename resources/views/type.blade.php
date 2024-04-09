@vite(['resources/js/app.js'])

<?php

//Session set
session_start();
if (!isset($_SESSION['textToCompare']))
{
    $_SESSION['textToCompare'] = '';
}

if (!isset($_SESSION['prevTime']))
{
    $_SESSION['prevTime'] = 0;
}

if (!isset($_SESSION['curTime']))
{
    $_SESSION['curTime'] = 0;
}

if(($_SERVER['REQUEST_METHOD'] === "POST") && !empty($_POST['inputTextBox']))
{
    ?>

    <?php
    if (isset($_POST['checkbox'])) {
        App\Http\Controllers\TypeTestController::storeSavedText();
    }

    $_SESSION['curTime'] = 0;
    $_SESSION['textToCompare'] = $_POST['inputTextBox'];
    //+ js before /body
}

if(!empty($_SESSION['textToCompare']))
{
    echo "textToCompare: <div id='textToCompare'>{$_SESSION['textToCompare']}</div><br>";
    $lenOfCompareText = strlen($_SESSION['textToCompare']);
    echo "<div style='float: left';> Length of compare text:</div> <div id='lenOfFullText';> {$lenOfCompareText}</div> <br>";
}

else
{
    echo "text to compare is empty <br>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TypeDasher</title>

    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href=" {{ asset('type.css') }}">



</head>
<body>
<img rel="icon" src="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
<div class="container-fluid d-flex flex-column align-items-center justify-content-center vh-100">

    <div>

        <form method="POST" action="{{ route('TypeTestController.store')}}">
        @csrf
            <input type="text" id="outputSpeed" name="outputSpeed" placeholder="outputSpeed" value="{{ strlen($_SESSION['textToCompare']) }}" readonly style="" >
            <lable for="timer"></lable>
            <input type="text" id="timer" name="timer" readonly style="">
            <input type="submit" id="submitTimeButton" name="submitTimeButton" style="visibility: hidden">
        </form>
    </div>

    <div>
        <form method="POST" action="{{ route('BibleApiController.index') }}">
        @csrf
            <label>
                <button name="BibleButton" id="BibleButton">
                    RandomBibleVerse
                </button>
            </label>
        </form>

        <form method="POST">
        @csrf
            <label>
                <input type="checkbox" title="should save text to savedtexts" name="checkbox" id="checkbox">
            </label>
            <label>
                <input type="text" name="inputTextBox" id="inputTextBox" value="{{(isset($bibleApiResponse))?$bibleApiResponse:''}}">
            </label>
            <label>
                <input type="submit" name="submitButton">
            </label>
        </form>
    </div>
    <div>
        <label for="typeTextInputField"></label><input type="text" id="typeTextInputField" class="form-control w-300 p-3 mw-100" oninput="window.typeTextInputFieldUpdated()" style="width: 800px; ">
    </div>
    <div>
        <br><br>
        <p id="debug_typedTextOutputDisplayNone" style="display: none"></p>
    </div>
    <div>
        <?php
        if(isset($lenOfCompareText)) {
            for ($i = 0; $i < $lenOfCompareText; $i++) {
                if ($_SESSION['textToCompare'][$i] == " ") {
                    echo "<div style='float: left; background-color: #ffffff; opacity: .0;'>/</div> ";
                }
                echo "
            <div id='char{$i}' style='color: blue; float: left'>
                {$_SESSION['textToCompare'][$i]}
            </div>
            ";
            }
        }
        ?>
    </div>
    <div id="debug_bool" style="display: none">
        bool
    </div>
</div>

<?php
if(($_SERVER['REQUEST_METHOD'] === "POST") && !empty($_POST['inputTextBox']))
{ //Запускаем таймер который каждую секунду апдейтит timer value, и output speed, фокусим на typeTextInputField
    ?>
<script>
    let timerCounter = 0;
    window.setInterval(myTimer, 1000);
    function myTimer() {
        timerCounter++;
        let fullTextLength = document.getElementById('lenOfFullText').innerText;

        document.getElementById('timer').value = timerCounter.toString();
        document.getElementById('outputSpeed').value = fullTextLength / timerCounter.toString() * 60;
    }

    document.getElementById('typeTextInputField').focus();
</script>
    <?php
}
?>

@include('type_components.type_results_table');

<hr class="border border-primary border-3 opacity-75">

@include('type_components.saved_texts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
