<?php
/**
 * shortener for shorten URL
 *
 * @author Yakob Abada <yakob.abada@gmail.com>
 */
class Shortener implements ShortenerInterface
{
    
    const URL_LENGTH = 3;

    /**
     * {@inheritdoc}
     */
    public function shorten($longUrl)
    {
        $url = md5($longUrl);
        $urlHash = '';

        do {
            $hash = $urlHash .= $url;
            $hash = pack('H*', $hash);

            $hash = base64_encode($hash);
            $hash = str_replace(array('+', '/', '='), array('', '', ''), $hash);

        } while (strlen($hash) < self::URL_LENGTH);

        return substr($hash, 0, self::URL_LENGTH);
    }

}
