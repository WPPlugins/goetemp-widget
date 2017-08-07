<div class="goetemp-widget-back">

	<div>
		<label class="description"><?php _e( 'Titel des Widgets', 'goetemp-widget' ); ?></label>
		<br />
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
	</div>
	
	<p class="description">
		<br />
		<?php _e( 'Wählen Sie die Werte der Wetterstation aus, die angezeigt werden sollen', 'goetemp-widget' ) ?>:
	</p>
	
	<div>
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-fine-dust' ); ?>" name="<?php echo $this->get_field_name( 'show-fine-dust' ); ?>" value="1" <?php checked( 1, $instance['show-fine-dust'], true); ?> />
			<?php _e( 'Feinstaub', 'goetemp-widget' ) ?>
		</label>
	</div>
	
	<div>
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-nitrogen-dioxide' ); ?>" name="<?php echo $this->get_field_name( 'show-nitrogen-dioxide' ); ?>" value="1" <?php checked( 1, $instance['show-nitrogen-dioxide'], true); ?> />
			<?php _e( 'Stickstoffdioxid', 'goetemp-widget' ) ?>
		</label>
	</div>
	
	<div>
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-sulphur' ); ?>" name="<?php echo $this->get_field_name( 'show-sulphur' ); ?>" value="1" <?php checked( 1, $instance['show-sulphur'], true); ?> />
			<?php _e( 'Schwefeldioxid', 'goetemp-widget' ) ?>
		</label>
	</div>	
	
	<div>
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-temp' ); ?>" name="<?php echo $this->get_field_name( 'show-temp' ); ?>" value="1" <?php checked( 1, $instance['show-temp'], true); ?> />
			<?php _e( 'Temperatur', 'goetemp-widget' ) ?>
		</label>
	</div>

	<div>
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-air-pressure' ); ?>" name="<?php echo $this->get_field_name( 'show-air-pressure' ); ?>" value="1" <?php checked( 1, $instance['show-air-pressure'], true); ?> />
			<?php _e( 'Luftdruck', 'goetemp-widget' ) ?>
		</label>
	</div>
	
	<div>
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-wind-direction' ); ?>" name="<?php echo $this->get_field_name( 'show-wind-direction' ); ?>" value="1" <?php checked( 1, $instance['show-wind-direction'], true); ?> />
			<?php _e( 'Windrichtung', 'goetemp-widget' ) ?>
		</label>
	</div>
	
	<div>
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-wind-speed' ); ?>" name="<?php echo $this->get_field_name( 'show-wind-speed' ); ?>" value="1" <?php checked( 1, $instance['show-wind-speed'], true); ?> />
			<?php _e( 'Windgeschwindigkeit', 'goetemp-widget' ) ?>
		</label>
	</div>
	
	<div>
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-air-moisture' ); ?>" name="<?php echo $this->get_field_name( 'show-air-moisture' ); ?>" value="1" <?php checked( 1, $instance['show-air-moisture'], true); ?> />
			<?php _e( 'Luftfeuchtigkeit', 'goetemp-widget' ) ?>
		</label>
	</div>
	
	<div>
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-rainfall-duration' ); ?>" name="<?php echo $this->get_field_name( 'show-rainfall-duration' ); ?>" value="1" <?php checked( 1, $instance['show-rainfall-duration'], true); ?> />
			<?php _e( 'Regendauer', 'goetemp-widget' ) ?>
		</label>
	</div>
	
	<div>
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-global-irradiance' ); ?>" name="<?php echo $this->get_field_name( 'show-global-irradiance' ); ?>" value="1" <?php checked( 1, $instance['show-global-irradiance'], true); ?> />
			<?php _e( 'Globalstrahlung', 'goetemp-widget' ) ?>
		</label>
	</div>
	
	<div>
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-uv-index' ); ?>" name="<?php echo $this->get_field_name( 'show-uv-index' ); ?>" value="1" <?php checked( 1, $instance['show-uv-index'], true); ?> />
			<?php _e( 'UV-Index', 'goetemp-widget' ) ?>
		</label>
	</div>
	
	<div>
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-ozone' ); ?>" name="<?php echo $this->get_field_name( 'show-ozone' ); ?>" value="1" <?php checked( 1, $instance['show-ozone'], true); ?> />
			<?php _e( 'Ozon', 'goetemp-widget' ) ?>
		</label>
	</div>
	
	<div>
		<p class="description">
			<br />
			<?php _e( 'Weitere Optionen', 'goetemp-widget' ) ?>:
		</p>
		
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-last-update' ); ?>" name="<?php echo $this->get_field_name( 'show-last-update' ); ?>" value="1" <?php checked( 1, $instance['show-last-update'], true); ?> />
			<?php _e( 'Letzte Aktualisierung anzeigen', 'goetemp-widget' ) ?>
		</label>
		<br />		
		<label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'show-powered-by' ); ?>" name="<?php echo $this->get_field_name( 'show-powered-by' ); ?>" value="1" <?php checked( 1, $instance['show-powered-by'], true); ?> />
			<?php _e( 'powered by Link anzeigen', 'goetemp-widget' ) ?>
		</label>
		
	</div>	
</div>