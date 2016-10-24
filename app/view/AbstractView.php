<?php

abstract class AbstractView {

    protected $viewData;
    protected $receivedData;
    protected $registry;
    protected $links = [];
    protected $scripts = [];

    /**
     * @var string $head    Contain path to file in template folder
     * @var string $header  Contain path to file in template folder
     * @var string $content Contain path to file in template folder
     * @var string $footer  Contain path to file in template folder
     */
    protected $head, $header, $content, $footer;

    public function __construct($registry) {
        $this->registry = $registry;
        $this->viewData = $registry['view_data'];

        $this->head = 'head.php';
        $this->header = 'header.php';
        $this->content = 'content.php';
        $this->footer = 'footer.php';
    }

    protected function generateHTMLPart($fileName) {
        $this->loadFile($fileName);
    }

    protected function loadFile($fileName) {
        $path = $this->registry['templates_path'] . $fileName;
        if (file_exists($path)) {
            include_once $path;
        } else {
            //error msg
        }
    }

    protected function addLink($href, $external = false, $rel = 'stylesheet', $type = 'text/css') {
        //relative to index
        if (!$external) {
            $href = 'css/' . $href;
        }

        $link = [
            'href' => $href,
            'rel' => $rel,
            'type' => $type
        ];
        array_push($this->links, $link);
    }

    protected function addScript($src, $external = false, $type = 'text/javascript') {
        //relative to index
        if (!$external) {
            $src = 'js/' . $src;
        }

        $script = [
            'src' => $src,
            'type' => $type
        ];
        array_push($this->scripts, $script);
    }

    public function generateHTML() {
        $this->viewData->set('links', $this->links);
        $this->viewData->set('scripts', $this->scripts);

        $this->generateHTMLPart($this->head);
        $this->generateHTMLPart($this->header);
        $this->generateHTMLPart($this->content);
        $this->generateHTMLPart($this->footer);
    }

}
