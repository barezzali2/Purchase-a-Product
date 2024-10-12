<!-- Barez Zuber Ali 
     bz20458
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <style>
        form{
            border: 2px solid black;
            width: 45%;
            padding: 12px;
            background-color: #b3cde0;
        }

        #submit-btn {
            font-size: 15px;
            padding: 8px 20px;
            cursor: pointer;
            background-color: darkblue;
            color: white;
            border: none;
            border-radius: 8px;
        }
        #submit-btn:hover {
            background-color: rgb(49, 49, 161);
        }

        input {
            padding: 5px;
        }

        .quantity{
           width: 25%;
        }

        .visaLabel {
            font-size: 17px;
            margin-right: 20px;
            cursor: pointer;
        }
        .masterLabel{
            font-size: 17px;
            cursor: pointer;
        }

        select {
            padding: 5px;
            cursor: pointer;
        }
        option {
            cursor: pointer;
        }

    </style>
</head>

<?php

$products = ["Airpod", "Cable", "Adapter", "Headset"];

?>

<body>

<h2>Purchase a product</h2>

<form action="secondpage.php" method="POST">

<label>Full Name</label>
<span class="error"> * </span>
<input type="text" name="name" placeholder="Full Name" class="fName" required>

<br>
<label>Choose a Product: </label>
<span class="error"> * </span>
<select name="options" class="selectO" required>
    <option value=""> --- Choose a Product ---</option>
    <?php foreach($products as $index=> $product) { ?>
        <option value='<?php echo $product; ?>'><?php echo $product ?></option>
        <?php } ?>
</select>
<br>

<label for="">Quantity: </label>
<span class="error"> * </span>
<input type="number" name="quantity" class="quantity" placeholder="The number of products" required>

<br>

<label for="">Email: </label>
<span class="error"> * </span>
<input type="email" name="email" placeholder="Email Address" class="emailA" required>
<br>
<label for="">Comments: </label><br>
<textarea name="comments" rows="6" cols="85" class="textarea" placeholder="Write your comment here..."></textarea>
<br>


<label for="">Card Number</label>
<span class="error"> * </span>
<input type="number" name="cardNum" class="cardI" placeholder="Card Number" required>
<br>
<input type="radio" id="visa" value="Visa Card" name="cards" required><label for="visa" class="visaLabel">Visa</label>
<input type="radio" id="master" value="Master Card" name="cards" class="cardT" required><label for="master" class="masterLabel">Master</label>
<br>

<input type="submit" name="submit" value="Submit" id="submit-btn">

</form>

</body>
</html>