<div class=" d-flex flex-column mb-2">

    <div class="menu">
        <ul class="menu px-0">
            <div class="info p-2 align-items-center ">
                <div class=" d-flex flex-row m-3">
                    <div class="pe-3  ">
                        <div class='c-avatar pt-1 '>
                            <img class='c-avatar__image' src='https://images.unsplash.com/photo-1542103749-8ef59b94f47e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80' alt=''>
                            <span class='c-avatar__status'></span>
                        </div>
                    </div>
                    <div class="p2">
                        <a>Mohamed Said</a><br>
                        <a>Titel</a>
                    </div>
                </div>
            </div>

            <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            ?>

            <li><a class="<?php if($actual_link == ROOT.'/home'){ echo ' active"';}?>" href="<?=ROOT?>/home"><i class="icon-nav" data-feather="home"></i>Dashboard</a></li>
            <?php if(Auth::access('admin')):?>
            <li><a class="<?php if($actual_link == ROOT.'/users'){ echo ' active"';}?>" href="<?=ROOT?>/users"><i class="icon-nav" data-feather="user"></i>Medewerkers</a></li>
            <?php endif; ?>
            <li ><a class="<?php if($actual_link == ROOT.'/leden'){ echo ' active"';}?>" href="<?=ROOT?>/leden"><i class="icon-nav" data-feather="user"></i>Leden</a></li>
            <li><a class="<?php if($actual_link == ROOT.'/teams'){ echo ' active"';}?>" href="<?=ROOT?>/teams"><i class="icon-nav" data-feather="users"></i>Teams</a></li>
            <li><a class="<?php if($actual_link == ROOT.'/klanten'){ echo ' active"';}?>" href="<?=ROOT?>/klanten"><i class="icon-nav" data-feather="user"></i>Klanten</a></li>
        </ul>
    </div>
    <script>
        feather.replace()
    </script>


</div>