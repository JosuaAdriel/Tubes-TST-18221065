<?php
namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\ScheduleModel;
use App\Models\Movie;
use App\Models\StudioModel;

class Home extends BaseController
{
    use ResponseTrait;

    protected $movieModel;
    protected $studioModel;
    protected $scheduleModel;

    public function __construct()
    {
        $this->movieModel = new Movie(); // Initialize the Movie model
        $this->studioModel = new StudioModel();
        $this->scheduleModel = new ScheduleModel();
    }

    public function index()
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
            }      
        // Fetch available movies, studios, and other required data
        $scheduleModel = new ScheduleModel();
        $data['schedules'] = $scheduleModel->getScheduleDetails(); 

        // Load the view with data
        return view('layoutatas', $data).view('dashboard').view('layoutbawah');
    }

}
