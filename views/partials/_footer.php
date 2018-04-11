    <footer>
    </footer>
    <? if ($page == '404' || $page == 'logout') { ?>
        <script src="./assets/js/timer.js"></script>
    <? } if ($page == 'register') { ?>
        <script src="./assets/js/register.js"></script>
    <? } if ($page == 'missions' || $page == 'geolocation') { ?>
        <script src="./assets/js/geolocation.js"></script>
    <? } if ($page == 'missions') { ?>
        <script src="./assets/js/map.js"></script>
    <? } ?>
</body>
</html>
