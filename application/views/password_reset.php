<html>
    <body>
        <form action="<?= base_url('/index.php/users/reset') ?>" method="POST" />
            <input type="hidden" name="username" value="<?=$emails["email"] ?>" />
            <input type="password" name="password" placeholder="New Password" />
            <input type="password" name="repassword" placeholder="Re Enter Password" />
            <input type="submit" value="Reset Password">
        </form>
    </body>
</html>
