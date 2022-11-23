<div class=" d-flex flex-column mb-2">

    <div class="menu">
        <ul class="menu px-0">
            <div class="info p-2 align-items-center ">
                <div class=" d-flex flex-row m-3">
                    <div class="pe-3  ">
                        <?php
                        $string = Auth::getImage();
                        $image = substr($string,8);
                        ?>
                        <div class='c-avatar pt-1 '>
                            <img src="<?php echo "http://twirlingteamsparkle.nl/public/uploads/".$image ?>" class=" c-avatar__image  d-block rounded-circle">
                            <span class='c-avatar__status'></span>
                        </div>
                    </div>
                    <div class="p2">
                        <a><?=Auth::getVoornaam() ?></a><br>
                        <a><?=Auth::getAchternaam() ?></a>
                    </div>
                </div>
            </div>

            <?php

            $variable = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (str_contains($variable, '?')) {

                $actual_link = substr($variable, 0, strpos($variable, "?"));
            } else{
                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }

            ?>

            <li><a class="<?php if($actual_link == ROOT.'/home'){ echo ' active"';}?>" href="<?=ROOT?>/home"><i class="icon-nav" data-feather="user"></i>Dashboard</a></li>

            <?php if(Auth::access('admin')):?>
            <li><a class="<?php if($actual_link == ROOT.'/users'){ echo ' active"';}?>" href="<?=ROOT?>/users"><i class="icon-nav" data-feather="user"></i>Medewerkers</a></li>
            <?php endif; ?>
            <li class="dropdown-btn"><a class=" <?php if($actual_link == ROOT.'/leden' || $actual_link == ROOT.'/leden/inactive'){ echo ' active"';}?>" href="#"><i class="icon-nav" data-feather="user"></i>Leden<i style="margin-left: 120px" class="icon-nav" data-feather="chevron-down"></i></a></li>
            <li style="display: <?php if($actual_link == ROOT.'/leden' || $actual_link == ROOT.'/leden/inactive'){ echo ' block"';}?>" class="dropdown-container">
                <a class="list <?php if($actual_link == ROOT.'/leden'){ echo ' active"';}?>" href="<?=ROOT?>/leden">
                    <div class="submenu">
                        Actieve leden
                    </div>
                </a>
                <a class="list <?php if($actual_link == ROOT.'/leden/inactive'){ echo ' active"';}?>" href="<?=ROOT?>/leden/inactive">
                    <div class="submenu">
                        Inactieven leden
                    </div>
                </a>
            </li>
            <li><a class="<?php if($actual_link == ROOT.'/teams'|| $actual_link == ROOT.'/beheer' ){ echo ' active"';}?>" href="<?=ROOT?>/teams"><i class="icon-nav" data-feather="users"></i>Teams</a></li>
            <li class="dropdown-btn"><a class=" <?php if($actual_link == ROOT.'/klanten' || $actual_link == ROOT.'/klanten/inactive'){ echo ' active"';}?>" href="#"><i class="icon-nav" data-feather="user"></i>Klanten<i style="margin-left: 105px" class="icon-nav" data-feather="chevron-down"></i></a></li>
            <li style="display: <?php if($actual_link == ROOT.'/klanten' || $actual_link == ROOT.'/klanten/inactive'){ echo ' block"';}?>" class="dropdown-container">
                <a class="list <?php if($actual_link == ROOT.'/klanten'){ echo ' active"';}?>" href="<?=ROOT?>/klanten">
                    <div class="submenu">
                        Actieve klanten
                    </div>
                </a>
                <a class="list <?php if($actual_link == ROOT.'/klanten/inactive'){ echo ' active"';}?>" href="<?=ROOT?>/klanten/inactive">
                    <div class="submenu">
                        Inactieven klanten
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <script>

    </script>
    <script>
        feather.replace()
    </script>


</div>