<!DOCTYPE html>
<html>
<head>
    <title>Ingredient Alert</title>
    <style>
        h1 {
            color: #2e6da4;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<h1>Ingredient Alert</h1>

<p>The stock level of the ingredient {{ $ingredientName }} is less than the minimum stock level {{ $minimumStockLevel }}%.</p>
<p>The current stock level is {{ $stockLevel }}%.</p>
<p>Please order more {{ $ingredientName }} as soon as possible.</p>
</body>
</html>
