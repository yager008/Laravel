import './bootstrap';
import Alpine from 'alpinejs';
import './bootstrap';
import './test.js';
import {createChart} from "./chart.js";
import {typeTextInputFieldUpdated} from "./typeTextInputFieldUpdated.js";
import {onSubmitInputTextBoxButtonClicked} from "./onSubmitInputTextBoxButtonClicked.js";

window.typeTextInputFieldUpdated = typeTextInputFieldUpdated;
window.onSubmitInputTextBoxButtonClicked = onSubmitInputTextBoxButtonClicked;
window.createChart = createChart;
window.Alpine = Alpine;
Alpine.start();
