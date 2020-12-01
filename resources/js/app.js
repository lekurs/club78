require('./bootstrap');

require('alpinejs');
require('randomcolor');

var randomColor = require('randomcolor'); // import the script
var color = randomColor();

const els = document.querySelectorAll('.randcolor')
els.forEach(el => el.style.backgroundColor = color)
