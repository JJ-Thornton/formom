$(document).ready(function () {
  $('#contactForm').submit(function (e) {
    e.preventDefault(); // Prevent the default form submission
    var formData = $(this).serialize(); // Serialize the form data

    $.ajax({
      type: 'POST',
      url: '../php/process-form.php',
      data: formData,
      dataType: 'json',
      success: function (response) {
        if (response.success) {
          changeButtonText();
          console.log('Email sent successfully:', response);
        } else {
          console.log('Email failed: ', response);
        }
      },
      error: function (_jqXHR, _textStatus, errorThrown) {
        console.log('Email sending failed:', errorThrown);
      },
    });
  });
});
