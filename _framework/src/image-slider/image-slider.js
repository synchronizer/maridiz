Array.from(document.querySelectorAll('.image-slider')).forEach(imageSlider => {
    const   left = imageSlider.querySelector('.image-slider__left'),
            right = imageSlider.querySelector('.image-slider__right'),
            content = imageSlider.querySelector('.image-slider__content');

    const checkControls = () => {
        if (content.scrollLeft <= 0) {
            left.classList.add('image-slider__left_hide')
        } else {
            left.classList.remove('image-slider__left_hide')
        }

        if (content.offsetWidth + content.scrollLeft >= content.scrollWidth - 1) {
            right.classList.add('image-slider__right_hide')
        } else {
            right.classList.remove('image-slider__right_hide')
        }

    }

    window.addEventListener('load', checkControls)
    
    content.addEventListener('scroll', checkControls)

    left.addEventListener('click', () => {
        content.scrollTo({
            top: 0,
            left: content.scrollLeft - content.offsetWidth,
            // behavior: "smooth",
          });
    })

    right.addEventListener('click', () => {
        content.scrollTo({
            top: 0,
            left: content.scrollLeft + content.offsetWidth,
            // behavior: "smooth",
          });
    })
})