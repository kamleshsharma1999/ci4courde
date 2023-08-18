<?php


namespace App\Controllers;
use App\Models\BookModel;
use Faker\Extension\Helper;

class Book extends BaseController
{

// public function __construct(){
    
// }


    public function index()
    {
        echo view('Book/list.php');
    }
    public function Create()
    {
        $session = \Config\Services::session(); 
        helper('form');
        $data=[];
        if ($this->request->getMethod() == 'post') {
            $input = $this->validate([
                'name'=> 'required|min_length[5]',
                'autbor'=> 'required|min_length[5]',
                'isbn_no'=> 'required|min_length[5]',

            ]);
            if ($input ==true){
                $model = new BookModel();

                $model->save([
                    'name'=>$this->request->getpost('name'),
                    'autbor'=>$this->request->getpost('autbor'),
                    'isbn_no'=>$this->request->getpost('isbn_no'),
                ]);
                $session->setFlashdata('success','winner winner chicken dinner, record added successfully.');
                return redirect()->to('/Book');
            }
            else{
                $data['validation'] =$this->validator;
            }
        }
        return view('Book/Create',$data);

  
} 
}
?>