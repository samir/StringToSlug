<?php

require ("StringToSlug.php");

$examples[] = "(Text in parenthesis) [Text in square brackets] {Text in curly brackets}";

$examples[] = "á é í ó ú à è ì ò ù ä ë ï ö ü â ê î ô û ã õ ñ ç";

$examples[] = "Á É Í Ó Ú À È Ì Ò Ù Ä Ë Ï Ö Ü Â Ê Î Ô Û Ã Õ Ñ Ç";

$examples[] = "Symbols: @ #  % ^ & * ~ | \ /, and Punctuations ! ?";

$test_new_lines = "Testing how a string \n \n\nwill result\rin slug\r\nif have new lines\rcharacters";

StringToSlug::set_separator("-");

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php 

echo "<h3>to lower case</h3>";
foreach($examples as $example)
{
  echo $example;
  echo "<br />";
  echo "<strong>".StringToSlug::gen($example)."</strong>";
  echo "<hr />";
 
}

StringToSlug::to_lower(FALSE);

echo "<h3>not change case</h3>";
foreach($examples as $example)
{
  echo $example;
  echo "<br />";
  echo "<strong>".StringToSlug::gen($example,false)."</strong>";
  echo "<hr />";
 
}


echo "<h3>not change new lines</h3>";

echo "<pre>";
echo "<b>Original</b>\n".$test_new_lines."\n\n";
StringToSlug::replace_new_lines(TRUE);
echo "<b>With new lines replacement:</b>\n".StringToSlug::gen($test_new_lines)."\n\n";
StringToSlug::replace_new_lines(FALSE);
echo "<b>Without new lines replacement:</b>\n".StringToSlug::gen($test_new_lines)."\n\n";


?>
</body>
</html>