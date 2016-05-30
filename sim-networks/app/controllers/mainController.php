<?php
use App\Models\MainModel;
use App\Core\Controller;
use App\Core\View;

	class MainController extends Controller {
		public $model;
		public $view;

		function __construct() {
			//$model = new MainModel;
			$this->view = new View;
			$this->model = new MainModel;
		}

		function action_index() {
			$data = $this->model->getData();
			$data->title = "Hello";

			$this->view->generate('main_view.php', 'template_view.php', $data);
		}


		function action_feedback() {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];

			$feedback = [
				"name" => $name,
				"email" => $email,
				"message" => $message
			];

			$response = $this->model->addFeedback($feedback);
			$response = json_encode($response);
			echo $response;
		}


		function action_delete_feedback() {
			$commentId = $_POST['commentId'];
			$data = $this->model->deleteFeedback($commentId);

		}
	}
?>