<?php

    $errMsg = '';
    $msgClass = '';

    if (filter_has_var(INPUT_POST, 'submit')) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        if (!empty($email) && !empty($name) && !empty($message)) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errMsg = 'Please use a valid email address!';
                $msgClass = 'alert-danger';
            } else {
                $toEmail = 'dudaszeg1@gmail.com';
                $subject = 'Contact Request From '.$name;
                $body = '<h2>Contact Request</h2>
                         <h4>Name</h4><p>'.$name.'</p>
                         <h4>Email</h4><p>'.$email.'</p>
                         <h4>Message</h4><p>'.$message.'</p>';
                         
                $headers = "MIME-Version: 1.0" ."\r\n";
                $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: " .$name. "<" .$email. ">" . "\r\n";

                if (mail($toEmail, $subject, $body, $headers)) {
                    $msg = 'Your email has been sent!';
                    $msgClass = 'alert-success';
                } else {
                    $msg = 'Your email was not sent!';
                    $msgClass = 'alert-danger';
                }
            }
        } else {
            $errMsg = 'Please fill in all fields!';
            $msgClass = 'alert-danger';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <title>Contact Us</title>
</head>
<body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">    
          <a class="navbar-brand" href="contact.php">Contact Us</a>
        </div>
      </div>
    </nav>
    <div class="container">
        <?php if ($errMsg !== ''): ?>
            <div class="alert <?php echo $msgClass; ?>"><?php echo $errMsg; ?></div>
        <?php endif; ?>    	
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>    
</body>
</html>