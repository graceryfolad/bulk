<?php

if ($header)
    echo $header;
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
    $this->load->view('userlayout/userheader');
?>
<div class="">
            <!-- Left side column. contains the logo and sidebar -->
            
<?php
    $this->load->view('userlayout/usermenu');
?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <?php
                        if ($body)
                            echo $body;
                ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        </div>
</body>





