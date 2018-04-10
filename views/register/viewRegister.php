  <section class="homepage-register">
    <div class="layer"></div>
    <img class="logo" src="./assets/images/logo.png" alt="logo Be A Hero">
    <form class="register-form" action="register" method="post">

      <div class="input input-user">
        <input autocomplete="off" maxlength="30" class="input-text user" type="text" id="username" name="username" value="<?= $messages['values']['username'] ?>">
        <label for="username" class="<?= isset($messages['errors']['username']) ? 'error' : ''; ?>">
                <?= isset($messages['errors']['username']) ? $messages['errors']['username'] : 'Username'; ?>
          <label>
      </div>

      <div class="input input-password">
          <input autocomplete="off" maxlength="30" class="input-text user-password" type="password" id="password" name="password">
          <label for="password" class="<?= isset($messages['errors']['password']) ? 'error' : ''; ?>">
              <?= isset($messages['errors']['password']) ? $messages['errors']['password'] : 'Password'; ?>
          <label>
      </div>

      <div class="input input-retype-password">
        <input autocomplete="off" maxlength="30" class="input-text user-re-password" type="password" id="retype-password" name="retype-password">
        <label for="retype-password" class="<?= isset($messages['errors']['retype-password']) ? 'error' : ''; ?>">
                <?= isset($messages['errors']['retype-password']) ? $messages['errors']['retype-password'] : 'Confirm password'; ?>
        <label>
      </div>

      <input type="submit" class="submit" name="submit" value="Submit">
    </form>

  </section>
