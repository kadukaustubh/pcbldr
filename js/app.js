const header = document.querySelector('header');
const h2 = document.querySelector('h2');
const logo = document.querySelector('.logo');
const links = document.querySelector('.links');
const nav = document.querySelector('nav');
const footer = document.querySelector('footer');

const tl = new TimelineMax();

tl.fromTo(logo, 0.5, {opacity: 0, x: 30}, {opacity: 1, x: 0})
.fromTo(links, 0.5, {opacity: 0, x: 50}, {opacity: 1, x: 0}, '-=0.5')
.fromTo(h2, 0.5, {opacity: 0, x: 30}, {opacity: 1, x: 0}, '-=0.5')
.fromTo(nav, 0.5, {opacity: 0, x: 30}, {opacity: 1, x: 0}, '-=0.5')
.fromTo(footer, 0.5, {opacity: 0, x: 30}, {opacity: 1, x: 0}, '-=0.5');