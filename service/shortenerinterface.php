<?php

/**
 * Interface for shortener
 *
 * @author Yakob Abada <yakob.abada@gmail.com>
 */
interface ShortenerInterface
{
    /**
     * Shorten URL method.
     *
     * @abstract
     * @return string short url
     */
    public function shorten($longUrl);    
}