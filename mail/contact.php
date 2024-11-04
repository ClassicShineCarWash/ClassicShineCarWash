<!-- HTML Form Example -->
<form id="contactForm">
  <input type="text" name="name" placeholder="Your Name" required>
  <input type="email" name="email" placeholder="Your Email" required>
  <input type="text" name="subject" placeholder="Subject" required>
  <textarea name="message" placeholder="Your Message" required></textarea>
  <button type="submit">Send Message</button>
</form>

<script src="https://cdn.emailjs.com/dist/email.min.js"></script>
<script>
  // Initialize EmailJS
  (function() {
    emailjs.init("YOUR_USER_ID"); // Replace 'YOUR_USER_ID' with your EmailJS user ID
  })();

  // JavaScript function to handle form submission
  document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();

    // Form validation
    const name = event.target.name.value.trim();
    const email = event.target.email.value.trim();
    const subject = event.target.subject.value.trim();
    const message = event.target.message.value.trim();

    if (!name || !email || !subject || !message) {
      alert("All fields are required.");
      return;
    }

    // Prepare EmailJS parameters
    const templateParams = {
      from_name: name,
      from_email: email,
      subject: subject,
      message: message,
    };

    // Send email via EmailJS
    emailjs.send("YOUR_SERVICE_ID", "YOUR_TEMPLATE_ID", templateParams)
      .then(function(response) {
        console.log("Email sent successfully!", response.status, response.text);
        alert("Message sent successfully!");
        event.target.reset(); // Reset form after submission
      }, function(error) {
        console.error("Email failed to send...", error);
        alert("There was an error sending your message. Please try again later.");
      });
  });
</script>