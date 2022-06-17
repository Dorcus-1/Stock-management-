<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
		<?php foreach($data as $me){
		
		?>	

    <h1>Inventories</h1>
<form action='' name='process' method="POST">
     <div class="row">
     <label>quantity</label><input type="text" name="quantity" placeholder="Enter Quantity" value=<?=$me['quantity']?> required>
    </div>
    <div class="row">
        <label>ProductId</label><input type="number" placeholder="Enter your productId" name="productId"value=<?=$me['productId']?>>
    </div>
	<?php

}?>
       <div class="row-two" id="row">
       <!-- <button name="changePassword" onclick="this.value = 'someValue'" id ="btn">Change password</button> -->
        <input type="submit" name="updateinventory" value="submit"  id ="btn"required>
       </div>
       
  </form>
    </div>

</body>
</html>
