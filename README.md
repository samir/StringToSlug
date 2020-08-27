# StringToSlug

StringToSlug is a simple class that generate slug versions of a given string, whith
the capability to swap accented (latin) characters to the "ascii" version.

## Examples

```php
    //Will print text-in-parenthesis-text-in-square-brackets-text-in-curly-brackets
    echo StringToSlug::gen("(Text in parenthesis) [Text in square brackets] {Text in curly brackets}").PHP_EOL;

    //Will print a-e-i-o-u-a-e-i-o-u-a-e-i-o-u-a-e-i-o-u-a-o-n-c
    echo StringToSlug::gen("á é í ó ú à è ì ò ù ä ë ï ö ü â ê î ô û ã õ ñ ç"").PHP_EOL;

    //Will print a-e-i-o-u-a-e-i-o-u-a-e-i-o-u-a-e-i-o-u-a-o-n-c
    echo StringToSlug::gen("Á É Í Ó Ú À È Ì Ò Ù Ä Ë Ï Ö Ü Â Ê Î Ô Û Ã Õ Ñ Ç").PHP_EOL;

    //Will print symbols-and-punctuations
    echo StringToSlug::gen("Symbols: @ #  % ^ & * ~ | \\ /, and Punctuations ! ?").PHP_EOL;

    //Will print testing-how-a-string-will-resultin-slug-if-have-new-linescharacters
    echo StringToSlug::gen("Testing how a string \n \n\nwill result\rin slug\r\nif have new lines\rcharacters").PHP_EOL;

    //Will print testing-how-a-string-will-resultin-slugif-have-new-linescharacters
    StringToSlug::replace_new_lines(false);
    echo StringToSlug::gen("Testing how a string \n \n\nwill result\rin slug\r\nif have new lines\rcharacters").PHP_EOL;
```
