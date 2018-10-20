<?php
class Product {
	private $name;
	private $des;
	private $dim;
	private $category;
	private $price;
	private $image;
	
	
	
	public function __construct($id, $name, $des, $dim, $category, $price, $image) {
		$this->id = $id;
		$this->name = $name;
		$this->description = $des;
		$this->dimensions = $dim;
		$this->category = $category;
		$this->price = $price;
		$this->image = $image;
	}
	
	
	
	public function getId() { return $this->id; }
	public function getName() { return $this->name; }
	public function getDescription() { return $this->description; }
	public function getDimensions() { return $this->dimensions; }
	public function getCategory() { return $this->category; }
	public function getPrice() { return $this->price; }
	public function getImage() { return $this->image; }
}

?>
