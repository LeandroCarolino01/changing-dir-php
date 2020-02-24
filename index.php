<?php
    class Path
    {
        
        /**
         * @var string
         */
        protected $path = '';
        
        /**
         * Path constructor.
         *
         * @param string $initial_path
         */
        public function __construct(string $initial_path)
        {
            $this->path = $initial_path;
        }
        
        /**
         * @return string
         */
        public function getPath()
        {
            return $this->path;
        }
        
        /**
         * @param string $location
         */
        public function cd(string $location)
        {
            // TODO: implement functionality
            // explode path to array
            $pathArray = explode("/", $this->path);
            
            // explode location to array
            $locationArray = explode("/", $location);

            $i = 0;
            while (in_array("..", $locationArray)){
                unset($pathArray[count($pathArray) -1]);
                unset($locationArray[$i]);
                $i++ ;
            }

            $this->path = implode("/", $pathArray) . "/" . implode("/", $locationArray);
        }
        
    }
    
    $initial_path = '/var/www/vhosts/solvari.nl';
    
    $path = new Path($initial_path);
    $path->cd('css');
    echo $path->getPath() . "\n"; // must echo: /var/www/vhosts/solvari.nl/css
    
    
    $path = new Path($initial_path);
    $path->cd('..');
    echo $path->getPath() . "\n"; // must echo: /var/www/vhosts
    
    
    $path = new Path($initial_path);
    $path->cd('../zonnepaneelofferte.nl');
    echo $path->getPath() . "\n"; // must echo: /var/www/vhosts/zonnepaneelofferte.nl
    
    
    $path = new Path($initial_path);
    $path->cd('../zonnepaneelofferte.nl/css');
    echo $path->getPath() . "\n"; // must echo: /var/www/vhosts/zonnepaneelofferte.nl/css
    
    
    $path = new Path($initial_path);
    $path->cd('../../default');
    echo $path->getPath() . "\n"; // must echo: /var/www/default