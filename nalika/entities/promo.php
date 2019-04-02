<?PHP
class promo{
	private $code;
	private $title;
	private $discount;
	private $price;
	function __construct($code,$title,$discount,$price){
		$this->code=$code;
		$this->title=$title;
		$this->discount=$discount;
		$this->price=$price;

	}
	
	function getCode(){
		return $this->code;
	}
	function getTitle(){
		return $this->title;
	}
	function getDiscount(){
		return $this->discount;
	}
	function getPrice(){
		return $this->price;
	}

	function setTitle($title){
		$this->title=$title;
	}
	function setDiscount($discount){
		$this->discount=$discount;
	}
	
	function setPrice($price){
		$this->price=$price;
	}

	
}

?>