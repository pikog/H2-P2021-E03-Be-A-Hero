<?

class View
{
    private $page;
    private $title;
    private $data;

    public function __construct($page, $title, $data = [])
    {
        $this->page = $page;
        $this->title = $title;
        $this->data = $data;
    }

    public function __toString()
    {
        $file = './views/' . $this->page . '/view' . ucfirst($this->page) . '.php';
        $this->data['page'] = $this->page;
        $content = $this->render($file, $this->data);
        return $this->render('./views/template.php', [
            'content' => $content,
            'page' => $this->page,
            'title' => $this->title
        ]);
    }

    private function render($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);
            ob_start();
            require($file);
            return ob_get_clean();
        }
    }
}