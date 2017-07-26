<?php
/**
 * Phalcon Framework
 * This source file is subject to the New BSD License that is bundled
 * with this package in the file docs/LICENSE.txt.
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@phalconphp.com so we can send you a copy immediately.
 *
 * @author Kris Scheppe <kris@scheppe.us>
 */
namespace Phalcon\Assets\Manager;

use Phalcon\Assets\Manager as Base;

/** \Phalcon\Tag\Extended
 * Extended Assets Manager class uses Phalcon]Tag]Extended when outputting stylesheet and javascript tags, utilizing cache busting.
 * and
 */

class Extended extends Base
{

/**
 * Outputs css using Phalcon]Tag\Extended
 * @param string collectionName Name of css collection
 */
  public function outputCss($collectionName = null)
  {
      if (!$collectionName) {
          $collection = $this->getCss();
      } else {
          $collection = $this->get($collectionName);
      }

      return $this->output($collection, array("Phalcon\Tag\Extended", "stylesheetLink"), "css");
  }

  /**
   * Outputs js using Phalcon]Tag\Extended
   * @param string collectionName Name of css collection
   */
  public function outputJs($collectionName = null)
  {
      if (!$collectionName) {
          $collection = $this->getJs();
      } else {
          $collection = $this->get($collectionName);
      }

      return $this->output($collection, array("Phalcon\Tag\Extended", "javascriptInclude"), "js");
  }

}
?>
