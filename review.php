<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback Form In HTML With Validation - reusable form</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
      <style>
body {
	background-color: #000;
}
html,
body {
	height: 100%;
}
.imagebg {
	background-image: url("images/typewriter-801921_1920.jpg");
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
	background-attachment: fixed;
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	-webkit-filter: blur(3px);
  filter: blur(3px);
  opacity: 0.6;
  filter: alpha(opacity=60);
}
.form-container
{
	background-color: #fff;
    box-shadow: 0 16px 24px 2px rgba(0,0,0,0.14), 0 20px 30px 5px rgba(0,0,0,0.12), 0 8px 10px -5px rgba(0,0,0,0.3);	
}
</style>
      <script>
$(function()
{
    function after_form_submitted(data) 
    {
        if(data.result == 'success')
        {
            $('form#reused_form').hide();
            $('#success_message').show();
            $('#error_message').hide();
        }
        else
        {
            $('#error_message').append('<ul></ul>');

            jQuery.each(data.errors,function(key,val)
            {
                $('#error_message ul').append('<li>'+key+':'+val+'</li>');
            });
            $('#success_message').hide();
            $('#error_message').show();

            //reverse the response on the button
            $('button[type="button"]', $form).each(function()
            {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if(label)
                {
                    $btn.prop('type','submit' ); 
                    $btn.text(label);
                    $btn.prop('orig_label','');
                }
            });
            
        }//else
    }

	$('#reused_form').submit(function(e)
      {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function()
        {
            $btn = $(this);
            $btn.prop('type','button' ); 
            $btn.prop('orig_label',$btn.text());
            $btn.text('Sending ...');
        });
        

                    $.ajax({
                type: "POST",
                url: 'http://reusableforms.com/handler/d3/feedback-form-in-html-with-validation',
                data: $form.serialize(),
                success: after_form_submitted,
                dataType: 'json' 
            });        
        
      });	
});
</script>
            <style>
        #orig_article_block {
        position:fixed;
        left:0px;
        bottom:0px;
        height:60px;
        width:100%;
        background:#222;
        color:#fff;
        padding: 10px;
        }
        #orig_article_block a
        {
          color:#fff;
          text-decoration: underline;
        }

       
      </style>
        </head>
  <body >
      <div class="container">
        <div class="imagebg"></div>
<div class="row " style="margin-top: 50px">
    <div class="col-md-6 col-md-offset-3 form-container">
        <h2>Feedback</h2>
        <p>
            Please provide your feedback below:
        </p>
       

        <form  role="form" method="post" id="reused_form" action="feedback.php">
            <div class="row">
                <div class="col-sm-12 form-group">
                <label>How do you rate this product?</label>
                <p>
                    <label class="radio-inline">
                    <input type="radio" name="experience" id="radio_experience" value="bad" >
                    Bad
                    </label>

                    <label class="radio-inline">
                    <input type="radio" name="experience" id="radio_experience" value="average" >
                    Average
                    </label>

                    <label class="radio-inline">
                    <input type="radio" name="experience" id="radio_experience" value="good" >
                    Good
                    </label>
                </p>
                </div>
            </div>  
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="comments">
                        Reviews:</label>
                    <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="name">
                        Your Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="email">
                        Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            
                        <div class="row">
                <div class="col-sm-12 form-group">
                    <button type="submit" name="sumit1" class="btn btn-lg btn-success btn-block" >Submit </button>
                </div>
            </div>

        </form>
        <div id="success_message" style="width:100%; height:100%; display:none; ">
            <h3>Posted your feedback successfully!</h3>
        </div>
        <div id="error_message" 
                style="width:100%; height:100%; display:none; ">
                    <h3>Error</h3>
                    Sorry there was an error sending your form.

        </div>          
    </div>
</div>
      </div>
  </body>
</html>