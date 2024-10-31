Array.from(document.querySelectorAll('.example')).forEach(example => {
    const example__htmlSrc = example.querySelector('.example__html-src'),
          example__block = example.querySelector('.example__block'),
          example__htmlReset = example.querySelector('.example__html-reset');

    example__htmlSrc.value = example__block.innerHTML;

    const reset = example__block.innerHTML;

    example__htmlSrc.addEventListener('input', () => {
        example__block.innerHTML = example__htmlSrc.value;
    })

    example__htmlReset.addEventListener('click', () => {
        example__block.innerHTML = reset;
        example__htmlSrc.value = reset;
    })
})