<?php

/**
 * shorten url service
 *
 * @author Yakob Abada <yakob.abada@gmail.com>
 */
class ShortenurlService extends Service {

    /**
     * @var string
     */
    private $_tableName = 'short_url';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $long_url;

    /**
     * @var string
     */
    protected $created;

    /**
     * @var string
     */
    protected $creator;

    /**
     * @var integer
     */
    protected $referrals;

    /**
     * @var string
     */
    protected $short_path;

    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set longUrl
     *
     * @param string $longUrl
     */
    public function setLongUrl($longUrl)
    {
        $this->long_url = mysql_real_escape_string($longUrl);
    }

    /**
     * Get longUrl
     *
     * @return string
     */
    public function getLongUrl()
    {
        return $this->long_url;
    }

    /**
     * Set shortPath
     *
     * @param string $shortPath
     */
    public function setShortPath($shortPath)
    {
        $this->short_path = mysql_real_escape_string($shortPath);
    }

    /**
     * Get shortPath
     *
     * @return string
     */
    public function getShortPath()
    {
        return $this->short_path;
    }    
    
    /**
     * Set created
     *
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = mysql_real_escape_string($created);
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set creator
     *
     * @param string $creator
     */
    public function setCreator($creator)
    {
        $this->creator = mysql_real_escape_string($creator);
    }

    /**
     * Get creator
     *
     * @return string
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Set referrals
     *
     * @param integer $referrals
     */
    public function setReferrals($referrals)
    {
        $this->referrals = mysql_real_escape_string($referrals);
    }

    /**
     * Get referrals
     *
     * @return integer
     */
    public function getReferrals()
    {
        return $this->referrals;
    }

    /**
     * Save shorten url
     *
     * @return array
     */    
    public function save() {

        $query = "insert into `$this->_tableName` (long_url, created, creator, referrals, short_path) values ('$this->long_url', '$this->created', '$this->creator', 0, '$this->short_path') ";

        mysql_query($query);

        if (empty(mysql_error())) {
            $result['data'] = $this->getLastId();
        } else {
            $result['data'] = null;
            $result['error'] = "ShortenUrl couldn't saved";
        }

        return $result;
    }

    /**
     * find short object url by long url
     *
     * @param string $longUrl long url
     * @return array
     */    
    public function findbyLongUrl($longUrl) {

        $this->setLongUrl($longUrl);

        $query = "select * from `$this->_tableName` where long_url='$this->long_url'";

        $queryResult = mysql_query($query);

        $result['data'] = mysql_fetch_object($queryResult);
        $result['error'] = "";

        return $result;
    }

    /**
     * find short object url by short path
     *
     * @param string $shortPath short path
     * @return array
     */        
    public function findbyShortPath($shortPath) {

        $this->setShortPath($shortPath);

        $query = "select * from `$this->_tableName` where short_path='$this->short_path'";

        $queryResult = mysql_query($query);

        $result['data'] = mysql_fetch_object($queryResult);
        $result['error'] = "";

        return $result;
    }

    /**
     * update short object url by short path
     *
     * @param string $shortPath short path
     */     
    public function updateReferral($shortPath) {

        $this->setShortPath($shortPath);

        $query = "update `$this->_tableName` referrals=referrals+1 where and short_path='$this->short_path' ";

        mysql_query($query);

    }

    /**
     * get the lattest id
     *
     * @return int
     */      
    private function getLastId() {
        $query = "select * from `$this->_tableName` order by id desc limit 0, 1";

        $result = mysql_query($query);

        return mysql_fetch_object($result);
    }
}
