<?php
namespace MikelMade\Mmimagemap\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2018 MikelMade (http://www.mikelmade.de)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package mmimagemap
 *
 */
 
class Area extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    
    /**
        * mapid
        *
        * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
        * @var int
        */
    protected $mapid;

    /**
        * areatype
        *
        * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
        * @var int
        */
    protected $areatype;
    
    /**
        * arealink
        *
        * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
        * @var \string
        */
    protected $arealink;
    
    /**
        * description
        *
        * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
        * @var \string
        */
    protected $description;
    
    /**
        * color
        *
        * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
        * @var \string
        */
    protected $color;
    
    /**
        * param
        *
        * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
        * @var \string
        */
    protected $param;

    /**
        * febordercolor
        *
        * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
        * @var \string
        */
    protected $febordercolor;

    /**
        * fevisible
        *
        * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
        * @var int
        */
    protected $fevisible;
    
    /**
        * feborderthickness
        *
        * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
        * @var int
        */
    protected $feborderthickness;
    
    /**
        * fealtfile
        *
        * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
        * @var \string
        */
    protected $fealtfile;
    

    /**
        * Returns the mapid
        *
        * @return int $mapid
        */
    public function getMapid()
    {
        return $this->mapid;
    }
    
    /**
        * Sets the mapid
        *
        * @param int $mapid
        * @return void
        */
    public function setMapid($mapid)
    {
        $this->mapid = $mapid;
    }
    
    /**
        * Returns the areatype
        *
        * @return int $areatype
        */
    public function getAreatype()
    {
        return $this->areatype;
    }
    
    /**
        * Sets the areatype
        *
        * @param int $areatype
        * @return void
        */
    public function setAreatype($areatype)
    {
        $this->areatype = $areatype;
    }
    
    /**
        * Returns the arealink
        *
        * @return \string $arealink
        */
    public function getArealink()
    {
        return $this->arealink;
    }
    
    /**
        * Sets the arealink
        *
        * @param \string $arealink
        * @return void
        */
    public function setArealink($arealink)
    {
        $this->arealink = $arealink;
    }
    
    /**
        * Returns the description
        *
        * @return \string $description
        */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
        * Sets the description
        *
        * @param \string $description
        * @return void
        */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
        * Returns the color
        *
        * @return \string $color
        */
    public function getColor()
    {
        return $this->color;
    }
    
    /**
        * Sets the color
        *
        * @param \string $color
        * @return void
        */
    public function setColor($color)
    {
        $this->color = $color;
    }
    
    /**
        * Returns the param
        *
        * @return \string $param
        */
    public function getParam()
    {
        return $this->param;
    }
    
    /**
        * Sets the param
        *
        * @param \string $param
        * @return void
        */
    public function setParam($param)
    {
        $this->param = $param;
    }
    
    /**
        * Returns the febordercolor
        *
        * @return \string $febordercolor
        */
    public function getFebordercolor()
    {
        return $this->febordercolor;
    }
    
    /**
        * Sets the febordercolor
        *
        * @param \string $febordercolor
        * @return void
        */
    public function setFebordercolor($febordercolor)
    {
        $this->febordercolor = $febordercolor;
    }
    
    /**
        * Returns the fevisible
        *
        * @return \string $fevisible
        */
    public function getFevisible()
    {
        return $this->fevisible;
    }
    
    /**
        * Sets the fevisible
        *
        * @param \string $fevisible
        * @return void
        */
    public function setFevisible($fevisible)
    {
        $this->fevisible = $fevisible;
    }
    
    /**
        * Returns the feborderthickness
        *
        * @return \string $feborderthickness
        */
    public function getFeborderthickness()
    {
        return $this->feborderthickness;
    }
    
    /**
        * Sets the feborderthickness
        *
        * @param \string $feborderthickness
        * @return void
        */
    public function setFeborderthickness($feborderthickness)
    {
        $this->feborderthickness = $feborderthickness;
    }
    
    /**
        * Returns the fealtfile
        *
        * @return \string $fealtfile
        */
    public function getFealtfile()
    {
        return $this->fealtfile;
    }
    
    /**
        * Sets the fealtfile
        *
        * @param \string $fealtfile
        * @return void
        */
    public function setFealtfile($fealtfile)
    {
        $this->fealtfile = $fealtfile;
    }
}
