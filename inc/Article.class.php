<?php
class Article{
    public function __construct($id, $title, $text, $author, $date, $deleted = 0){
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
        $this->date = $date;
        $this->deleted = $deleted;
    }

    public function truncate($string,$length=350,$append="&hellip;") {
        $string = trim($string);

        if(strlen($string) > $length) {
            $string = wordwrap($string, $length);
            $string = explode("\n", $string, 2);
            $string = $string[0] . $append;
        }

        return $string;
    }

    public function build(){
        return "<div class=\"col-md-12 card\">
                    <div class=\"title\">
                        <h2>" . $this->title . "</h2>
                    </div>
                    <div class=\"preview\">
                        <button class=\"btn btn-info pull-right rmore\" onclick=\"location.href='?p=viewarticle&id=" . $this->id . "';\">Read More</button>
                        <p>" . $this->truncate($this->text) . "</p>
                    </div>
                    <div class=\"info\">
                        <p class=\"pull-right\">Date: " . date("d/m/Y H:i:s", $this->date) . "</p>
                        <p>Author: " . $this->author . "</p>
                    </div>
                </div>";
    }
}
?>