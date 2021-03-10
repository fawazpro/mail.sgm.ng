<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Mail extends ResourceController
{
	public function index()
	{
		echo 1234;
	}
	public function me()
	{
		echo "nhfgutikyityikyiyi";
	}

	public function create()
	{
		$apps = new \App\Models\Apps();

		$incoming = $this->request->getPost();

		$dbdetails = $apps->where('appcode', $incoming['app'])->find();

		if (!empty($dbdetails[0])) {
            $data = [
                'host' => $dbdetails[0]['server'],
                'user' => $dbdetails[0]['sender_email'],
                'pass' => $dbdetails[0]['sender_password'],
                'port' => $dbdetails[0]['port'],
                'rec' => $dbdetails[0]['reciever'],
                'to' => $incoming['email'],
                'subject' => 'Contact Message from your Website: '.$incoming['fname'],
                'message' => $incoming['message'].'<br> from '.$incoming['email'],
                'url' => $incoming['url'],
            ];
            echo('data sent');
            $this->mailer($data);
		} else {
            return $this->failUnauthorized('Invalid Request');
		}
	}

	private function mailer(array $data)
	{
        echo('Mailer Recieved');

		$config['protocol'] = 'smtp';
		$config['newline'] = "\r\n";
		$config['mailPath'] = '/usr/sbin/sendmail';
		$config['mailType']  = 'html';
		$config['SMTPHost']  = $data['host'];
		$config['SMTPUser']  = $data['user'];
		$config['SMTPPass']  = $data['pass'];
		$config['SMTPPort']  = $data['port'];
		$config['wordWrap'] = true;

		$email = \Config\Services::email($config);
        echo('Email Configed');

		$email->setFrom($data['user'], 'Webmaster');
		$email->setTo($data['rec']);
		// $email->setCC('another@another-example.com');
		// $email->setBCC('them@their-example.com');

		$email->setSubject($data['subject']);
		$email->setMessage($data['message']);

		$email->send(true);
        echo('Beyond sends');
        
		// return redirect()->to($data['url']);
		var_dump($email->printDebugger(['headers', 'subject', 'body']));
	}

	//--------------------------------------------------------------------

	// $routes->get('photos/new',             'Photos::new');
	// $routes->post('photos',                'Photos::create');
	// $routes->get('photos',                 'Photos::index');
	// $routes->get('photos/(:segment)',      'Photos::show/$1');
	// $routes->get('photos/(:segment)/edit', 'Photos::edit/$1');
	// $routes->put('photos/(:segment)',      'Photos::update/$1');
	// $routes->patch('photos/(:segment)',    'Photos::update/$1');
	// $routes->delete('photos/(:segment)',   'Photos::delete/$1');

}
