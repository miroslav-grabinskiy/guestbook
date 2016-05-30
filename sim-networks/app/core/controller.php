<?
namespace App\Core;

	abstract class Controller {
		
		protected $model;
		protected $view;
		
		function __construct()
		{
			$this->view = new View();
		}
		
		abstract function action_index();
	}
?>