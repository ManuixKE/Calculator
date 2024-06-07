<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipurpose Calculator</title>
</head>
<body>
    <h1>Multipurpose Calculator</h1>
    <form action="" method="post">
        <label for="num1">Number 1:</label>
        <input type="number" id="num1" name="num1" step="any" required><br><br>

        <label for="num2">Number 2:</label>
        <input type="number" id="num2" name="num2" step="any"><br><br>

        <label for="operation">Operation:</label>
        <select id="operation" name="operation" required>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
            <option value="exponent">Exponentiation</option>
            <option value="percentage">Percentage</option>
            <option value="sqrt">Square Root</option>
            <option value="log">Logarithm</option>
        </select><br><br>

        <input type="submit" value="Calculate">
    </form>

    <?php
    function calculate($num1, $num2, $operation) {
        switch ($operation) {
            case 'add':
                return $num1 + $num2;
            case 'subtract':
                return $num1 - $num2;
            case 'multiply':
                return $num1 * $num2;
            case 'divide':
                if ($num2 == 0) return "Error: Division by zero";
                return $num1 / $num2;
            case 'exponent':
                return pow($num1, $num2);
            case 'percentage':
                return ($num1 * $num2) / 100;
            case 'sqrt':
                return sqrt($num1);
            case 'log':
                return log($num1);
            default:
                return "Invalid operation";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = isset($_POST['num1']) ? (float) $_POST['num1'] : 0;
        $num2 = isset($_POST['num2']) ? (float) $_POST['num2'] : 0;
        $operation = $_POST['operation'];

        $result = calculate($num1, $num2, $operation);
        echo "<script type='text/javascript'>alert('The result of the operation is: $result');</script>";
    }
    ?>
</body>
</html>
