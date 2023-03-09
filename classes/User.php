<?php 
class User {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

   


    public function checkEmail($username) {
        try{

            $sql = "SELECT * FROM users WHERE username = '$username';";
            $query = $this->conn->query($sql);

            if($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_ASSOC);
            }else{
                $result = false;
            }

            return $result;
                        
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // public function login(String $username, $password) {
    //     try{
            


    //         // $sql = "SELECT * FROM users WHERE username = :username AND password = :password ;  ";
    //         // $stmt = $this->conn->prepare($sql);

    //         // $stmt->bindparam(':username', $username);
    //         // $stmt->bindparam(':password', $password);
    //         // $stmt->execute();
    //         // $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
    //         // return $result;

            
    //     }catch(PDOException $e){
    //         echo "Error: " . $e->getMessage();
            
    //     }
        
    // }

}
