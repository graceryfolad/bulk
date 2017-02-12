<div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <?php
                echo form_open('/Guest/ProcLogin', array('class' => ""));
                ?>
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Customer Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
                    
                    <p><?php
                    echo anchor('Guest/Forgot', 'Forgot Password', 'title="Forgot Password"');
                    ?></p>
                    
                    <p><?php
                    echo anchor('Guest/Register', 'New Customer', 'title="register as a new Customer"');
                    ?></p>
                </div>
            </form>

            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>