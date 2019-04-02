<?PHP
include "../config.php";
class promoC {
function afficher($promo){
		echo "Code: ".$promo>getCode()."<br>";
		echo "Title: ".$promo->getTitle()."<br>";
		echo "Discount: ".$promo->getDiscount()."<br>";
		echo "Price: ".$promo->getPrice()."<br>";
		//fecho "New price: ".$promo->getNewprice()."<br>";
	}
	/*function calculer($promo){
		echo $promo->getPrice() -($promo->getprice() * ($promo->getDiscount() / 100));
	}*/
	function ajouterpromo($promo){
		$sql="insert into promo (code,title,discount,price) values (:code, :title,:discount,:price)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $code=$promo->getCode();
        $title=$promo->getTitle();
        $discount=$promo->getDiscount();
        $price=$promo->getPrice();
		$req->bindValue(':code',$code);
		$req->bindValue(':title',$title);
		$req->bindValue(':discount',$discount);
		$req->bindValue(':price',$price);
	
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherpromo(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From promo";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function supprimerpromo($code){
		$sql="DELETE FROM promo where code= :code";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':code',$code);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierpromo($promo,$code){
		$sql="UPDATE promo SET code=:codee, title=:titlee,discount=:discountt,price=:pricee WHERE code=:code";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$codee=$promo->getCode();
        $title=$promo->getTitle();
        $discount=$promo->getDiscount();
        $price=$promo->getPrice();
		$datas = array(':codee'=>$code , ':titlee'=>$title,':discountt'=>$discount,':pricee'=>$price);
		$req->bindValue(':codee',$codee);
		$req->bindValue(':code',$code);
		$req->bindValue(':titlee',$title);
		$req->bindValue(':discountt',$discount);
		$req->bindValue(':pricee',$price);
		
		
          $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		

	}


		function recupererpromo($code){
		$sql="SELECT * from promo where code=$code";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
}
?>