<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Movie;
class MovieController extends ResourceController
{
    protected $format = 'json';
    protected $movieModel;

    public function __construct()
    {
        $this->movieModel = new Movie(); // Initialize Foodmart model
    }
    public function index()
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        $model = model(Movie::class); //ini ngebuat sebuah instance yang nampung model movie
        $data['movie'] = $model->getDataMovie(); //ini ngebuat sebuah array yang nampung data dari model movie
        return view('layoutatas', $data).view('movie').view('layoutbawah'); // create view and return response
    } 

    public function create() 
    {
        $movieTitle = esc($this->request->getPost('title'));

        if (!$this->validate([
            'posterImg' => 'uploaded[posterImg]|max_size[posterImg,2048]|is_image[posterImg]|mime_in[posterImg,image/jpg,image/jpeg,image/png]',
        ])) {
            return redirect()->to(base_url('/movie'))->with('errorUploadPosterImg', 'Wrong input for poster image!');
        }

        //upload poster
        $posterImg = $this->request->getFile('posterImg');
        $namaPoster = $posterImg->getClientName();
        $posterImg->move('posterImg', $namaPoster);

        // Cek apakah ada judul film yang sama
        $existingMovie = $this->movieModel->where('title', $movieTitle)->first();
    
        if ($existingMovie !== null) {
            return redirect()->to(base_url('/movie'))->with('errorAddMovie', 'Movie with the same name already exists!');
        }

        $this->movieModel->insert([
            'title' => $movieTitle,
            'synopsis' => esc($this->request->getVar('synopsis')),
            'genre' => esc($this->request->getVar('genre')),
            'durationInMins' => esc($this->request->getVar('durationInMins')),
            'director' => esc($this->request->getVar('director')),
            'cast' => esc($this->request->getVar('cast')),
            'posterImg' => $namaPoster
        ]);
        return redirect()->to(base_url('/movie'))->with('successAddMovie', 'Movie added successfully.');
        //return $this->respondCreated($response);
    }

    public function update($movieID = null) 
    {
        $requestData = $this->request->getPost();
    
        // Validate if movieID parameter exists
        // if (!$movieID) {
        //     return $this->failValidationError('Movie ID is required.');
        // }
        $dataToUpdate = [];
        $fillableFields = ['title', 'synopsis', 'genre', 'durationInMins', 'director', 'cast'];
    
        foreach ($fillableFields as $field) {
            if (isset($requestData[$field]) && $requestData[$field] !== '') {
                $dataToUpdate[$field] = $requestData[$field];
            }
        }
    
        if (empty($dataToUpdate)) {
            return redirect()->to(base_url('/movie'))->with('noNewDataMovie', 'No valid data to update!');
            //return $this->failValidationError('No valid data to update.');
        }
    
        // Update specified columns for the records with the specified movieID
        $affectedRows = $this->movieModel
            ->where('movieID', $movieID)
            ->set($dataToUpdate)
            ->update();
        return redirect()->to(base_url('/movie'))->with('successUpdateMovie', 'Movie updated successfully.');
        // if ($affectedRows > 0) {
        //     return $this->respond(['message' => 'Columns updated successfully'], 200);
        // } else {
        //     return $this->respond(['message' => 'No matching records found for the given Movie ID'], 500);
        // }
    }

    public function delete($movieID = null)
    {
        // if ($movieID === null) {
        //     return $this->failValidationError('Movie ID is required.');
        // }
        $gambarDb = $this->movieModel->findMovieByID($movieID);
        if($gambarDb['posterImg'] != ''){
            unlink('posterImg/'.$gambarDb['posterImg']);
        }
        $deleted = $this->movieModel->deleteMovie($movieID);
    
        if ($deleted) {
            return redirect()->to(base_url('/movie'))->with('successDeleteMovie', 'Movie deleted successfully.');
        } 
        // else {
        //     return $this->failNotFound('Movie not found');
        // }
    }
}