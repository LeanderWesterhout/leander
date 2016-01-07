<?php
/*
Plugin Name: Leander Form Plugin
Plugin URI: http://example.com
Description: Simpel WordPress Form
Version: 1.0
Author: Leander 
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );



function html_form_code() {
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	echo '<p>';
	echo 'Voornaam  <br>';
	echo '<input type="text" name="voornaam" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["voornaam"] ) ? esc_attr( $_POST["voornaam"] ) : '' ) . '" size="40" />';
	echo '</p>';
    echo '<p>';
	echo 'Achternaam (verplicht) <br>';
	echo '<input type="text" name="achternaam" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["achternaam"] ) ? esc_attr( $_POST["achternaam"] ) : '' ) . '" size="40" />';
	echo '</p>';
    echo '<p>';
	echo 'Straat (verplicht) <br>';
	echo '<input type="text" name="straatnaam" value="' . ( isset( $_POST["straatnaam"] ) ? esc_attr( $_POST["straatnaam"] ) : '' ) . '" size="40" />';
	echo '</p>';
    echo 'Huisnummer (verplicht) <br>';
	echo '<input type="text" name="huisnummer" value="' . ( isset( $_POST["huisnummer"] ) ? esc_attr( $_POST["huisnummer"] ) : '' ) . '" size="10" />';
	echo '</p>';
    echo 'Postcode (verplicht) <br>';
	echo '<input type="text" name="postcode" value="' . ( isset( $_POST["postcode"] ) ? esc_attr( $_POST["postcode"] ) : '' ) . '" size="10" />';
	echo '</p>';
    echo 'Plaats (verplicht) <br>';
	echo '<input type="text" name="plaats" value="' . ( isset( $_POST["plaats"] ) ? esc_attr( $_POST["plaats"] ) : '' ) . '" size="40" />';
	echo '</p>';
    echo '</p>';
    echo 'Telefoonnummer (verplicht) <br>';
	echo '<input type="text" name="telnummer" value="' . ( isset( $_POST["telnummer"] ) ? esc_attr( $_POST["telnummer"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Email adres (verplicht) <br>';
	echo '<input type="email" name="emailadres" value="' . ( isset( $_POST["emailadres"] ) ? esc_attr( $_POST["emailadres"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo '<strong>Gewenste brochure</strong> (verplicht) <br><br>';
    echo '<label>Brochure PHP programmeur:</label><br>';
    echo '<input type="checkbox" name="php_prog" value="1"><br>';
	echo '<label>Brochure C++ programmeur:</label><br>';
    echo '<input type="checkbox" name="cprog" value="1"><br>';
	echo '</p>';
	echo '<p><input type="submit" name="submitted" value="Verstuur"></p>';
	echo '</form>';
    
    
  
}

function deliver_mail() {

	
	if ( isset( $_POST['submitted'] ) ) {

	
		$voornaam    = sanitize_text_field( $_POST["voornaam"] );
        $achternaam   = sanitize_text_field( $_POST["achternaam"] );
        $straat   = sanitize_text_field( $_POST["straatnaam"] );
        $huisnummer   = sanitize_text_field( $_POST["huisnummer"] );
        $postcode   = sanitize_text_field( $_POST["postcode"] );
        $plaats   = sanitize_text_field( $_POST["plaats"] );
        $telnummer   = sanitize_text_field( $_POST["telnummer"] );
		$email   = sanitize_email( $_POST["emailadres"] );
		$php_brochure = ($_POST['php_prog'] == '1')?'1':'0';
        $c_brochure = ($_POST['cprog'] == '1')?'1':'0';

		
          
          if(isset($_POST['php_prog'])){
              $php_brochure_link = 'wp-content/uploads/2016/01/php_test.pdf';
              $message = "<p>Klik <a href=".$php_brochure_link.">hier</a> om uw php brochure te bekijken</p>";
          }
          if(isset($_POST['cprog'])){
              $c_brochure_link = 'wp-content/uploads/2016/01/ctest.pdf';
              $message = "<p>Klik <a href=".$c_brochure_link.">hier</a> om uw c brochure te bekijken</p>";
          }
          if(isset($_POST['php_prog']) && isset($_POST['cprog'])){
              $php_brochure_link = 'wp-content/uploads/2016/01/php_test.pdf';
              $c_brochure_link = 'wp-content/uploads/2016/01/ctest.pdf';
              $message = "<p>Klik <a href=".$c_brochure_link.">hier</a> om uw c brochure te bekijken <br>Klik <a href=".$php_brochure_link.">hier</a> om uw php brochure te bekijken</p>";
          }
          
   global $wpdb;
   
            $wpdb->query("INSERT INTO wp_brochures (voornaam, achternaam, straat, huisnummer, postcode, plaats, telefoonnummer, email, php_brochure, c_brochure) VALUES "
                    . "('$voornaam', '$achternaam', '$straat', '$huisnummer', '$postcode', '$plaats', '$telnummer', '$email', '$php_brochure', '$c_brochure')"  );
          
          
          
          
          $to = $email;
          $name = 'Nordique';
          $subject = "Brochure";
		  $headers = "From: Nordique <l.r.westerhout@gmail.com>" . "\r\n";
          $txt = $message;

        wp_mail( $to, $subject, $message, $headers );
        //mail($to,$subject,$txt,$headers);
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			echo '<div>';
            
            
            
			echo "<p>Bedankt voor uw aanvraag. U ontvangt een mail met een link naar de brochure.".$message." </p>";
			echo '</div>';
		} else {
			echo 'Error';
		}
	}
}

//SMTP functie
//add_action( 'phpmailer_init', 'wpse8170_phpmailer_init' );
//function wpse8170_phpmailer_init( PHPMailer $phpmailer ) {
//    $phpmailer->Host = 'your.smtp.server.here';
//    $phpmailer->Port = 25; // could be different
//    $phpmailer->Username = 'your_username@example.com'; // if required
//    $phpmailer->Password = 'yourpassword'; // if required
//    $phpmailer->SMTPAuth = true; // if required
//    // $phpmailer->SMTPSecure = 'ssl'; // enable if required, 'tls' is another possible value
//
//    $phpmailer->IsSMTP();
//}

function shortcode() {
	ob_start();
	deliver_mail();
	html_form_code();

	return ob_get_clean();
}

add_shortcode( 'brochure_form', 'shortcode' );