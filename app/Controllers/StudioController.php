<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\StudioModel;
class StudioController extends ResourceController
{
    protected $format = 'json';
    protected $studioModel;

    public function __construct()
    {
        $this->studioModel = new StudioModel();
    }

    public function index()
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        // Fetch all studios
        $studioModel = new StudioModel();
        $data['studios'] = $studioModel->getDataStudio();
        return view('layoutatas', $data).view('studioview').view('layoutbawah');// create view and return response
    }

    public function generateSeats($capacity) 
    {
        $generatedSeats = [];
        $rows = range('A', 'J');
        $seatsPerRow = ceil($capacity / count($rows)); // Calculate seats per row
        
        foreach ($rows as $row) {
            for ($j = 1; $j <= $seatsPerRow && count($generatedSeats) < $capacity; $j++) {
                $generatedSeats[] = $row . $j;
            }
        }
        
        // If there's any remaining capacity, distribute it across rows
        $remaining = $capacity - count($generatedSeats);
        if ($remaining > 0) {
            $index = 0;
            while ($remaining > 0) {
                $generatedSeats[$index] .= ++$j;
                $remaining--;
                $index = ($index + 1) % count($rows);
            }
        }
        return $generatedSeats;
    }

    public function create() 
    {
        $studioName = esc($this->request->getPost('studioName'));

        // Check if the studio name already exists
        $existingStudio = $this->studioModel->where('studioName', $studioName)->first();
    
        if ($existingStudio !== null) {
            return redirect()->to(base_url('studio'))->with('errorAddStudio', 'Studio with the same name already exists!');
        }

        $capacity = $this->request->getPost('capacity');
    
        // Validate the capacity value
        if (!is_numeric($capacity) || $capacity <= 0 || $capacity > 100) {
            return redirect()->to(base_url('studio'))->with('invalidCapacity', 'Invalid capacity. Please provide a value between 1 and 100!');
        }
    
        // Insert data into the studio table
        $data = [
            'studioName' => $studioName,
            'status' => esc($this->request->getPost('status')),
            'capacity' => $capacity,
            'generated_seats' => json_encode($this->generateSeats($capacity)) // Store the generated seats as JSON
        ];
    
        $this->studioModel->insert($data);

        return redirect()->to(base_url('studio'))->with('successAddStudio', 'Studio data created successfully.');
    }

    public function update($studioID = null)
    {
        // Get input data
        $capacity = $this->request->getPost('capacity');
        $availability = $this->request->getPost('availability');

        // Fetch the existing studio details
        $studio = $this->studioModel->findStudioByID($studioID);

        // Prepare update data
        $updateData = [];
        if (!empty($capacity)) {
            $updateData['capacity'] = $capacity;
            $updateData['generated_seats'] = json_encode($this->generateSeats($capacity));
        }
        if ($availability !== null && $availability !== $studio['status']) {
            $updateData['status'] = $availability;
        }

        // Perform update only if there's any data to update
        if (!empty($updateData)) {
            $this->studioModel->where('studioID', $studioID)->set($updateData)->update();
            return redirect()->to(base_url('studio'))->with('successUpdateStudio', 'Studio updated successfully.');
        }
        return redirect()->to(base_url('studio'))->with('noDataUpdateStudio', 'No data to update!');
    }

    public function delete($studioID = null)
    {
        $deleted = $this->studioModel->deleteStudio($studioID);

        if ($deleted) {
            return redirect()->to(base_url('studio'))->with('successDeleteStudio', 'Studio deleted successfully.');
        }
}
}
