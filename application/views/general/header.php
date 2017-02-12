<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Airvend Bulk Recharge</title>

    <!-- Bootstrap Core CSS -->
    
    <link href="<?php echo base_url("Tools/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <!-- MetisMenu CSS ../bower_components/-->
    <!-- <link href="<?php echo base_url("sbtools/sbcustom/metisMenu/dist/metisMenu.min.css"); ?>" rel="stylesheet"> -->

    <!-- Custom CSS -->
    

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <link href="<?php echo base_url("Tools/dist/css/AdminLTE.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("Tools/dist/css/skins/skin-blue.css"); ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
       <!--<script src="../bower_components/jquery/dist/jquery.min.js"></script>-->
    <script src="<?php echo base_url("Tools/plugins/jQuery/jquery.min.js"); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <!--<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
    <script src="<?php echo base_url("Tools/bootstrap/js/bootstrap.min.js"); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <!--<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>-->
    <script src="<?php echo base_url("sbtools/sbcustom/metisMenu/dist/metisMenu.min.js"); ?>"></script>
    <!-- Custom Theme JavaScript -->
    <!--<script src="../dist/js/sb-admin-2.js"></script>-->
    <script src="<?php echo base_url("Tools/dist/js/app.js"); ?>"></script>
   

   <script type="text/javascript">
    $(document).ready(function(){
        $('#bttAdd').click(function(){
            var addname = $('#addname').val();
            $.ajax({
                type:'POST',
                data:{'addname':addname},
                url:'<?php echo site_url('Client/addBookName'); ?>',
                success:function(result){
                    $('#result').html(result);
                }
            }) ;
        });
    });
</script>
</head>