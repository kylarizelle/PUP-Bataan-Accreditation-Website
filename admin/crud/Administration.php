<? php 
session_start();

class Administration {

	private $con;

	function __construct()
	{
		include_once("pup.php");
		$db = new pup();
		$this->con = $db->connect();
	}

	public function getAdministration() {
		$q = $this->con->query("SELECT a.adminID, a.fullname, a.professionalname, a.image_, p.positionID, p.positionname, ar.areaID, ar.areaname FROM administration a JOIN position p ON p.positionID = a.positionID JOIN area ar ON ar.areaID = a.areaID"); 
			$administration = [];

			if ($q->num_rows > 0) {
				while ($row = $q->fetch_assoc()) {
				$administration[] = $row;
				}
				$_DATA['administration'] = $administration;
			}

		$position = [];
		$q = $this->con->query("SELECT * FROM position");
		if($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$position[] = $row;
			}
			$_DATA['position'] = $position;
		}

		$area = [];
		$q = $this->con->query("SELECT * FROM area");
		if($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$area[] = $row;
			}
			$_DATA['area'] = $area;
		}
		return ['status' => 202, 'message' => $_DATA];
	}

	public function addAdministration($fullname, $professionalname, $positionID, $areaID, $file) {

		$fileName = $file['name'];
		$fileNameAr = explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {

			if ($file['size'] > (1024 * 2)) {

				$uniqueImageName = time()."_".$file['name'];
				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/PUP/photos/".$uniqueImageName)) {
					
					$q = $this->con->query("INSERT INTO `administration` (`positionID`, `areaID`, `fullname`, `professionalname`, `image_`) VALUES ('$positionID', '$areaID', '$fullname', '$professionalname', '$image_')");

					if ($q) {
						return ['status'=> 202, 'message'=> 'Added Successfully!'];
					}
					else {
						return ['status'=> 303, 'message'=> 'Failed to run a query!'];
					}
				}
				else {
						return ['status'=> 303, 'message'=> 'Failed to upload image!'];
				}
			}
			else {
					return ['status'=> 303, 'message'=> 'Large Image, Max size allowed is 2MB!'];
			}
		}

		else {
				return ['status'=> 303, 'message'=> 'Invalid image format (valid Formats: jpg, jpeg, png)!'];
		}
	}

	public function editAdministrationWithImage($adminID, $fullname, $professionalname, $positionID, $areaID, $file) {

			$fileName = $file['name'];
			$fileNameAr = explode(".", $fileName);
			$extension = end($fileNameAr);
			$ext = strtolower($extension);

			if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
						
				if ($file['size'] > (1024 * 2)) {
							
					$uniqueImageName = time()."_".$file['name'];
					if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/PUP/photos/".$uniqueImageName)) {
								
						$q = $this->con->query("UPDATE `administration` SET
							`positionID` = '$positionID',
							`areaID` = '$areaID',
							`fullname` = '$fullname',
							`professionalname` = '$professionalname',
							`image_` = '$uniqueImageName'
							WHERE adminID = '$adminID'");

							if ($q) {
								return ['status' => 202, 'message' => 'Product modified successfully!'];
							}
							else {
									return ['status' => 303, 'message' => 'Failed to run query'];
							}
					}
					else {
						return ['status' => 303, 'message' => 'Failed to upload image'];
					}
				}
				else {
					return ['status' => 303, 'message' => 'Large Image, max size allowed 2MB'];
				}
			}
			else {
					return ['status' => 303, 'message' => 'Invalid image format (valid Formats : jpg, jpeg, png)'];
			}

	}

	public function editAdministrationWithoutImage($adminID, $fullname, $professionalname, $positionID, $areaID) {

		if ($adminID != null) {
			$q = $this->con->query("UPDATE `administration` SET
			`positionID`= '$positionID',
			`areaID` = '$areaID',
			`fullname` = '$fullname',
			`professionalname` = '$professionalname'
			WHERE adminID = '$adminID'");


			if ($q) {
				return ['status' => 202, 'message' => 'Product updated successfully!'];
			}
			else {
				return ['status' => 303, 'message' => 'Failed to run query!'];
			}
		}
		else {
				return ['status' => 303, 'message' => 'Invalid administration ID!'];
		}

	}

	public function getArea() {
		$q = $this->con->query("SELECT * FROM area");
		$ar = [];
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
			$ar[] = $row;
			}
		}
		return ['status' => 202, 'message' => $ar];
	}

	public function addPosition($name) {
		$q = $this->con->query("SELECT * FROM position WHERE positionID ='$name' LIMIT 1");
		if ($q->num_rows > 0) {
			return ['status' => 303, 'message' => 'Position already exists'];
		}
		else {
			$q = $this->con->query("INSERT INTO position (positionID) VALUES ('$name')");
			if ($q) {
				return ['status' => 202, 'message' => 'New position added successfully'];
			}
			else {
				return ['status' => 303, 'message' => 'Failed to run query'];
			}
		}
	}

	public function getPosition() {
		$q = $this->con->query("SELECT * FROM position");
		$ar = [];

		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
			$ar[] = $row;
			}
		}
		return ['status' => 202, 'message' => $ar];
	}

	public function deleteAdministration($adminID = null) {
		if ($adminID != null) {
			$q = $this->con->query("DELETE FROM administration WHERE adminID = '$adminID'");
				if ($q) {
					return ['status'=> 202, 'message'=> 'Successfully remove'];
				}
				else {
					return ['status'=> 202, 'message'=> 'Failed to run query'];
				}
		}
		else {
			return ['status'=> 303, 'message'=> 'Invalid administration ID'];
		}

	}

	public function deletePosition($positionID = null) {
		if ($positionID != null) {
			$q = $this->con->query("DELETE FROM position WHERE positionID = '$positionID'");
			if ($q) {
				return ['status' => 202, 'message' => 'Position remove!'];
			}
			else {
				return ['status' => 303, 'message' => 'Failed to run query'];
			}
		}
		else {
			return ['status' => 303, 'message' => 'Invalid Position ID'];
		}
	}

	public function updatePosition ($post = null) {
		extract($post);
		if (!empty($positionID) && !empty($p_positionname)) {
			$q = $this->con->query("UPDATE position SET positionname = 'p_positionname' WHERE positionID = '$positionID'");
			if ($q) {
				return ['status'=> 202, 'message' => 'Position updated'];
			}
			else {
				return ['status' => 202, 'message' => 'Failed to run query'];
			}
		}
		else {
			return ['status'=> 303, 'message'=> 'Invalid position ID'];
		}
	}
								
}

if (isset($_POST['GET_ADMINISTRATION'])) {
	if (isset($_SESSION['admin_id'])) {
		$a = new Administration();
		echo json_encode($a->getAdministration());
		exit();
	}
}

if (isset($_POST['add_administration'])) {
	extract($_POST);
	if (!empty($fullname)
	&& !empty($professionalname)
	&& !empty($positionID)
	&& !empty($areaID)
	&& !empty($_FILES['image_'] ['name'])) {

		$a = new Administration();
		$result = $a->addAdministration($fullname,
										$professionalname,
										$positionID,
										$areaID,
										$_FILES['image_']);

		header("Content-type: application/json");
		echo json_encode($result);
		http_response_code($result['status']);
		exit();
	}
	else {
		echo json_encode(['status' => 303, 'message' => 'Empty fields']);
		exit();
	}
}

if (isset($_POST['edit_administration'])) {
	extract($_POST);
	if (!empty($fullname)
	&& !empty($professionalname)
	&& !empty($positionID)
	&& !empty($areaID)) {

		$a = new Administration();

		if (isset($_FILES['e_image_']['name'])
			&& !empty($_FILES['e_image_']['name'])) {
			$result = $a->editAdministrationWithImage($adminID,
													  $e_fullname,
													  $e_professionalname,
													  $e_positionID,
													  $e_areaID,
													  $_FILES['e_image_']);
		}
		else {
			$result = $a->editAdministrationWithoutImage($adminID,
													  	 $e_fullname,
													  	 $e_professionalname,
													 	 $e_positionID,
													  	 $e_areaID);
		}
		echo json_encode($result);
		exit();
	}
	else{
		echo json_encode(['status' => 303, 'message' => 'Empty fields']);
		exit();
	}
}

if (isset($_POST['GET_AREA'])) {
	$a = new Administration();
	echo json_encode($a->getArea());
	exit();
}

if (isset($_POST['add_position'])) {
	if (isset($_SESSION['admin_id'])) {
		$positionname = $_POST['positionname'];
		if (!empty($positionname)) {
			$a = new Administration();
			echo json_encode($a->addPosition($positionname));
		}
		else {
			echo json_encode(['status' => 303, 'message' => 'Empty fields']);
		}
	}
	else {
		echo json_encode(['status' => 303, 'message' => 'Session Error']);
	}
}

if (isset($_POST['GET_POSITION'])) {
	$a = new Administration();
	echo json_encode($a->getPosition());
	exit();
}

if (isset($_POST['DELETE_ADMINISTRATION'])) {
	$a = new Administration();
	if (isset($_SESSION['admin_id'])) {
		if (!empty($_POST['adminID'])) {
			$adminID = $_POST['adminID'];
			echo json_encode($a->deleteAdministration($adminID));
			exit();
		}
		else {
			echo json_encode(['status'=> 303, 'message' => 'Invalid administration ID']);
			exit();
		}
	}
	else {
		echo json_encode(['status'=> 303, 'message' => 'Invalid Session']);
	}
}

if (isset($_POST['DELETE_POSITION'])) {
	if (!empty($_POST['positionID'])) {
		$a = new Administration();
		echo json_encode($a->deletePosition($_POST['positionID']));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}

if (isset($_POST['edit_position'])) {
	if (!empty($_POST['positionID'])) {
		$a = new Administration();
		echo json_encode($a->updatePosition($_POST));
		exit();
	}
	else {
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}

?>