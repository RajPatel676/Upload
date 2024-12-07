// Handle the form submission
document.getElementById('file-upload-form').addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent default form submission

    const form = event.target;
    const formData = new FormData(form);
    const messageDiv = document.getElementById('message');
    messageDiv.textContent = '';  // Clear previous messages

    // Send the file to the server (Vercel API)
    fetch(form.action, {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            messageDiv.textContent = 'File uploaded successfully!';
            messageDiv.style.color = 'green';
        } else {
            messageDiv.textContent = 'Error uploading file!';
            messageDiv.style.color = 'red';
        }
    })
    .catch(error => {
        messageDiv.textContent = 'Error uploading file!';
        messageDiv.style.color = 'red';
    });
});
