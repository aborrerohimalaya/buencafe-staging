<?php
/*
Template Name: Contacto
*/
?>
<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>
<?php get_header(); ?>
<?php the_post(); ?>

<?php
    $link_actual = explode("/", get_permalink( $post->ID ));
    /* Detectar si esta en ingles */
    if ( in_array("en", $link_actual ) ){
        $english = true;
    }

    if ( in_array("ja", $link_actual ) ){
        $japanese = true;
    }

    if ( in_array("zh-hant", $link_actual ) ){
        $chinese= true;
    }


?>

<section id="contact" class="intern detail">
<?php
  /* --------------- Encabezado --------------- */ 
  if( get_field('imagen_encabezado') && get_field('titulo_encabezado') ) {
  ?>
    <h1 style="background: rgba(0, 0, 0, 0) url('<?php echo get_field('imagen_encabezado') ?>') no-repeat scroll 0 0;"><span><?php echo get_field('titulo_encabezado'); ?></span></h1>
  <?php
  }
global $wpdb;

$table_name = $wpdb->prefix . 'formcontacto';

if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

  $sql = "CREATE TABLE $table_name (
    id int(11) NOT NULL AUTO_INCREMENT,
    nombre varchar(255) DEFAULT NULL,
    email varchar(255) DEFAULT NULL,
    comentario varchar(255) DEFAULT NULL,
    UNIQUE KEY id (id)
    );";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

dbDelta($sql);

} else {
  
  $wpdb->insert( $table_name, array( 
    'nombre' => $_POST['nombre'],
    'email' => $_POST['email'],
    'comentario' => $_POST['consulta']
    ) );

}
?>

<?php
if( isset($_POST['nombre']) && isset($_POST['mail']) && isset($_POST['empresa']) && isset($_POST['pais']) && isset($_POST['mensaje']) ) {
  if( $_POST["telefono"] == "" ) {
    $_POST["telefono"] == "Campo no ingresado";
  }

  require 'phpmailer/class.phpmailer.php';
  require('phpmailer/PHPMailerAutoload.php');

  $mail = new PHPMailer;
  
  $mail->IsSMTP(); //Indico a la clase que use SMTP
  //Debo de hacer autenticación SMTP
  $mail->SMTPDebug = 2;
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "tls";
  $mail->Host = "smtp.gmail.com"; //Indico el servidor de Gmail para SMTP
  $mail->Port = 587; //indico el puerto que usa Gmail
  $mail->setFrom('soporte@himalayada.com', 'Sitio Web www.buencafe.com contactenos');
  $mail->Username = "soporte@himalayada.com";
  $mail->Password = "S0poRt3123!";
  $mail->setFrom (''.$_POST["mail"].'',"BuenCafe");
  #$mail->addAddress('juliana.diaz@cafedecolombia.com');
  $mail->addAddress('aborrero@himalayada.com');
  $mail->Subject = 'Contacto - BuenCafe';
  $mail->Body = '

  <html>

  <head>

  <title>Contacto - Web Buencafe</title>

  </head>

  <body>
    <div>Datos del Emisor:</div>
    <div>Nombre: '.$_POST["nombre"].'</div>
    <div>E-mail: '.$_POST["mail"].'</div>
    <div>Tel&eacute;fono: '.$_POST["telefono"].'</div>
    <div>Empresa: '.$_POST["empresa"].'</div>
    <div>Pa&iacute;s: '.$_POST["pais"].'</div>
    <br><br>
    <div>Mensaje: '.$_POST["mensaje"].'</div>
  </body>

  </html>

  ';

  $mail->IsHTML(true);

  if($mail->send())
    $success = 'El correo ha sido enviado.';
  else{
    var_dump($mail->ErrorInfo);die;
    $error = 'Lo sentimos ha ocurrido un error. Intente nuevamente en unos minutos.';
  }
}

?>
  <h2><?php the_content(); ?></h2>
  <?php $url = get_the_permalink();?>
  <form id="contact-form" method="post">
    <input type="hidden" value="<?php echo $url; ?>" id="url">
    <div><input type="text"  id="nombre" name="nombre" required="" placeholder="* <?php if($english) echo'Name and Surname';elseif($japanese) echo'ご氏名';elseif($chinese) echo'名字和姓氏';else echo'Nombre y Apellido'; ?>"></div>
    <div><input type="email" id="mail" name="mail" required="" placeholder="* <?php if($english) echo'E-mail';elseif($japanese) echo'Eメールアドレス';elseif($chinese) echo'电子邮件'; else echo'E-mail'; ?>"></div>
    <div><input type="text"  id="telefono" name="telefono" required="" placeholder="* <?php if($english) echo'Telephone'; elseif($japanese) echo'お電話番号';elseif($chinese) echo'电话- 单位'; else echo'Teléfono'; ?>"></div>
    <div><input type="text"  id="empresa" name="empresa" required="" placeholder="* <?php if($english) echo'Enterprise'; elseif($japanese) echo'会社名';elseif($chinese) echo'国家'; else echo'Empresa'; ?>"></div>
    <select name="pais" id="country_contact" required="">
        <option value="">* <?php if($english) echo'Country'; elseif($japanese) echo'国名';elseif($chinese) echo'信息'; else echo'País'; ?></option>
        <?php if(!$english){
        ?>
        <option value="Afganistán">Afganistán</option>
        <option value="Albania">Albania</option>
        <option value="Alemania">Alemania</option>
        <option value="Andorra">Andorra</option>
        <option value="Angola">Angola</option>
        <option value="Anguilla">Anguilla</option>
        <option value="Antigua y Barbuda">Antigua y Barbuda</option>
        <option value="Antillas Holandesas">Antillas Holandesas</option>
        <option value="Argelia">Argelia</option>
        <option value="Argentina">Argentina</option>
        <option value="Armenia">Armenia</option>
        <option value="Aruba">Aruba</option>
        <option value="ARY Macedonia">ARY Macedonia</option>
        <option value="Australia">Australia</option>
        <option value="Austria">Austria</option>
        <option value="Bahamas">Bahamas</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="Barbados">Barbados</option>
        <option value="Belice">Belice</option>
        <option value="Benin">Benin</option>
        <option value="Bermudas">Bermudas</option>
        <option value="Bielorrusia">Bielorrusia</option>
        <option value="Bolivia">Bolivia</option>
        <option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
        <option value="Botsuana">Botsuana</option>
        <option value="Brasil">Brasil</option>
        <option value="Bulgaria">Bulgaria</option>
        <option value="Burkina Faso">Burkina Faso</option>
        <option value="Burundi">Burundi</option>
        <option value="Bélgica">Bélgica</option>
        <option value="Cabo Verde">Cabo Verde</option>
        <option value="Camboya">Camboya</option>
        <option value="Camerún">Camerún</option>
        <option value="Canadá">Canadá</option>
        <option value="Chad">Chad</option>
        <option value="Chile">Chile</option>
        <option value="China">China</option>
        <option value="Chipre">Chipre</option>
        <option value="Ciudad del Vaticano">Ciudad del Vaticano</option>
        <option value="Colombia">Colombia</option>
        <option value="Comoras">Comoras</option>
        <option value="Congo">Congo</option>
        <option value="Corea del Norte">Corea del Norte</option>
        <option value="Corea del Sur">Corea del Sur</option>
        <option value="Costa de Marfil">Costa de Marfil</option>
        <option value="Costa Rica">Costa Rica</option>
        <option value="Croacia">Croacia</option>
        <option value="Cuba">Cuba</option>
        <option value="Dinamarca">Dinamarca</option>
        <option value="Dominica">Dominica</option>
        <option value="Ecuador">Ecuador</option>
        <option value="Egipto">Egipto</option>
        <option value="El Salvador">El Salvador</option>
        <option value="Emiratos çrabes Unidos">Emiratos Árabes Unidos</option>
        <option value="Eritrea">Eritrea</option>
        <option value="Eslovaquia">Eslovaquia</option>
        <option value="Eslovenia">Eslovenia</option>
        <option value="España">España</option>
        <option value="Estados Unidos">Estados Unidos</option>
        <option value="Estonia">Estonia</option>
        <option value="Etiop’a">Etiopía</option>
        <option value="Filipinas">Filipinas</option>
        <option value="Finlandia">Finlandia</option>
        <option value="Fiyi">Fiyi</option>
        <option value="Francia">Francia</option>
        <option value="Gambia">Gambia</option>
        <option value="Georgia">Georgia</option>
        <option value="Ghana">Ghana</option>
        <option value="Gibraltar">Gibraltar</option>
        <option value="Granada">Granada</option>
        <option value="Grecia">Grecia</option>
        <option value="Groenlandia">Groenlandia</option>
        <option value="Guadalupe">Guadalupe</option>
        <option value="Guam">Guam</option>
        <option value="Guatemala">Guatemala</option>
        <option value="Guayana Francesa">Guayana Francesa</option>
        <option value="Guinea Ecuatorial">Guinea Ecuatorial</option>
        <option value="Guinea">Guinea</option>
        <option value="Guinea-Bissau">Guinea-Bissau</option>
        <option value="Guyana">Guyana</option>
        <option value="Haití">Haití</option>
        <option value="Honduras">Honduras</option>
        <option value="Hong Kong">Hong Kong</option>
        <option value="Hungría">Hungría</option>
        <option value="India">India</option>
        <option value="Indonesia">Indonesia</option>
        <option value="Iran">Iran</option>
        <option value="Iraq">Iraq</option>
        <option value="Irlanda">Irlanda</option>
        <option value="Isla Bouvet">Isla Bouvet</option>
        <option value="Isla de Navidad">Isla de Navidad</option>
        <option value="Isla Norfolk">Isla Norfolk</option>
        <option value="Islandia">Islandia</option>
        <option value="Islas Caim‡n">Islas Caimín</option>
        <option value="Islas Cocos">Islas Cocos</option>
        <option value="Islas Cook">Islas Cook</option>
        <option value="Islas Feroe">Islas Feroe</option>
        <option value="Islas Georgias del Sur y Sandwich del Sur">Islas Georgias del Sur y Sandwich del Sur</option>
        <option value="Islas Gland">Islas Gland</option>
        <option value="Islas Heard y McDonald">Islas Heard y McDonald</option>
        <option value="Islas Malvinas">Islas Malvinas</option>
        <option value="Islas Marianas del Norte">Islas Marianas del Norte</option>
        <option value="Islas Marshall">Islas Marshall</option>
        <option value="Islas Pitcairn">Islas Pitcairn</option>
        <option value="Islas Salom—n">Islas Salomón</option>
        <option value="Islas Turcas y Caicos">Islas Turcas y Caicos</option>
        <option value="Islas ultramarinas de Estados Unidos">Islas ultramarinas de Estados Unidos</option>
        <option value="Israel">Israel</option>
        <option value="Italia">Italia</option>
        <option value="Jamaica">Jamaica</option>
        <option value="Japon">Japon</option>
        <option value="Jordania">Jordania</option>
        <option value="Kazajst‡n">Kazajstán</option>
        <option value="Kenia">Kenia</option>
        <option value="Kirguist‡n">Kirguistán</option>
        <option value="Kiribati">Kiribati</option>
        <option value="Kuwait">Kuwait</option>
        <option value="Laos">Laos</option>
        <option value="Lesotho">Lesotho</option>
        <option value="Letonia">Letonia</option>
        <option value="Liberia">Liberia</option>
        <option value="Libia">Libia</option>
        <option value="Liechtenstein">Liechtenstein</option>
        <option value="Lituania">Lituania</option>
        <option value="Luxemburgo">Luxemburgo</option>
        <option value="Macao">Macao</option>
        <option value="Madagascar">Madagascar</option>
        <option value="Malasia">Malasia</option>
        <option value="Malawi">Malawi</option>
        <option value="Maldivas">Maldivas</option>
        <option value="Malta">Malta</option>
        <option value="Marruecos">Marruecos</option>
        <option value="Martinica">Martinica</option>
        <option value="Mauricio">Mauricio</option>
        <option value="Mauritania">Mauritania</option>
        <option value="Mayotte">Mayotte</option>
        <option value="Mexico">Mexico</option>
        <option value="Micronesia">Micronesia</option>
        <option value="Moldavia">Moldavia</option>
        <option value="Monaco">Monaco</option>
        <option value="Mongolia">Mongolia</option>
        <option value="Montserrat">Montserrat</option>
        <option value="Mozambique">Mozambique</option>
        <option value="Myanmar">Myanmar</option>
        <option value="Namibia">Namibia</option>
        <option value="Nauru">Nauru</option>
        <option value="Nepal">Nepal</option>
        <option value="Nicaragua">Nicaragua</option>
        <option value="Nigeria">Nigeria</option>
        <option value="Niue">Niue</option>
        <option value"Noruega">Noruega</option>
        <option value="Nueva Caledonia">Nueva Caledonia</option>
        <option value="Nueva Zelanda">Nueva Zelanda</option>
        <option value="Paises Bajos">Paises Bajos</option>
        <option value="Palau">Palau</option>
        <option value="Palestina">Palestina</option>
        <option value="Paraguay">Paraguay</option>
        <option value="Polinesia Francesa">Polinesia Francesa</option>
        <option value="Polonia">Polonia</option>
        <option value="Portugal">Portugal</option>
        <option value="Puerto Rico">Puerto Rico</option>
        <option value="Qatar">Qatar</option>
        <option value="Reino Unido">Reino Unido</option>
        <option value="República Centroafricana">República Centroafricana</option>
        <option value="Reuni—n">Reunión</option>
        <option value="Ruanda">Ruanda</option>
        <option value="Rumania">Rumania</option>
        <option value="Rusia">Rusia</option>
        <option value="Sahara Occidental">Sahara Occidental</option>
        <option value="Samoa Americana">Samoa Americana</option>
        <option value="Samoa">Samoa</option>
        <option value="San Crist—bal y Nevis">San Cristóbal y Nieves</option>
        <option value="San Marino">San Marino</option>
        <option value="San Pedro y Miquel—n">San Pedro y Miquelón</option>
        <option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
        <option value="Santa Helena">Santa Helena</option>
        <option value="Senegal">Senegal</option>
        <option value="Serbia y Montenegro">Serbia y Montenegro</option>
        <option value="Seychelles">Seychelles</option>
        <option value="Sierra Leona">Sierra Leona</option>
        <option value="Singapur">Singapur</option>
        <option value="Siria">Siria</option>
        <option value="Somalia">Somalia</option>
        <option value="Sri Lanka">Sri Lanka</option>
        <option value="Suazilandia">Suazilandia</option>
        <option value="Suecia">Suecia</option>
        <option value="Suiza">Suiza</option>
        <option value="Surinam">Surinam</option>
        <option value="Svalbard y Jan Mayen">Svalbard y Jan Mayen</option>
        <option value="Tailandia">Tailandia</option>
        <option value="Tanzania">Tanzania</option>
        <option value="Territorios Australes Franceses">Territorios Australes Franceses</option>
        <option value="Timor">Timor Oriental
        <option value="Togo">Togo</option>
        <option value="Tokelau">Tokelau</option>
        <option value="Tonga">Tonga</option>
        <option value="Trinidad y Tobago">Trinidad y Tobago</option>
        <option value="Turqu’a">Turquía</option>
        <option value="Tuvalu">Tuvalu</option>
        <option value="Tœnez">Túnez</option>
        <option value="Ucrania">Ucrania</option>
        <option value="Uganda">Uganda</option>
        <option value="Uruguay">Uruguay</option>
        <option value="Vanuatu">Vanuatu</option>
        <option value="Venezuela">Venezuela</option>
        <option value="Vietnam">Vietnam</option>
        <option value="Wallis y Futuna">Wallis y Futuna</option>
        <option value="Yemen">Yemen</option>
        <option value="Yibuti">Yibuti</option>
        <option value="Zambia">Zambia</option>
        <option value="Zimbabue">Zimbabue</option>
        <?php } 
      else{
      ?>
        <option value="Afghanistan">Afghanistan</option>
        <option value="Albania">Albania</option>
        <option value="Algeria">Algeria</option>
        <option value="American Samoa">American Samoa</option>
        <option value="Andorra">Andorra</option>
        <option value="Angola">Angola</option>
        <option value="Anguilla">Anguilla</option>
        <option value="Antarctica">Antarctica</option>
        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
        <option value="Argentina">Argentina</option>
        <option value="Armenia">Armenia</option>
        <option value="Aruba">Aruba</option>
        <option value="Australia">Australia</option>
        <option value="Austria">Austria</option>
        <option value="Azerbaijan">Azerbaijan</option>
        <option value="Bahamas">Bahamas</option>
        <option value="Bahrain">Bahrain</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="Barbados">Barbados</option>
        <option value="Belarus">Belarus</option>
        <option value="Belgium">Belgium</option>
        <option value="Belize">Belize</option>
        <option value="Benin">Benin</option>
        <option value="Bermuda">Bermuda</option>
        <option value="Bhutan">Bhutan</option>
        <option value="Bolivia">Bolivia</option>
        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
        <option value="Botswana">Botswana</option>
        <option value="Bouvet Island">Bouvet Island</option>
        <option value="Brazil">Brazil</option>
        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
        <option value="Brunei Darussalam">Brunei Darussalam</option>
        <option value="Bulgaria">Bulgaria</option>
        <option value="Burkina Faso">Burkina Faso</option>
        <option value="Burundi">Burundi</option>
        <option value="Cambodia">Cambodia</option>
        <option value="Cameroon">Cameroon</option>
        <option value="Canada">Canada</option>
        <option value="Cape Verde">Cape Verde</option>
        <option value="Cayman Islands">Cayman Islands</option>
        <option value="Central African Republic">Central African Republic</option>
        <option value="Chad">Chad</option>
        <option value="Chile">Chile</option>
        <option value="China">China</option>
        <option value="Christmas Island">Christmas Island</option>
        <option value="Colombia">Colombia</option>
        <option value="Comoros">Comoros</option>
        <option value="Congo">Congo</option>
        <option value="Congo">Congo</option>
        <option value="Cook Islands">Cook Islands</option>
        <option value="Costa Rica">Costa Rica</option>
        <option value="Cote D'Ivoire">Cote D'Ivoire</option>
        <option value="Croatia">Croatia</option>
        <option value="Cuba">Cuba</option>
        <option value="Cyprus">Cyprus</option>
        <option value="Czech Republic">Czech Republic</option>
        <option value="Denmark">Denmark</option>
        <option value="Djibouti">Djibouti</option>
        <option value="Dominica">Dominica</option>
        <option value="Dominican Republic">Dominican Republic</option>
        <option value="Ecuador">Ecuador</option>
        <option value="Egypt">Egypt</option>
        <option value="El Salvador">El Salvador</option>
        <option value="Equatorial Guinea">Equatorial Guinea</option>
        <option value="Eritrea">Eritrea</option>
        <option value="Estonia">Estonia</option>
        <option value="Ethiopia">Ethiopia</option>
        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
        <option value="Faroe Islands">Faroe Islands</option>
        <option value="Fiji">Fiji</option>
        <option value="Finland">Finland</option>
        <option value="France">France</option>
        <option value="French Guiana">French Guiana</option>
        <option value="French Polynesia">French Polynesia</option>
        <option value="French Southern Territories">French Southern Territories</option>
        <option value="Gabon">Gabon</option>
        <option value="Gambia">Gambia</option>
        <option value="Georgia">Georgia</option>
        <option value="Germany">Germany</option>
        <option value="Ghana">Ghana</option>
        <option value="Gibraltar">Gibraltar</option>
        <option value="Greece">Greece</option>
        <option value="Greenland">Greenland</option>
        <option value="Grenada">Grenada</option>
        <option value="Guadeloupe">Guadeloupe</option>
        <option value="Guam">Guam</option>
        <option value="Guatemala">Guatemala</option>
        <option value="Guinea">Guinea</option>
        <option value="Guinea-Bissau">Guinea-Bissau</option>
        <option value="Guyana">Guyana</option>
        <option value="Haiti">Haiti</option>
        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
        <option value="Honduras">Honduras</option>
        <option value="Hong Kong">Hong Kong</option>
        <option value="Hungary">Hungary</option>
        <option value="Iceland">Iceland</option>
        <option value="India">India</option>
        <option value="Indonesia">Indonesia</option>
        <option value="Iran">Iran</option>
        <option value="Iraq">Iraq</option>
        <option value="Ireland">Ireland</option>
        <option value="Israel">Israel</option>
        <option value="Italy">Italy</option>
        <option value="Jamaica">Jamaica</option>
        <option value="Japan">Japan</option>
        <option value="Jordan">Jordan</option>
        <option value="Kazakhstan">Kazakhstan</option>
        <option value="Kenya">Kenya</option>
        <option value="Kiribati">Kiribati</option>
        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
        <option value="Korea, Republic of">Korea, Republic of</option>
        <option value="Kuwait">Kuwait</option>
        <option value="Kyrgyzstan">Kyrgyzstan</option>
        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
        <option value="Latvia">Latvia</option>
        <option value="Lebanon">Lebanon</option>
        <option value="Lesotho">Lesotho</option>
        <option value="Liberia">Liberia</option>
        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
        <option value="Liechtenstein">Liechtenstein</option>
        <option value="Lithuania">Lithuania</option>
        <option value="Luxembourg">Luxembourg</option>
        <option value="Macao">Macao</option>
        <option value="Madagascar">Madagascar</option>
        <option value="Malawi">Malawi</option>
        <option value="Malaysia">Malaysia</option>
        <option value="Maldives">Maldives</option>
        <option value="Mali">Mali</option>
        <option value="Malta">Malta</option>
        <option value="Marshall Islands">Marshall Islands</option>
        <option value="Martinique">Martinique</option>
        <option value="Mauritania">Mauritania</option>
        <option value="Mauritius">Mauritius</option>
        <option value="Mayotte">Mayotte</option>
        <option value="Mexico">Mexico</option>
        <option value="Monaco">Monaco</option>
        <option value="Mongolia">Mongolia</option>
        <option value="Montserrat">Montserrat</option>
        <option value="Morocco">Morocco</option>
        <option value="Mozambique">Mozambique</option>
        <option value="Myanmar">Myanmar</option>
        <option value="Namibia">Namibia</option>
        <option value="Nauru">Nauru</option>
        <option value="Nepal">Nepal</option>
        <option value="Netherlands Antilles">Netherlands Antilles</option>
        <option value="Netherlands">Netherlands</option>
        <option value="New Caledonia">New Caledonia</option>
        <option value="New Zealand">New Zealand</option>
        <option value="Nicaragua">Nicaragua</option>
        <option value="Niger">Niger</option>
        <option value="Nigeria">Nigeria</option>
        <option value="Niue">Niue</option>
        <option value="Norfolk Island">Norfolk Island</option>
        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
        <option value="Norway">Norway</option>
        <option value="Oman">Oman</option>
        <option value="Pakistan">Pakistan</option>
        <option value="Palau">Palau</option>
        <option value="Panama">Panama</option>
        <option value="Papua New Guinea">Papua New Guinea</option>
        <option value="Paraguay">Paraguay</option>
        <option value="Peru">Peru</option>
        <option value="Philippines">Philippines</option>
        <option value="Pitcairn">Pitcairn</option>
        <option value="Poland">Poland</option>
        <option value="Portugal">Portugal</option>
        <option value="Puerto Rico">Puerto Rico</option>
        <option value="Qatar">Qatar</option>
        <option value="Reunion">Reunion</option>
        <option value="Romania">Romania</option>
        <option value="Russian Federation">Russian Federation</option>
        <option value="Rwanda">Rwanda</option>
        <option value="Saint Helena">Saint Helena</option>
        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
        <option value="Saint Lucia">Saint Lucia</option>
        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
        <option value="Samoa">Samoa</option>
        <option value="San Marino">San Marino</option>
        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
        <option value="Saudi Arabia">Saudi Arabia</option>
        <option value="Senegal">Senegal</option>
        <option value="Serbia and Montenegro">Serbia and Montenegro</option>
        <option value="Seychelles">Seychelles</option>
        <option value="Sierra Leone">Sierra Leone</option>
        <option value="Singapore">Singapore</option>
        <option value="Slovakia">Slovakia</option>
        <option value="Slovenia">Slovenia</option>
        <option value="Solomon Islands">Solomon Islands</option>
        <option value="Somalia">Somalia</option>
        <option value="South Africa">South Africa</option>
        <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
        <option value="Spain">Spain</option>
        <option value="Sri Lanka">Sri Lanka</option>
        <option value="Sudan">Sudan</option>
        <option value="Suriname">Suriname</option>
        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
        <option value="Swaziland">Swaziland</option>
        <option value="Sweden">Sweden</option>
        <option value="Switzerland">Switzerland</option>
        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
        <option value="Tajikistan">Tajikistan</option>
        <option value="Thailand">Thailand</option>
        <option value="Timor-Leste">Timor-Leste</option>
        <option value="Togo">Togo</option>
        <option value="Tokelau">Tokelau</option>
        <option value="Tonga">Tonga</option>
        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
        <option value="Tunisia">Tunisia</option>
        <option value="Turkey">Turkey</option>
        <option value="Turkmenistan">Turkmenistan</option>
        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
        <option value="Tuvalu">Tuvalu</option>
        <option value="Uganda">Uganda</option>
        <option value="Ukraine">Ukraine</option>
        <option value="United Arab Emirates">United Arab Emirates</option>
        <option value="United Kingdom">United Kingdom</option>
        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
        <option value="United States">United States</option>
        <option value="Uruguay">Uruguay</option>
        <option value="Uzbekistan">Uzbekistan</option>
        <option value="Vanuatu">Vanuatu</option>
        <option value="Venezuela">Venezuela</option>
        <option value="Viet Nam">Viet Nam</option>
        <option value="Wallis and Futuna">Wallis and Futuna</option>
        <option value="Western Sahara">Western Sahara</option>
        <option value="Yemen">Yemen</option>
        <option value="Zambia">Zambia</option>
        <option value="Zimbabwe">Zimbabwe</option>
      <?php }?>
    </select>
    <div><textarea required="" id="mensaje" name="mensaje" placeholder="*<?php if($english) echo'Message'; elseif($japanese) echo'メッセージ';elseif($chinese) echo'发送'; else echo'Mensaje'; ?>"></textarea></div>

    <a class="submit"><?php if($english) echo'Send';  elseif($japanese) echo'送信'; else echo'Enviar'; ?></a>
    <input type="submit">
  </form>

  <?php 
  if( ! empty( $error ) ){
  ?>
    <div><strong>Error:</strong><p><?php echo $error; ?></p></div>
  <?php
  }
  if( ! empty( $success ) ){ /* Si no ocurrio ningun error */
  ?>
    <div><p><?php echo $success; ?></p></div>
  <?php
  }
  ?>
  <section id="map">
      <div id="gmap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.7042432315657!2d-75.61008538528034!3d4.988719440481951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x4c6e13fa6e819611!2sFabrica+de+Cafe+Liofilizado!5e0!3m2!1ses-419!2sbr!4v1456890171980" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
      <h3><strong><?php echo get_field('titulo_contacto'); ?></strong><?php echo get_field('ubicacion');?><br><?php echo get_field('telefono'); echo get_field('fax'); ?>
      </h3>
  </section>
  <div id="contacto"></div>
</section>
<?php get_footer(); ?>