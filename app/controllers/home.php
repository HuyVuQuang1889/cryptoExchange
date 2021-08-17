<?php

class Home extends Controller 
{
    public function index($name = '')
    {
        $user = $this->model('User');
        $user->name = $name;
        /* echo $user->name; */
        /* Why it turn into a string??? */
        var_dump($user->name);
        $this->view('home/index', ['name' => $user->name]);
		}


}

?>
