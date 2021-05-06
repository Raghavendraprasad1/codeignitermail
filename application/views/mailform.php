<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Form</title>
</head>
<body>
 <form action="<?= base_url('emailsend/send') ?>" method="POST">
 <input type="text" name="uname" placeholder="Enter Your Name">
 <input type="email" name="email" placeholder="Enter Your Email" >
 <input type="text" name="contact" placeholder="Enter Contact ">
 <input type="submit" value="Send">
 
 </form>
    
</body>
</html>