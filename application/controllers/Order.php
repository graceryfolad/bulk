<?php

class Order extends MY_Controller {
    private $sessiondetails;
	function __construct() {
        parent::__construct();
        $this->sessiondetails = $this->session->userdata('userdetails');
        $this->data['userinfo'] = $this->sessiondetails;

        $this->load->model('Orders');
        $this->load->model('OrderDetails');
        $this->load->model('AddressBook');
        $this->load->model('AddressBookDetail');
        
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->library('airvend');
    }
	public function index()

	{
		$this->data['inc'] = 1;
                
                // get al the books for this user
                $books = $this->AddressBook->BooksClientID($this->sessiondetails['id']);
                $orders = $this->Orders->OrderByClient($this->sessiondetails['id']);
                $this->data['bks']=$books;
                $this->data['orders']=$orders;
		$this->body = "userlayout/orders";

                $this->userlayout();
	}
        
        public function PlacerOrder() {
            
            $bkbyheader = $this->AddressBookDetail->AbookByStatus($this->input->post('bk'));
            $this->Orders->abh_id = $this->input->post('bk');
            $this->Orders->ord_amount = $this->input->post('amount');
            $this->Orders->cl_id = $this->sessiondetails['id'];
            $this->Orders->ord_total = count($bkbyheader);
            $this->Orders->ord_created = date('Y-m-d h:i:s');
            
            $order = $this->Orders->insert_entry();
            if(is_array($order)){
                
                $amount =$this->input->post('amount');
                $ref = $order['id'];
                $created = date('Y-m-d h:i:s');
                $abh_id = $this->input->post('bk');
                
                foreach ($bkbyheader as $value) {
                if($value['status'] == 1){    
//                    insert to order details
                $this->OrderDetails->ord_id = $order['id'] ;
                $this->OrderDetails->abh_id = $abh_id ;
                $this->OrderDetails->amount = $amount ;
                $this->OrderDetails->phone = $value['phone'] ;
                $this->OrderDetails->network = $value['network'] ;
                $this->OrderDetails->det_status = 0 ;
                $this->OrderDetails->cl_id = $this->sessiondetails['id'] ;
                $this->OrderDetails->det_created = $created ;
                
                $order_detail = $this->OrderDetails->insert_entry();
                
                    $network = $value['network'];
                    
                    switch ($network){
                        case "mtn":
                            $networkid = 2;
                            break;
                        case "glo":
                            $networkid = 3;
                            break;
                            
                        case "airtel":
                            $networkid = 1;
                            break;
                        case "etisalat":
                            $networkid = 4;
                            break;
                    }
                    
                    // insert to table of detail
                    
                    
                    // call airvend
                    $username = "folad2012@gmail.com";
                    $pass = "5678";
                    
//                    var_dump($order_detail);
//                    exit();
                    $air = $this->airvend->CallVTU($amount, $networkid,$username,$pass,$order_detail['id'],$value['phone']);
//                    
//                    update table for the status
                    if($air){
                        $this->OrderDetails->UpdateStatus($order_detail['id'],1);
                    }
//                    $result[]=$air;
                    
                }
                
                }
//                var_dump($result);
                redirect("/Order/OrderDetails/{$ref}");
                
            }
        }
        
        public function OrderDetails($ord_id) {
            $ord_det = $this->OrderDetails->OrderDetailsByOrder($ord_id,$this->sessiondetails['id']);
            $this->data['orddet']=$ord_det;
            $this->body = "userlayout/orderdetails";

            $this->userlayout();
        }
}
