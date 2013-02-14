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
?>
<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?> 

<?php if(!empty($moduleclass_sfx)){?><div class="<?php echo $moduleclass_sfx; ?>"><?php } ?>
<?php if($showtitle_article == 1) { ?>
	<h<?php echo $params->get('item_heading', 1);?>>
	<?php if ($params->get('title_article_linkable')) { ?>
		<a href="<?php 
			$url = JRoute::_(ContentHelperRoute::getArticleRoute($item->id,$item->catid));
			echo $url; ?>">
		<?php echo $item->title; ?></a>
	<?php } else { ?>
		<?php echo $item->title; ?>
	<?php } ?>
	</h<?php echo $params->get('item_heading', 1);?>>
<?php } ?>
<?php echo JHTML::_('content.prepare', $item->introtext); ?>
<?php   if ($read_more == 1){ ?>
 <a class='readmore' href='<?php echo $url; ?>'>
  <?php echo $readMoreTXT; ?>
  </a>
<?php  } ?>
<?php   if (($show_edit == 1)&&($canEdit)){ ?> 
<?php 
$return =base64_encode($url);
$url = "index.php?option=com_content&task=article.edit&a_id=".$item->id."&return=".$return ; 
?>
<a href="<?php echo $url;?>"><img src="<?php echo JURI::root();?>media/system/images/edit.png" alt="Edit"></a>  
<?php  } ?>
<?php if(!empty($moduleclass_sfx)){?></div><?php } ?>