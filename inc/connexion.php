<?php 
class Connexion{

     /**
     * @var string
     */
    private $pdo_host;
     /**
     * @var string
     */
    private $pdo_dbname;
     /**
     * @var string
     */
    private $pdo_user;
     /**
     * @var string
     */
    private $pdo_pwd;

    

    /**
     * Get the value of pdo_pwd
     *
     * @return  string
     */ 
    public function getPdo_pwd()
    {
        return $this->pdo_pwd;
    }

    /**
     * Set the value of pdo_pwd
     *
     * @param  string  $pdo_pwd
     *
     * @return  self
     */ 
    public function setPdo_pwd(string $pdo_pwd)
    {
        $this->pdo_pwd = $pdo_pwd;

        return $this;
    }

    /**
     * Get the value of pdo_user
     *
     * @return  string
     */ 
    public function getPdo_user()
    {
        return $this->pdo_user;
    }

    /**
     * Set the value of pdo_user
     *
     * @param  string  $pdo_user
     *
     * @return  self
     */ 
    public function setPdo_user(string $pdo_user)
    {
        $this->pdo_user = $pdo_user;

        return $this;
    }

    /**
     * Get the value of pdo_dbname
     *
     * @return  string
     */ 
    public function getPdo_dbname()
    {
        return $this->pdo_dbname;
    }

    /**
     * Set the value of pdo_dbname
     *
     * @param  string  $pdo_dbname
     *
     * @return  self
     */ 
    public function setPdo_dbname(string $pdo_dbname)
    {
        $this->pdo_dbname = $pdo_dbname;

        return $this;
    }

    /**
     * Get the value of pdo_host
     *
     * @return  string
     */ 
    public function getPdo_host()
    {
        return $this->pdo_host;
    }

    /**
     * Set the value of pdo_host
     *
     * @param  string  $pdo_host
     *
     * @return  self
     */ 
    public function setPdo_host(string $pdo_host)
    {
        $this->pdo_host = $pdo_host;

        return $this;
    }
}

?>