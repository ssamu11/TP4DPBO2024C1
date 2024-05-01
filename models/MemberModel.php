<?php
class MemberModel {
    public static function getAllMembers() {
        include "../config/connection.php";
        $sql = "SELECT * FROM members";
        $result = $conn->query($sql);
        $members = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $members[] = $row;
            }
        }
        return $members;
    }

    public static function addMember($name, $email, $phone) {
        include "../config/connection.php";
        $sql = "INSERT INTO `members`(`name`, `email`, `phone`) VALUES ('$name', '$email', '$phone')";
        $conn->query($sql);
    }

    public static function getMemberById($id) {
        include "../config/connection.php";
        $sql = "SELECT * FROM members WHERE id=$id";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }

    public static function updateMember($id, $name, $email, $phone) {
        include "../config/connection.php";
        $sql = "UPDATE members SET name='$name', email='$email', phone='$phone' WHERE id='$id'";
        $conn->query($sql);
    }

    public static function deleteMember($id) {
        include "../config/connection.php";
        $sql = "DELETE FROM members WHERE id=$id";
        $conn->query($sql);
    }
}
?>
