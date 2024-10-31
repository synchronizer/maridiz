// for_dev


Array.from(document.querySelectorAll('.dev-panel')).forEach(devPanel => {
  const notificationGenerate = devPanel.querySelector('#notification-button');

  notificationGenerate.addEventListener('click', () => {
    window.pushNotification({
      text: 'Уведомлнние',
      type: 'attention',
      autoclose: true,
    });
  })
})



// document.querySelector('#button-title-button').setAttribute('data-counter', document.querySelectorAll('.button:not([title])').length)
// Array.from(document.querySelectorAll('.button:not([title])')).forEach((button) => {
//     button.style.position = 'relative';
//     button.innerHTML += `<div class="dev-warning dev-element dev-warning_no-button-title">No title!</div>`
// })

// document.querySelector('#image-alt-button').setAttribute('data-counter', document.querySelectorAll('img:not([alt])').length)
// Array.from(document.querySelectorAll('img:not([alt])')).forEach(img => {
//     // setWarning(img,'no-image-alt' ,'No alt')
// })