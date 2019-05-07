<div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
        try {
            ace.settings.check('navbar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="navbar-container" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="index.php" class="navbar-brand">
                <small><i class="fa fa fa-laptop" style="margin-right:5px;"></i>ระบบบริหารการเบิก จ่าย เก็บรักษา และจำหน่ายแสตมป์อากร SDMS Version 2.00</small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <!--<li class="purple">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
					<span class="badge badge-important">1</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header"><i class="ace-icon fa fa-check"></i>แจ้งเตือน</li>
                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar">
                                <li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
															<i class="btn btn-xs no-hover fa fa-comment"></i>
													New Comments
													</span>
													<span class="pull-right badge badge-info">+1</span>
												</div>
											</a>
							  </li>
                            </ul>
                        </li>

                        <li class="dropdown-footer">
                        </li>
                    </ul>
                </li>-->

                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                    	<?php 
							if(isset($_SESSION['PIN'])){
								if($_SESSION['pp_employer_pname']=="นาย"){
									echo '<img class="nav-user-photo" src="assets/avatars/avatar5.png" alt="'.$_SESSION["pp_fname"].'"/>';
								}else{
									echo '<img class="nav-user-photo" src="assets/avatars/avatar5.png" alt="'.$_SESSION["pp_fname"].'"/>';
								}
								echo '<span class="user-info">';
								echo '<small>ยินดีต้อนรับ,</small>';
								echo $_SESSION["FNAME"];
								echo '</span>';
								echo '<i class="ace-icon fa fa-caret-down"></i>';
							}else{
								echo '<img class="nav-user-photo" src="assets/avatars/avatar5.png" alt="Guest"/>';
								echo '<span class="user-info">';
								echo '<small>ยินดีต้อนรับ,</small>';
								echo "Guest";
								echo '</span>';
								
							}
						?>
                        
						
                    </a>
                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                    <?php
						if(isset($_SESSION["PIN"])){
							echo '<li><a href="index.php?service=profile"><i class="ace-icon fa fa-user"></i>Profile</a></li>';
							echo '<li class="divider"></li>';
							echo '<li><a href="#" onclick="AjaxLogout();"><i class="ace-icon fa fa-unlock"></i>Logout</a></li>';
						}else{
					?>
							<li><a href="#" onclick="location='index.php?service=login'"><i class="ace-icon fa fa-lock"></i>Login</a></li>	
                    <?php
                        }
					?>
                    </ul>
                    
                </li>

            </ul>
        </div>

    </div>
</div>
