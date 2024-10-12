<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>second Page</title>
    <style>
    table {
        margin: 10px;
        margin-top: 30px;
        font-size: 20px;
        border: 1px solid black;
        background-color: #b3cde0;
        }

        th, td {
            padding: 10px 15px; 
            border: 1px solid #888; 
            text-align: left;
        }
        

        th {
            font-weight: bold;
        }

        h3 {
            margin: 10px;
            background-color: #b3cde0;
            padding: 10px;
            width: 36%;
        }
    </style>
</head>
<body>


<!-- PHP codes go here -->
<?php

$name = $options = $quantity = $email = $comments = $cardNum = $cards = "";
$errorN = $errorOptions = $errorEmail = $errorQuan = $errorCardNum = $errorCards = "";


function sanitizeData($data) {
        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
}

if (isset($_POST["submit"])) {

    if(!empty($_POST['name'])){
        $name = sanitizeData($_POST['name']);
        if(!preg_match('/^[a-zA-Z\s]*$/', $name)) { 
            $errorN = "Invalid format";
        }
    }else{
        $errorN = "Name is required";
    }


    if(!empty($_POST['options'])) { // for products
        $options = sanitizeData($_POST['options']);
    } else {
        $errorOptions = "A product is required!";
    }


    if(!empty($_POST["quantity"])) {
        $quantity = sanitizeData($_POST["quantity"]);
        if($quantity <= 0) {
            $errorQuan = "Invalid quantity";
        }
    } else {
        $errorQuan = "Quantity is required!";
    }


    if(!empty($_POST['email'])){
        $email = sanitizeData($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errorEmail = "Invalid email address";
        }
    }else{
        $errorEmail = "Email is required!";
    }

    if(!empty($_POST["cards"])){
        $cards = sanitizeData($_POST["cards"]);
     } else{
        $errorCards = "Cardtype is required! ";
      }


    if(!empty($_POST["cardNum"])){
        $cardNum = sanitizeData($_POST["cardNum"]);
        $cardNumber = str_replace(['-', ' '], '', $cardNum); 
        
        $typeMasterCard = '/^2\d{15}$/';
        $typeVisaCard = '/^3\d{15}$/';  

        if(strlen($cardNumber) === 16 && ctype_digit($cardNumber)) {
            if ($cards == 'Master Card' && preg_match($typeMasterCard, $cardNumber)) {
                // It's a valid Mastercard
            } elseif ($cards == 'Visa Card' && preg_match($typeVisaCard, $cardNumber)) {
                // It's a valid Visa card
            } else {
                $errorCardNum = "Invalid card number for the selected card type!";
            }
        } else {
            $errorCardNum = "Card number must be exactly 16 digits!";
        }
        } else{
            $errorCardNum = "Cardnumber is required! ";
        }

        if (!empty($errorN) || !empty($errorOptions) || !empty($errorQuan) || !empty($errorEmail) || !empty($errorCards) || !empty($errorCardNum)) {
            header('Location: thirdpage.php');
        }

    }
    
?>

<h3>Thank you <?php echo ucfirst($name)?>! Your order of <?php echo $quantity . " " . $options?> has been recorded!</h3>

<table>
    <thead>
    <tr>
        <th>Customer</th>
        <th>Comments</th>
        <th>Product</th>
        <th>Payment Method</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo ucfirst($name) ?></td>
        <td><?php 
        if(!empty($_POST["comments"])) {
            $comments = $_POST['comments'];
            echo $comments;
        } else {
            echo "No comments!";
        }
        ?></td>
        <td><?php 
            if (!empty($_POST['options'])) {
                $options = $_POST['options'];
                echo ($options);
            }
        ?></td>
        <td><?php 
            echo $cards;
        ?></td>

    </tr>
    </tbody>
</table>
    
</body>
</html>



