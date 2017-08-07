<?php
$url = 'http://www.goetemp.de/graphs/api.php?action=allvalues';
$placeURL = 'https://www.google.de/maps/place/Nohlstra%C3%9Fe,+37075+G%C3%B6ttingen/@51.5507435,9.9499444,18z/data=!4m2!3m1!1s0x47a4d4e69a44581f:0x34755142964d6e9';

$ch = curl_init();
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_URL, $url );
$json = curl_exec($ch);
curl_close($ch);

$jsonarray = json_decode( $json, true );

?>

<div class="goetemp-widget-front">
	
	<?php if ( $instance['title'] ) {  ?>
	
		<h3><?php echo $instance['title']; ?></h3>
	
	<?php } else { ?>
	
		<h3><?php _e( 'Goetemp Widget', 'goetemp-widget' ) ?></h3>
	
	<?php } ?>
	
	<p>
		<?php _e( 'Stündlich aktuelle Werte von der Wetterstation Nohlstraße in Göttingen', 'goetemp-widget' ) ?>.&nbsp;<a class="goetemp-widget-map-marker" href="<?php echo $placeURL; ?>" title="<?php _e( 'Wetterstation auf Google Maps zeigen', 'goetemp-widget' ) ?>" target="_blank"><i class="fa fa-map-marker"></i></a>
	</p>

	<div class="goetemp-widget-front-values">

	<?php if ( 1 == $instance['show-fine-dust'] ) { ?>
	
		<p>
			<strong><?php _e( 'Feinstaub', 'goetemp-widget' ) ?> <a href="http://de.wikipedia.org/wiki/Feinstaub" title="<?php _e( 'Was ist Feinstaub?', 'goetemp-widget' ) ?>" target="_blank"><i class="fa fa-info-circle"></i></a> :</strong> <?php echo $jsonarray['Feinstaub']; ?> &micro;g/m&sup3;
		</p>
		
	<?php } ?>
	
	<?php if ( 1 == $instance['show-nitrogen-dioxide'] ) { ?>
	
		<p>
			<strong><?php _e( 'Stickstoffdioxid', 'goetemp-widget' ) ?> <a href="http://de.wikipedia.org/wiki/Stickstoffdioxid" title="<?php _e( 'Was ist Stickstoffdioxid?', 'goetemp-widget' ) ?>" target="_blank"><i class="fa fa-info-circle"></i></a> :</strong> <?php echo $jsonarray['Stickstoffdioxid']; ?> &micro;g/m&sup3;
		</p>
		
	<?php } ?>
	
	<?php if ( 1 == $instance['show-sulphur'] ) { ?>
	
		<p>
			<strong><?php _e( 'Schwefeldioxid', 'goetemp-widget' ) ?> <a href="http://de.wikipedia.org/wiki/Schwefeldioxid" title="<?php _e( 'Was ist Schwefeldioxid?', 'goetemp-widget' ) ?>" target="_blank"><i class="fa fa-info-circle"></i></a> :</strong> <?php echo $jsonarray['Schwefeldioxid']; ?> &micro;g/m&sup3;
		</p>
		
	<?php } ?>
	
	<?php if ( 1 == $instance['show-temp'] ) { ?>
	
		<p>
			<strong><?php _e( 'Temperatur', 'goetemp-widget' ) ?>:</strong> <?php echo $jsonarray['Temperatur']; ?>&deg;C
		</p>
		
	<?php } ?>
	
	<?php if ( 1 == $instance['show-air-pressure'] ) { ?>
	
		<p>
			<strong><?php _e( 'Luftdruck', 'goetemp-widget' ) ?> <a href="http://de.wikipedia.org/wiki/Luftdruck" title="<?php _e( 'Was ist der Luftdruck?', 'goetemp-widget' ) ?>" target="_blank"><i class="fa fa-info-circle"></i></a> :</strong> <?php echo $jsonarray['Luftdruck']; ?> hPa
		</p>
		
	<?php } ?>
	
	<?php if ( 1 == $instance['show-wind-direction'] ) { ?>
	
		<p>
			<strong><?php _e( 'Windrichtung', 'goetemp-widget' ) ?>:</strong> <?php echo $jsonarray['Windrichtung']; ?> Grad
		</p>
		
	<?php } ?>
	
	<?php if ( 1 == $instance['show-wind-speed'] ) { ?>
	
		<p>
			<strong><?php _e( 'Windgeschwindigkeit', 'goetemp-widget' ) ?>:</strong> <?php echo $jsonarray['Windgeschwindigkeit']; ?> m/s
		</p>
		
	<?php } ?>
	
	<?php if ( 1 == $instance['show-air-moisture'] ) { ?>
	
		<p>
			<strong><?php _e( 'Luftfeuchtigkeit', 'goetemp-widget' ) ?> <a href="http://de.wikipedia.org/wiki/Luftfeuchtigkeit" title="<?php _e( 'Was ist Luftfeuchtigkeit?', 'goetemp-widget' ) ?>" target="_blank"><i class="fa fa-info-circle"></i></a> :</strong> <?php echo $jsonarray['Luftfeuchtigkeit']; ?>%
		</p>
		
	<?php } ?>
	
	<?php if ( 1 == $instance['show-rainfall-duration'] ) { ?>
	
		<p>
			<strong><?php _e( 'Regendauer', 'goetemp-widget' ) ?>:</strong> <?php echo $jsonarray['Regendauer']; ?> min
		</p>
		
	<?php } ?>
	
	<?php if ( 1 == $instance['show-global-irradiance'] ) { ?>
	
		<p>
			<strong><?php _e( 'Globalstrahlung', 'goetemp-widget' ) ?> <a href="http://de.wikipedia.org/wiki/Globalstrahlung" title="<?php _e( 'Was bedeutet die Globalstrahlung?', 'goetemp-widget' ) ?>" target="_blank"><i class="fa fa-info-circle"></i></a> :</strong> <?php echo $jsonarray['Globalstrahlung']; ?> W/m&sup2;
		</p>
		
	<?php } ?>
	
	<?php if ( 1 == $instance['show-uv-index'] ) { ?>
	
		<p>
			<strong><?php _e( 'UV-Index', 'goetemp-widget' ) ?> <a href="http://de.wikipedia.org/wiki/UV-Index" title="<?php _e( 'Was bedeutet der UV-Index?', 'goetemp-widget' ) ?>" target="_blank"><i class="fa fa-info-circle"></i></a> :</strong> <?php echo $jsonarray['UVIndex']; ?>
		</p>
		
	<?php } ?>
	
	<?php if ( 1 == $instance['show-ozone'] ) { ?>
	
		<p>
			<strong><?php _e( 'Ozon', 'goetemp-widget' ) ?> <a href="http://de.wikipedia.org/wiki/Ozon" title="<?php _e( 'Was ist Ozon?', 'goetemp-widget' ) ?>" target="_blank"><i class="fa fa-info-circle"></i></a> :</strong> <?php echo $jsonarray['Ozon']; ?> &micro;g/m&sup3;
		</p>
		
	<?php } ?>

	</div>	
	
	<dl>
		<?php if ( 1 == $instance['show-last-update'] ) { ?>
			<dt>
				<small><strong><?php _e( 'Letzte Aktualisierung', 'goetemp-widget' ) ?>:</strong>&nbsp;</small>
			</dt>
			<dd>
				<small><?php echo $jsonarray['date']; ?></small>,&nbsp;<small><?php echo $jsonarray['time']; ?></small>&nbsp;<small><?php _e( 'Uhr', 'goetemp-widget' ) ?></small>	
			</dd>
		<?php } ?>
		
		<?php if ( 1 == $instance['show-powered-by'] ) { ?>		
			<dt>
			<small><strong>powered by</strong></small>	
			</dt>
			<dd>
			<small><a href="http://www.goetemp.de/" target="_blank">goetemp.de</a></small>	
			</dd>
		<?php } ?>
	</dl>		
	
</div>