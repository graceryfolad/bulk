$( "select#clevel" )
  .change(function () {
    var str = $("select#clevel").val();;
    
    jQuery.ajax({
type: "POST",
url: "<?php echo base_url(); ?>" + "index.php/Course/",
dataType: 'json',
data: {name: user_name, pwd: password},
success: function(res) {
if (res)
{
// Show Entered Value
jQuery("div#result").show();
jQuery("div#value").html(res.username);
jQuery("div#value_pwd").html(res.pwd);
}
}
});
    $( "#asg" ).html(str);
  })
  .change();