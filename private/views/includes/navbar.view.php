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

            <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

            <li><a class="<?php if($actual_link == ROOT.'/home'){ echo ' active"';}?>" href="<?=ROOT?>/home"><i class="icon-nav" data-feather="home"></i>Dashboard</a></li>
            <?php if(Auth::access('admin')):?>
            <li><a  href="<?=ROOT?>/users"><i class="icon-nav" data-feather="user"></i>Medewerkers</a></li>
            <?php endif; ?>
            <li class="dropdown-btn"><a class=" <?php if($actual_link == ROOT.'/leden' || $actual_link == ROOT.'/leden/inactive'){ echo ' active"';}?>" href="#"><i class="icon-nav" data-feather="user"></i>Leden<i style="margin-left: 120px" class="icon-nav" data-feather="chevron-down"></i></a></li>
            <li style="display: block" class="dropdown-container">
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
            <li><a class="<?php if($actual_link == ROOT.'/teams'){ echo ' active"';}?>" href="<?=ROOT?>/teams"><i class="icon-nav" data-feather="users"></i>Teams</a></li>
            <li class="dropdown-btn"><a class=" <?php if($actual_link == ROOT.'/klanten' || $actual_link == ROOT.'/klanten/inactive'){ echo ' active"';}?>" href="#"><i class="icon-nav" data-feather="user"></i>Klanten<i style="margin-left: 105px" class="icon-nav" data-feather="chevron-down"></i></a></li>
            <li style="display: block" class="dropdown-container">
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