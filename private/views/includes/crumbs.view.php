

        <?php if(isset($crumbs)):?>
            <?php foreach ($crumbs as $crumb):?>

                <li class="breadcrumb-item d-flex align-items-center "><a href="<?=$crumb[1]?>"><?=$crumb[0]?></a></li>

            <?php endforeach;?>
        <?php endif;?>

