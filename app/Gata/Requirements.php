<?php namespace App\Gata;


class Requirements
{
    /*
    |--------------------------------------------------------------------------
    | Variables
    |--------------------------------------------------------------------------
    */
    private static $php_version = '5.5.9'; //minimum
    private static $required_extensions = ['fileinfo', 'pdo_mysql', 'mcrypt', 'openssl', 'mbstring', 'tokenizer'];
    private static $optional_extensions = ['curl', 'gd', 'iconv'];
    private static $writable_dirs = ['public/upload', 'storage', 'bootstrap/cache'];

    /*
    |--------------------------------------------------------------------------
    | Code
    |--------------------------------------------------------------------------
    */
    private static function extensionsNotLoaded(array $exts)
    {
        $res = [];
        foreach ($exts as $extension) {
            if ( ! extension_loaded($extension)) {
                $res[] = self::message('Extension ' . $extension . ' not loaded.', false);
            } else {
                $res[] = self::message('Extension ' . $extension . ' loaded.', true);
            }
        }
        return $res;
    }

    private static function validPHPVersion()
    {
        if (version_compare(PHP_VERSION, self::$php_version, '<')) {
            return false;
        }
        return true;
    }

    public static function result()
    {
        $failedExtensions  = self::extensionsNotLoaded(self::$required_extensions);
        $optinalExtensions = self::extensionsNotLoaded(self::$optional_extensions);
        if (self::validPHPVersion() == false) {
            $php_msg = self::message('PHP Version not valid: ' . PHP_VERSION . '. Should be >= ' . self::$php_version, false);
        } else {
            $php_msg = self::message('PHP Version valid: ' . PHP_VERSION . ' (' . self::$php_version . ')', true);
        }
        return self::toHTML($php_msg, $failedExtensions, $optinalExtensions);
    }

    private static function message($message, $passed)
    {
        $color = $passed ? 'green' : 'red';
        return '<span style="color:' . $color . '">' . $message . '</span>';
    }

    private static function toHTML($php_msg, $failedExtension, $optionalExtensions)
    {
        $html = '<html>';
        $html .= '<head>';
        $html .= '<title>Project Requirements</title>';
        $html .= '</head>';
        $html .= '<body>';
        $html .= '<h2>' . $php_msg . '</h2>';
        $html .= '<h5>Required Extensions:</h5>';
        $html .= '<ul>';
        foreach ($failedExtension as $failed) {
            $html .= '<li>' . $failed . '</li>';
        }
        $html .= '</ul>';
        $html .= '<h5>Optional Extensions:</h5>';
        $html .= '<ul>';
        foreach ($optionalExtensions as $failed) {
            $html .= '<li>' . $failed . '</li>';
        }
        $html .= '</ul>';
        $html .= '<h5>Writable dirs:</h5>';
        $html .= '<ul>';
        foreach (self::$writable_dirs as $dir) {
            $html .= '<li>' . self::message($dir, is_writable(base_path($dir))) . '</li>';
        }
        $html .= '</ul>';
        $html .= '<h5>Other Settings:</h5>';
        $html .= '<ul>';
        $html .= '<li><strong>upload_max_filesize:</strong> ' . ini_get("upload_max_filesize") . '</li>';
        $html .= '<li><strong>post_max_size:</strong> ' . ini_get("post_max_size") . '</li>';
        $html .= '<li><strong>max_file_uploads:</strong> ' . ini_get("max_file_uploads") . '</li>';
        $html .= '<li><strong>max_execution_time:</strong> ' . ini_get('max_execution_time') . '</li>';
        $html .= '<li><strong>max_input_time:</strong> ' . ini_get('max_input_time') . '</li>';
        $html .= '<li><strong>short_open_tag:</strong> ' . ini_get('short_open_tag') . '</li>';
        $html .= '<li><strong>error_reporting:</strong> ' . ini_get('error_reporting') . '</li>';
        $html .= '</ul>';
        $html .= '</body>';
        $html .= '</html>';
        return $html;
    }
}