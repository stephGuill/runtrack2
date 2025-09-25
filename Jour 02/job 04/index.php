<!-- multiples de 3 = Fizz -->
<!-- multiples de 5 = Buzz -->
<!-- multiples de 3 et 5 = FizzBuzz -->
<!-- les autres nombres = eux-mêmes -->

<?php
for ($i = 1; $i <= 100; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz<br />";
    } elseif ($i % 3 == 0) {
        echo "Fizz<br />";
    } elseif ($i % 5 == 0) {
        echo "Buzz<br />";
    } else {
        echo $i . "<br />";
    }
}
?>
