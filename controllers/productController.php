<?php

require_once(ROOT_PATH.'/core/controller.php');
require_once(ROOT_PATH.'/models/productModel.php');

class ProductController extends Controller
{
    function __construct() {
        $this->model = new ProductModel();
    }

    function viewAll_get() {
        $result = ProductModel::all();
        foreach ($result as &$res) 
        {
            $catg=CategoryModel::where('id','=',$res['category_id'])->first();
            $res['category']=$catg->name;
            $res['photo'] = '<img height="50" width="60" src="uploads/products/'.$res['picture'].'">';
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
            $targetDirectory = '././uploads/products/';
            $uploadedFile = $_FILES['picture'];

            $fileName = basename($uploadedFile['name']);
            $targetFile = $targetDirectory . $fileName;
            $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            $new_product = array(
                'name' => $_POST['name'],
                'category_id' => $_POST['category'],
                'picture' => $_FILES['picture']['name'],
                'description' => $_POST['description']
            );

            if (!in_array($fileExtension, $allowedExtensions)) {
                echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
            }
            else
            {
                if (move_uploaded_file($uploadedFile['tmp_name'], $targetFile))
                {
                    echo "The file has been uploaded successfully.";
                    $insertion= ProductModel::create($new_product);
                    if(!$insertion)
                    {
                        header('Location: /admin/product-create');
                        exit();
                    }
                    header('Location: /admin/products');
                    exit();

                }
                else
                {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

        }
        $data = $this->model->all();

        $this->load_view('create_product',$data);
    }

    public function index()
    {
        $data = $this->model->all();
        $this->load_view('products',$data);
    }
}
