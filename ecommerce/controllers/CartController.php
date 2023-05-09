<?php
require_once 'controllers/Controller.php';

class CartController extends Controller
{

    public function addToCart()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $avatar = $_POST['avatar'];
        $id_products = $_POST['id_products'];
        if ($quantity < 1 || empty($quantity)) {
            $quantity = 1;
        } elseif ($quantity > 99) {
            $quantity = 99;
        }
        $item = [
            'name' => $name,
            'id_products' => $id_products,
            'quantity' => $quantity,
            'price' => $price,
            'avatar' => $avatar,
        ];
        $found = false;
        foreach ($_SESSION['cart'] as $key => $cartItem) {
            if ($cartItem['id_products'] == $id_products) {
                $_SESSION['cart'][$key]['quantity'] += $quantity;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $_SESSION['cart'][] = $item;
        }

        $total_quantity = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total_quantity += $item['quantity'];
        }

        $_SESSION['total_price'] = 0;
        foreach ($_SESSION['cart'] as $item) {
            $_SESSION['total_price'] += ($item['price'] * $item['quantity']);
        }
        $_SESSION['total_quantity'] = $total_quantity;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $value) {
                $id_product = $value['id_products'];
                $id_product = "product_$id_product";
                $_SESSION[$id_product] = $value['quantity'];
            }
        }
        $this->content =  $this->render('views/products/notify_quantity.php', ['total_quantity' => $total_quantity]);
        require_once 'views/layouts/result.php';
    }
    public function showCart()
    {

        $this->content =  $this->render('views/products/pop_box_cart.php');
        require_once 'views/layouts/result.php';
    }
    public function increaseCart()
    {

        $id_products = $_POST['id_products'];
        $quantity = $_POST['quantity'];
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id_products'] == $id_products) {
                    $_SESSION['cart'][$key]['quantity'] = $quantity;
                    break;
                }
            }
        }
        $total_quantity = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total_quantity += $item['quantity'];
        }

        $_SESSION['total_quantity'] = $total_quantity;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $value) {
                $id_product = $value['id_products'];
                $id_product = "product_$id_product";
                $_SESSION[$id_product] = $value['quantity'];
            }
        }
        $this->content =  $this->render('views/products/notify_quantity.php', ['total_quantity' => $total_quantity]);
        require_once 'views/layouts/result.php';
    }
    public function deleteProductCart()
    {

        $id_products = $_POST['id_products'];

        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id_products'] == $id_products) {
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }
        }
        $total_quantity = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total_quantity += $item['quantity'];
        }

        $_SESSION['total_quantity'] = $total_quantity;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $value) {
                $id_product = $value['id_products'];
                $id_product = "product_$id_product";
                $_SESSION[$id_product] = $value['quantity'];
            }
        }
        $this->content =  $this->render('views/products/notify_quantity.php', ['total_quantity' => $total_quantity]);
        require_once 'views/layouts/result.php';
    }
    public function updateQuantityCart()
    {


        $total_quantity = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total_quantity += $item['quantity'];
        }
        $total_quantity = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total_quantity += $item['quantity'];
        }

        $_SESSION['total_quantity'] = $total_quantity;
        echo $total_quantity;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $value) {
                $id_product = $value['id_products'];
                $id_product = "product_$id_product";
                $_SESSION[$id_product] = $value['quantity'];
            }
        }
    }
    public function updatePriceCart()
    {


        $total_price = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total_price += ($item['price'] * $item['quantity']);
        }
        $_SESSION['total_price'] = 0;
        foreach ($_SESSION['cart'] as $item) {
            $_SESSION['total_price'] += ($item['price'] * $item['quantity']);
        }

        echo number_format($total_price, 0, ',', '.') . "  VNĐ";
    }
    public function deleteCart()
    {
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
            unset($_SESSION['total_quantity']);
            unset($_SESSION['code_oder']);
            unset($_SESSION['total_price']);
        }
        $total_quantity = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $value) {
                $id_product = $value['id_products'];
                $id_product = "product_$id_product";
                $_SESSION[$id_product] = $value['quantity'];
            }
        }
        $this->content =  $this->render('views/products/notify_quantity.php', ['total_quantity' => $total_quantity]);
        require_once 'views/layouts/result.php';
    }
}
