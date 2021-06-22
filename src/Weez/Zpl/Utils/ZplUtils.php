<?php

namespace Weez\Zpl\Utils;

use Exception;
use Weez\Zpl\Constant\ZebraFont;
use Weez\Zpl\Constant\ZebraPPP;

/**
 * Common method used to manipulate ZPL
 */
class ZplUtils
{

    /**
     * Fonction called by zplCommand to cast variable $object and ajust for zpl code
     *
     * @param mixed $object
     *
     * @return int|string
     */
    private static function variableObjectToZplCode($object)
    {
        if (!is_null($object)) {
            if (is_numeric($object)) {
                return ((int)$object);
            }

            if (is_bool($object)) {
                if (((bool)$object)) {
                    return "Y";
                }

                return "N";
            }

            return $object;
        }

        return "";
    }

    /**
     * Method to quickly generate zpl code with command and variable
     *
     * @param string $command Command (without ^)
     * @param array $variables list variable
     * @return string
     */
    public static function zplCommand($command, $variables = null)
    {
        $zpl = '';
        $zpl .= "^";
        $zpl .= $command;
        if (!is_array($variables)) {
            return $zpl;
        }

        $zplVariables = array_map(static function ($iValue) {
            return self::variableObjectToZplCode($iValue);
        }, $variables);

        $zpl .= implode(',', $zplVariables);

        return $zpl;
    }

    /**
     * Method to quickly generate zpl code with command and variable
     *
     * @param string $command Command (without ^)
     * @param array $variables
     * @return string
     */
    public static function zplCommandSautLigne($command, $variables = null)
    {
        $zpl = self::zplCommand($command, $variables);
        $zpl .= "\n";

        return $zpl;
    }

    /**
     * Extract from font, fontSize and PPP the height and width in dots.
     *
     * Fonts and PPP are not all supported.
     * Please complete this method or use dot in yous params
     *
     * @param ZebraFont $zebraFont
     * @param float $fontSize
     * @param ZebraPPP $zebraPPP
     * @return array[height,width] in dots
     */
    public static function extractDotsFromFont($zebraFont, $fontSize, $zebraPPP)
    {
        $tab = self::calculateFontDots($zebraFont, $fontSize, $zebraPPP);

        return $tab;
    }

    public static function calculateFontDots($zebraFont, $fontSize, $zebraPPP)
    {
        $tab = [];

        $font = $zebraFont->getLetter();
        $dpi  = $zebraPPP->getDotByMm();

        $fontHeight = $fontSize * ZebraFont::FONT_SIZE_MM_PER_POINT * $dpi;
        $proportion = ZebraFont::getFontProportions($font);

        $tab[0] = round($fontHeight); // Heigth
        $tab[1] = round($tab[0] * $proportion); // Width

        return $tab;
    }

    /**
     * Convert point(pt) in pixel(px)
     *
     * @param int $point
     * @return float
     */
    public static function convertPointInPixel($point)
    {
        return round($point * 1.33);
    }

    /**
     * Convert pixel(px) in dot
     *
     * @param float $mm
     * @param float $zebraPPP
     * @return float
     */
    public static function convertMmInDot($mm, $zebraPPP = ZebraPPP::DPI_203)
    {
        return round($mm * $zebraPPP);
    }

    /**
     * Function used to converted ASCII >127 in \hexaCode accepted by ZPL language
     *
     * @param string $str
     * @return string with charactere remove
     */
    public static function convertAccentToZplAsciiHexa($str)
    {
        if ($str != null) {
            $str = str_replace("é", "\\82", $str);
            $str = str_replace("à", "\\85", $str);
            $str = str_replace("è", "\\8A", $str);
        }

        return $str;
    }
}
