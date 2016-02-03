<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to suporte@fcontrol.com.br so we can send you a copy immediately.
 *
 * @category   Fcontrol
 * @package    Fcontrol_Payu
 * @copyright  Copyright (c) 2016 FCONTROL (https://www.fcontrol.com.br/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
* For creating serializable abstractions of native PHP types.  This class
* allows element name/namespace, XSD type, and XML attributes to be
* associated with a value.  This is extremely useful when WSDL is not
* used, but is also useful when WSDL is used with polymorphic types, including
* xsd:anyType and user-defined types.
*
* @author   Dietrich Ayala <dietrich@ganx4.com>
* @version  $Id: class.soap_val.php,v 1.11 2007/04/06 13:56:32 snichol Exp $
* @access   public
*/
class soapval extends nusoap_base {
	/**
	 * The XML element name
	 *
	 * @var string
	 * @access private
	 */
	var $name;
	/**
	 * The XML type name (string or false)
	 *
	 * @var mixed
	 * @access private
	 */
	var $type;
	/**
	 * The PHP value
	 *
	 * @var mixed
	 * @access private
	 */
	var $value;
	/**
	 * The XML element namespace (string or false)
	 *
	 * @var mixed
	 * @access private
	 */
	var $element_ns;
	/**
	 * The XML type namespace (string or false)
	 *
	 * @var mixed
	 * @access private
	 */
	var $type_ns;
	/**
	 * The XML element attributes (array or false)
	 *
	 * @var mixed
	 * @access private
	 */
	var $attributes;

	/**
	* constructor
	*
	* @param    string $name optional name
	* @param    mixed $type optional type name
	* @param	mixed $value optional value
	* @param	mixed $element_ns optional namespace of value
	* @param	mixed $type_ns optional namespace of type
	* @param	mixed $attributes associative array of attributes to add to element serialization
	* @access   public
	*/
  	function soapval($name='soapval',$type=false,$value=-1,$element_ns=false,$type_ns=false,$attributes=false) {
		parent::nusoap_base();
		$this->name = $name;
		$this->type = $type;
		$this->value = $value;
		$this->element_ns = $element_ns;
		$this->type_ns = $type_ns;
		$this->attributes = $attributes;
    }

	/**
	* return serialized value
	*
	* @param	string $use The WSDL use value (encoded|literal)
	* @return	string XML data
	* @access   public
	*/
	function serialize($use='encoded') {
		return $this->serialize_val($this->value, $this->name, $this->type, $this->element_ns, $this->type_ns, $this->attributes, $use, true);
    }

	/**
	* decodes a soapval object into a PHP native type
	*
	* @return	mixed
	* @access   public
	*/
	function decode(){
		return $this->value;
	}
}




?>