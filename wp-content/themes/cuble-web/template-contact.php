<?php
/**
 * Template Name: Contacto
 * 
 * @author Cuble Desarrollo S.L.
 * @package Wordpress Cuble Theme
 */
?>

<?php
/**
 * Procesar formulario de contacto.
 */
if(isset($_POST['submitted']))
{
    if(trim($_POST['_name']) === '')
    {
        $nameError = 'Please enter your name.';
        $hasError = true;
    }
    else
    {
        $name = trim($_POST['_name']);
    }

    if(trim($_POST['_email']) === '')
    {
        $emailError = 'Please enter your email address.';
        $hasError = true;
    }
    else if(!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", 
            trim($_POST['_email'])))
    {
        $emailError = 'You entered an invalid email address.';
        $hasError = true;
    } else {
        $email = trim($_POST['_email']);
    }

    if(trim($_POST['_message']) === '')
    {
        $commentError = 'Please enter a message.';
        $hasError = true;
    }
    else
    {
        if(function_exists('stripslashes'))
        {
            $comments = stripslashes(trim($_POST['_message']));
        }
        else
        {
            $comments = trim($_POST['_message']);
        }
    }

    if(!isset($hasError))
    {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '') )
        {
            $emailTo = get_option('admin_email');
        }
        $subject = '[Cuble] From '.$name;
        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
        $headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

        wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }

}
?>

<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="row">
	<div class="span12">
		<h2><?php the_title();?></h2>
		<hr>
	</div>
</div><!-- .row -->

<?php if (isset($emailSent) && $emailSent): ?>
<div class="row">
	<div class="span12">
	    <div class="alert alert-info"
    	    <button type="button" class="close" data-dismiss="alert">×</button>
    	    <strong><?php _e("Mensaje enviado correctamente", 'cuble')?></strong>
	    </div>
	</div>
</div>
<?php elseif (isset($hasError) && $hasError):?>
<div class="row">
	<div class="span12">
	    <div class="alert">
    	    <button type="button" class="close" data-dismiss="alert">×</button>
    	    <strong><?php _e("No se pudo enviar el mensaje correctamente.", 'cuble')?></strong>
	    </div>
	</div>
</div>
<?php endif; ?>

<div class="row">
	<div class="span12">
    <?php the_content(); ?>
    </div>
</div><!-- .row -->

<div class="row">
	<div class="span4">
		<h3><?php _e("Nuestra localización", 'cuble')?></h3>
		<iframe width="370" height="270" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openstreetmap.org/export/embed.html?bbox=-0.380305,39.469781,-0.376368,39.471753&amp;layer=mapnik&amp;marker=39.47077,-0.37844" style="border: 1px solid black"></iframe><br /><small><a href="http://www.openstreetmap.org/?lat=39.470766999999995&amp;lon=-0.37833649999999996&amp;zoom=18&amp;layers=M&amp;mlat=39.47077&amp;mlon=-0.37844">Ver mapa m&#225;s grande</a></small>
	</div>
	<div class="span4">
		<h3><?php _e("Información de contacto", "cuble")?></h3>
		<div class="well">
			<p><strong><?php _e("Dirección", 'cuble')?>:</strong></p>
			<hr>
			<p>
				Cuble Desarrollo S.L: <br>
				C/ Garrigues, 3, 3ºB <br>
				46001, Valencia, España <br>
				Tel.: +34 963211830
			</p>
			<hr>
			<p><?php _e("No dude en contactar con nosotros sobre lo que quieras. Estamos abiertos a preguntas, comentarios y sugerencias", 'cuble')?></p>
		</div>
	</div>
	<div class="span4">
		<h3><?php _e("Envíanos un correo", "cuble")?></h3>
			<form class="form" action="<?php the_permalink(); ?>" method="post">
				<label for="name"><?php _e("Tu nombre", "cuble")?>:</label>
				<input class="span4" type="text" id="name" name="_name" placeholder="">
				
				<label for="inputEmail"><?php _e("Correo", "cuble")?>:</label>
				<input class="span4" type="text" id="inputEmail" name="_email" placeholder="">
				
				<label for="message"><?php _e("Tu mensaje", "cuble")?>:</label>
				<textarea class="span4" rows="4" id="message" name="_message" placeholder=""></textarea>
				
				<?php /*<label class="checkbox">
					<input type="checkbox" name="copy"> <?php _e("Enviarme una copia", 'cuble') ?>
				</label> */ ?>
				<input type="hidden" name="submitted" id="submitted" value="true" />
				<button type="submit" class="btn btn-primary"><?php _e("Enviar", 'cuble')?></button>
			</form>
	</div>
</div>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>