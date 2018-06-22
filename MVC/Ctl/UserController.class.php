<?php
namespace MVC\Ctl;

class UserController extends \MVC\Ctl\Controller
{

	public function show()
	{
		$user_model = new \MVC\Model\UserModel();
		$result = $user_model->getUsers(); // array("id"=>1)
		\core\Db::close();
		$view = new \MVC\View\UserView();
		$html = $view->showUsersInfo($result);
		echo $html;
	}

	public function info()
	{
		$user_model = new \MVC\Model\UserModel();
		$result = $user_model->getUser(); // array("id"=>1)
		\core\Db::close();
		$view = new \MVC\View\UserDetailsView();
		$html = $view->showUserInfo($result);
		echo $html;
	}

	public function createForm(array $params)
    {
        $user_model = new \MVC\Model\UserModel();
		$result = $user_model->getUsers(); // array("id"=>1)
		\core\Db::close();
        $view = new \MVC\View\UserCreateForm();
        $html = $view->show($result);
        echo $html;
	}
	
	public function createUser($params)
    {
        if (empty($params["name"]))
            return false;
        if (empty($params["surname"]))
            return false;
        $user_model = new \MVC\Model\UserModel();
        $user_model->createUser($params);
        header("location: /user/show");
        return true;
    }

	public function deleteForm(array $params)
    {
        $user_model = new \MVC\Model\UserModel();
		$result = $user_model->getUsers(); // array("id"=>1)
		\core\Db::close();
        $view = new \MVC\View\UserDeleteForm();
        $html = $view->show($result);
        echo $html;
	}
		
	public function deleteUser($params)
	{
		//if (empty($params["id"]))
            //return false;
		$user_model = new \MVC\Model\UserModel();
		$user_model->deleteUser($params); // array("id"=>1)
		header("location: /user/show");
        return true;
	}
}
?>