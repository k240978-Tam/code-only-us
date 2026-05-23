<?php
namespace App\Controllers;
use App\Core\Controller;

class UserController extends Controller {
    public function profile() {
        $this->requireRole();
        
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch();
        
        $this->view('auth/profile', ['user' => $user]);
    }

    public function update() {
        $this->requireRole();
        $name = trim($_POST['name'] ?? '');
        $password = $_POST['password'] ?? '';
        $id = $_SESSION['user_id'];

        if (empty($name)) {
            $_SESSION['error_message'] = "Name cannot be empty.";
            $this->redirect('/newsportal/profile');
        }

        if (!empty($password)) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("UPDATE users SET name = ?, password = ? WHERE id = ?");
            $stmt->execute([$name, $hashed, $id]);
        } else {
            $stmt = $this->pdo->prepare("UPDATE users SET name = ? WHERE id = ?");
            $stmt->execute([$name, $id]);
        }

        $_SESSION['name'] = $name;
        $_SESSION['success_message'] = "Profile updated successfully.";
        $this->redirect('/newsportal/profile');
    }
}
