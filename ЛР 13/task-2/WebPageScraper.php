<?php

class WebPageScraper {
    private $url;
    private $dom;

    public function __construct($url) {
        $this->url = $url;
        $this->dom = new DOMDocument;
    }

    public function getDOM() {
        return $this->dom;
    }

    public function loadPage() {
        if ($this->url) {
            $html = file_get_contents($this->url);
            if ($html) {
                @$this->dom->loadHTML($html);
            } else {
                return null;
            }
            return $this->dom;
        } else {
            return null;
        }
    }

    public function findElementsByClass($className, $parentClass = null) {
        $xpath = new DOMXPath($this->dom);
    
        if ($parentClass) {
            $query = "//*[contains(@class, '$parentClass')]//*[contains(@class, '$className')]";
        } else {
            $query = "//*[contains(@class, '$className')]";
        }
    
        return $xpath->query($query);
    }
    
}

$url = 'https://college.ks.ua';
$scraper = new WebPageScraper($url);
$scraper->loadPage();

$parentClass = 'form-190';
$class = 'shedule_content';
$tagName = 'div';

$elements = $scraper->findElementsByClass($class, $parentClass);

echo $scraper->getDOM()->saveHTML($elements[0]) . "\n";

?>
