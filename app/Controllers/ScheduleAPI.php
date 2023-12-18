<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ScheduleAuth;
use CodeIgniter\API\ResponseTrait;
use App\Models\ScheduleModel;

class ScheduleAPI extends ResourceController
{
    use ResponseTrait;
    protected $scheduleModel;

    public function __construct()
    {
        $this->scheduleModel = new ScheduleModel();
    }

    public function index($seg1=null, $seg2=null){
        $model = model(ScheduleAuth::class);
        $email = $seg1;
        $pass = md5($seg2);
        $cek = $model->getDataAuthentication($email, $pass); 
        if ($cek == 0) { 
            return("Wrong Authentication!"); } 
            else { 
                $model1 = model(ScheduleModel::class); 
            $data = ['message' => 'success',
                    'schedule' => $model1->getDataSchedule()];
            return $this->respond($data,200);
    }
    }

}
