<html>
<head>
  <title>reCAPTCHA demo: Explicit render for multiple widgets</title>
  <script type="text/javascript">
    var verifyCallback = function(response) {
      alert(response);
    };
    var onloadCallback = function() {
      
      grecaptcha.render('recaptcha', {
        'sitekey' : '6LfrblUUAAAAALiX2rvaPoijbiE_2IQVhD-qIriW',
        'callback' : verifyCallback,
        'theme' : 'dark'
      });
    };
  </script>
</head>
<body>
  
  <!-- POSTs back to the page's URL upon submit with a g-recaptcha-response POST parameter. -->
  <form action="?" method="POST">
    <div id="recaptcha"></div>
    <br>
    <input type="submit" value="Submit">
  </form>
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
      async defer>
  </script>
</body>
</html>