<?php
/*------------------------------------------------------------------------
# mod_insertarticle
# ------------------------------------------------------------------------
# author    Cristian Grañó (percha.com)
# copyright Copyright (C) 2010 YourAwesomeSite.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.yourawesomesite.com
# Technical Support:  Forum - http://www.percha.com/
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Direct Access to this location is not allowed.');
 
class ModInsertarticle {
    
	static function getArticles($args){
		$db = JFactory::getDBO();
		$item = "";

		$id = $args['id'];
		if($id > 0){
		
			$query  = "select * ";
			$query .= "FROM #__content  WHERE id =".$id." AND state=1 " ;

			//echo $query;
			$db->setQuery($query);
			$item = $db->loadObject();
		}
		
		return $item;
	}

	/**
	 * Function to test whether we are in an article view.
	 *
	 * returns boolean True if current view is an article
	 */
	public function isArticle() {
		$option = JRequest::getCmd('option');
		$view = JRequest::getCmd('view');
		$id	= JRequest::getInt('id');	
		// return True if this is an article
		return ($option == 'com_content' && $view == 'article' && $id);
	}

}
