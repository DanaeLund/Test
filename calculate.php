<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $milkAmount = floatval($_POST["milkAmount"]);
    $milkFat = floatval($_POST["milkFat"]);

    if ($milkAmount > 0 && $milkFat > 0) {
        $cream = $milkAmount * ($milkFat / 100);
        $butter = $cream * 0.5; // Example conversion rate

        echo "From " . $milkAmount . " liters of milk with " . $milkFat . "% fat, you get " . $cream . " liters of cream and " . $butter . " liters of butter.";

        echo "<script>
        document.getElementById('calculatorForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var form = event.target;

        fetch(form.action, {
            method: form.method,
            body: new FormData(form)
        })
        .then(response => response.text())
        .then(result => {
            alert(result);
        })
        .catch(error => {
            alert('Error: ' + error);
        });
        });
        </script>";
    } else {
        echo "Please enter positive values for milk amount and fat percentage.";
    }
} else {
    echo "Invalid request method.";
};

