<?PHP
include "../entities/promo.php";
include "../core/promoc.php";

if (isset($_POST['code']) and isset($_POST['title']) and isset($_POST['discount']) and isset($_POST['price'])){
$promo1=new promo($_POST['code'],$_POST['title'],$_POST['discount'],$_POST['price']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$promo1C=new promoC();
$promo1C->ajouterpromo($promo1);
header('Location:afficherpromo.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>