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
        $session = \Config\Services::session();
        //session chana??
        $data['session'] = $session;
        //list ?
        $model = new BookModel();
        $BookArray = $model->getRecords();
        $data['book'] = $BookArray;

        return view('Book/list.php', $data);
    }
    public function Create()
    {
        $session = \Config\Services::session();
        helper('form');
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $input = $this->validate([
                'name' => 'required|min_length[5]',
                'autbor' => 'required|min_length[5]',
                'isbn_no' => 'required|min_length[5]',

            ]);
            if ($input == true) {
                $model = new BookModel();

                $model->save([
                    'name' => $this->request->getpost('name'),
                    'autbor' => $this->request->getpost('autbor'),
                    'isbn_no' => $this->request->getpost('isbn_no'),
                ]);
                $session->setFlashdata('success', ' record added successfully.');
                return redirect()->to('/Book');
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('Book/Create', $data);


    }

    public function delete($id)
	{
		$BookModel = new BookModel();
		$BookModel->delete($id);
		return $this->response->redirect(site_url('/Book'));
	}
    public function edit($id){
        $session = \Config\Services::session();
        helper('form');
        $model = new BookModel();
        $book= $model->getRow($id);
        if (empty($book)){
            $session->setFlashdata('error', 'Record not found.');
            return redirect()->to('/Book');
        }
        $data = [];
        $data['book']= $book;
        if ($this->request->getMethod() == 'post') {
            $input = $this->validate([
                'name' => 'required|min_length[5]',
                'autbor' => 'required|min_length[5]',
                'isbn_no' => 'required|min_length[5]',

            ]);
            if ($input == true) {
              

                $model->update($id,[
                    'name' => $this->request->getpost('name'),
                    'autbor' => $this->request->getpost('autbor'),
                    'isbn_no' => $this->request->getpost('isbn_no'),
                ]);
                $session->setFlashdata('success', ' update  successfully.');
                return redirect()->to('/Book');
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('Book/edit', $data);

    }





    
}
?>