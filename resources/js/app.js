import './bootstrap';
import Alpine from 'alpinejs';
import './bootstrap';
import './test.js';
import {createChart} from "./chart.js";
import {typeTextInputFieldUpdated} from "./typeTextInputFieldUpdated.js";
import {onSubmitInputTextBoxButtonClicked} from "./onSubmitInputTextBoxButtonClicked.js";
import {startTimer} from "./startTimer.js";

window.typeTextInputFieldUpdated = typeTextInputFieldUpdated;
window.onSubmitInputTextBoxButtonClicked = onSubmitInputTextBoxButtonClicked;
window.createChart = createChart;
window.startTimer = startTimer;
window.Alpine = Alpine;
Alpine.start();
