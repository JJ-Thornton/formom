function changeButtonText() {
  var submitButton = document.querySelector('input[type="submit"]');
  submitButton.value = 'Thank You';
  submitButton.classList.add('clicked');
}
