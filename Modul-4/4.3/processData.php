<h3>Posted data:</h3>
<?php

foreach ($_POST as $key => $value) {
    echo "(" . htmlspecialchars($key) . ") => (";
    echo htmlspecialchars($value) . ")<br>";
}

?>