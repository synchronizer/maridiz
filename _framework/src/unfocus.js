
Array.from(document.querySelectorAll('[data-nofocus]')).forEach(item => {
    item.setAttribute('tabindex', '-1')
    item.addEventListener('focus', () => item.blur())
})