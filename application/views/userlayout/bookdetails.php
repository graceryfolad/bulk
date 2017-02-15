<div class="nav-tabs-custom">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs pull-right">
        <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
        <li><a href="#newentry" data-toggle="tab">New Staff Record</a></li>
        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
    </ul>
    <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="tab-pane active" id="details" style="position: relative; height: 500px;">
            <?php
            if ($details != NULL) {
                $template = array(
                    'table_open' => '<table class="table table-bordered">'
                );
                $this->table->set_template($template);
                $this->table->set_heading('#', 'Staff Name', 'Phone Number', 'Phone Network', 'Edit', 'Disable');
                $count = 1;
                foreach ($details as $value) {
                    $cell1 = array('data' => $count);
                    $cell2 = array('data' => $value['name']);
                    $cell3 = array('data' => $value['phone']);
                    $cell4 = array('data' => $value['network']);
                    $cell5 = array('data' => anchor("/Books/EditBookDetail/{$value['id']}", '<i class="fa fa-edit"></i>'));

                    if ($value['status'] == 1) {
                        $cell6 = array('data' => anchor("/Books/EditBookDetail/{$value['id']}/disable", '<i class="fa fa-edit"></i>'));
                    } else {
                        $cell6 = array('data' => anchor("/Books/EditBookDetail/{$value['id']}/enable", '<i class="fa fa-edit"></i>'));
                    }

                    $this->table->add_row($cell1, $cell2, $cell3, $cell4, $cell5, $cell6);
                    $count++;
                }
                echo $this->table->generate();
            } else {
                echo 'No record found';
            }
            ?>
        </div>


        <div class="tab-pane" id="newentry" style="position: relative; height: 500px;">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">New Staff Entry</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <?php
                echo form_open('/Books/NewStaff', array('class' => ""));
                ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="empName" required="required">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone Number</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone Number" name="phone" required="required">>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Network</label>
                            <select class="form-control" name="network">
                                <option value="mtn">MTN</option>
                                <option value="glo">GLO</option>
                                <option value="etisalat">ETISALAT</option>
                                <option value="airtel">AIRTEL</option>
                            </select>
                        </div>
                        <input type="hidden" name="hd" value="<?php echo $hd; ?>" />
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
</div><!-- /.nav-tabs-custom -->