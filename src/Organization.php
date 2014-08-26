<?php
// Copyright 2014 OCLC
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
// http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

namespace WorldCat\Discovery;

/**
 * A class that represents a Place in Schema.org
 *
 */
class Organization extends Thing
{
    public static $viafServiceUrl = 'http://viaf.org/viaf';
    
    function getSameAsProperties(){
        return $this->all('owl:sameAs');
    }
    
    function getSeeAlsoProperties(){
        return $this->all('rdfs:seeAlso');
    }
    
    public function getCreativeWorks(){
        if (strpos($this->getURI(), 'viaf')){
            $graph = static::findByURI($this->getURI(), true);
            $creativeWorks = $graph->allOfType('schema:CreativeWork');
            return $creativeWorks;
        }
    }
    
    public static function findByVIAFID($id){
        $uri = static::$viafServiceUrl . '/' . $id;
        return static::findByURI($uri);
    }
}