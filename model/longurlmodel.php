<?php

/**
 * long url Model
 *
 * @author Yakob Abada <yakob.abada@gmail.com>
 */
class LongurlModel{

    /**
     * get long url 
     *
     * @param string $shortPath short path
     * @return string
     */        
    public function getLongUrl($shortPath) {
       
       $shortenUrlService = new ShortenurlService();
        $ShortUrls = $shortenUrlService->findbyShortPath($shortPath);
        if (!empty($ShortUrls['data'])) {
            $shortenUrlService->updateReferral($shortPath);
            return $ShortUrls['data']->long_url;
        }
        
        return ''; 
    }
}