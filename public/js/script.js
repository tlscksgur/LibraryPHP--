const $ = document.querySelector.bind(document)
const $$ = (e) => [...document.querySelectorAll(e)]
const newEl = (t, a) => Object.assign(document.createElement(t), a)