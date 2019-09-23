<?php
	
// disable direct access to the file	
defined('GAVERN_WP') or die('Access denied');	

// access to the template object
global $tpl;
// load the form parser
require_once(get_template_directory()  . '/framework/form.parser.php');
// create a new instance of the form parser
$parser = new GavernWPFormParser($tpl);
// get the tabs list from the JSON file
$tabs = $tpl->get_json('options','tabs');
// iterators
$tabsIterator = 0;
$contentIterator = 0;
// active tab
$activeTab = 0;

if(isset($_COOKIE[DPTPLNAME . '_active_tab']) && is_numeric($_COOKIE[DPTPLNAME . '_active_tab'])) {
	$activeTab = floor($_COOKIE[DPTPLNAME . '_active_tab']);
}

?>

<div class="gkWrap" id="gkMainWrap" data-theme="<?php echo DPTPLNAME; ?>">
	<h1>
		<big><?php echo get_option($tpl->name . "_branding_admin_page_template_name") ?></big><small><?php echo get_option($tpl->name . "_branding_admin_page_slogan") ?></small>
	
		<a href="customize.php?theme=<?php echo $tpl->full_name; ?>" title="<?php _e('Customize theme', DPTPLNAME); ?>"><?php _e('Customize theme', DPTPLNAME); ?></a>
	</h1>
	<div>
		<ul id="gkTabs">
		<?php foreach($tabs as $tab) : ?>
			<?php if($tab[2] == 'enabled') : ?>
			<li<?php echo ($tabsIterator == $activeTab) ? ' class="'.str_replace(' ', '', strtolower($tab[0])).' active"' : ' class="'.str_replace(' ', '', strtolower($tab[0])).'"'; ?> title="<?php echo $tab[0]; ?>"><?php echo $tab[0]; ?></li>
			<?php 
				$tabsIterator++;
				endif; 
			?>
		<?php endforeach; ?>
		</ul>
		
		<div id="gkTabsContent">
		<?php foreach($tabs as $tab) : ?>
			<?php if($tab[2] == 'enabled') : ?>
			<div<?php if($contentIterator == $activeTab) echo ' class="active"'; ?>>
				<?php echo $parser->generateForm($tab[1]); ?>
				
				<div class="gkSaveSettings">
					<img src="<?php echo site_url(); ?>/wp-admin/images/wpspin_light.gif" class="gkAjaxLoading" alt="Loading">
					<button class="button-primary gkSave" data-loading="<?php _e('Saving&hellip;', DPTPLNAME); ?>" data-loaded="<?php _e('Save settings', DPTPLNAME); ?>" data-wrong="<?php _e('Please check the form!', DPTPLNAME); ?>"><?php _e('Save settings', DPTPLNAME); ?></button>
				</div>
			</div>
			<?php 
				$contentIterator++;
				endif; 
			?>
		<?php endforeach; ?>
		</div>
	</div>
</div>