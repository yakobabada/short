<?php

/**
 * Shorten url Model
 *
 * @author Yakob Abada <yakob.abada@gmail.com>
 */
class ShortenModel{
    
    /**
     * @var string
     */    
    private $shortUrl;
    
    /**
     * create short url 
     *
     * @param string $longUrl long url
     * @return string
     */  
    public function create($longUrl) {
        
        if ($this->isUrlExist($longUrl)) {
            return $this->getShortUrl();
        }
        
        $shortner  = new Shortener();       
        $shortPath = $shortner->shorten($longUrl);
        
        $this->setShortUrl($shortPath);
        $this->save($shortPath, $longUrl);
        
        return $this->getShortUrl();        
    }
    
    /**
     * Check url is exist and saved before
     *
     * @param string $longUrl long url
     * @return boolean
     */
    public function isUrlExist($longUrl)
    {
        $shortenUrlService = new ShortenurlService();
        $ShortUrls = $shortenUrlService->findbyLongUrl($longUrl);
        
        if (!empty($ShortUrls['data'])) {
            $this->setShortUrl($ShortUrls['data']->short_path);
            return TRUE;
        }
        
        return FALSE;
    }
    
    /**
     * Set shortUrl
     *
     * @param string $path
     *
     */    
    public function setShortUrl($path)
    {
        $this->shortUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $path;
    }

    /**
     * Get shortUrl
     *
     * @return string
     */    
    public function getShortUrl()
    {
        return $this->shortUrl;
    }   

    /**
     * save shorten url object
     *
     * @param string $shortPath short path
     * @param string $longUrl   long url
     */      
    public function save($shortPath, $longUrl) {
    	$shortenUrl = new ShortenurlService();
        $shortenUrl->setLongUrl($longUrl);
        $shortenUrl->setShortPath($shortPath);
        
        $created = new \DateTime(); 
        $shortenUrl->setCreated($created->format("Y-m-d H:i:s"));        
        $shortenUrl->setCreator($_SERVER['REMOTE_ADDR']); 
        
        $shortenUrl->save();
    }

}