<?php
namespace App\Models;
use App\Core\Model;
use App\Config\Config;
use App\Config\Db;
use PDO;

	class MainModel extends Model {
		private $db;

		public function __construct() {
			$dsn = "mysql:host=" . Config::getDbHost() . ";dbname=" . Config::getDbName();
			$opt = array(
			    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			);

			$db = new PDO($dsn, Config::getDbLogin(), Config::getDbPass(), $opt);
			$db->exec('SET CHARACTER SET utf8');
			$this->db = $db;
		}

		public function getData() {
			$sql = "SELECT comments.message AS message,
						   comments.c_id AS commentId,
						   users.name AS userName,
						   users.email AS userEmail
					FROM comments INNER JOIN users ON comments.user_id = users.u_id
					ORDER BY comments.c_id DESC";
			$stmt = $this->db->query($sql);
			$resultArray = $stmt->fetchAll();
			return $resultArray;
		}

		public function addFeedback($data) {
			$name = $_POST["name"];
			$email = $_POST["email"];
			$message = $_POST["message"];

			$errorMessage = $this->validateFeedback($name, $email, $message);

			if ($errorMessage) {
				$response = [
					'result' => 'error',
					'errmsg' => $errorMessage
				];
				return $response;
			}

			$userId = $this->getUserId($name, $email);

			if ( !$userId ) {
				$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
				$stmt = $this->db->prepare($sql);
				$stmt = $stmt->execute( array('name' => $name, 'email' => $email) );
				$userId = $this->getUserId($name, $email);
			}

			$sql = "INSERT INTO comments (message, user_id) VALUES (:message, :userId)";
			$stmt = $this->db->prepare($sql);
			$stmt = $stmt->execute( array('message' => $message, 'userId' => $userId) );

			$response = [
				'result' => 'success'
			];

			return $response;

		}

		private function getUserId($name, $email) {
			/* dont work. WTF?!! upgrade later.

				$sql = "SELECT u_id FROM users WHERE name=:name AND email=:email";
				$stmt = $this->db->prepare($sql);
				$stmt = $stmt->execute( array('name' => $name, 'email' => $email) );
				$resultArray = $stmt->fetch(PDO::FETCH_ASSOC);                               <-- error
			*/
			/* pls, dont use this hole*/
			$sql = "SELECT u_id FROM users WHERE name='{$name}' AND email='{$email}'";
			$stmt = $this->db->query($sql);
			$resultArray = $stmt->fetchAll();
			/* thx */
			$userId = $resultArray[0]["u_id"];
			return $userId;
		}

		private function validateFeedback($name, $email, $message) {
			$errorMessage = [];

			if ( !is_string($name) || strlen($name) >= 16 || strlen($name) < 3) {
				$errorMessage['errorName'] = 'incorrect name';
			}

			if ( !is_string($email) || !preg_match('/.+@.+\..+/i', $email) ) {
				$errorMessage['errorMail'] = 'incorrect email';
			}

			if ( !is_string($message) || strlen($message) <= 4 || strlen($message) > 120)  {
				$errorMessage['errorMessage'] = 'incorrect message';
			}

			return $errorMessage;
		}

		public function deleteFeedback($commentId) {
			$commentId = intval($commentId);

			if ( !is_int($commentId)) {
				echo 'you are hacker';
				return;
			}

			$sql = "DELETE FROM comments WHERE c_id = {$commentId}";
			echo $sql;
			echo 4;
			$stmt = $this->db->query($sql);
		}

	}
?>