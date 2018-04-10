<section class="homepage-login">
    <div class="layer"></div>
    <img class="logo" src="./assets/images/logo.png" alt="logo Be A Hero">
    <form class="login-form" action="./login" method="post">
        <div class="input input-user">
            <input autocomplete="off" maxlength="30" class="input-text user" type="text" id="username" name="username" value="<?= $messages['values']['username'] ?>">
            <label class="<?= isset($messages['errors']['username']) ? 'error' : ''; ?>">
                <?= isset($messages['errors']['username']) ? $messages['errors']['username'] : 'Username'; ?>
            <label>
        </div>

        <div class="input input-password">
            <input autocomplete="off" maxlength="30" class="input-text user-password" type="password" id="user-password" name="password">
            <label class="<?= isset($messages['errors']['password']) ? 'error' : ''; ?>">
                <?= isset($messages['errors']['password']) ? $messages['errors']['password'] : 'Password'; ?>
            <label>
        </div>

        <input type="submit" class="submit" name="submit" value="Submit">
    </form>
</section>