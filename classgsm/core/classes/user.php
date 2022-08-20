<?php 
class User
{
	protected $pdo;
	function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function cleanInput($val){
		$var = htmlspecialchars($val);
		$var = trim($val);
		$var = stripcslashes($val);
		return $var;
	}


	public function adminLogin($email, $password){
		$stm = $this->pdo->prepare("SELECT admin_email FROM admin WHERE admin_email = :admin_email AND password = :password");
		$stm->bindParam(':admin_email', $email, PDO::PARAM_STR);
		$stm->bindParam(':password', $password, PDO::PARAM_STR);
		$stm->execute();

		$user = $stm->fetch(PDO::FETCH_OBJ);
		$count = $stm->rowCount();
		if ($count >  0) {
			$_SESSION['admin_email'] = $user->admin_email;
			header("Location: admin-home.php");
		}else{
			return false;
		}
	}


	public function loginSubcriber($sub_email, $password){
		$stm = $this->pdo->prepare("SELECT sub_email FROM subscriber WHERE sub_email = :sub_email AND password = :password");
		$stm->bindParam(':sub_email', $sub_email, PDO::PARAM_STR);
		$stm->bindParam(':password', $password, PDO::PARAM_STR);
		$stm->execute();

		$user = $stm->fetch(PDO::FETCH_OBJ);
		$count = $stm->rowCount();
		if ($count >  0) {
			$_SESSION['sub_email'] = $user->sub_email;
			header("Location: subscriber.php");
		}else{
			return false;
		}
	}

	public function getUserInformation($id){
		$stm = $this->pdo->prepare("SELECT * FROM admin WHERE id = :id");
		$stm->bindParam(":id", $id, PDO::PARAM_INT);
		$stm->execute();
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function getAllAdminInformation(){
		$stm = $this->pdo->prepare("SELECT * FROM admin");
		$stm->execute();
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function logout(){
		$_SESSION = array();
		session_destroy();
		header("Location: ".BASE_URL."index.php");
	}

	public function checkAdminEmail($admin_email){
		$stm = $this->pdo->prepare("SELECT admin_email FROM admin WHERE admin_email = :admin_email");
		$stm->bindParam(":admin_email", $admin_email, PDO::PARAM_STR);
		$stm->execute();
		if($stm->rowCount() > 0){
			return true;
		}else{
			return false;
		}

	}

	public function checkSubEmail($admin_email){
		$stm = $this->pdo->prepare("SELECT sub_email FROM subscriber WHERE sub_email = :sub_email");
		$stm->bindParam(":sub_email", $sub_email, PDO::PARAM_STR);
		$stm->execute();
		if($stm->rowCount() > 0){
			return true;
		}else{
			return false;
		}

	}

	public function loggedIn(){
		return isset($_SESSION['user_id']) ? true : false;
	}

	public function registerSubscriber($lastname,$firstname,$sub_email,$dob,$sex,$password){
		$password = md5($password);
		$stm = $this->pdo->prepare("INSERT INTO subscriber(lastname,firstname,sub_email,dob,sex,password) VALUES(:lastname,:firstname,:sub_email,:dob,:sex,:password)");
		$stm->bindParam(":lastname", $lastname, PDO::PARAM_STR);
		$stm->bindParam(":firstname", $firstname, PDO::PARAM_STR);
		$stm->bindParam(":sub_email", $sub_email, PDO::PARAM_STR);
		$stm->bindParam(":dob", $dob, PDO::PARAM_STR);
		$stm->bindParam(":sex", $sex, PDO::PARAM_STR);
		$stm->bindParam(":password", $password, PDO::PARAM_STR);
		$stm->execute();
	}

	public function registerBaseStations($nsp,$city,$state,$no_of_channels,$no_of_connection){
		$stm = $this->pdo->prepare("INSERT INTO base_station(nsp,city,state,no_of_channels,no_of_connection) VALUES(:nsp,:city,:state,:no_of_channels,:no_of_connection)");
		$stm->bindParam(":nsp", $nsp, PDO::PARAM_STR);
		$stm->bindParam(":city", $city, PDO::PARAM_STR);
		$stm->bindParam(":state", $state, PDO::PARAM_STR);
		$stm->bindParam(":no_of_channels", $no_of_channels, PDO::PARAM_STR);
		$stm->bindParam(":no_of_connection", $no_of_connection, PDO::PARAM_STR);
		$stm->execute();
	}

	public function registerAdmin($lastname, $firstname, $admin_email, $password, $base_id){
		$password = md5($password);
		$stm = $this->pdo->prepare("INSERT INTO admin(lastname,firstname,password,admin_email,base_id) VALUES(:lastname, :firstname, :password, :admin_email, :base_id)");
		$stm->bindParam(":lastname", $lastname, PDO::PARAM_STR);
		$stm->bindParam(":firstname", $firstname, PDO::PARAM_STR);
		$stm->bindParam(":password", $password, PDO::PARAM_STR);
		$stm->bindParam(":admin_email", $admin_email, PDO::PARAM_STR);
		$stm->bindParam(":base_id", $base_id, PDO::PARAM_STR);
		$stm->execute();
		$id = $this->pdo->lastInsertId();
		$_SESSION['id'] = $id;
	}

	public function registerNetworkLine($sub_email,$nsp,$phone_no){
		$stm = $this->pdo->prepare("INSERT INTO network_line($sub_email,$nsp,$phone_no) VALUES(:sub_email,:nsp,:phone_no)");
		$stm->bindParam(":sub_email", $sub_email, PDO::PARAM_STR);
		$stm->bindParam(":nsp", $nsp, PDO::PARAM_STR);
		$stm->bindParam(":phone_no", $phone_no, PDO::PARAM_STR);
		$stm->execute();
	}

	
	public function checkPassword($password){
		$password = md5($password);
		$stm = $this->pdo->prepare("SELECT password FROM users WHERE password = :password");
		$stm->bindParam(":password", $password, PDO::PARAM_STR);
		$stm->execute();
		if($stm->rowCount() > 0){
			return true;
		}else{
			return false;
		}

	}

	public function updateUsername($username, $user_id){
		$stm = $this->pdo->prepare("UPDATE users SET username = :username WHERE user_id = :user_id");
		$stm->bindParam(":username", $username, PDO::PARAM_STR);
		$stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stm->execute();
		header("Location:signup.php?step=2");
	}

	public function updatePassword($password){
		$user_id = $_SESSION['user_id'];
		$password = md5($password);
		$stm = $this->pdo->prepare("UPDATE users SET password = :password WHERE user_id = :user_id");
		$stm->bindParam(":password", $password, PDO::PARAM_STR);
		$stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stm->execute();
	}

	public function updateProfileImage($fileRoot){
		$user_id = $_SESSION['user_id'];
		$stm = $this->pdo->prepare("UPDATE users SET profileImage = :profileImage WHERE user_id = :user_id");
		$stm->bindParam(":profileImage", $fileRoot, PDO::PARAM_STR);
		$stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stm->execute();
	}

	public function updateProfileCover($fileRoot){
		$user_id = $_SESSION['user_id'];
		$stm = $this->pdo->prepare("UPDATE users SET profileCover = :profileCover WHERE user_id = :user_id");
		$stm->bindParam(":profileCover", $fileRoot, PDO::PARAM_STR);
		$stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stm->execute();
	}

	public function userIdFromUsername($username){
		$stm = $this->pdo->prepare("SELECT user_id FROM users WHERE username = :username");
		$stm->bindParam(":username", $username, PDO::PARAM_STR);
		$stm->execute();
		$user = $stm->fetch(PDO::FETCH_OBJ);
		return $user->user_id;
	}

	public function updateUserInformation($screenName, $bio, $country, $website){
		$user_id = $_SESSION['user_id'];
		$stm = $this->pdo->prepare("UPDATE users SET screenName =:screenName, bio=:bio, country = :country, website = :website WHERE user_id = :user_id");
		$stm->bindParam(":screenName", $screenName, PDO::PARAM_STR);
		$stm->bindParam(":bio", $bio, PDO::PARAM_STR);
		$stm->bindParam(":country", $country, PDO::PARAM_STR);
		$stm->bindParam(":website", $website, PDO::PARAM_STR);
		$stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stm->execute();
	}

	public function updateUsernameAndEmail($username, $email){
		$user_id = $_SESSION['user_id'];
		$stm = $this->pdo->prepare("UPDATE users SET username = :username, email = :email WHERE user_id = :user_id");
		$stm->bindParam(":username", $username, PDO::PARAM_STR);
		$stm->bindParam(":email", $email, PDO::PARAM_STR);
		$stm->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stm->execute();
	}

	public function uploadImage($file){
		$img_name  = basename($file['name']);
		$img_temp  = $file['tmp_name'];
		$img_error = $file['error'];
		$img_size  = $file['size'];

		$ext      = explode('.', $img_name);
		$ext      = strtolower(end($ext));
		$allowed_ext  = array('png', 'jpeg', 'jpg');
		if (in_array($ext, $allowed_ext) === true) {
			if ($img_error === 0) {
				if ($img_size <= 2092372152) {
					$file_root = 'users/'.$img_name;
					move_uploaded_file($img_temp, $file_root);
					return $file_root;
				}else{
					$GLOBALS['error'] = "The image is too large";
				}
			}else{
				$GLOBALS['error'] = "Something went wrong";
			}
		}else{
			$GLOBALS['error'] = "The extension is not allowed";
		}

	}


	public function uploadCover($file){
		$img_name  = basename($file['name']);
		$img_temp  = $file['tmp_name'];
		$img_error = $file['error'];
		$img_size  = $file['size'];

		$ext      = explode('.', $img_name);
		$ext      = strtolower(end($ext));
		$allowed_ext  = array('png', 'jpeg', 'jpg');
		if (in_array($ext, $allowed_ext) === true) {
			if ($img_error === 0) {
				if ($img_size <= 2092372152) {
					$file_root = 'users/'.$img_name;
					move_uploaded_file($img_temp, $file_root);
					return $file_root;
				}else{
					$GLOBALS['error'] = "The image is too large";
				}
			}else{
				$GLOBALS['error'] = "Something went wrong";
			}
		}else{
			$GLOBALS['error'] = "The extension isnot allowed";
		}

	}

}


 ?>