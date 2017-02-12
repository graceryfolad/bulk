<div class="form-box" id="login-box">
            <div class="header">New Membership</div>
            <?php
                echo form_open('/Guest/ProcRegister', array('class' => ""));
                ?>
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Company Name" required="required" />
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Contact Email Address" required="required"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Contact Phone Number"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Company Address"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Account Password" required="required"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password2" class="form-control" placeholder="Retype password" required="required"/>
                    </div>
                </div>
                <div class="footer">                    

                    <button type="submit" class="btn btn-success btn-block">Sign me up</button>

                    <?php
                    echo anchor('Guest/Login', 'Already a customer', 'title="Loin to customer area"');
                    ?>
                </div>
            </form>

            <div class="margin text-center">
                <span>Register using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>