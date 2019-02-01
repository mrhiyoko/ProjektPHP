<?php
class Button{
    private $buttonName;

    public function setButtonName($buttonName){
        $this->buttonName = $buttonName;
    }
    public function render(){
        return $this->buttonName;
    }
}

interface Builder {
    public function buildButton($type, $clas, $value = '');
    public function getButton();
    public function __toString();
}

class ErnestButtom implements Builder{
    private $buttonElements = array();
    private $button;

    public function __construct() {
        $this->button = new Button();
    }

    public function buildButton($type, $clas, $value = '') {
        $this->buttonElements[] = "<button type=\"$type\" class=\"$clas\">$value</button>";
        return $this;
    }

    public function buildParagraph($buttonName) {
        $this->buttonElements[] = "<p class='\"$buttonName\"'></p>";
        return $this;
    }

    public function __toString() {
        return join("\n", $this->buttonElements);
    }

    public function getButton(){
        return $this->buttonElements;
    }
}
class Director{
    private $builder;

    public function __construct(Builder $builder) {
        $this->builder = $builder;
        $this->builder->buildButton( '', '', '');
    }

    public function getResult() {
        return $this->builder->getButton();
    }
}

$ernest = new ErnestButtom('submit', 'Ernest-btn btn btn-primary', 'Ernest');
$director = new Director($ernest);
$button = $director->getResult();
echo $ernest;


var_dump($button);

