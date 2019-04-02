<?PHP
ob_start();
include "../core/photoCore.php";
include"../views/product-detail.html";
 $photoCore1 = new PhotoCore();
if(isset($_POST["id"]))
{
$connect = mysqli_connect("localhost", "root", "", "tttt");

        $photoCore1->delete($connect,$_POST["id"]);
 	header('Location: afficher.php');
 }
?>
