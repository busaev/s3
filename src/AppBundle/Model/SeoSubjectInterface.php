<?php

namespace AppBundle\Model;

interface SeoSubjectInterface
{
    public function getTitle();
    public function getKeywords();
    public function getDescription();
}