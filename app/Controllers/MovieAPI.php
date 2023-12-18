<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\MovieAuth;
use App\Models\Movie;
class MovieAPI extends ResourceController
{
    protected $format = 'json';
    protected $movieModel;

    public function __construct()
    {
        $this->movieModel = new Movie();
    }

    public function index($seg1=null, $seg2=null){
        $model = model(MovieAuth::class);
        $email = $seg1;
        $pass = md5($seg2);
        $cek = $model->getDataAuthentication($email, $pass); 
        if ($cek == 0) { 
            return("Wrong Authentication!"); } 
            else { 
                $model1 = model(Movie::class); 
            $data = ['message' => 'success',
                    'movie' => $model1->getDataMovie()];
            return $this->respond($data,200);
    }
    }
}
