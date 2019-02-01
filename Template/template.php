<?php require_once('../buttonBuldier.php');?>

<script>
    $(document).ready(function(){
        $(".btn").onclick(function(){
            $(this).css("background-color", "#D6D6FF");
        });
    });
</script>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<style>
    p{
        margin-top: 30px;
    }
</style>
<body
<div class="col-lg-4">
    <?php echo $button[0]?>
</div>

</body>
</html>
