<?php
function empty_widget_title($title)
{
    return $title == '&nbsp;' ? '' : $title;
}
add_filter('widget_title', 'empty_widget_title');
// EOF