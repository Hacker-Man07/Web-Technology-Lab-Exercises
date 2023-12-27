// Function to validate the name (First letter should be in capital)
function validateName() {
  const nameInput = document.getElementById('name');
  const nameValue = nameInput.value;

  // Check if the first letter is capitalized
  if (nameValue[0] !== nameValue[0].toUpperCase()) {
    alert('Name must start with a capital letter');
    nameInput.focus();
    return false;
  }
  return true;
}

// Function to validate the email (Follows the email structure)
function validateEmail() {
  const emailInput = document.getElementById('email');
  const emailValue = emailInput.value;

  // Regular expression for basic email validation
  const emailPattern = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;

  if (!emailPattern.test(emailValue)) {
    alert('Invalid email address');
    emailInput.focus();
    return false;
  }
  return true;
}

// Function to validate the phone number (10 digits only)
function validatePhone() {
  const phoneInput = document.getElementById('phone');
  const phoneValue = phoneInput.value;

  // Remove any non-numeric characters from the input
  const numericPhone = phoneValue.replace(/\D/g, '');

  if (numericPhone.length !== 10) {
    alert('Phone number must be 10 digits');
    phoneInput.focus();
    return false;
  }
  return true;
}

// Function to validate the entire form
function validateForm() {
  if (validateName() && validateEmail() && validatePhone()) {
    return true;
  }
  return false;
}
