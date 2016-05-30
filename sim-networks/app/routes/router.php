<? 

namespace App\Routes;

	class Router {
		private $url;
		private $arrUrl;
		private $controller;
		private $action;
		private $parameter;

		public function __construct() {
			$url = $_GET['url'];

			if (!$url) {
				$url = 'main/index';
			}

			$this->url = $url;
			$this->urlToActions();
		}

		private function urlToActions() {
			$arrUrl = rtrim($this->url, '/');
			$arrUrl = explode('/', $arrUrl);


			if ( isset($arrUrl[0]) ) {
				$this->controller = $arrUrl[0] . 'Controller';
			}

			if ( isset($arrUrl[1]) ) {
				$this->action = 'action_' . $arrUrl[1];
			}

			if ( isset($arrUrl[2]) ) {
				$this->parameter = $arrUrl[2];
			}

			$this->arrUrl = $arrUrl;
			//print_r($this->arrUrl);
		}

		public function runApp() {
			require_once $_SERVER["DOCUMENT_ROOT"] . '/app/' . 'controllers/'. $this->controller. '.php';
			$controller = new $this->controller;
			$action = $this->action;
			$parameter = $this->parameter;

			if ( isset($parameter) ) {
				$controller->$action($parameter);
			} else {
				if ( isset($action) ) {
					$controller->$action();
				}
			}
		}
	}

?>