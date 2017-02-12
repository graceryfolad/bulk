<?php

if ($header)
    echo $header;
?>
<body>
<div class="container">
<?php $this->load->view("general/menu") ?>
    <?php
                        if ($body)
                            echo $body;
                        ?>

                        <?php
if ($footer)
    echo $footer
?>
</div>
</body>





