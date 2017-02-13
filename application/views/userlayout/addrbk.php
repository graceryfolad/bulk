<section class="content-header">
                    <h1>
                       Address Book
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Address Book</li>
                    </ol>
                </section>

                <!-- Main content -->
<section class="content">
<div class="col-md-12">
	<?php
                echo form_open('/Client/addBookName', array('class' => "form-inline"));
                ?>
	<input type="text" id="addname" name="addname" class="form-control">
	<input type="submit" id="bttAdd" value="Add" />  
</form>
	<div class="" id="result">
		<?php
			if(isset($Books)){
				$template = array(
                'table_open' => '<table class="table table-bordered">'
            );
            $this->table->set_template($template);
            $this->table->set_heading('#', 'Book Name', 'Edit', 'Book Details');
            $count = 1;
            foreach ($Books as $value) {
                $cell1 = array('data' => $count);
                $cell2 = array('data' => $value['name']);
                $cell3 = array('data' => anchor("/Books/EditBookName/{$value['id']}", '<i class="fa fa-edit"></i>'));
                $cell4 = array('data' => anchor("/Books/AddressBook/{$value['id']}", '<i class="fa fa-edit"></i>'));

                $this->table->add_row($cell1, $cell2, $cell3, $cell4);
                $count++;
            }
            echo $this->table->generate();
			}

			elseif(isset($details)){
				$this->load->view('userlayout/bookdetails');
			}
		?>
	</div>
</div>

</section><!-- /.content -->

