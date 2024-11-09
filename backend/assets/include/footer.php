
    </main>

<!--   Core JS Files   -->
<script src="http://localhost:8080/HMS-Nhom11/backend/assets/js/core/popper.min.js?<?php echo rand(100, 999) ?>"></script>
<script src="http://localhost:8080/HMS-Nhom11/backend/assets/js/core/bootstrap.min.js?<?php echo rand(100, 999) ?>"></script>
<script src="http://localhost:8080/HMS-Nhom11/backend/assets/js/plugins/perfect-scrollbar.min.js?<?php echo rand(100, 999) ?>"></script>
<script src="http://localhost:8080/HMS-Nhom11/backend/assets/js/plugins/smooth-scrollbar.min.js?<?php echo rand(100, 999) ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js?<?php echo rand(100, 999) ?>"></script>


<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="http://localhost:8080/HMS-Nhom11/backend/assets/js/material-dashboard.min.js?<?php echo rand(100, 999) ?>"></script>
</body>

</html>