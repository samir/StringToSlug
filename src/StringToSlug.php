<?php

namespace SamirBraga;
/**
 * StringToSlug
 *
 * Generate Strings in Slug
 *
 *
 * @version 1.1
 * @author Samir Braga <samirbraga@gmail.com>
 */
class StringToSlug
{


    private static $separator = '-';
    private static $toLower = TRUE;
    private static $replaceNewLine = TRUE;

    /**
     * set_separator
     *
     * set a new character as separator
     *
     * @param string (default: dash/hyphen [-])
     */
    public static function set_separator($separator = "-")
    {
        self::$separator = $separator;
    }

    /**
     * to_lower
     *
     * set a flag to define if method gen lowercase string
     *
     * @param bool
     */
    public static function to_lower($flag = TRUE)
    {
        self::$toLower = $flag;
    }

    /**
     * replace_new_lines
     *
     * set a flag to define if method gen replace new lines too
     *
     * @param bool
     */
    public static function replace_new_lines($flag = TRUE)
    {
        self::$replaceNewLine = $flag;
    }


    /**
     * gen
     *
     * this method use the function stripSpecialChars to generate a slug version of
     * given string
     *
     * @param string
     * @return string
     */
    public static function gen($string)
    {

        $separator = self::$separator;

        $temp = $string;

        if (self::$replaceNewLine) {
            $temp = preg_replace("/(\r\n|\n)+/", " ", $temp);
        }

        // Call method stripSpecialChars to strip symbols, pontuactions and accented characters
        $temp = self::stripSpecialChars($temp);

        if (self::$toLower) {
            $temp = strtolower($temp);
        }

        // Replace blankspace to $separator
        $temp = preg_replace("/ /", $separator, $temp);

        // Remove groups of 2 or more $separator
        $temp = preg_replace("/{$separator}{2,}/", $separator, $temp);

        // Remove $separator from the beginning and end of string
        $temp = preg_replace("/(^{$separator})|({$separator}$)/", '', $temp);

        return $temp;
    }


    /**
     * stripSpecialChars
     *
     * Replace symbols and punctuations to blankspace
     *
     * @param String
     * @return     String
     */
    private function stripSpecialChars($string)
    {

        # TODO: detect encoding to change charset if only necessary
        $string = utf8_decode($string);

        $arr = array(

            chr(32) => ' ', // blankspace
            chr(33) => ' ', // !
            chr(34) => ' ', // "
            chr(35) => ' ', // #
            chr(36) => ' ', // $
            chr(37) => ' ', // %
            chr(38) => ' ', // &
            chr(39) => ' ', // '
            chr(40) => ' ', // (
            chr(41) => ' ', // )
            chr(42) => ' ', // *
            chr(43) => ' ', // +
            chr(44) => ' ', // ,
            chr(45) => ' ', // -
            chr(46) => ' ', // .
            chr(47) => ' ', // /

            chr(58) => ' ', // :
            chr(59) => ' ', // ;
            chr(60) => ' ', // <
            chr(61) => ' ', // =
            chr(62) => ' ', // >
            chr(63) => ' ', // ?
            chr(64) => ' ', // @

            chr(91) => ' ', // [
            chr(92) => ' ', // \
            chr(93) => ' ', // ]
            chr(94) => ' ', // ^
            chr(95) => ' ', // _
            chr(96) => ' ', // `

            chr(123) => ' ', // {
            chr(124) => ' ', // |
            chr(125) => ' ', // }
            chr(126) => ' ', // ~
            chr(127) => ' ', // 
            chr(128) => ' ', // €
            chr(129) => ' ', // 
            chr(130) => ' ', // ‚
            chr(131) => ' ', // ƒ
            chr(132) => ' ', // „
            chr(133) => ' ', // …
            chr(134) => ' ', // †
            chr(135) => ' ', // ‡
            chr(136) => ' ', // ˆ
            chr(137) => ' ', // ‰
            chr(138) => ' ', // Š
            chr(139) => ' ', // ‹
            chr(140) => ' ', // Œ
            chr(141) => ' ', // 
            chr(142) => ' ', // Ž
            chr(143) => ' ', // 
            chr(144) => ' ', // 
            chr(145) => ' ', // ‘
            chr(146) => ' ', // ’
            chr(147) => ' ', // “
            chr(148) => ' ', // ”
            chr(149) => ' ', // •
            chr(150) => ' ', // –
            chr(151) => ' ', // —
            chr(152) => ' ', // ˜
            chr(153) => ' ', // ™
            chr(154) => ' ', // š
            chr(155) => ' ', // ›
            chr(156) => ' ', // œ
            chr(157) => ' ', // 
            chr(158) => ' ', // ž
            chr(159) => ' ', // Ÿ
            chr(160) => ' ', //
            chr(161) => ' ', // ¡
            chr(162) => ' ', // ¢
            chr(163) => ' ', // £
            chr(164) => ' ', // ¤
            chr(165) => ' ', // ¥
            chr(166) => ' ', // ¦
            chr(167) => ' ', // §
            chr(168) => ' ', // ¨
            chr(169) => ' ', // ©
            chr(170) => ' ', // ª
            chr(171) => ' ', // «
            chr(172) => ' ', // ¬
            chr(173) => ' ', //
            chr(174) => ' ', // ®
            chr(175) => ' ', // ¯
            chr(176) => ' ', // °
            chr(177) => ' ', // ±
            chr(178) => ' ', // ²
            chr(179) => ' ', // ³
            chr(180) => ' ', // ´
            chr(181) => ' ', // µ
            chr(182) => ' ', // ¶
            chr(183) => ' ', // ·
            chr(184) => ' ', // ¸
            chr(185) => ' ', // ¹
            chr(186) => ' ', // º
            chr(187) => ' ', // »
            chr(188) => ' ', // ¼
            chr(189) => ' ', // ½
            chr(190) => ' ', // ¾
            chr(191) => ' ', // ¿
            chr(247) => ' ', // ÷

            // Replace accented characters to relative ASCII version
            chr(192) => 'A', // À
            chr(193) => 'A', // Á
            chr(194) => 'A', // Â
            chr(195) => 'A', // Ã
            chr(196) => 'A', // Ä
            chr(197) => 'A', // Å
            chr(224) => 'a', // à
            chr(225) => 'a', // á
            chr(226) => 'a', // â
            chr(227) => 'a', // ã
            chr(228) => 'a', // ä
            chr(229) => 'a', // å

            chr(199) => 'C', // Ç
            chr(231) => 'c', // ç

            chr(200) => 'E', // È
            chr(201) => 'E', // É
            chr(202) => 'E', // Ê
            chr(203) => 'E', // Ë
            chr(232) => 'e', // è
            chr(233) => 'e', // é
            chr(234) => 'e', // ê
            chr(235) => 'e', // ë

            chr(204) => 'I', // Ì
            chr(205) => 'I', // Í
            chr(206) => 'I', // Î
            chr(207) => 'I', // Ï
            chr(236) => 'i', // ì
            chr(237) => 'i', // í
            chr(238) => 'i', // î
            chr(239) => 'i', // ï

            chr(209) => 'N', // Ñ
            chr(241) => 'n', // ñ

            chr(210) => 'O', // Ò
            chr(211) => 'O', // Ó
            chr(212) => 'O', // Ô
            chr(213) => 'O', // Õ
            chr(214) => 'O', // Ö
            chr(240) => 'o', // ð
            chr(242) => 'o', // ò
            chr(243) => 'o', // ó
            chr(244) => 'o', // ô
            chr(245) => 'o', // õ
            chr(246) => 'o', // ö

            chr(217) => 'U', // Ù
            chr(218) => 'U', // Ú
            chr(219) => 'U', // Û
            chr(220) => 'U', // Ü
            chr(249) => 'u', // ù
            chr(250) => 'u', // ú
            chr(251) => 'u', // û
            chr(252) => 'u', // ü

            chr(221) => 'Y', // Ý
            chr(253) => 'y', // ý
            chr(255) => 'y', // ÿ

            // Replace Greek, Cyrillic and others characters to a visually similar ASCII character
            chr(198) => 'AE', // Æ
            chr(230) => 'ae', // æ

            chr(208) => 'D', // Ð

            chr(215) => 'x', // ×
            chr(223) => 'B', // ß
            chr(222) => ' ', // Þ
            chr(254) => ' ', // þ

            chr(216) => 'O', // Ø
            chr(248) => 'o', // ø


        );

        // empty chars in range 0 to 32
        for ($x = 0; $x < 32; $x++) {
            $arr[chr($x)] = '';
        }

        return strtr($string, $arr);
    }
}
