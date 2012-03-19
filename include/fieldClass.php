<?php

class CustomUserRegistrationField {
	public static function createField($name, $label, $instanceBundle, $type = 'text', $widgetType = 'textfield', $field_settings = array(), $instance_settings = array(), $widget = array(), $widget_settings = array()) {
		$field = array(
			'field_name' => $name, 
			'type' => $type, 
			'settings' => array(), 
		);
		$field['settings'] = array_merge($field['settings'], $field_settings);
		
		field_create_field($field);

		$instance = array(
			'field_name' => $field['field_name'], 
			'entity_type' => 'user', 
			'label' => $label, 
			'bundle' => $instanceBundle, 
			'required' => (isset($instance_settings['required']) and ($instance_settings['required']===true)), 
			'settings' => array(), 
			'widget' => array(
				'type' => $widgetType, 
				'settings' => array(),
			),
		);
		$instance['settings'] = array_merge($instance['settings'], $instance_settings);
		$instance['widget'] += $widget;
		$instance['widget']['settings'] = array_merge($instance['widget']['settings'], $widget_settings);
		
		return field_create_instance($instance);
	}
}
