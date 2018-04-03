<?php 
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>
<?php
	$host = 'localhost';
	$user = 'cumplearcor';
	$pass = 'cumplearcor#2015!new';
	$db = 'cumplearcor';

	if ($_GET['descarga'] == 'newsletter') {
		$table = 'wp_newsletter';
		$file = 'newsletter_arcor';
	} else if ($_GET['descarga'] == 'contacto') {
		$table = 'wp_formcontacto';
		$file = 'contacto_arcor';
	}

	$link = @mysql_connect($host, $user, $pass) or die("Can not connect." . @mysql_error());
	@mysql_select_db($db) or die("Can not connect.");

	$result = @mysql_query("SHOW COLUMNS FROM ".$table."");
	$i = 0;
	if (@mysql_num_rows($result) > 0) {
	while ($row = @mysql_fetch_assoc($result)) {
	@$csv_output .= $row['Field']."; ";
	$i++;
	}
	}
	@$csv_output .= "\n";

	$values = @mysql_query("SELECT * FROM ".$table."");
	while ($rowr = @mysql_fetch_row($values)) {
	for ($j=0;$j<$i;$j++) {
	@$csv_output .= $rowr[$j]."; ";
	}
	@$csv_output .= "\n";
	}

	$filename = $file."_".date("Y-m-d_H-i",time());
	@header("Content-type: application/vnd.ms-excel");
	@header("Content-disposition: csv" . date("Y-m-d") . ".csv");
	@header( "Content-disposition: filename=".$filename.".csv");
	print @$csv_output;
	exit;
?>