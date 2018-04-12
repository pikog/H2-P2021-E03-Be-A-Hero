<script>
    let user = <?= json_encode($user) ?>
</script>
<section class="page-mission not-geolocalised">
    <?php include './views/partials/_top-bar.php'; ?>
    <div class="logo">
        <a href="./home"><img src="./assets/images/logo.png" alt="logo be a hero"></a>
    </div>
    <div class="content-not-geolocalised">
        <a class="button button-geolocation" href="#"><i class="fas fa-location-arrow"></i> Locate me</a>
    </div>
    <div class="popin">
        <div class="popin-content">
        </div>
    </div>
</section>