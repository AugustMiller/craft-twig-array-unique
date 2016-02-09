<?php namespace Craft;

class ArrayUniquePlugin extends BasePlugin
{
  public function getName()
  {
    return Craft::t('Unique');
  }

  public function getVersion()
  {
    return '1.0';
  }

  public function getDeveloper()
  {
    return 'August Miller';
  }

  public function getDeveloperUrl()
  {
    return 'http://gusmiller.com/';
  }

  public function hasCpSection()
  {
    return false;
  }

  public function addTwigExtension()
  {
    Craft::import('plugins.arrayunique.twigextensions.ArrayUniqueTwigExtension');
    return new ArrayUniqueTwigExtension();
  }
}
