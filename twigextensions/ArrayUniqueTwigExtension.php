<?php namespace Craft;

class ArrayUniqueTwigExtension extends \Twig_Extension
{
  public function getName()
  {
    return 'ArrayUnique Twig Extension';
  }

  public function getFilters()
  {
    $filters = array();
    $methods = array('unique');

    foreach ($methods as $method) {
      $filters[$method] = new \Twig_Filter_Method($this, $method);
    }

    return $filters;
  }

  public function unique($array)
  {
    if ( is_array($array) ) {
      return array_unique($array);
    } else {
      return $array;
    }
  }
}
