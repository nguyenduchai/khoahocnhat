<?php
class UserController
{
    public static function getById($conn, $id)
    {
        $stmt = $conn->prepare("SELECT id, name, email FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($id, $name, $email);
        if ($stmt->fetch()) {
            return ['id' => $id, 'name' => $name, 'email' => $email];
        }
        return null;
    }

    public static function updateProfile($conn, $id, $name, $email, $password = null)
    {
        // Kiểm tra email trùng của người khác
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
        $stmt->bind_param("si", $email, $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            return "Email đã được dùng bởi tài khoản khác.";
        }

        if ($password) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
            $stmt->bind_param("sssi", $name, $email, $hashed, $id);
        } else {
            $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
            $stmt->bind_param("ssi", $name, $email, $id);
        }

        return $stmt->execute() ? true : "Cập nhật thất bại.";
    }
}
