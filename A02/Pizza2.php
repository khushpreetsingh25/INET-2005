<!DOCTYPE html>
<html>
<head>
    <title>Grade Calculator Result</title>
</head>
<body>
    <h2>Grade Calculator Result</h2>
    <?php
    $mark = $_POST['mark'];
    
    if (empty($mark)) {
        echo "Error: Please enter a mark/grade.";
    } else {
        if (is_numeric($mark)) {
            $mark = floatval($mark);
            if ($mark >= 85) {
                echo "Your grade is A.";
            } elseif ($mark >= 75) {
                echo "Your grade is B.";
            } elseif ($mark >= 60) {
                echo "Your grade is C.";
            } else {
                echo "Your grade is F.";
            }
        } else {
            $mark = strtoupper($mark);
            switch ($mark) {
                case 'A':
                    echo "Your grade corresponds to 85-100.";
                    break;
                case 'B':
                    echo "Your grade corresponds to 75-84.99.";
                    break;
                case 'C':
                    echo "Your grade corresponds to 60-74.99.";
                    break;
                default:
                    echo "Error: Invalid mark/grade input.";
            }
        }
    }
    ?>
</body>
</html>
