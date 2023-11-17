function changeButtonText() {
  var submitButton = document.querySelector('input[type="submit"]');
  submitButton.value = 'Thank You';
  submitButton.classList.add('clicked');
}

document.addEventListener('DOMContentLoaded', function () {
  var contactForm = document.getElementById('contactForm');

  if (contactForm) {
    contactForm.addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent the default form submission

      // Serialize the form data
      var formData = new FormData(contactForm);

      // Send an AJAX request to the PHP script using Fetch API
      fetch(contactForm.action, {
        method: 'POST',
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data); // Log the response data to the console
        })
        .catch((error) => {
          console.error('Error:', error);
        });
    });
  }
});
