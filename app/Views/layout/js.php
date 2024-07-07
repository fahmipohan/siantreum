<!-- General JS Scripts -->
<script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="<? base_url() ?>/template/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

<script>
$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
});
</script>

<!-- JS Libraies -->
<script src="<?= base_url() ?>/template/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/selectric/public/jquery.selectric.min.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url() ?>/templates/assets/js/page/index-0.js"></script>
<script src="<?= base_url() ?>/assets/js/page/auth-register.js"></script>