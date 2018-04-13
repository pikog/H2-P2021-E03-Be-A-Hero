<?
    include_once './src/GenerateEvents.php';

    /**
     * page called by a CRON Task to regenerate periodicaly events
     */

    echo new GenerateEvents(50);

