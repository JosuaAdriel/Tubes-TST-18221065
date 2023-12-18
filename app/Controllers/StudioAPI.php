<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\StudioModel;
use App\Models\StudioAuth;
class StudioAPI extends ResourceController
{
    protected $format = 'json';
    protected $studioModel;

    public function __construct()
    {
        $this->studioModel = new StudioModel();
    }

    public function index($seg1=null, $seg2=null){
        $model = model(StudioAuth::class);
        $email = $seg1;
        $pass = md5($seg2);
        $cek = $model->getDataAuthentication($email, $pass); 
        if ($cek == 0) { 
            return("Wrong Authentication!"); } 
            else { 
                $model1 = model(StudioModel::class); 
            $data = ['message' => 'success',
                    'studio' => $model1->getDataStudio()];
            return $this->respond($data,200);
    }
    }
}
