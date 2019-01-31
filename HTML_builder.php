<?php
class HTMLBuilder
{
    private $elements = array();

    public function label($text) {
        $this->elements[] = "<label>$text</label>";
        return $this;
    }

    public function button($type, $class, $value = '') {
        $this->elements[] = "<button type=\"$type\" class=\"$class\">$value</button>";
        return $this;
    }

    public function p($p, $value = '') {
        $this->elements[] = "<p id=\"$p\">$value</p>";
        return $this;
    }

    public function __toString() {
        return join("\n", $this->elements);
    }
}

$b = new HTMLBuilder();
$b->label('Name')->button('submit', 'Ernest-btn btn btn-primary', 'Ernest')->p('big-p', 'Ernest');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
    p{
        margin-top: 30px;
    }
</style>
<body
<div class="col-lg-4">
    <?php echo $b?>
</div>

</body>
</html>
