Array.from(document.querySelectorAll('.carousel')).forEach(carousel => {
    const   left = carousel.querySelector('.carousel__left'),
            right = carousel.querySelector('.carousel__right'),
            content = carousel.querySelector('.carousel__content');

    const checkControls = () => {
        if (content.scrollLeft <= 0) {
            left.classList.add('carousel__left_hide')
        } else {
            left.classList.remove('carousel__left_hide')
        }

        if (content.offsetWidth + content.scrollLeft >= content.scrollWidth) {
            right.classList.add('carousel__right_hide')
        } else {
            right.classList.remove('carousel__right_hide')
        }

    }

    window.addEventListener('load', checkControls)
    
    content.addEventListener('scroll', checkControls)

    left.addEventListener('click', () => {
        content.scrollTo({
            top: 0,
            left: content.scrollLeft - content.offsetWidth * .99,
            behavior: "smooth",
          });
    })

    right.addEventListener('click', () => {
        content.scrollTo({
            top: 0,
            left: content.scrollLeft + content.offsetWidth * .99,
            behavior: "smooth",
          });
    })
})