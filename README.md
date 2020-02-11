# ashivaJSONPrint Function
Building on PHP `JSON_PRETTY_PRINT`. Printing out the JSON from Ashiva Codesheets, Ashiva Sitemaps etc.  in a custom format.

PHP's `JSON_PRETTY_PRINT` flag is certainly better than nothing but, lacking customisation options, it's also *pretty* inflexible.

Unless that's how you like your JSON to be *Pretty Printed* you're pretty much stuck with it.

But of course you're not, are you?

You can take PHP's `JSON_PRETTY_PRINT`-ed output and throw in a couple of `str_replace` and `preg_replace` and customise the entire output however you like.

This is exactly what `ashivaJSONPrint()` does with **ashiva JSON Files**:

## ashivaJSONPrint() Function
```
function Custom_Pretty_Print_JSON($Data) {

  if (!is_null(json_decode($Data, TRUE))) {

    $Data = json_decode($Data, TRUE);
  }

  $String = json_encode($Data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

  $String = str_replace('    ', '  ', $String);

  $String = preg_replace("/(\:\s\{|\:\s\[|\,)\n([\s]+)(\"|\{|\[)/", "$1\n\n$2$3", $String);

  return $String;
}
```
