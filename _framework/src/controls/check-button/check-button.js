Array.from(document.querySelectorAll('.check-button')).forEach(checkButton => {
    checkButton.addEventListener('click', () => {
        checkButton.classList.toggle('check-button_checked')
    })
    const updateCounter = () => {
        if (!checkButton.getAttribute('data-counter')) return;
        checkButton.querySelector('.button').setAttribute('data-counter', checkButton.getAttribute('data-counter'))
    }

    updateCounter()

    checkButton.addEventListener('change', updateCounter)
})