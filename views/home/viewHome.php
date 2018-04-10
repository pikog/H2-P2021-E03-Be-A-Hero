<section>
    <h2><?= $user['heroName']; ?></h2>
    <img src="./assets/images/heroes/<?= $user['hero']; ?>.png" alt="hero">
    <h1><?= $user['level']; ?></h1>
    <h1><?= $user['xp']; ?></h1>
    <h1><?= $xpToNext; ?></h1>
    <h1><?= $numberEventsSuccess; ?></h1>
</section>