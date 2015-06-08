<?php

/**

 * The sidebar containing the main widget area.

 *

 * If no active widgets in sidebar, let's hide it completely.

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 */

	if (is_single() || is_archive() || is_home())
	{
		 //dynamic_sidebar('Blue_Ox : Interior sidebar');
		 dynamic_sidebar('Blue_Ox : Blog sidebar');
	}
	elseif (is_page())
	{
		dynamic_sidebar('Blue_Ox : Interior sidebar');
	}

?>


