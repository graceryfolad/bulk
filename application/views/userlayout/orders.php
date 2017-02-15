<section class="content-header">
    <h1>
       Orders
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Orders</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Place Order</h3>
<!--    <div class="box-tools pull-right">
       Buttons, labels, and many other things can be placed here! 
       Here is a label for example 
      <span class="label label-primary">Label</span>
    </div> /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
   <?php
                echo form_open('/Order/PlacerOrder', array('class' => "form-inline"));
                ?>
  <div class="form-group">
    <label for="exampleInputName2">Amount</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Order Amount" name="amount">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2"> Select an Address Book</label>
    <select class="form-control" name="bk">
        <?php
            foreach ($bks as $value) {
                echo "<option value=\"{$value['id']}\">{$value['name']}</option>";
            }
        ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit Order</button>
</form>
  </div><!-- /.box-body -->
  
</div><!-- /.box -->

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
            if ($orders != NULL) {
                $template = array(
                    'table_open' => '<table class="table table-bordered">'
                );
                $this->table->set_template($template);
                $this->table->set_heading('#', 'Order ID', 'Amount', 'Total Staff', 'Order Details');
                $count = 1;
                foreach ($orders as $value) {
                    $cell1 = array('data' => $count);
                    $cell2 = array('data' => $value['id']);
//                    $cell3 = array('data' => $value['book']);
                    $cell4 = array('data' => $value['amount']);
                    $cell5 = array('data' => $value['total']);
                    $cell6 = array('data' => anchor("/Order/OrderDetails/{$value['id']}", '<i class="fa fa-search"></i>'));
                    

                    $this->table->add_row($cell1, $cell2,  $cell4, $cell5, $cell6);
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