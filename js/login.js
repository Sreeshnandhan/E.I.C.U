const form = document.getElementById('signup-form');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // Prevent default form submission

  const username = document.getElementById('username').value;
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirm-password').value;

  // Simple validation (replace with server-side validation)
  if (password !== confirmPassword) {
    alert('Passwords do not match!');
    return;
  }else{
    window.location.href="movies.html"
  }

  // Simulate form submission (replace with actual logic to send data to server)
  console.log('Sending data to server:', { username, email, password });
  alert('Your account has been created!');
});
