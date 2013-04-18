<?php
/**
 * A set of helper functions to make life a little easier
 * 
 * @author Christopher Koning <ckoning@realbrightmedia.com>
 */
 
/**
 * Echos the content of the input in a preprocessor tag to view the contents in a webpage.
 * 
 * @param mixed $obj The object to print
 * @return string The stringified object
 */
function print_obj($obj)
{
    echo "<pre>".print_r($obj,1)."</pre>";
}

/**
 * Converts an array to an object
 * 
 * @param mixed $array The array to convert
 * @return mixed The converted object if the input was an array, the input otherwise
 */
function arrToObj($array)
{
    if(!is_array($array)) {
        return $array;
    }
    
    $object = new stdClass();
    if (is_array($array) && count($array) > 0) {
      foreach ($array as $name=>$value) {
         $name = strtolower(trim($name));
         if (!empty($name)) {
            $object->$name = arrToObj($value);
         }
      }
      return $object; 
    }
    else {
      return false;
    }
}
