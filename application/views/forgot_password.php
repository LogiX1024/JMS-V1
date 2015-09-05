<html>

    <body>
        
        <form action="<?= base_url('/index.php/users/forgot_pw') ?>" method="POST">
            <input type="email" name="username" />
            <input type="submit" name="submit" value="Send Reset Link"/>
        </form>

    </body>

</html>