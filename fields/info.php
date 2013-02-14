<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


jimport('joomla.html.html');
jimport('joomla.form.formfield');//import the necessary class definition for formfield


/**
 * Supports an HTML select list of articles
 * @since  1.6
 */
class JFormFieldInfo extends JFormField
{
	/**
  * The form field type.
  *
  * @var  string
  * @since	1.6
  */
	protected $type = 'Info'; //the form field type

	/**
  * Method to get content articles
  *
  * @return	array	The field option objects.
  * @since	1.6
  */
	protected function getInput()
	{
            $html= '<br /><br /><div style="width:90%;  overflow: hidden; border: #ccc 1px solid; padding: 10px; margin:10px  0px;">';
            $html.= JText::_("INFO_TXT");
            $html.= ' </div>';
                               
            //$html="<div>ssssssssssssssssssssssss</div>";
            return $html;
        //return JHTML::_('select.genericlist',  $articles, $this->name, trim($attr), 'id', 'title', $this->value );
  
	}
}
