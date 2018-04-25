<html>
<head>
  <title>reCAPTCHA demo: Explicit render after an onload callback</title>
  <script type="text/javascript">
    
      var onSubmit = function(token) {
        console.log('success!');
      };

      var onloadCallback = function() {
        grecaptcha.render('submit', {
          'sitekey' : 'LfrblUUAAAAALiX2rvaPoijbiE_2IQVhD-qIriW',
          'callback' : onSubmit
        });
      };
  </script>
</head>
<body>
  <form action="?" method="POST">
    <input id='submit' type="submit" value="Submit">
  </form>
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
      async defer>
  </script>
</body>
</html>