<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     Themes Header
*/
@include(c_THEMES."meta.php");

echo "
<body>
<section class=\"body\">
<header class=\"header\">
    <div class=\"logo-container\">
        <a href=\"".c_LANDING."\" class=\"logo\">
            <img src=\"".IMAGES."logo-app.png\" height=\"35\" alt=\"".c_APP." Admin\" />
        </a>
        <div class=\"visible-xs toggle-sidebar-left\" data-toggle-class=\"sidebar-left-opened\" data-target=\"html\" data-fire-event=\"sidebar-left-opened\">
            <i class=\"fa fa-bars\" aria-label=\"Toggle sidebar\"></i>
        </div>
    </div>
    <div class=\"header-right\">

        <ul class=\"notifications\">
            <li>
                <a href=\"#\" class=\"dropdown-toggle notification-icon\" data-toggle=\"dropdown\">
                    <i class=\"fa fa-tasks\"></i>
                    <span class=\"badge\">3</span>
                </a>

                <div class=\"dropdown-menu notification-menu large\">
                    <div class=\"notification-title\">
                        <span class=\"pull-right label label-default\">3</span>
                        Tasks
                    </div>

                    <div class=\"content\">
                        <ul>
                            <li>
                                <p class=\"clearfix mb-xs\">
                                    <span class=\"message pull-left\">Admin Pages</span>
                                    <span class=\"message pull-right text-dark\">80%</span>
                                </p>
                                <div class=\"progress progress-xs light\">
                                    <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"80\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 80%;\"></div>
                                </div>
                            </li>

                            <li>
                                <p class=\"clearfix mb-xs\">
                                    <span class=\"message pull-left\">Core System</span>
                                    <span class=\"message pull-right text-dark\">60%</span>
                                </p>
                                <div class=\"progress progress-xs light\">
                                    <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 60%;\"></div>
                                </div>
                            </li>

                            <li>
                                <p class=\"clearfix mb-xs\">
                                    <span class=\"message pull-left\">Apps System</span>
                                    <span class=\"message pull-right text-dark\">60%</span>
                                </p>
                                <div class=\"progress progress-xs light mb-xs\">
                                    <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 60%;\"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href=\"#\" class=\"dropdown-toggle notification-icon\" data-toggle=\"dropdown\">
                    <i class=\"fa fa-envelope\"></i>
                    <span class=\"badge\">4</span>
                </a>

                <div class=\"dropdown-menu notification-menu\">
                    <div class=\"notification-title\">
                        <span class=\"pull-right label label-default\">230</span>
                        Messages
                    </div>

                    <div class=\"content\">
                        <ul>
                            <li>
                                <a href=\"#\" class=\"clearfix\">
                                    <figure class=\"image\">
                                        <img src=\"".IMAGES."!sample-user.jpg\" alt=\"Abimanyu\" class=\"img-circle\" />
                                    </figure>
                                    <span class=\"title\">Abimanyu</span>
                                    <span class=\"message\">Cek Database.</span>
                                </a>
                            </li>
                            <li>
                                <a href=\"#\" class=\"clearfix\">
                                    <figure class=\"image\">
                                        <img src=\"".IMAGES."!sample-user.jpg\" alt=\"Abimanyu\" class=\"img-circle\" />
                                    </figure>
                                    <span class=\"title\">Abimanyu</span>
                                    <span class=\"message\">Cek Database.</span>
                                </a>
                            </li>
                            <li>
                                <a href=\"#\" class=\"clearfix\">
                                    <figure class=\"image\">
                                        <img src=\"".IMAGES."!sample-user.jpg\" alt=\"Abimanyu\" class=\"img-circle\" />
                                    </figure>
                                    <span class=\"title\">Abimanyu</span>
                                    <span class=\"message\">Cek Database.</span>
                                </a>
                            </li>
                            <li>
                                <a href=\"#\" class=\"clearfix\">
                                    <figure class=\"image\">
                                        <img src=\"".IMAGES."!sample-user.jpg\" alt=\"Abimanyu\" class=\"img-circle\" />
                                    </figure>
                                    <span class=\"title\">Abimanyu</span>
                                    <span class=\"message\">Cek Database.</span>
                                </a>
                            </li>
                        </ul>

                        <hr />

                        <div class=\"text-right\">
                            <a href=\"#\" class=\"view-more\">View All</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href=\"#\" class=\"dropdown-toggle notification-icon\" data-toggle=\"dropdown\">
                    <i class=\"fa fa-bell\"></i>
                    <span class=\"badge\">3</span>
                </a>

                <div class=\"dropdown-menu notification-menu\">
                    <div class=\"notification-title\">
                        <span class=\"pull-right label label-default\">3</span>
                        Alerts
                    </div>

                    <div class=\"content\">
                        <ul>
                            <li>
                                <a href=\"#\" class=\"clearfix\">
                                    <div class=\"image\">
                                        <i class=\"fa fa-thumbs-down bg-danger\"></i>
                                    </div>
                                    <span class=\"title\">Server is Down!</span>
                                    <span class=\"message\">Just now</span>
                                </a>
                            </li>
                            <li>
                                <a href=\"#\" class=\"clearfix\">
                                    <div class=\"image\">
                                        <i class=\"fa fa-lock bg-warning\"></i>
                                    </div>
                                    <span class=\"title\">User Locked</span>
                                    <span class=\"message\">15 minutes ago</span>
                                </a>
                            </li>
                            <li>
                                <a href=\"#\" class=\"clearfix\">
                                    <div class=\"image\">
                                        <i class=\"fa fa-signal bg-success\"></i>
                                    </div>
                                    <span class=\"title\">Connection Restaured</span>
                                    <span class=\"message\">".date("d/m/Y")."</span>
                                </a>
                            </li>
                        </ul>

                        <hr />

                        <div class=\"text-right\">
                            <a href=\"#\" class=\"view-more\">View All</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <span class=\"separator\"></span>

        <div id=\"userbox\" class=\"userbox\">
            <a href=\"#\" data-toggle=\"dropdown\">
                <figure class=\"profile-picture\">
                    <img src=\"".IMAGES."!logged-user.jpg\" alt=\"".U_DISPLAYNAME."\" class=\"img-circle\" data-lock-picture=\"".IMAGES."!logged-user.jpg\" />
                </figure>
                <div class=\"profile-info\" data-lock-name=\"".U_DISPLAYNAME."\" data-lock-email=\"".U_EMAIL."\">
                    <span class=\"name\">".U_DISPLAYNAME."</span>
                    <span class=\"role\">".U_DISPLAYLEVEL."</span>
                </div>

                <i class=\"fa custom-caret\"></i>
            </a>

            <div class=\"dropdown-menu\">
                <ul class=\"list-unstyled\">
                    <li class=\"divider\"></li>
                    <li>
                        <a role=\"menuitem\" tabindex=\"-1\" href=\"".c_LANDING."profile\"><i class=\"fa fa-user\"></i> My Profile</a>
                    </li>
                    <li>
                        <a role=\"menuitem\" tabindex=\"-1\" href=\"#\" data-lock-screen=\"true\"><i class=\"fa fa-lock\"></i> Lock Screen</a>
                    </li>
                    <li>
                        <a role=\"menuitem\" tabindex=\"-1\" href=\"?keluar\"><i class=\"fa fa-power-off\"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
";

@include (c_THEMES."menu-admin.php");

?>