<?php

namespace AppBundle\Model;

use AppBundle\Entity\Core\Multimedia;

interface  MultimediaSubjectInterface
{    
    public function getMedia();
    
    public function addMedia(Multimedia $multimedia);
    
    public function removeMedia(Multimedia $multimedia);
    
    public function getEntryHash();
}