<?php
/**
 * Demo Calculator — showing how A, B, C, D work
 * Name: Your Name
 * Reg No: BCA23058
 * Date: 2026-07-25
 *
 * A = 8, B = 5, C = 0, D = 3
 *
 * Calculations:
 *   add()       = A + B + C + D = 8 + 5 + 0 + 3 = 16
 *   multiply()  = A * B = 8 * 5 = 40
 *   custom()    = (C * 100) + 5000 = (0 * 100) + 5000 = 5000
 *   nameTag()   = "Student" . 8 . 5 = "Student85"
 */

define('A', 8);
define('B', 5);
define('C', 0);
define('D', 3);

class Calculator {
    public function add(): int {
        return A + B + C + D;
    }

    public function multiply(): int {
        return A * B;
    }

    public function custom(): int {
        return (C * 100) + 5000;
    }

    public function nameTag(): string {
        return "Student" . A . B;
    }
}

$calc = new Calculator();
echo "add()         = " . $calc->add() . PHP_EOL;
echo "multiply()    = " . $calc->multiply() . PHP_EOL;
echo "custom()      = " . $calc->custom() . PHP_EOL;
echo "nameTag()     = " . $calc->nameTag() . PHP_EOL;

/* EXPECTED OUTPUT:
add()         = 16
multiply()    = 40
custom()      = 5000
nameTag()     = Student85
*/
