<section class="content-header">
                    <h1>
                        Blank page
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Blank page</li>
                    </ol>
                </section>

                <!-- Main content -->
<section class="content">
<div class="col-md-5">
<div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                echo form_open('/Books/EditBkDet', array('class' => ""));
                ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="empName" required="required" value="<?php echo $bkdet['name']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone Number</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone Number" name="phone" required="required" value="<?php echo $bkdet['phone']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Network</label>
                        <select class="form-control" name="network">
                        <?php
                            if($bkdet['network'] == "MTN"){
                                echo "<option value='mtn' selected >MTN</option>";
                            }
                            else{
                                echo "<option value='mtn'>MTN</option>";
                            }

                            if($bkdet['network'] == "glo"){
                                echo "<option value='glo' selected >GLO</option>";
                            }
                            else{
                                echo "<option value='glo'>GLO</option>";
                            }

                            if($bkdet['network'] == "etisalat"){
                                echo "<option value='etisalat' selected >ETISALAT</option>";
                            }
                            else{
                                echo "<option value='etisalat'>ETISALAT</option>";
                            }

                             if($bkdet['network'] == "airtel"){
                                echo "<option value='airtel' selected >AIRTEL</option>";
                            }
                            else{
                                echo "<option value='airtel'>AIRTEL</option>";
                            }
                        ?>
                            <!-- <option value="mtn">MTN</option>
                            <option value="glo">GLO</option>
                            <option value="etisalat">ETISALAT</option>
                            <option value="airtel">AIRTEL</option> -->
                        </select>
                    </div>
                    <input type="hidden" name="hd" value="<?php echo $bkdet['id']; ?>" />
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" name="submitupdate" class="btn btn-primary">Update Details</button>
                </div>
                </form>
            </div><!-- /.box -->
            </div>

</section><!-- /.content -->