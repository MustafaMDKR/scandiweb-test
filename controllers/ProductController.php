<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\ProductModel;

class ProductController extends Controller
{
    
    public function home(Request $request)
    {
        if ($request->isPost()) {
            return 'Handling deleted data';
        }
        return $this->render('productList');
    }


    public function addProduct(Request $request)
    {
        $productModel = new ProductModel();
        
        if ($request->isPost()) {
            $productModel->loadData($request->getBody());

            if ($productModel->validate() && $productModel->createProduct()) {
                return 'Success';
            }

            return $this->render('addProduct', [
                'model' => $productModel
            ]);

        }
        return $this->render('addProduct', [
            'model' => $productModel
        ]);
    }
    
}