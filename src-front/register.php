<?php include './partials/_header.php'; ?>

<body>
  <section class="homepage-register">
    <div class="layer"></div>
    <img class="logo" src="../assets/images/logo.png" alt="logo Be A Hero">
    <form class="register-form" action="#" method="post">

      <div class="input input-user">
        <input autocomplete="off" maxlength="30" class="input-text user" type="text" id="user" name="user-name" value="" required>
        <label> Username <label>
      </div>

      <div class="input input-password">
        <input autocomplete="off" maxlength="30" class="input-text user-password" type="text" id="user-password" name="user-password" value="" required>
        <label> Hero Name <label>
      </div>

      <div class="input input-password">
        <input autocomplete="off" maxlength="30" class="input-text user-password" type="text" id="user-password" name="user-password" value="" required>
        <label> Password <label>
      </div>

      <input type="submit" class="submit" name="submit" value="Submit">
    </form>

  </section>
</body>
