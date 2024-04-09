import {textTyped} from "./textTyped.js";

export function typeTextInputFieldUpdated() {
    console.log("typeTextInputFieldUpdated")
    let textToCompare = document.getElementById('textToCompare').textContent;
    let typeTextInputFieldValue = document.getElementById('typeTextInputField').value;
//    let inputTextChar = typeTextInputFieldValue.toString().charAt(1); ? вроде нигде не юзается
    let typeTextInputFieldValueLength = typeTextInputFieldValue.length;

    // сетим дебаг див
    document.getElementById('debug_typedTextOutputDisplayNone').innerText = typeTextInputFieldValue;

    //каждый текст апдейт красим все чары в синий цвет
    for (let i = 0; i < textToCompare.length; ++i) {
        document.getElementById(('char' + i)).style.color = 'blue'
    }

    //проверяем на корректность написанного
    for (let i = 0; i < typeTextInputFieldValueLength; ++i) {
        if (textToCompare.charAt(i) === typeTextInputFieldValue.charAt(i)) {
            if (document.getElementById(('char' + i )).style.color !== 'red') {
                document.getElementById(('char' + i)).style.color = 'green'
            }
        }
        else {
            //если есть хоть одна неправильно написанная буква то весь оставшийся текст красим в красный
            for (let j = i; j < textToCompare.length; ++j) {
                document.getElementById(('char' + j)).style.color = 'red'
            }
        }
    }

    if(textToCompare === typeTextInputFieldValue) {
        //document.getElementById(('debug_bool')).textContent = 'true'
        textTyped();
    }
    else {
        //document.getElementById(('debug_bool')).textContent = 'false'
    }
}
