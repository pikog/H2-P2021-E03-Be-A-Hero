<section>
    <div id="map"></div>
    <div class="events-list">
        <? foreach ($events as $event) { ?>
            <div class="event">
                <h3><?= $event->name ?></h3>
                <p><?= $event->description ?></p>
                <p><?= $event->level_required ?></p>
            </div>
        <? } ?>
    </div>
</section>