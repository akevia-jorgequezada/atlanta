<?php 	
	
// disable direct access to the file	
defined('GAVERN_WP') or die('Access denied');	

/**
 *
 * Class of the menu field
 *
 **/
	
class GKFormInputMenu extends GKFormInput {
	/**
	 *
	 * Function used to override the getValue function
	 *
	 * @param default - default value - not used here
	 *
	 * @return null
	 *
	 **/
	
	public function getValue($default) {
		$this->value = '';
	}
	
	/**
	 *
	 * Function used to generate output of the field
	 *
	 * @return HTML output of the field
	 *
	 **/
	
	public function output() {
		// load and parse XML file.
		$json_data = $this->tpl->get_json('config', 'menus');
		//
		$output = '';
		// prepare parser object
		$parser = new GavernWPFormParser($this->tpl);
		// iterate through all menus in the file
		foreach ($json_data as $menu) {			
			$temp_json = '[
				{
					"groupname": "'.($menu->name).'",
					"groupdesc": "'.($menu->description).'",
					"fields": [
						{
							"name": "navigation_menu_state_'.($menu->location).'",
							"type": "Select",
							"label": "'.__('Enable', DPTPLNAME).' '.($menu->name).'",
							"tooltip": "'.__('You can enable or disable showing the menu in the template.', DPTPLNAME).'",
							"default": "Y",
							"other": {
								"options": {
									"Y": "'.__('Enabled', DPTPLNAME).'",
									"N": "'.__('Disabled', DPTPLNAME).'",
									"rule": "'.__('Conditional rule', DPTPLNAME).'"
								}
							}
						},
						{
							"name": "navigation_menu_staterule_'.($menu->location).'",
							"type": "Text",
							"label": "'.__('Conditional rule', DPTPLNAME).'",
							"tooltip": "'.__('You can enable showing the menu in the specific pages.', DPTPLNAME).'",
							"default": "",
							"class": "",
							"visibility": "navigation_menu_state_'.($menu->location).'=rule"
						},
						{
							"name": "navigation_menu_depth_'.($menu->location).'",
							"type": "Select",
							"label": "'.__('Depth of ', DPTPLNAME).' '.($menu->name).'",
							"tooltip": "'.__('You can specify the menu depth.', DPTPLNAME).'",
							"default": "0",
							"other": {
								"options": {
									"0": "'.__('All levels', DPTPLNAME).'",
									"1": "1",
									"2": "2",
									"3": "3",
									"4": "4",
									"5": "5"
								}
							}
						}
						'.(($menu->main == 'true') ? ',
						{
							"name": "navigation_menu_animation_'.($menu->location).'",
							"type": "Select",
							"label": "'.__('Animation for ', DPTPLNAME).' '.($menu->name).'",
							"tooltip": "'.__('You can specify the menu animation.', DPTPLNAME).'",
							"default": "width_height_opacity",
							"other": {
								"options": {
									"width_height_opacity": "'.__('Width, Height and Opacity', DPTPLNAME).'",
									"width_opacity": "'.__('Width and Opacity', DPTPLNAME).'",
									"height_opacity": "'.__('Height and Opacity', DPTPLNAME).'",
									"opacity": "'.__('Opacity', DPTPLNAME).'",
									"none": "'.__('No animation', DPTPLNAME).'"
								}
							}
						},
						{
							"name": "navigation_menu_animationspeed_'.($menu->location).'",
							"type": "Select",
							"label": "'.__('Animation speed for ', DPTPLNAME).' '.($menu->name).'",
							"tooltip": "'.__('You can specify the speed of the menu animation.', DPTPLNAME).'",
							"default": "normal",
							"other": {
								"options": {
									"fast": "'.__('Fast animation (250ms)', DPTPLNAME).'",
									"normal": "'.__('Normal animation (500ms)', DPTPLNAME).'",
									"slow": "'.__('Slow animation (1000ms)', DPTPLNAME).'"
								}
							}
						}': ''). '
					]
				}
			]';	
			// parse the generated JSON
			$output .= $parser->generateForm($temp_json, true);
		}
		
		return $output;
	}
}

// EOF