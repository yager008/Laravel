import './bootstrap';
import Alpine from 'alpinejs';
import './bootstrap';
import './test.js';
import './chart.js'
import {typeTextInputFieldUpdated} from "./typeTextInputFieldUpdated.js";
import {onSubmitInputTextBoxButtonClicked} from "./onSubmitInputTextBoxButtonClicked.js";

window.typeTextInputFieldUpdated = typeTextInputFieldUpdated;
window.onSubmitInputTextBoxButtonClicked = onSubmitInputTextBoxButtonClicked;
window.Alpine = Alpine;
Alpine.start();
