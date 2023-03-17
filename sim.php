<?php
ob_start();




include "app/init.php";
?>
<section data-url="<?php echo $url?>" class='sim'>
    <div class="input">
    <label>enter your name </label>
    <input class='name' name='username' type='text'/>
    <button class='skip' >skip</button>
    </div>
</section>
<?php
include "app/includes/views/footer.php";
ob_end_flush();
?>