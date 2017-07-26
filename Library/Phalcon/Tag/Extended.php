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
namespace Phalcon\Tag;

use Phalcon\Tag as Base;

/** \Phalcon\Tag\Extended
 * Extended Tag class creating functions for meta tags, meta keywords, meta descriptions
 * and
 */

class Extended extends Base
{

    /**
     * Document description meta tag property
     */
    protected static $_documentDescription = null;

    /**
     * Document keywords metatag property
     */
    protected static $_documentKeyword = null;

    /**
     * Creates meta tags from given parameters
     *
     * @param array attributes for meta tag
     * @static
     */
    public static function metaTag($attributes)
    {
        $html = '';

        foreach ($attributes as $key => $value) {
            $html .= "<meta ";
            if (is_array($value)) {
                foreach ($value as $name => $data) {
                    $html .= "$name='$data' ";
                }
            } else {
                $html .= "$key='$value'";
            }
            $html .= self::getTagClose().PHP_EOL;
        }
        echo $html;
    }

    /**
     * Sets description meta tag property
     * @param string description Description of page for meta tag.
     * @static
     */
    public static function setDescription($description)
    {
        self::$_documentDescription = $description;
    }

    /**
     * Sets keywords meta tag property
     * @param mixed keywords Page keywords for meta tag
     * @static
     */
    public static function setKeywords($keywords)
    {
        self::$_documentKeyword = $keywords;
    }

    /**
     * Gets page description, alone or wrapped in meta tag.
     * @param bool tags Whether to wrap description in meta tag or not
     * @static
     */
    public static function getDescription($tags = true)
    {
        if ($tags && self::$_documentDescription != null){
            $code = "<meta name='description' content='".self::$_documentDescription."'";
            echo $code.self::getTagClose().PHP_EOL;
        } else {
            return self::$_documentDescription;
        }
    }

    /**
     * Get the keywords meta tag, or keywords only
     * @param bool tags Whether to return keywords only or wrapped in meta tag
     * @static
     */
    public static function getKeywords($tags = true)
    {
        $keywords = '';
        if (is_array(self::$_documentKeyword)){
            $keywords = implode(',', self::$_documentKeyword);
        } else {
            $keywords = self::$_documentKeyword;
        }
        if ($tags && $keywords != null){
            $code = "<meta name='keywords' content='".$keywords."'";
            echo $code.self::getTagClose().PHP_EOL;
        } else {
            return $keywords;
        }
    }

    /**
     * Get appropriate tag closing for currently set document type.
     * @static
     */
    protected static function getTagClose()
    {
        if (self::$_documentType > self::HTML5) {
            $code = " />";
        } else {
            $code = ">";
        }
        return $code;
    }

    /**
     * Adds cache busting to stylesheet links if the ASSETS_VERSION constant is set.
     * @param mixed parameters Parameters to be added to stylesheet link.
     * @param bool local Whether the link is local or remote
     * @static
     */
    public static function stylesheetLink($parameters = NULL, $local = TRUE)
    {
      if (defined("ASSETS_VERSION")) {
        if (is_array($parameters)) {
          foreach($parameters as &$parameter)
            if (strpos($parameter, '?') === false) {
              $parameter .= '?_av=' . ASSETS_VERSION;
            } else {
              $parameter .= '&_av=' . ASSETS_VERSION;
            }
        } elseif (is_string($parameters)) {
          if (strpos($parameters, '?') === false) {
            $parameters .= '?_av=' . ASSETS_VERSION;
          } else {
            $parameters .= '&_av=' . ASSETS_VERSION;
          }
        }
      }
      return parent::stylesheetLink($parameters, $local);
    }

    /**
     * Adds cache busting to javascript links if the ASSETS_VERSION constant is set.
     * @param mixed parameters Parameters to be added to script link.
     * @param bool local Whether the link is local or remote
     * @static
     */
    public static function javascriptInclude($parameters = NULL, $local = TRUE)
    {
      if (defined("ASSETS_VERSION")) {
        if (is_array($parameters)) {
          foreach($parameters as &$parameter)
            if (strpos($parameter, '?') === false) {
              $parameter .= '?_av=' . ASSETS_VERSION;
            } else {
              $parameter .= '&_av=' . ASSETS_VERSION;
            }
        } elseif (is_string($parameters)) {
          if (strpos($parameters, '?') === false) {
            $parameters .= '?_av=' . ASSETS_VERSION;
          } else {
            $parameters .= '&_av=' . ASSETS_VERSION;
          }
        }
      }
      return parent::javascriptInclude($parameters, $local);
    }

}
?>
