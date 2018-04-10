  <section class="homepage-register">
    <div class="layer"></div>
    <img class="logo" src="./assets/images/logo.png" alt="logo Be A Hero">
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
        <input autocomplete="off" maxlength="20" class="input-text user-re-password" type="password" id="retype-password" name="retype-password">
        <label for="retype-password" class="<?= isset($messages['errors']['retype-password']) ? 'error' : ''; ?>">
                <?= isset($messages['errors']['retype-password']) ? $messages['errors']['retype-password'] : 'Confirm password'; ?>
        <label>
      </div>

      <h2 class="title"> Choose Your Hero !</h2>

      <!-- <input type="hidden" value=""/> -->

      <div class="input input-hero-name">
        <input autocomplete="off" maxlength="20" class="input-text hero-name" type="text" name="hero-name" value="">
        <label> Hero Name <label>
      </div>

      <div class="hero-choice">
        <img class="hero 1" src="./assets/images/hero-test.png" alt="hero">
        <img class="hero 2" src="./assets/images/hero-test.png" alt="hero">
        <img class="hero 3" src="./assets/images/hero-test.png" alt="hero">
        <img class="hero 4" src="./assets/images/hero-test.png" alt="hero">
        <img class="hero 5" src="./assets/images/hero-test.png" alt="hero">
        <img class="hero 6" src="./assets/images/hero-test.png" alt="hero">
        <img class="hero 7" src="./assets/images/hero-test.png" alt="hero">
        <img class="hero 8" src="./assets/images/hero-test.png" alt="hero">
        <img class="hero 9" src="./assets/images/hero-test.png" alt="hero">
      </div>

      <input class="hero-input" type="hidden" name="hero-choice" value="">

      <input type="submit" class="submit" name="submit" value="Submit">
    </form>

  </section>
