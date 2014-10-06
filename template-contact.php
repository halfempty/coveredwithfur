<?php
/*
Template Name: Page - Contact
*/
?>
<?php 

$nameError = '';
$emailError = '';
$commentError = '';

if(isset($_POST['submitted'])) {
		if(trim($_POST['yourtName']) === '') {
			$nameError = 'Name is mandatory.';
			$hasError = true;
		} else {
			$name = trim($_POST['yourtName']);
		}
		
		if(trim($_POST['email']) === '')  {
			$emailError = 'Email is mandatory.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		if(trim($_POST['message']) === '') {
			$commentError = 'Message is mandatory.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$message = stripslashes(trim($_POST['message']));
			} else {
				$message = trim($_POST['message']);
			}
		}
			
		if(!isset($hasError)) {
			//Set in theme options
			$emailTo = of_get_option('custom_email'); 
			//Else retrieve the e-mail of the blog administrator
			if (!isset($emailTo) || ($emailTo == '') ){
				$emailTo = get_option('admin_email');
			}
			$subject = 'New Message From '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nmessage: $message";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}
	
} ?>
<?php get_header(); ?>
	
<div id="content" class="clearfix">

	<div id="primary" class="clearfix">			
                
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article id="page-<?php the_ID(); ?>" <?php post_class('page-sidebar contact'); ?>> 
		
			<?php if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
			<div class="page-hero">
			
				<a title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-img-full'); ?></a>
			
			</div>
			<?php } ?>
			
			<div class="entry-content">
			
			<h2 class="entry-title"><?php the_title(); ?></h2>
			
				<?php the_content(); ?>
					
					<?php if(isset($emailSent) && $emailSent == true) { ?>
					
						<div class="alert alert-success">
							<?php _e('Your message has been sent!', 'framework') ?>
						</div>
	
					<?php } else { ?>
	
			
						<?php if(isset($hasError) || isset($captchaError)) { ?>
						
						<div class="alert alert-error">
							<?php _e('Sorry, your email has not been sent.', 'framework') ?>
						</div>
						
						<?php } ?>
		
						<form action="<?php the_permalink(); ?>" id="contact" method="post">
							<p>
								<label for="yourtName"><?php _e('Name *', 'framework') ?></label>
								<input type="text" name="yourtName" id="yourtName" value="<?php if(isset($_POST['yourtName'])) echo $_POST['yourtName'];?>" class="required requiredField" />
								<?php if($nameError != '') { ?>
									<span class="error"><?php echo $nameError; ?></span> 
								<?php } ?>
							</p>
							<p>	
								<label for="email"><?php _e('Email *', 'framework') ?></label>
									<input type="email" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
									<?php if($emailError != '') { ?>
										<span class="error"><?php echo $emailError; ?></span>
									<?php } ?>
							</p>
							<p>
								<label for="messageText"><?php _e('Message *', 'framework') ?></label>
									<textarea name="message" id="messageText" rows="8" cols="30" class="required requiredField"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea>
									<?php if($commentError != '') { ?>
										<span class="error"><?php echo $commentError; ?></span> 
									<?php } ?>
							</p>
							<input type="hidden" name="submitted" id="submitted" value="true" />
							<input class="submit" type="submit" value="<?php _e('Send Email', 'framework') ?>" />
								
						</form>
					<?php } ?>
				
				</div>
								
			</article>
					
	<?php endwhile; endif; ?>
	
	</div>
	
</div>
			
<?php get_footer(); ?>