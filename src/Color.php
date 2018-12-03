<?php
/**
 * Project Color.
 * File: Color.php
 * User: roomet
 * Date: 3.12.2018 9:29
 */

namespace Color;

/**
 * Class Color
 *
 * @package DrawMe\Object
 * @property-read int    R           Color Red value [0..255]
 * @property-read int    Red         Color Red value [0..255]
 * @property-read int    rgbR        Color Red value [0..255]
 * @property-read int    G           Color Green value [0..255]
 * @property-read int    Green       Color Green value [0..255]
 * @property-read int    rgbG        Color Green value [0..255]
 * @property-read int    B           Color Blue value [0..255]
 * @property-read int    Blue        Color Blue value [0..255]
 * @property-read int    rgbB        Color Blue value [0..255]
 * @property-read array  RGB         Color RGB model array [R=>0..255, G=>0..255, B=>0..255]
 * @property-read float  H           Color Hue value in HSL model [0..360]
 * @property-read float  Hue         Color Hue value in HSL model [0..360]
 * @property-read float  hslH        Color Hue value in HSL model [0..360]
 * @property-read float  S           Color Saturation value in HSL model [0..100]
 * @property-read float  Saturation  Color Saturation value in HSL model [0..100]
 * @property-read float  hslS        Color Saturation value in HSL model [0..100]
 * @property-read float  L           Color Lightness value in HSL model [0..100]
 * @property-read float  Lightness   Color Lightness value in HSL model [0..100]
 * @property-read float  hslL        Color Lightness value in HSL model [0..100]
 * @property-read array  HSL         Color HSL model array [H=>0..360, S=>0..100, L=>0..100]
 * @property-read float  hsvH        Color Hue value in HSV model [0..360]
 * @property-read float  hsvS        Color Saturation value in HSV model [0..100]
 * @property-read float  hsvV        Color Value/Brightness value in HSV model [0..100]
 * @property-read array  HSV         Color HSV model array [H=>0..360, S=>0..100, V=>0..100]
 * @property-read array  HEX         Color HEX values array [hex=>'000000'..'ffffff', 'web'=>'#000000'..'#ffffff'[, 'short-hex'=>'000'..'fff', 'short-web'=>'#000'..'#fff']]
 * @property-read string name        Color web-name if esists
 * @property-read string names       Array of Color web-names
 */
class Color
{

    /**
     * Array of modern browsers supported color names and hex/RGB values.
     *
     * @var array
     */
    private static $_colorNames = [
        'AliceBlue'            => ['F0F8FF', [240, 248, 255]],
        'AntiqueWhite'         => ['FAEBD7', [250, 235, 215]],
        'Aqua'                 => ['00FFFF', [0, 255, 255]],
        'Aquamarine'           => ['7FFFD4', [127, 255, 212]],
        'Azure'                => ['F0FFFF', [240, 255, 255]],
        'Beige'                => ['F5F5DC', [245, 245, 220]],
        'Bisque'               => ['FFE4C4', [255, 228, 196]],
        'Black'                => ['000000', [0, 0, 0]],
        'BlanchedAlmond'       => ['FFEBCD', [255, 235, 205]],
        'Blue'                 => ['0000FF', [0, 0, 255]],
        'BlueViolet'           => ['8A2BE2', [138, 43, 226]],
        'Brown'                => ['A52A2A', [165, 42, 42]],
        'Burlywood'            => ['DEB887', [222, 184, 135]],
        'CadetBlue'            => ['5F9EA0', [95, 158, 160]],
        'Chartreuse'           => ['7FFF00', [127, 255, 0]],
        'Chocolate'            => ['D2691E', [210, 105, 30]],
        'Coral'                => ['FF7F50', [255, 127, 80]],
        'CornflowerBlue'       => ['6495ED', [100, 149, 237]],
        'Cornsilk'             => ['FFF8DC', [255, 248, 220]],
        'Crimson'              => ['DC143C', [220, 20, 60]],
        'Cyan'                 => ['00FFFF', [0, 255, 255]],
        'DarkBlue'             => ['00008B', [0, 0, 139]],
        'DarkCyan'             => ['008B8B', [0, 139, 139]],
        'DarkGoldenrod'        => ['B8860B', [184, 134, 11]],
        'DarkGray'             => ['A9A9A9', [169, 169, 169]],
        'DarkGreen'            => ['006400', [0, 100, 0]],
        'DarkKhaki'            => ['BDB76B', [189, 183, 107]],
        'DarkMagenta'          => ['8B008B', [139, 0, 139]],
        'DarkOliveGreen'       => ['556B2F', [85, 107, 47]],
        'DarkOrange'           => ['FF8C00', [255, 140, 0]],
        'DarkOrchid'           => ['9932CC', [153, 50, 204]],
        'DarkRed'              => ['8B0000', [139, 0, 0]],
        'DarkSalmon'           => ['E9967A', [233, 150, 122]],
        'DarkSeaGreen'         => ['8FBC8F', [143, 188, 143]],
        'DarkSlateBlue'        => ['483D8B', [72, 61, 139]],
        'DarkSlateGray'        => ['2F4F4F', [47, 79, 79]],
        'DarkTurquoise'        => ['00CED1', [0, 206, 209]],
        'DarkViolet'           => ['9400D3', [148, 0, 211]],
        'DeepPink'             => ['FF1493', [255, 20, 147]],
        'DeepSkyBlue'          => ['00BFFF', [0, 191, 255]],
        'DimGray'              => ['696969', [105, 105, 105]],
        'DodgerBlue'           => ['1E90FF', [30, 144, 255]],
        'Firebrick'            => ['B22222', [178, 34, 34]],
        'FloralWhite'          => ['FFFAF0', [255, 250, 240]],
        'ForestGreen'          => ['228B22', [34, 139, 34]],
        'Fuchsia'              => ['FF00FF', [255, 0, 255]],
        'Gainsboro'            => ['DCDCDC', [220, 220, 220]],
        'GhostWhite'           => ['F8F8FF', [248, 248, 255]],
        'Gold'                 => ['FFD700', [255, 215, 0]],
        'Goldenrod'            => ['DAA520', [218, 165, 32]],
        'Gray'                 => ['808080', [128, 128, 128]],
        'Green'                => ['008000', [0, 128, 0]],
        'GreenYellow'          => ['ADFF2F', [173, 255, 47]],
        'Honeydew'             => ['F0FFF0', [240, 255, 240]],
        'HotPink'              => ['FF69B4', [255, 105, 180]],
        'IndianRed'            => ['CD5C5C', [205, 92, 92]],
        'Indigo'               => ['4B0082', [75, 0, 130]],
        'Ivory'                => ['FFFFF0', [255, 255, 240]],
        'Khaki'                => ['F0E68C', [240, 230, 140]],
        'Lavender'             => ['E6E6FA', [230, 230, 250]],
        'LavenderBlush'        => ['FFF0F5', [255, 240, 245]],
        'LawnGreen'            => ['7CFC00', [124, 252, 0]],
        'LemonChiffon'         => ['FFFACD', [255, 250, 205]],
        'LightBlue'            => ['ADD8E6', [173, 216, 230]],
        'LightCoral'           => ['F08080', [240, 128, 128]],
        'LightCyan'            => ['E0FFFF', [224, 255, 255]],
        'LightGoldenrodYellow' => ['FAFAD2', [250, 250, 210]],
        'LightGray'            => ['D3D3D3', [211, 211, 211]],
        'LightGreen'           => ['90EE90', [144, 238, 144]],
        'LightPink'            => ['FFB6C1', [255, 182, 193]],
        'LightSalmon'          => ['FFA07A', [255, 160, 122]],
        'LightSeaGreen'        => ['20B2AA', [32, 178, 170]],
        'LightSkyBlue'         => ['87CEFA', [135, 206, 250]],
        'LightSlateGray'       => ['778899', [119, 136, 153]],
        'LightSteelBlue'       => ['B0C4DE', [176, 196, 222]],
        'LightYellow'          => ['FFFFE0', [255, 255, 224]],
        'Lime'                 => ['00FF00', [0, 255, 0]],
        'LimeGreen'            => ['32CD32', [50, 205, 50]],
        'Linen'                => ['FAF0E6', [250, 240, 230]],
        'Magenta'              => ['FF00FF', [255, 0, 255]],
        'Maroon'               => ['800000', [128, 0, 0]],
        'MediumAquamarine'     => ['66CDAA', [102, 205, 170]],
        'MediumBlue'           => ['0000CD', [0, 0, 205]],
        'MediumOrchid'         => ['BA55D3', [186, 85, 211]],
        'MediumPurple'         => ['9370DB', [147, 112, 219]],
        'MediumSeaGreen'       => ['3CB371', [60, 179, 113]],
        'MediumSlateBlue'      => ['7B68EE', [123, 104, 238]],
        'MediumSpringGreen'    => ['00FA9A', [0, 250, 154]],
        'MediumTurquoise'      => ['48D1CC', [72, 209, 204]],
        'MediumVioletRed'      => ['C71585', [199, 21, 133]],
        'MidnightBlue'         => ['191970', [25, 25, 112]],
        'MintCream'            => ['F5FFFA', [245, 255, 250]],
        'MistyRose'            => ['FFE4E1', [255, 228, 225]],
        'Moccasin'             => ['FFE4B5', [255, 228, 181]],
        'NavajoWhite'          => ['FFDEAD', [255, 222, 173]],
        'Navy'                 => ['000080', [0, 0, 128]],
        'OldLace'              => ['FDF5E6', [253, 245, 230]],
        'Olive'                => ['808000', [128, 128, 0]],
        'OliveDrab'            => ['6B8E23', [107, 142, 35]],
        'Orange'               => ['FFA500', [255, 165, 0]],
        'OrangeRed'            => ['FF4500', [255, 69, 0]],
        'Orchid'               => ['DA70D6', [218, 112, 214]],
        'PaleGoldenrod'        => ['EEE8AA', [238, 232, 170]],
        'PaleGreen'            => ['98FB98', [152, 251, 152]],
        'PaleTurquoise'        => ['AFEEEE', [175, 238, 238]],
        'PaleVioletRed'        => ['DB7093', [219, 112, 147]],
        'PapayaWhip'           => ['FFEFD5', [255, 239, 213]],
        'PeachPuff'            => ['FFDAB9', [255, 218, 185]],
        'Peru'                 => ['CD853F', [205, 133, 63]],
        'Pink'                 => ['FFC0CB', [255, 192, 203]],
        'Plum'                 => ['DDA0DD', [221, 160, 221]],
        'PowderBlue'           => ['B0E0E6', [176, 224, 230]],
        'Purple'               => ['800080', [128, 0, 128]],
        'Red'                  => ['FF0000', [255, 0, 0]],
        'RosyBrown'            => ['BC8F8F', [188, 143, 143]],
        'RoyalBlue'            => ['4169E1', [65, 105, 225]],
        'SaddleBrown'          => ['8B4513', [139, 69, 19]],
        'Salmon'               => ['FA8072', [250, 128, 114]],
        'SandyBrown'           => ['F4A460', [244, 164, 96]],
        'SeaGreen'             => ['2E8B57', [46, 139, 87]],
        'Seashell'             => ['FFF5EE', [255, 245, 238]],
        'Sienna'               => ['A0522D', [160, 82, 45]],
        'Silver'               => ['C0C0C0', [192, 192, 192]],
        'SkyBlue'              => ['87CEEB', [135, 206, 235]],
        'SlateBlue'            => ['6A5ACD', [106, 90, 205]],
        'SlateGray'            => ['708090', [112, 128, 144]],
        'Snow'                 => ['FFFAFA', [255, 250, 250]],
        'SpringGreen'          => ['00FF7F', [0, 255, 127]],
        'SteelBlue'            => ['4682B4', [70, 130, 180]],
        'Tan'                  => ['D2B48C', [210, 180, 140]],
        'Teal'                 => ['008080', [0, 128, 128]],
        'Thistle'              => ['D8BFD8', [216, 191, 216]],
        'Tomato'               => ['FF6347', [255, 99, 71]],
        'Turquoise'            => ['40E0D0', [64, 224, 208]],
        'Violet'               => ['EE82EE', [238, 130, 238]],
        'Wheat'                => ['F5DEB3', [245, 222, 179]],
        'White'                => ['FFFFFF', [255, 255, 255]],
        'WhiteSmoke'           => ['F5F5F5', [245, 245, 245]],
        'Yellow'               => ['FFFF00', [255, 255, 0]],
        'YellowGreen'          => ['9ACD32', [154, 205, 50]],
    ];

    /**
     * RGB model Red component value [0..255]
     *
     * @var int
     */
    private $_rgbR = 0;

    /**
     * RGB model Green component value [0..255]
     *
     * @var int
     */
    private $_rgbG = 0;

    /**
     * RGB model Blue component value [0..255]
     *
     * @var int
     */
    private $_rgbB = 0;

    /**
     * HSL model Hue value [0..360]
     *
     * @var float
     */
    private $_hslH = 0;

    /**
     * HSL model Saturation value [0..100]
     *
     * @var float
     */
    private $_hslS = 0;

    /**
     * HSL model Lightness value [0..100]
     *
     * @var float
     */
    private $_hslL = 0;

    /**
     * HSV model Hue value [0..360]
     *
     * @var float
     */
    private $_hsvH = 0;

    /**
     * HSV model Saturation value [0..100]
     *
     * @var float
     */
    private $_hsvS = 0;

    /**
     * HSV model Value/Brightness value [0..100]
     * @var float
     */
    private $_hsvV = 0;

    /**
     * Color HEX value
     *
     * @var string
     */
    private $_hex = '000000';

    /**
     * Color name, if available
     *
     * @var string
     */
    private $_name = '';

    /**
     * Sync other color model values based given source value.
     *
     * @param string $from Source color model name
     * @param mixed  $value
     * @param float  $value2
     * @param float  $value3
     */
    private function __construct(string $from, $value, $value2 = null, $value3 = null)
    {
        switch (strtolower($from)) {
            case 'hex':
                $this->_hex = strtolower($value);
                $this->_hex2rgb();
                $this->_rgb2hsl();
                $this->_rgb2hsv();
                break;

            case 'hsl':
                $this->_hslH = $value;
                $this->_hslS = $value2;
                $this->_hslL = $value3;
                $this->_hsl2rgb();
                $this->_rgb2hex();
                $this->_rgb2hsv();
                break;

            case 'hsv':
                $this->_hsvH = $value;
                $this->_hsvS = $value2;
                $this->_hsvV = $value3;
                $this->_hsv2rgb();
                $this->_rgb2hex();
                $this->_rgb2hsl();
                break;

            case 'rgb':
                $this->_rgbR = $value;
                $this->_rgbG = $value2;
                $this->_rgbB = $value3;
                $this->_rgb2hsl();
                $this->_rgb2hex();
                $this->_rgb2hsv();
                break;

        }

        $this->hasName();
    }

    /**
     * Generate Color object from RGB values
     *
     * @param int $R Red component value [0..255]
     * @param int $G Green component value [0..255]
     * @param int $B Blue component value [0..255]
     * @return Color
     */
    public static function fromRGB(int $R, int $G, int $B): self
    {
        if ($R < 0 || $R > 255) {
            throw new \InvalidArgumentException("'{$R}' is not valid value for RED [0..255].");
        }
        if ($G < 0 || $G > 255) {
            throw new \InvalidArgumentException("'{$R}' is not valid value for GREEN [0..255].");
        }
        if ($B < 0 || $B > 255) {
            throw new \InvalidArgumentException("'{$R}' is not valid value for BLUE [0..255].");
        }

        return new self('rgb', $R, $G, $B);
    }

    /**
     * Generate color object from HSL values
     *
     * @param int $H Hue
     * @param int $S Saturation
     * @param int $L Lightness
     * @return Color
     */
    public static function fromHSL(int $H, int $S, int $L): self
    {
        if ($H < 0 || $H > 360) {
            throw new \InvalidArgumentException("'{$H}' is not valid value for HUE [0..360]");
        }
        if ($S < 0 || $S > 100) {
            throw new \InvalidArgumentException("'{$S}' is not valid value for SATURATION [0..100]");
        }
        if ($L < 0 || $L > 100) {
            throw new \InvalidArgumentException("'{$L}' is not valid value for LIGHTNESS [0..100]");
        }

        return new self('hsl', $H, $S, $L);
    }

    /**
     * Generate color object from HSV/HSB values
     *
     * @param int $H Hue
     * @param int $S Saturation
     * @param int $V Value/Brightness
     * @return Color
     */
    public static function fromHSV(int $H, int $S, int $V): self
    {
        if ($H < 0 || $H > 360) {
            throw new \InvalidArgumentException("'{$H}' is not valid value for HUE [0..360]");
        }
        if ($S < 0 || $S > 100) {
            throw new \InvalidArgumentException("'{$S}' is not valid value for SATURATION [0..100]");
        }
        if ($V < 0 || $V > 100) {
            throw new \InvalidArgumentException("'{$V}' is not valid value for VALUE/BRIGHTNESS [0..100]");
        }

        return new self('hsv', $H, $S, $V);
    }

    /**
     * Generate color object from color name.
     *
     * @param string $colorName Color name (Browsers supported)
     * @return Color
     */
    public static function fromName(string $colorName): self
    {
        foreach (self::$_colorNames as $color => $colorValue) {
            if (strtolower($colorName) == strtolower($color)) {
                return self::fromHex($colorValue[0]);
            }
        }
        throw new \InvalidArgumentException("'{$colorName}' is not valid COLOR NAME.");
    }

    /**
     * Generate color object from HEX-code.
     * Allowed 3- or 6-digit hexcodes
     *
     * @param string $hexColor Color HEX code
     * @return Color
     */
    public static function fromHex(string $hexColor): self
    {
        $hexColor = trim($hexColor, '#');
        //if (strlen($hexColor) != 3 && strlen($hexColor) != 6) {
        if (!preg_match('/^#?([0-9a-fA-F]{3}){1,2}$/', $hexColor)) {
            throw new \InvalidArgumentException("'{$hexColor}' is not valid value for HEX COLOR.");

        }
        if (strlen($hexColor) == 3) {
            $hexColorR = $hexColor[0];
            $hexColorG = $hexColor[1];
            $hexColorB = $hexColor[2];
            $hexColor  = $hexColorR . $hexColorR . $hexColorG . $hexColorG . $hexColorB . $hexColorB;
        }

        return new self('hex', $hexColor);
    }

    /**
     * Return all accepted color names.
     *
     * @return array
     */
    public static function getColorNames()
    {
        return self::$_colorNames;
    }

    /**
     * Magic method to get different color parameters
     *
     * @param $name
     * @return array|bool
     */
    public function __get($name)
    {
        switch (strtolower($name)) {
            case 'r':
            case 'red':
            case 'rgbr':
                return $this->_rgbR;
            case 'g':
            case 'green':
            case 'rgbg':
                return $this->_rgbG;
            case 'b':
            case 'blue':
            case 'rgbb':
                return $this->_rgbB;
            case 'h':
            case 'hue':
            case 'hslh':
                return $this->_hslH;
            case 's':
            case 'saturation':
            case 'hsls':
                return $this->_hslS;
            case 'l':
            case 'lightness':
            case 'hsll':
                return $this->_hslL;
            case 'hsvh':
                return $this->_hsvH;
            case 'hsvs':
                return $this->_hsvS;
            case 'hsvv':
                return $this->_hsvV;
            case 'rgb':
                return [
                    'red'   => $this->_rgbR,
                    'R'     => $this->_rgbR,
                    'green' => $this->_rgbG,
                    'G'     => $this->_rgbG,
                    'blue'  => $this->_rgbB,
                    'B'     => $this->_rgbB,
                ];
            case 'hsl':
                return [
                    'hue'        => $this->_hslH,
                    'H'          => $this->_hslH,
                    'saturation' => $this->_hslS,
                    'S'          => $this->_hslS,
                    'lightness'  => $this->_hslL,
                    'L'          => $this->_hslL,
                ];
            case 'hsv':
                return [
                    'hue'        => $this->_hsvH,
                    'H'          => $this->_hsvH,
                    'saturation' => $this->_hsvS,
                    'S'          => $this->_hsvS,
                    'Value'      => $this->_hsvV,
                    'V'          => $this->_hsvV,
                ];
            case 'name':
                return $this->_name;
            case 'hex':
                $hex    = $this->_hex;
                $result = [
                    'hex' => $this->_hex,
                    'web' => '#' . $this->_hex,
                ];
                if ($hex[0] == $hex[1] && $hex[2] == $hex[3] && $hex[4] == $hex[5]) {
                    $result['short-hex'] = $hex[0] . $hex[2] . $hex[4];
                    $result['short-web'] = '#' . $hex[0] . $hex[2] . $hex[4];
                }

                return $result;
            default:
                throw new \InvalidArgumentException("Unknown property '{$name}'.");
        }

    }

    /**
     * Properties are read-only
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        throw new \InvalidArgumentException("Cannot set property '{$name}' value.");
    }

    /**
     * Color model conversion from HEX to RGB
     */
    private function _hex2rgb()
    {
        $R           = substr($this->_hex, 0, 2);
        $G           = substr($this->_hex, 2, 2);
        $B           = substr($this->_hex, 4, 2);
        $this->_rgbR = hexdec($R);
        $this->_rgbG = hexdec($G);
        $this->_rgbB = hexdec($B);
    }

    /**
     * Color model conversion from RGB to HSL
     */
    private function _rgb2hsl()
    {
        $valR = $this->_rgbR / 255;
        $valG = $this->_rgbG / 255;
        $valB = $this->_rgbB / 255;
        $high = max($valR, $valG, $valB);
        $low  = min($valR, $valG, $valB);
        $valL = ($low + $high) / 2;
        if ($low == $high) {
            $valH = 0;
            $valS = 0;
        } else {
            $d    = $high - $low;
            $valS = $valL > 0.5 ? $d / (2 - $high - $low) : $d / ($high + $low);
            $valH = 0;
            switch ($high) {
                case $valR:
                    $valH = ($valG - $valB) / $d + ($valG < $valB ? 6 : 0);
                    break;
                case $valG:
                    $valH = ($valB - $valR) / $d + 2;
                    break;
                case $valB:
                    $valH = ($valR - $valG) / $d + 4;
                    break;
            }
            $valH /= 6;
        }

        $this->_hslH = round($valH * 360, 1);
        $this->_hslS = round($valS * 100, 2);
        $this->_hslL = round($valL * 100, 2);
    }

    /**
     * Color model conversion from RGB to HSV
     */
    private function _rgb2hsv()
    {
        $valR = $this->_rgbR / 255;
        $valG = $this->_rgbG / 255;
        $valB = $this->_rgbB / 255;

        $max  = max($valR, $valG, $valB);
        $min  = min($valR, $valG, $valB);
        $valV = $max;
        $d    = $max - $min;
        $valS = $max == 0 ? 0 : $d / $max;
        if ($max == $min) {
            $valH = 0;
        } else {
            $valH = 0;
            switch ($max) {
                case $valR:
                    $valH = ($valG - $valB) / $d + ($valG < $valB ? 6 : 0);
                    break;
                case $valG:
                    $valH = ($valB - $valR) / $d + 2;
                    break;
                case $valB:
                    $valH = ($valR - $valG) / $d + 4;
                    break;
            }
            $valH /= 6;
        }
        $this->_hsvH = round($valH * 360, 1);
        $this->_hsvS = round($valS * 100, 2);
        $this->_hsvV = round($valV * 100, 2);
    }


    /**
     * Color model conversion from HSL to RGB
     */
    private function _hsl2rgb()
    {
        $valH = $this->_hslH / 360;
        $valS = $this->_hslS / 100;
        $valL = $this->_hslL / 100;

        if ($valS == 0) {
            $valR = $valL * 255;
            $valG = $valL * 255;
            $valB = $valL * 255;

        } else {
            $q = ($valL < 0.5)
                ? $valL * (1 + $valS)
                : ($valL + $valS) - ($valL * $valS);
            $p = 2 * $valL - $q;

            $valR = $this->_hue2rgb($p, $q, $valH + 1 / 3);
            $valG = $this->_hue2rgb($p, $q, $valH);
            $valB = $this->_hue2rgb($p, $q, $valH - 1 / 3);
        }
        $this->_rgbR = round($valR * 255);
        $this->_rgbG = round($valG * 255);
        $this->_rgbB = round($valB * 255);
    }

    /**
     * Color model conversion from RGB to HEX-code
     */
    private function _rgb2hex()
    {
        $this->_hex =
            substr('00' . dechex($this->_rgbR), -2) .
            substr('00' . dechex($this->_rgbG), -2) .
            substr('00' . dechex($this->_rgbB), -2);
    }

    /**
     * Color model conversion from HSV to RGB
     */
    private function _hsv2rgb()
    {
        $valH = $this->_hsvH / 360;
        $valS = $this->_hsvS / 100;
        $valV = $this->_hsvV / 100;

        $i = floor($valH * 6);
        $f = $valH * 6 - $i;
        $p = $valV * (1 - $valS);
        $q = $valV * (1 - $f * $valS);
        $t = $valV * (1 - (1 - $f) * $valS);

        $valR = $valG = $valB = 0;
        switch ($i % 6) {
            case 0:
                $valR = $valV;
                $valG = $t;
                $valB = $p;
                break;
            case 1:
                $valR = $q;
                $valG = $valV;
                $valB = $p;
                break;
            case 2:
                $valR = $p;
                $valG = $valV;
                $valB = $t;
                break;
            case 3:
                $valR = $p;
                $valG = $q;
                $valB = $valV;
                break;
            case 4:
                $valR = $t;
                $valG = $p;
                $valB = $valV;
                break;
            case 5:
                $valR = $valV;
                $valG = $p;
                $valB = $q;
                break;
        }
        $this->_rgbR = round($valR * 255);
        $this->_rgbG = round($valG * 255);
        $this->_rgbB = round($valB * 255);
    }

    /**
     * Sets the name value if color has name.
     */
    private function hasName()
    {
        foreach (self::$_colorNames as $name => $value) {
            if (strtolower($this->_hex) == strtolower($value[0])) {
                $this->_name = $name;
            }
        }
    }

    /**
     * Helper function for HSL2RGB conversion.
     *
     * @param float $p
     * @param float $q
     * @param float $t
     * @return float|int
     */
    private function _hue2rgb($p, $q, $t)
    {
        if ($t < 0) {
            $t += 1;
        }
        if ($t > 1) {
            $t -= 1;
        }
        if ($t < 1 / 6) {
            return $p + ($q - $p) * 6 * $t;
        }
        if ($t < 1 / 2) {
            return $q;
        }
        if ($t < 2 / 3) {
            return $p + ($q - $p) * (2 / 3 - $t) * 6;
        }

        return $p;
    }

}