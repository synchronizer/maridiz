const showModal = modalId => {
    const modal = document.querySelector(`#${modalId}`);
    if (!modal) {
        console.warn(`No modal with id="#${modalId}"`);
        return
    }
    modal.previous = document.querySelector('.modal[open]');
    if (modal.previous) modal.previous.close();
    modal.showModal();
}

const closeModal = modalElement => {
    modalElement.close();
    if (!modalElement.previous) return;

    modalElement.previous.showModal();

    modalElement.previous = null;
}

Array.from(document.querySelectorAll('[data-modal]')).forEach(modalTrigger => {
    modalTrigger.addEventListener('click', () => { showModal(modalTrigger.getAttribute('data-modal')) })
})

Array.from(document.querySelectorAll('.modal')).forEach(modal => {
    const   modal__close = modal.querySelector('.modal__close'),
            modal__scroller = modal.querySelector('.modal__scroller'),
            modal__content = modal.querySelector('.modal__content');

    modal__close.addEventListener('click', () => { closeModal(modal) })
    modal__scroller.addEventListener('click', () => { closeModal(modal) })

    modal__content.addEventListener('click', e => {
        e.stopPropagation();
    })

})