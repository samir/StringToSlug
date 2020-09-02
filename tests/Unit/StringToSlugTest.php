<?php

use SamirBraga\StringToSlug;

it('slugs parenthesis, square brackets and curly brackets', function () {
    $expected = "text-in-parenthesis-text-in-square-brackets-text-in-curly-brackets";
    $actual = StringToSlug::gen("(Text in parenthesis) [Text in square brackets] {Text in curly brackets}");
    assertEquals($expected, $actual);
});

it('slugs special lower case chars', function () {
    $expected = "a-e-i-o-u-a-e-i-o-u-a-e-i-o-u-a-e-i-o-u-a-o-n-c";
    $actual = StringToSlug::gen("á é í ó ú à è ì ò ù ä ë ï ö ü â ê î ô û ã õ ñ ç");
    assertEquals($expected, $actual);
});

it('slugs special upper case chars', function () {
    $expected = "a-e-i-o-u-a-e-i-o-u-a-e-i-o-u-a-e-i-o-u-a-o-n-c";
    $actual = StringToSlug::gen("Á É Í Ó Ú À È Ì Ò Ù Ä Ë Ï Ö Ü Â Ê Î Ô Û Ã Õ Ñ Ç");
    assertEquals($expected, $actual);
});

it('slugs symbols and punctuations', function () {
    $expected = "symbols-and-punctuations";
    $actual = StringToSlug::gen("Symbols: @ #  % ^ & * ~ | \ /, and Punctuations ! ?");
    assertEquals($expected, $actual);
});

it('slugs line feeds', function () {
    $data= "Testing how a string \n \n\nwill result\rin slug\r\nif have new lines\rcharacters";
    $expected = "testing-how-a-string-will-resultin-slug-if-have-new-linescharacters";
    $actual = StringToSlug::gen($data);
    assertEquals($expected, $actual);
});

it('doesn\'t slugs line feeds', function () {
    $data= "Testing how a string \n \n\nwill result\rin slug\r\nif have new lines\rcharacters";
    $expected = "testing-how-a-string-will-resultin-slugif-have-new-linescharacters";
    StringToSlug::replace_new_lines(false);
    $actual = StringToSlug::gen($data);
    assertTrue(true);
    assertEquals($expected, $actual);
});