<header class="main-header">
            <a href="../../index2.html" class="logo">
            <span class="logo-mini"><b>A</b>BR</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Bulk Recharge</span>
          </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                            
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $userinfo['name']; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                
                                <!-- Menu Body -->
                                 <li class="user-body">
                                    <div class="col-xs-6 text-center">
                                       <a href="<?php echo site_url('/Client/AirvendAccount'); ?>">Airvend Account</a>
                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="#">Change Password</a>
                                    </div>
                                    
                                </li> 
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url('/Client/Profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                                        
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('/Client/LogOut'); ?>" class="btn btn-default btn-flat">Sign Out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>