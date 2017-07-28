# Phalcon\Tag

Extended Tag

## Extended

This is the Phalcon\Tag Extended class that add methods for meta tag, meta description, meta keywords, and cache busting for stylesheet and javascript links. You must add an ASSETS_VERSION constant to you application config for cache busting to work. No changes have been made to stylesheetLink and javascriptLink method usage.

### Examples

```php
use Phalcon\Tag\Extended;

Extended::setDescription("This is the description of my page.");
Extended::getDescription(); // This echos the description meta tag
Extended::getDescription(FALSE); // This returns the description as string

$keywords = ["keyword1","keyword2","keyword3","keyword4"];
Extended::setKeywords($keywords);
Extended::getKeywords(); // This echos the keywords meta tag
Extended::getKeywords(FALSE); // This returns the keywords as string

$attributes = ['charset' => 'utf-8',['name' => 'robots','content' => 'noodp,nodir']];
Extended::metaTags($attributes); // Produces one meta tag for each key=value pair
// Above outputs <meta charset='utf-8'> and <meta name='robots' content='noodp,nodir'>
```
