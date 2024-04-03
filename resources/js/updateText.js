import {textTyped} from "./textTyped.js";

export function updateText() {
    console.log("textUpdated")
    let textToCompare = document.getElementById('textToCompare').textContent;

    let inputTextValue = document.getElementById('textInput').value;
    let inputTextChar = inputTextValue.toString().charAt(1);
    var inputTextLength = inputTextValue.length;

    document.getElementById('output').innerText = inputTextValue;

    //каждый апдейт красим все в синий цвет
    for (let i = 0; i < textToCompare.length; ++i) {
        document.getElementById(('char' + i)).style.color = 'blue'
    }

    //проверяем на корректность написанного
    for (let i = 0; i < inputTextLength; ++i)
    {
        if (textToCompare.charAt(i) === inputTextValue.charAt(i))
        {
            if (document.getElementById(('char' + i )).style.color !== 'red') {
                document.getElementById(('char' + i)).style.color = 'green'
            }
        }
        else
        {
            //если есть хоть одна неправильно написанная буква то весь оставшийся текст красим в красный
            for (let j = i; j < textToCompare.length; ++j)
            {
                document.getElementById(('char' + j)).style.color = 'red'
            }
        }
    }

    if(textToCompare === inputTextValue)
    {
        document.getElementById(('bool')).textContent = 'true'
        console.log("true")
        alert('text typed');
        textTyped();
    }
    else
    {
        document.getElementById(('bool')).textContent = 'false'
        console.log("false")
    }
}
