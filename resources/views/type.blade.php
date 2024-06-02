@vite(['resources/js/app.js'])

<script>
    function StartTimer () {
        let timerCounter = 0;
        window.setInterval(myTimer, 1000);
        document.getElementById('timer').value = 0;

        function myTimer() {
            timerCounter++;
            let fullTextLength = document.getElementById('lenOfFullText').innerText;
            document.getElementById('timer').value = timerCounter.toString();
            document.getElementById('outputSpeed').value = fullTextLength / timerCounter.toString() * 60;
        }
    }
</script>

<?php

echo auth()->user()['timezone'];

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
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('typeTextInputField').focus();

        StartTimer();
    });
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


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
{{--                    {{ __("You're logged in!") }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

</x-app-layout>


<!-- Dialog Box for result -->
<dialog id="dialogBox">
    <p id="dialogMessage"></p>
    <button onclick="closeDialog()">Close</button>
</dialog>


<script>
    if({{$bShowDialogBoxWithResult}}) {
        document.getElementById('dialogMessage').innerText = "{{$dialogBoxContent}}";
        document.getElementById('dialogBox').showModal();
    }
</script>

<div class="container-fluid d-flex flex-column align-items-center justify-content-center vh-100">
    <p>{{$updateInfo}}</p>

    <div>
        <form method="POST" action="{{route('TypeTestController.store')}}">
            @csrf
            <input type="text" id="outputSpeed" name="outputSpeed" placeholder="outputSpeed"
                   value="{{ strlen($textToCompare)}}" readonly style="display: none">
            <lable for="timer"></lable>
            <input type="text" id="timer" name="timer" readonly style="">
            <input type="text" id="numberOfMistakes" name="numberOfMistakes" readonly style="">
            <label>
                <input type="text" name="savedTextId" id="savedTextId" value=" {{ (isset($idOfSavedText))?$idOfSavedText:'' }}" style="visibility: ">
{{--                value="{{(isset($savedTextID))?$savedTextID:''}}">--}}

{{--                <input type="text" name="savedTextId" id="savedTextId" value="">--}}
            </label>
            <input type="submit" id="submitTimeButton" name="submitTimeButton" style="hidden">
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

        <form method="POST" action="{{ route('LoremApiController.index') }}">
            @csrf
            <label>
                <button name="LoremButton" id="LoremButton">
                    LoremButton
                </button>
            </label>
        </form>

        <form autocomplete="off" method="POST" action="{{ route('TypeTestController.storeSavedTextIfCheckBoxIsOn') }}">
            @csrf

            <label>
                <input type="text" name="savedTextName" id="savedTextName" placeholder="name of text to save" style="visibility: hidden" >
            </label>

            <label>
                <input type="checkbox" title="should save text to saved_texts" name="checkbox" id="checkbox">
            </label>

            <label>
                <input type="text" name="inputTextBox" id="inputTextBox"
                       value="{{(isset($textToSetInInputTextBox))?$textToSetInInputTextBox:''}}">
            </label>

            <label>
                <input type="text" name="savedTextID" id="savedTextID" style="display: non"
                    value="{{(isset($savedTextID))?$savedTextID:''}}">
            </label>

            <label>
                <input type="submit" name="submitInputTextBoxButton" id="submitInputTextBoxButton">
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
        <p id="debug_typedTextOutputDisplayNone" style="display: "></p>
    </div>
    <div>
        @include('type_components.text_to_type_in_dynamic_color_chars')
    </div>
</div>

{{--@include('type_components.type_results_table');--}}

@include('type_components.chart')

@include('type_components.saved_texts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<div style="width: 800px;"><canvas id="acquisitions"></canvas></div>

<form id="exitSavedTextModeForm" action="{{ route('TypeTestController.exitSavedTextMode') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
    const inputTextBox = document.getElementById('inputTextBox');
    const savedTextID = document.getElementById('savedTextID');
    const exitSavedTextModeForm = document.getElementById('exitSavedTextModeForm');

    inputTextBox.addEventListener('input', function () {
        if(savedTextID.value !== "") {
            savedTextID.value = "";
            exitSavedTextModeForm.submit();
        }
    });

    const typeTextInputField = document.getElementById('typeTextInputField');
    const textToCompare = "{{$textToCompare}}";
    const timer = document.getElementById('timer')
    const submitButton = document.getElementById('submitInputTextBoxButton')

    typeTextInputField.addEventListener('input', function () {
        if(typeTextInputField.value.length === 1 && timer.value === "") {
            StartTimer();
        }
    });

    const checkbox = document.getElementById('checkbox')
    const savedTextName = document.getElementById('savedTextName')

    checkbox.addEventListener("click", function () {
        if(checkbox.checked) {
            savedTextName.style = '';
        }
        else {
            savedTextName.style = 'visibility: hidden';

        }


    });

</script>

</body>
</html>

