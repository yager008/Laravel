@vite(['resources/js/app.js'])

<?php
    //сетим див с текстом из апи
if (!empty($textToCompare)) {
    echo "<div style='display: none';>";
    echo "textToCompare: <div id='textToCompare'>{$textToCompare}</div><br>";
    $lenOfCompareText = strlen($textToCompare);
    echo "<div style='float: left';> Length of compare text:</div> <div id='lenOfFullText';> {$lenOfCompareText}</div> <br>";
} else {
    echo "text to compare is empty <br>";
}
echo "</div>";

    //сетим таймер
if (isset($bShouldStartTimer) && $bShouldStartTimer) {
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TypeDasher</title>
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{ asset('type.css') }}">
</head>
<body>

<script>

</script>

<div class="container-fluid d-flex flex-column align-items-center justify-content-center vh-100">

    <div>
        <form method="POST" action="{{route('TypeTestController.store')}}">
            @csrf
            <input type="text" id="outputSpeed" name="outputSpeed" placeholder="outputSpeed"
                   value="{{ strlen($textToCompare)}}" readonly style="">
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

        <form autocomplete="off" method="POST" action="{{ route('TypeTestController.storeSavedTextIfCheckBoxIsOn') }}">
            @csrf
            <label>
                <input type="checkbox" title="should save text to saved_texts" name="checkbox" id="checkbox">
            </label>

            <label>
                <input type="text" name="inputTextBox" id="inputTextBox"
                       value="{{(isset($bibleApiResponse))?$bibleApiResponse:''}}">
            </label>

            <label>
                <input type="submit" name="submitInputTextBoxButton">
            </label>
        </form>
    </div>
    <div>
        <label for="typeTextInputField"></label>
        <input autocomplete="off" type="text" id="typeTextInputField" class="form-control w-300 p-3 mw-100"
               oninput="window.typeTextInputFieldUpdated()" style="width: 800px; ">
    </div>
    <div>
        <br><br>
        <p id="debug_typedTextOutputDisplayNone" style="display: none"></p>
    </div>
    <div>
        @include('type_components.text_to_type_in_dynamic_color_chars')
    </div>
</div>

@include('type_components.type_results_table');

<hr class="border border-primary border-3 opacity-75">

@include('type_components.saved_texts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

