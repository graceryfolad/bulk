<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Modern Business
                </h1>
            </div>
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Bootstrap v3.2.0</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">

                <?php 
                if($inc == 1){
                    $this->load->view("guestlayout/register") ;
                }
                elseif($inc==2){
                    $this->load->view("guestlayout/login") ;
                }
                elseif($inc==3){
                    $this->load->view("guestlayout/forgot") ;
                }
                elseif($inc==4){
                    $this->load->view("guestlayout/Reset") ;
                }
                

                ?>
            </div>
            
        </div>