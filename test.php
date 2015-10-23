<?php



$id=date("s");

?>

<script>
    setTimeout(function () {
        window.location.href= 'http://psbusinessparks/test.php?id=<?=$id?>'; // the redirect goes here

    },5000); // 5 seconds
</script>
