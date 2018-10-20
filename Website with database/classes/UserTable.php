<?php

class UserTable {
    private $connection;
    private $roles;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->roles = array("name", "user", "admin");
    }

	public function insertUser($name, $email, $password, $role) {
         if (!isset($name)) {
            throw new Exception("name required");
        }
		if (!isset($email)) {
            throw new Exception("Email required");
        }
        if (!isset($password)) {
            throw new Exception("Password required");
        }
        if (!isset($role) || !in_array($role, $this->roles)) {
            throw new Exception("Role required");
        }
		//gets sql code ready to put into database
        $sql = "INSERT INTO users(name, email, password, role) "
             . "VALUES (:name, :email, :password, :role)";
		//asigns values into second part of sql code
        $params = array(
			'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role
        );
		// connects to database and prepares sql
        $stmt = $this->connection->prepare($sql);
		//puts in values into sql code and executes
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save user: " . $errorInfo[2]);
        }
		//returns what was inserted
        $id = $this->connection->lastInsertId('users');

        return $id;
    }
	
    public function insertProduct($product) {
        
        $sql = "INSERT INTO products(name, description, dimensions, category, price, image) "
             . "VALUES (:name, :description, :dimensions, :category, :price, :image)";

        $params = array(
				'name' => $product->getName(),
				'description' => $product->getDescription(),
				'dimensions' => $product->getDimensions(),
				'category' => $product->getCategory(),
				'price' => $product->getPrice(),
				'image' => $product->getImage()
        );

        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save product: " . $errorInfo[2]);
        }

        $new = $this->connection->lastInsertId('products');

        return $new;
    }

    public function deleteuser($id) {
        if (!isset($id) || $id === null) {
            throw new Exception("User id required");
        }

        $sql = "DELETE FROM users WHERE id = :id";

        $params = array('id' => $id);

        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not delete user: " . $errorInfo[2]);
        }

        return $stmt->rowCount();
    }
	
	public function deleteProduct($id) {
        if (!isset($id) || $id === null) {
            throw new Exception("User id required");
        }

        $sql = "DELETE FROM products WHERE id = :id";

        $params = array('id' => $id);

        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not delete user: " . $errorInfo[2]);
        }

        return $stmt->rowCount();
    }

    public function updateUser($id, $name, $email, $role) {
        if (!isset($id) || $id === null) {
            throw new Exception("User id required");
        }
         if (!isset($name)) {
            throw new Exception("Name required");
        }
        if (!isset($email)) {
            throw new Exception("Email required");
        }
        if (!isset($role) || !in_array($role, $this->roles)) {
            throw new Exception("Role required");
        }

        $sql = "UPDATE users SET "
                . "name = :name, "
                . "email = :email, "
                . "role = :role "
                . "WHERE id = :id";

        $params = array(
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'role' => $role
        );

        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not update user: " . $errorInfo[2]);
        }

        return $stmt->rowCount();
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = :id";
        $params = array('id' => $id);
        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }

        $row = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
        }
        return $row;
    }
	//gets users for delete
	public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = array('id' => $id);
        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }

        $row = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
        }
        return $row;
    }
	//used for log in system to judge against password on database and one input
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = array('email' => $email);
        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }
        $row = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
			
        }
        return $row;
    }
	//allows for category to only take one page by taking in varaible in url
    public function getProductByCategory($category) {
        $sql = "SELECT * FROM products WHERE category = :category";
       $params = array('category' => $category);
        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve category: " . $errorInfo[2]);
        }
		
		$products = array();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		while ($row != NULL) {
			$products[] = $row;
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
		}

        return $products;
    }
    
	public function updateProduct($product) {
        

        $sql = "UPDATE products SET "
                . "name = :name, "
                . "description = :description, "
                . "dimensions = :dimensions, "
                . "category = :category, "
				. "price = :price "
                . "WHERE id = :id";
				
				
		
			$params = array(
				'id' => $product->getId(),
				'name' => $product->getName(),
				'description' => $product->getDescription(),
				'dimensions' => $product->getDimensions(),
				'category' => $product->getCategory(),
				'price' => $product->getPrice()
			);

        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not update user: " . $errorInfo[2]);
        }

        return $stmt->rowCount();
    }
	//used to get all users for easy table use
	public function getAllusers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->connection->prepare($sql);
        $status = $stmt->execute();
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve category: " . $errorInfo[2]);
        }
		
		$users = array();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		while ($row != NULL) {
			$users[] = $row;
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
		}

        return $users;
    }
}

?>
