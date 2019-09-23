<?php
	
// disable direct access to the file	
defined('GAVERN_WP') or die('Access denied');	

/**
 *
 * Base class for all the back-end fields
 *
 **/

class GKFormInput {
	// access to the template object
	protected $tpl;
	// name of the field (without the template name prefix)
	protected $name;
	// label of the field
	protected $label;
	// tooltip for the field
	protected $tooltip;
	// default value of the field
	protected $value;
	// class attribute for the field
	protected $class;
	// format for validation as regular expression
	protected $format;
	// flag to mark the field as required field
	protected $required;
	// visibility of the field
	protected $visibility;
	
	
	/**
	 *
	 * Constructor
	 *
	 * @param tpl - handler for the template object
	 * @param name - to fill the name class field
	 * @param label - to fill the label class field
	 * @param tooltip - to fill the tooltip class field
	 * @param default - to fill the value class field
	 * @param class - to fill the class class field
	 * @param format - to fill the format class field
	 * @param required - to fill the required class field
	 * @param visibility - to fill the visibility class field
	 * @param other - additional arguments for the constructor
	 *
	 * @return null
	 *
	 **/
	function __construct($tpl, $name, $label, $tooltip = '', $default = '', $class = '', $format = '', $required = false, $visibility = '', $other = null) {
		// get the Template main object handler
		$this->tpl = $tpl;
		// name for the field used in the storage
		$this->name = $name;
		// label for the input
		$this->label = $label;
		// tooltip content for the label
		$this->tooltip = $tooltip;
		// read the value
		$this->getValue($default);
		// check if it is necessarry to generate the class attribute
		$this->class = $class;
		//
		$this->format = ' data-format="'.$format.'"';
		$this->required = ' data-required="'.$required.'"';
		$this->visibility = ' data-visibility="'.$visibility.'"';
		$this->other = $other;
	} 
	
	/**
	 *
	 * Function to get the field value - it is usually overrided in the more complex fields
	 *
	 * @param default - default value of the field
	 *
	 * @return null
	 *
	 **/
	
	public function getValue($default) {
		// get the option value from database or if it doesn't exist get the default value
		$this->value = get_option($this->tpl->name . "_" . $this->name, $default);
	}
}

/**
 *
 *
 * Standard elements used in the panel
 *
 *
 **/

/**
 *
 * Text block - used as a description
 *
 **/

class GKFormInputTextBlock extends GKFormInput {
	public function output() {
		$output = '<p class="gkTextBlock '.($this->class).'">'.($this->label).'</p>';
		
		return $output;
	}
}

/**
 *
 * HTML block - used for description with HTML formating
 *
 **/

class GKFormInputHTML extends GKFormInput {
	public function output() {
		$output = '<div class="gkHTML ">'.$this->other->html.'</div>';
		
		return $output;
	}
}

/**
 *
 * Save button. 
 *
 **/

class GKFormInputSave extends GKFormInput {
	public function output() {
		$output = '<div class="gkSaveSettings">
					<img src="'. site_url().'/wp-admin/images/wpspin_light.gif" class="gkAjaxLoading" alt="Loading">
					<button class="button-primary gkSave" data-loading="';
		$output .= 'Saving&hellip;';
		$output .= '" data-loaded="';
		$output .= 'Save settings';
		$output .='" data-wrong="';
		$output .='Please check the form!';
		$output .='">';
		$output .='Save settings';
		$output .='</button></div>';
				
		
		return $output;
	}
}

/**
 *
 * Text field - basic input field
 *
 **/

class GKFormInputText extends GKFormInput {
	public function output() {
		return '<p data-visible="true"><label 
					for="'.($this->tpl->name).'_'.($this->name).'" 
					title="'.($this->tooltip).'" 
				>'.$this->label.'</label>
				<input 
					type="text" 
					id="'.($this->tpl->name).'_'.($this->name).'" 
					name="'.($this->tpl->name).'_'.($this->name).'" 
					class="gkInput gkText '.($this->class).'"
					value="'.($this->value).'"
					'.($this->format).' 
					'.($this->required).' 
					'.($this->visibility).' 
					data-name="'.($this->name).'"
				/></p>';
	}
}

/**
 *
 * Textarea
 *
 **/

class GKFormInputTextarea extends GKFormInput {	
	public function output() {
		return '<p data-visible="true"><label 
					for="'.($this->tpl->name).'_'.($this->name).'" 
					title="'.($this->tooltip).'"
				>'.$this->label.'</label>
				<textarea 
					id="'.($this->tpl->name).'_'.($this->name).'" 
					name="'.($this->tpl->name).'_'.($this->name).'" 
					class="gkInput gkTextarea '.($this->class).'"
					'.($this->format).' 
					'.($this->required).' 
					'.($this->visibility).' 
					data-name="'.($this->name).'"
				>'.(str_replace("\\", "", $this->value)).'</textarea></p>';
	}
}

/**
 *
 * Select - the dropdown list
 *
 **/

class GKFormInputSelect extends GKFormInput {
	public function output() {
		$output = '<p data-visible="true"><label 
					for="'.($this->tpl->name).'_'.($this->name).'" 
					title="'.($this->tooltip).'" 
				>'.$this->label.'</label>
				<select 
					id="'.($this->tpl->name).'_'.($this->name).'" 
					name="'.($this->tpl->name).'_'.($this->name).'" 
					class="gkInput gkSelect '.($this->class).'" 
					'.($this->format).' 
					'.($this->required).' 
					'.($this->visibility).'
					data-name="'.($this->name).'"
				>';
				
		foreach($this->other->options as $value => $label) {		
			$output .= '<option value="'.$value.'"'.(($this->value == $value) ? ' selected="selected"' : '').'>'.$label.'</option>';
		}
		
		$output .= '</select></p>';
		
		return $output;
	}
}

/**
 *
 * Select opacity - the dropdown list with slider
 *
 **/

class GKFormInputOpacity extends GKFormInput {
	public function output() {
		$output = '<p data-visible="true"><label 
					for="'.($this->tpl->name).'_'.($this->name).'" 
					title="'.($this->tooltip).'" 
				>'.$this->label.'</label>
				<select 
					id="'.($this->tpl->name).'_'.($this->name).'" 
					name="'.($this->tpl->name).'_'.($this->name).'" 
					class="gkInput gkSelect gkOpacity'.($this->class).'" 
					'.($this->format).' 
					'.($this->required).' 
					'.($this->visibility).'
					data-name="'.($this->name).'"
				>';
				
		foreach($this->other->options as $value => $label) {		
			$output .= '<option value="'.$value.'"'.(($this->value == $value) ? ' selected="selected"' : '').'>'.$label.'</option>';
		}
		
		$output .= '</select></p>';
		
		return $output;
	}
}

/**
 *
 * Switcher - the Select with only two states - enabled/disabled
 *
 **/

class GKFormInputSwitcher extends GKFormInput {
	public function output() {
		$output = '<p data-visible="true"><label 
					for="'.($this->tpl->name).'_'.($this->name).'" 
					title="'.($this->tooltip).'" 
				>'.$this->label.'</label>
					<select 
					id="'.($this->tpl->name).'_'.($this->name).'" 
					name="'.($this->tpl->name).'_'.($this->name).'" 
					class="gkInput gkSwitcher '.($this->class).'" 
					'.($this->format).' 
					'.($this->required).' 
					'.($this->visibility).'
					data-name="'.($this->name).'"
				>';
		$output .= '<option value="N"'.(($this->value == 'N') ? ' selected="selected"' : '').'>'.__('Disabled', DPTPLNAME).'</option>';
		$output .= '<option value="Y"'.(($this->value == 'Y') ? ' selected="selected"' : '').'>'.__('Enabled', DPTPLNAME).'</option>';
		$output .= '</select><span 
				id="'.($this->tpl->name).'_'.($this->name).'_dpswitch"
				class="dpSwitcher"></span></p>';
		
		return $output;
	}
}



/**
 *
 * Media - field to select an image
 *
 **/

class GKFormInputMedia extends GKFormInput {
	public function output() {
		
		$output = '<p data-visible="true"><label 
			for="'.($this->tpl->name).'_'.($this->name).'"
			title="'.($this->tooltip).'"
			>
				'.$this->label.'
			</label>
			<input 
				id="'.($this->tpl->name).'_'.($this->name).'" 
				type="text" 
				size="36" 
				name="'.($this->tpl->name).'_'.($this->name).'" 
				value="'.($this->value).'" 
 				class="gkInput gkMediaInput" 				
				'.($this->format).' 
				'.($this->required).' 
				'.($this->visibility).'
				data-name="'.($this->name).'"
			/>
			<input id="'.($this->tpl->name).'_'.($this->name).'_button" class="gkMedia" type="button" value="'.__('Upload Image', DPTPLNAME).'" />
			<input id="'.($this->tpl->name).'_'.($this->name).'_button1" class="gkMedia" type="button" value="'.__('Remove Image', DPTPLNAME).'" />
			<small>'.__('Enter an URL or upload an image.', DPTPLNAME).'</small>
			<img class="gkMediaImage" src="'.($this->value).'" id="'.($this->tpl->name).'_'.($this->name).'_image">
			</p>
		';
		
		return $output;
	}
}

/**
 *
 * Color - field to select a color
 *
 **/

class GKFormInputColor extends GKFormInput {
	public function output() {
		
		$output = '<p data-visible="true"><label 
			for="'.($this->tpl->name).'_'.($this->name).'"
			title="'.($this->tooltip).'"
			>
				'.$this->label.'
			</label>
			<input 
				id="'.($this->tpl->name).'_'.($this->name).'" 
				type="text" 
				size="4" 
				name="'.($this->tpl->name).'_'.($this->name).'" 
				value="'.($this->value).'" 
 				class="gkInput gkColor" 				
				'.($this->format).' 
				'.($this->required).' 
				'.($this->visibility).'
				data-name="'.($this->name).'"
			/><span class="colorSelector"/><span></span></span>
			</p>
		';
		
		return $output;
	}
}

/**
 *
 * Select background image from specified directory - the dropdown list
 *
 **/

class GKFormInputBackground extends GKFormInput {
	public function output() {
		$output = '<p data-visible="true"><label 
					for="'.($this->tpl->name).'_'.($this->name).'" 
					title="'.($this->tooltip).'" 
				>'.$this->label.'</label>
				<select 
					id="'.($this->tpl->name).'_'.($this->name).'" 
					name="'.($this->tpl->name).'_'.($this->name).'" 
					class="gkInput gkSelect gkBackground'.($this->class).'" 
					'.($this->format).' 
					'.($this->required).' 
					'.($this->visibility).'
					data-name="'.($this->name).'"
				>';
					$output .= '<option value="none"'.(($this->value == 'none') ? ' selected="selected"' : '').'>none</option>';
		$dirPath = dir( get_template_directory().'/images/'.$this->other->folder);
					while (($file = $dirPath->read()) !== false)
					{if (trim($file)!='.' && trim($file)!='..')	{
					$value = current(explode(".", $file));
					if ($value != "none" && $value != "Thumbs") {
					$output .= '<option value="'.$value.'"'.(($this->value == $value) ? ' selected="selected"' : '').'>'.$value.'</option>';
					}}
					}
		$dirPath->close();
		$output .= '</select>
		<input 
				type="hidden" 
				id="'.($this->tpl->name).'_'.($this->name).'_path" 
				value="'.get_bloginfo("template_url").'/images/'.$this->other->folder.'/" 
		/>
		<br/>
		<span id="'.($this->tpl->name).'_'.($this->name).'_bg" class="gkPattern" style="background: url('.get_bloginfo("template_url").'/images/'.$this->other->folder.'/'.$this->value.'.png)"></span>
		</p>';
		
		return $output;
	}
}

/**
 *
 * Select taxonomy , category slug of post defined type
 *
 **/

class GKFormInputTaxonomy extends GKFormInput {
	public function output() {
		$output = '<p data-visible="true"><label 
					for="'.($this->tpl->name).'_'.($this->name).'" 
					title="'.($this->tooltip).'" 
				>'.$this->label.'</label>
				<select 
					id="'.($this->tpl->name).'_'.($this->name).'" 
					name="'.($this->tpl->name).'_'.($this->name).'" 
					class="gkInput gkSelect gkTaxonomy'.($this->class).'" 
					'.($this->format).' 
					'.($this->required).' 
					'.($this->visibility).'
					data-name="'.($this->name).'"
				>';
				$output .= '<option value="none"'.(($this->value == 'not') ? ' selected="selected"' : '').'>'.__('--Select--', DPTPLNAME).'</option>';
				$slug = 'slideshows';
				$terms = get_terms($slug);
				foreach($terms as $term) {
            	$optionData = $term->name;
           		$optionValue = $term->slug;
				$output .= '<option value="'.$optionValue.'"'.(($this->value == $optionValue) ? ' selected="selected"' : '').'>'.$optionData.'</option>';
		}
		$output .= '</select></p>';
		
		return $output;
	}
}


/**
 *
 * Width/Height - used to specify size of the rectangle area (i.e. for specify image dimensions)
 *
 **/

class GKFormInputWidthHeight extends GKFormInput {
	public function getValue($default) {
		// get the option value from database or if it doesn't exist get the default value
		$this->value = array(
			"height" => get_option($this->tpl->name . "_" . str_replace('_width', '', $this->name), $default),
			"width" => get_option($this->tpl->name . "_" . str_replace('_height', '', $this->name), $default)
		);
	} 
	
	public function output() {	
		$output = '<p data-visible="true"><label 
			for="'.($this->tpl->name).'_'.($this->name).'"
			title="'.($this->tooltip).'"
			>
				'.$this->label.'
			</label>
			
			<input 
				type="text" 
				size="'.($this->other->size).'" 
				class="gkInput gkWidthHeight"
				id="'.($this->tpl->name . "_" . str_replace('_height', '', $this->name)).'" 
				name="'.($this->tpl->name . "_" . str_replace('_height', '', $this->name)).'" 
				value="'.($this->value['width']).'" 
				'.($this->format).' 
				'.($this->required).' 
				'.($this->visibility).'
			/>
			 &times; 
			<input 
				type="text" 
				class="gkInput gkWidthHeight"
				size="'.($this->other->size).'" 
				id="'.($this->tpl->name . "_" . str_replace('_width', '', $this->name)).'" 
				name="'.($this->tpl->name . "_" . str_replace('_width', '', $this->name)).'" 
				value="'.($this->value['height']).'" 
				'.($this->format).' 
				'.($this->required).' 
				'.($this->visibility).'
			/> '.($this->other->unit).'</p>
		';
		
		return $output;
	}
}

// EOF