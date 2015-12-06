<?php

class WebsiteEngine
{
    private $page = "";
    private $content = "";
    private $original;

    /**
     * Handles the
     * @param $get_array
     * @return WebsiteEngine
     */
    public static function handle($get_array)
    {
        $ret = new WebsiteEngine();
        if (isset($get_array["page"])) {
            $ret->page = htmlspecialchars_decode($get_array["page"]);
        }
        $ret->original = $get_array;
        return $ret;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function pageContent()
    {
        return $this->content;
    }

    public function setPageContent($str)
    {
        $this->content .= $str;
    }

    public function addPage($str)
    {
        $this->content .= "?> " . file_get_contents($str) . "<?php ";
    }

    public function getOriginal()
    {
        return $this->original;
    }
}

?>