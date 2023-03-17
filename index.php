<?php
ob_start();


session_start();
$_SESSION['arr'] = array();

include "app/init.php";
?>
<section class='index'>
    <button><a href='<?php echo $url ?>/sim.php'>start simulation</a></button>
</section>
<?php
include "app/includes/views/footer.php";
ob_end_flush();
?>