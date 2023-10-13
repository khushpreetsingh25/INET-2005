<!DOCTYPE html>
<html>
<head>
    <title>Pizza Order Result</title>
</head>
<body>
    <h2>Pizza Order Result</h2>
    <?php
    $size = $_POST['size'];
    $toppings = 0;
    
    if (isset($_POST['pepperoni'])) {
        $toppings++;
    }
    if (isset($_POST['olive'])) {
        $toppings++;
    }
    if (isset($_POST['pineapple'])) {
        $toppings++;
    }
    if (isset($_POST['ham'])) {
        $toppings++;
    }
    
    $cost = 0;

    if ($size == "small") {
        $cost = 9.00;
    } elseif ($size == "medium") {
        $cost = 12.50;
    } elseif ($size == "large") {
        $cost = 15.00;
    } elseif ($size == "extra-large") {
        $cost = 17.50;
    }

    $cost += ($toppings - 1); // Cheese is free, so subtract one topping.

    echo "Size: " . ucfirst($size) . "<br>";
    echo "Toppings: ";
    if ($toppings === 0) {
        echo "None";
    } else {
        $selectedToppings = [];
        if (isset($_POST['pepperoni'])) $selectedToppings[] = "Pepperoni";
        if (isset($_POST['cheese'])) $selectedToppings[] = "Cheese";
        if (isset($_POST['olive'])) $selectedToppings[] = "Olive";
        if (isset($_POST['pineapple'])) $selectedToppings[] = "Pineapple";
        if (isset($_POST['ham'])) $selectedToppings[] = "Ham";
        echo implode(", ", $selectedToppings);
    }
    echo "<br>";
    echo "Total Cost: $" . number_format($cost, 2);
    ?>
</body>
</html>
