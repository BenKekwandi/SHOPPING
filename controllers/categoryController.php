<?php

require_once(ROOT_PATH.'/core/controller.php');
require_once(ROOT_PATH.'/models/categoryModel.php');

class CategoryController extends Controller
{
   

    function __construct() {
        $this->model = new CategoryModel();
    }


    function viewAll_get() 
    {
        $result = CategoryModel::all();
        foreach ($result as &$res) 
        {
            $res['photo'] = '<img height="50" width="60" src="uploads/categories/'.$res['picture'].'">';
        }
        echo json_encode($result);
    }
    function getById_get($id) {
        $result = $this->model->find($id);
        echo json_encode($result);
    }

    public function create()
    {
       
        if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['Submit']))
        {
            $allowedExtensions = array('jpg', 'jpeg', 'png');
            $targetDirectory = '././uploads/categories/';
            $uploadedFile = $_FILES['picture'];
    
            $fileName = basename($uploadedFile['name']);
            $targetFile = $targetDirectory . $fileName;
            $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            $new_category= array(
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'picture' => $_FILES['picture']['name']
            );

            if (!in_array($fileExtension, $allowedExtensions)) {
                echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
            } 
            else 
            {
                if (move_uploaded_file($uploadedFile['tmp_name'], $targetFile)) 
                {
                    echo "The file has been uploaded successfully.";
                    $insertion=CategoryModel::create($new_category);
                    if(!$insertion)
                    {
                        header('Location: /admin/category-create');
                        exit();
                    }
                    header('Location: /admin/categories');
                    exit();

                } 
                else 
                {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

        }

        $data = $this->model->all();
        $this->load_view('create_category',$data);
    }
    public function index()
    {
        $data = $this->model->all();
        $this->load_view('categories',$data);  
    }

}