
<?php if(Jyll_owner::check_own() == "admin"): ?>

<div class="options_two">
    <div class="noborder3x">
        <?php Login_Model::login_menu();?>
    </div>
    <div class="border8x">
        <?php
            system_info::cpu_usage();
            system_info::mem_usage();
            system_info::other();
        ?>
    </div>
    <div class="noborder3x">
        <?php
        if ($_GET['alert']) {
            echo $_GET['alert'];
        }
        ?>
    </div>
</div>
<?php else: ?>

<div class="options_two">
    <div class="noborder3x">
        <?php Login_Model::login_menu();?>
    </div>
    <div class="border8x">
        user
    </div>
    <div class="noborder3x">
        <?php
        if ($_GET['alert']) {
            echo $_GET['alert'];
        }
        ?>
    </div>
</div>
<?php endif; ?>
