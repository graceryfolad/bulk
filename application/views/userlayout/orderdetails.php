<section class="content-header">
    <h1>
        Order Detail

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Orders</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-solid box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Orders Placed</h3>
            <!--    <div class="box-tools pull-right">
                   Buttons, labels, and many other things can be placed here! 
                   Here is a label for example 
                  <span class="label label-primary">Label</span>
                </div> /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php
            if ($orddet != NULL) {
                $template = array(
                    'table_open' => '<table class="table table-bordered">'
                );
                $this->table->set_template($template);
                $this->table->set_heading('#', 'Detail ID', 'Amount(N)', 'Phone Number', 'Order Status');
                $count = 1;
                foreach ($orddet as $value) {
                    $cell1 = array('data' => $count);
                    $cell2 = array('data' => $value['id']);
                    $cell3 = array('data' => $value['amount']);
                    $cell4 = array('data' => $value['phone']);
                    if ($value['status'] == 1) {
                        $cell5 = array('data' => "Successful");
                    } else {
                        $cell5 = array('data' => "Failed");
                    }




                    $this->table->add_row($cell1, $cell2, $cell3, $cell4, $cell5);
                    $count++;
                }
                echo $this->table->generate();
            } else {
                echo 'No record found';
            }
            ?>
        </div>
    </div><!-- /.box-body -->

</div><!-- /.box -->

</section><!-- /.content -->