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
//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');
//this is intializer.php
defined('DS')?  null :define('DS',DIRECTORY_SEPARATOR);
// include the helper file
require_once(dirname(__FILE__).DS.'helper.php'); 

jimport( 'joomla.html.parameter' );
jimport( 'joomla.html.registry' );
jimport( 'joomla.version' );

// get a parameter from the module's configuration

if ($params->get('only_article_view', 0)){	//default is 0: show the module in all views
	$ArticleView=ModInsertarticle::isArticle();
}else{
	$ArticleView=False;
}

 

if (!$ArticleView){
	$args['id'] = $params->get('id'); 
	
	$item = ModInsertarticle::getArticles($args);
        //*************
        
        $config=&JFactory::getConfig(); 


        $Itemid= $params->get('Itemid','');

        // get the parameter values
        $moduleclass_sfx = $params->get('moduleclass_sfx');
        $showtitle_article = $params->get('showtitle_article', 1);
        $read_more = $params->get('read_more', 1); 
        $show_edit = $params->get('show_edit', 1);
        $txt_read_more = $params->get('txt_read_more', 1);

        $readMoreTXT = JText::_("READMORE");


        if($txt_read_more==0) $readMoreTXT=$item->title;

        $app = JFactory::getApplication();
        $parametar         = $app->getParams();



        //
        
        $ver = new JVersion();
        $vernum = $ver->getShortVersion();
        
        $pos = strrpos($vernum, "3.");
        if ($pos === false) { // note: three equal signs
            // not found...
            $parametar = new JParameter($item->attribs); 
        }else{
            
            $parametar = new JRegistry($item->attribs);
        }

        


        $user =& JFactory::getUser( );   
        $url ="";
        
        //***********
        if(!empty($item->id)){
        $canEdit =JFactory::getUser()->authorise('core.edit', 'com_content.article.'.$item->id);
        
        if(empty($Itemid)) {
            $url = JRoute::_("index.php?option=com_content&amp;view=article&amp;id=".$item->id.":".$item->alias."&amp;catid=".$item->catid, true);

        }else{
            $url = JRoute::_("index.php?option=com_content&amp;view=article&amp;id=".$item->id.":".$item->alias."&amp;catid=".$item->catid."&amp;Itemid=".$Itemid, true);

        }
        
	// include the template for display 
	require JModuleHelper::getLayoutPath('mod_insertarticle', $params->get('layout', 'default'));
        }
}

?>
