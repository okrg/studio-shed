<?php  namespace Filebase\Format;


class Json implements FormatInterface
{
    /**
     * @return string
     */
    public static function getFileExtension()
    {
        return 'json';
    }

    /**
     * @param array $data
     * @param bool $pretty
     * @return string
     * @throws FormatException
     */
    public static function encode($data = [], $pretty = true)
    {
        $options = 0;
        if ($pretty == true) {
            $options = JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE;
        }

        $encoded = json_encode($data, $options);
        if ($encoded === false) {
            throw new EncodingException(
                "json_encode: '" . json_last_error_msg() . "'",
                0,
                null,
                $data
            );
        }

        return $encoded;
    }

    /**
     * @param $data
     * @return mixed
     * @throws FormatException
     */
    public static function decode($data)
    {
        $decoded = json_decode($data, true);

        if ($data !== false && $decoded === null) {
            $decoded = json_decode("{error:1}", true);
            $report = substr($data, 0, 180);
            error_log('JSON error: '.$report);
            /*
            throw new DecodingException(
                "json_decode: '" . json_last_error_msg() . "':" . $data,
                0,
                null,
                $data
            );
            */
        }

        return $decoded;
    }
}
