<?php

function pr($arr)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function prx($arr)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    die();

    // use this to print the values submitted in form 
    // if(isset($_POST['submit']))
    // {
    //     prx($_POST);
    // }
}

// use header less because in some cases it gives error instead use this funtion 

function redirect($url)
{
    ?>
    <script>
    window.location.href = '<?php echo $url; ?>';
    </script>
    <?php 
    
}



?>