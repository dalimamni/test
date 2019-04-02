<HTML>
<head>
</head>
<body>
<?PHP
include "../entities/promo.php";
include "../core/promoc.php";
	$promoC=new promoC();
    $result=$promoC->recupererpromo($_GET['code']);
	foreach($result as $row){
		$code=$row['code'];
		$titlee=$row['title'];
		$discountt=$row['discount'];
		$pricee=$row['price'];
	
?>
<form method="POST">
<table>
<caption>Modifier Employe</caption>
<tr>
<td>Code</td>
<td><input type="number" name="code" value="<?PHP echo $code ?>"></td>
</tr>
<tr>
<td>Title</td>
<td><input type="titlee" name="titlee" value="<?PHP echo $titlee ?>"></td>
</tr>
<tr>
<td>Discount</td>
<td><input type="discountt" name="discountt" value="<?PHP echo $discountt ?>"></td>
</tr>
<tr>
<td>Price</td>
<td><input type="number" name="pricee" value="<?PHP echo $pricee ?>"></td>
</tr>

<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="code_ini" value="<?PHP echo $_GET['code'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}

if (isset($_POST['modifier'])){
	$promo=new promo($_POST['code'],$_POST['titlee'],$_POST['discountt'],$_POST['pricee']);
	$promoC->modifierpromo($promo,$_POST['code_ini']);
	echo $_POST['code_ini'];
	header('Location: afficherpromo.php');
}
?>
</body>
</HTMl>