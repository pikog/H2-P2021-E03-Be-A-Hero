  <section class="homepage-register">
    <div class="layer"></div>
    <a href="./home"> <img class="logo" src="./assets/images/logo.png" alt="logo be a hero"> </a>

    <form class="register-form" action="register" method="post">

      <div class="input input-user">
        <input autocomplete="off" maxlength="20" class="input-text user" type="text" id="username" name="username" value="<?= $messages['values']['username'] ?>">
        <label for="username" class="<?= isset($messages['errors']['username']) ? 'error' : ''; ?>">
                <?= isset($messages['errors']['username']) ? $messages['errors']['username'] : 'Username'; ?>
          <label>
      </div>

      <div class="input input-password">
          <input autocomplete="off" maxlength="20" class="input-text user-password" type="password" id="password" name="password">
          <label for="password" class="<?= isset($messages['errors']['password']) ? 'error' : ''; ?>">
              <?= isset($messages['errors']['password']) ? $messages['errors']['password'] : 'Password'; ?>
          <label>
      </div>

      <div class="input input-retype-password">
        <input autocomplete="off" maxlength="20" class="input-text user-re-password" type="password" id="password-retype" name="password-retype">
        <label for="password-retype" class="<?= isset($messages['errors']['password-retype']) ? 'error' : ''; ?>">
                <?= isset($messages['errors']['password-retype']) ? $messages['errors']['password-retype'] : 'Confirm password'; ?>
        <label>
      </div>

      <h2 class="title"> Choose Your Hero !</h2>

      <!-- <input type="hidden" value=""/> -->

      <div class="input input-hero-name">
        <input autocomplete="off" maxlength="20" class="input-text hero-name" type="text" name="hero-name" value="">
        <label> Hero Name <label>
      </div>

      <div class="hero-choice">
        <? foreach ($heroes as $hero) { ?>
          <img class="hero" src="./assets/images/heroes/<?= $hero ?>.png" alt="hero-<?= $hero ?>">
        <? } ?>
      </div>

      <input class="hero-input" type="hidden" name="hero" value="<?= isset($messages['values']['hero']) ? $messages['values']['hero'] : 0; ?>">

      <input type="submit" class="submit" name="submit" value="submit">
    </form>

  </section>
