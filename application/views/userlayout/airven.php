<section class="content-header">
                    <h1>
                        Airvend Setting
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Airvend Account</li>
                    </ol>
                </section>

                <!-- Main content -->
<section class="content">

<div class="col-md-5">
            <div class="box box-primary">
                
                <?php
                echo form_open('/Client/AirvendAccount', array('class' => ""));
                ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Airvend Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Airvend Password " name="username" required="required" value="<?php echo $air_us; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Airvend Password</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Airvend Password" name="password" required="required" value="<?php echo $air_ps; ?>">
                    </div>
                    
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="updateairvend">Submit</button>
                </div>
                </form>
            </div><!-- /.box -->
            </div>
</section><!-- /.content -->