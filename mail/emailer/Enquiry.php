<?php
echo '<br /> Enquiry from ISET   <br /><br />';
if ($fields) {

    foreach ($fields as $key => $value) {
        ?>
        <?php echo $value; ?>
        <?php echo ' : '; ?>

        <?php

        if (isset($_POST[$key])) {



            echo nl2br($_POST[$key]);
        }
        ?>
        <?php
        echo '<br /> ';

    }
}
echo '<br /> Thank you <br />';
echo 'IIM Kozhikode.';
?>





