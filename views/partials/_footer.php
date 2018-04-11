    <footer>
    </footer>
    <? if ($page == '404' || $page == 'logout') { ?>
        <script src="./assets/js/timer.js"></script>
    <? } else if ($page == 'register') { ?>
        <script src="./assets/js/register.js"></script>
        <? } else if ($page == 'missions' || $page == 'geolocation') { ?>
        <script src="./assets/js/geolocation.js"></script>
    <? } ?>
</body>
</html>
