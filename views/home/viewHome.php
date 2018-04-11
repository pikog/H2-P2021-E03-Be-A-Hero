<section class="page-home">
    <?php include './views/partials/_top-bar-home.php'; ?>
    <a href="./home"> <img class="logo" src="./assets/images/logo.png" alt="logo be a hero"> </a>
    <div class="hero-infos">
      <img class="hero" src="./assets/images/heroes/<?= $user['hero']; ?>.png" alt="hero">
      <div class="infos">
        <h2 class="name"><?= $user['heroName']; ?></h2>
        <h2 class="level-title">LEVEL</h2>
        <div class="level">
          <h1 class="level-text"><?= $user['level']; ?></h1>
        </div>
      </div>
    </div>

    <!-- can i use = 97% on mobile -->
    <div class="xp">
      <meter class="meter" value="<?= $user['xp']; ?>" min="0" max="<?= $xpToNext; ?>"></meter>
      <div class="xp-text">
        <span class="current-xp"><?= $user['xp']; ?></span>
        <span class="max-xp"><?= $xpToNext; ?></span>
      </div>
    </div>

    <h1 class="events-success"><?= $numberEventsSuccess; ?> Missions successful</h1>
</section>
