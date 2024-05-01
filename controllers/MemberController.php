<?php
include "../models/MemberModel.php";

class MemberController {
    public function index() {
        $members = MemberModel::getAllMembers();
        include "../views/member/index.php";
    }

    public function create() {
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            MemberModel::addMember($name, $email, $phone);
        }
        include "../views/member/create.php";
    }

    public function edit($id) {
        if($_SERVER["REQUEST_METHOD"]=='GET'){
            $member = MemberModel::getMemberById($id);
            include "../views/member/edit.php";
        } else {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            MemberModel::updateMember($id, $name, $email, $phone);
            header("Location: /crud100/controllers/MemberController.php");
            exit();
        }
    }

    public function delete($id) {
        MemberModel::deleteMember($id);
        header("Location: /crud100/controllers/MemberController.php");
        exit();
    }
}
?>
