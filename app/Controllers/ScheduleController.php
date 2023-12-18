<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\ScheduleModel;
use App\Models\Movie;
use App\Models\StudioModel;

class ScheduleController extends BaseController
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
        $movieModel = new Movie();
        $studioModel = new StudioModel();
        $scheduleModel = new ScheduleModel();

        $data['movies'] = $movieModel->findAll();
        $data['studios'] = $studioModel->where('status', 1)->findAll();
        $data['schedules'] = $scheduleModel->findAll(); 

        // Load the view with data
        return view('layoutatas', $data).view('scheduleview').view('layoutbawah');
    }

    public function create()
    {
        // Fetch the necessary data for the selected movie and studio
        $movieID = $this->request->getVar('movieID');
        $studioID = $this->request->getVar('studioID');
        $showtime = $this->request->getVar('showtime');
        $price = $this->request->getVar('price');
    
        // Fetch movie title and studio name from their respective tables
        $movie = $this->movieModel->findMovieByID($movieID);

        // Calculate end time of the new schedule
        $endTime = date('Y-m-d H:i:s', strtotime($showtime . ' + ' . $movie['durationInMins'] . ' minutes'));
        $existingSchedules = $this->scheduleModel->getSchedulesForStudio($studioID);

        // Check for overlap with existing schedules
        foreach ($existingSchedules as $schedule) {
            $movieDuration = $this->movieModel->findMovieByID($schedule['movieID'])['durationInMins'];
            $scheduleEndTime = date('Y-m-d H:i:s', strtotime($schedule['showtime'] . ' + ' . ($movieDuration + 30) . ' minutes'));
        
            // Check if the new schedule overlaps with an existing one
            if (($showtime >= $schedule['showtime'] && $showtime <= $scheduleEndTime) ||
                ($endTime >= $schedule['showtime'] && $endTime <= $scheduleEndTime) ||
                ($showtime <= $schedule['showtime'] && $endTime >= $scheduleEndTime)) {
                // Overlapping schedules found
                return redirect()->to(base_url('schedule'))->with('errorAddSchedule', 'Studio is not available at that showtime!');
            }
        }

        // Insert data into the relation table
        $this->scheduleModel->insertSchedule($movieID, $studioID, $showtime, $price);
        return redirect()->to(base_url('schedule'))->with('successAddSchedule', 'Relation is created! Check the schedule list on dashboard page.');
    }
    public function delete($scheduleID = null)
    {
        $deleted = $this->scheduleModel->deleteSchedule($scheduleID);
    
        if ($deleted) {
            return redirect()->to('')->with('successDeleteSchedule', 'Schedule deleted successfully!');
        } 
    }
}
