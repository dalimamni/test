<?PHP
include "../core/promoc.php";
$promoC=new promoC();
if (isset($_POST["code"])){
	$promoC->supprimerpromo($_POST["code"]);
	header('Location: afficherpromo.php');
}

?>