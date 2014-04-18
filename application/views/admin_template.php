<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="" />
<script type="text/javascript">var baseurl = '<?=base_url()?>'; </script>
<link href="<?=CSS_PATH?>admin_style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="<?=CSS_PATH?>layout.css" type="text/css" media="screen" />
<script type="text/javascript"  src="<?=JS_PATH?>jquery.js"></script>
<script type="text/javascript"  src="<?=JS_PATH?>jquery.validate.js"></script>
<script>
$(document).ready(function(){   
	var showText='Show';
	var hideText='Hide';
	var is_visible = false;

	$('.toggle').prev().append(' <a href="#" class="toggleLink">'+hideText+'</a>');
	$('.toggle').show();
	$('a.toggleLink').click(function() {

	is_visible = !is_visible;
	if ($(this).text()==showText) {
		$(this).text(hideText);
		$(this).parent().next('.toggle').slideDown('slow');
	}else {
		$(this).text(showText);
		$(this).parent().next('.toggle').slideUp('slow');
	}
	return false;
	});

	//Log out Popup
	var is_visible = false;
	$(".learn").click(function (e) { 
    	//e.preventDefault();
    	if(!is_visible){
    		$('ul.learn_menu').show();
    	}else{
        	$('ul.learn_menu').hide();
    	}
	    is_visible = !is_visible;
        $(this).toggleClass('activethis');
     });
	 
	

});
</script>
<script type="text/javascript">
	$(document).ready(function(){

		$('.lightbox').click(function(){
			$('.backdrop, .box').animate({'opacity':'.50'}, 300, 'linear');
			$('.box').animate({'opacity':'1.00'}, 300, 'linear');
			$('.backdrop, .box').css('display', 'block');
		});

		$('.close').click(function(){
			close_box();
		});

		$('.backdrop').click(function(){
			close_box();
		});

	});

  $(document).keyup(function(e) {
        if(e.which == 27) {
            close_box();
        }      
    });


	function close_box()
	{
		$('.backdrop, .box').animate({'opacity':'0'}, 300, 'linear', function(){
			$('.backdrop, .box').css('display', 'none');
		});
	}

</script>
	    
        
        
<title>Admin Panel</title>
</head>
<body>    

	<header id="header">
		<hgroup>
			<a href="javascript:void();">small logo</a>
            <div id="header_learn">
                <span class="learn activethis1">
                  <div class="logout" style="float:right;"><?php echo anchor('admin/logout', 'Logout'); ?></div>
                 
                </span>
            </div>
		</hgroup>
        
	</header> 
    <!-- end of header bar -->
    <section id="secondary_bar">
		<div class="user">
			<p>Welcome to Admin Panel</p>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="javascript:void();">Admin Panel</a> 
            </article>
		</div>
	</section>
    <!-- end of secondary bar -->  
    <?php  include("admin_menu.php"); ?>
    <?=$content; ?>
        
</body>
</html>