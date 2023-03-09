<?php 
class Ticket {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getPrefix() {
        try {

            $sql = "SELECT * FROM ticket_prefix";
            return $this->conn->query($sql);

        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function selectPrefix($prefix) {
        try {
            $sql = "SELECT * FROM tickets WHERE ticket_id LIKE '$prefix%' ORDER BY ticket_id DESC LIMIT 1;";
            $sqlCount = "SELECT * FROM tickets WHERE ticket_id LIKE '$prefix%' ORDER BY ticket_id DESC;";
           
            $result = $this->conn->query($sql);
            $resultCount = $this->conn->query($sqlCount);

            $query = array('row_count' => $resultCount->rowCount(), 'result' => $result);

            return $query;

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function generateTicket($ticket_number) {
        try {
            
            $date_purchased = null;
            $payment_status = null;
            $ticket_status = "0";

            $sql = "INSERT INTO tickets (ticket_id, ticket_status) VALUES (:ticket_number, :ticket_status)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindparam(':ticket_number', $ticket_number);
            $stmt->bindparam(':ticket_status', $ticket_status);
            print_r($stmt);
            $stmt->execute();

            return true;

        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllTickets() {
        try {
            $sql = "SELECT * FROM tickets ORDER BY ticket_id";
            return $this->conn->query($sql);

        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function ticketExists($ticket_id){
        try {
            $sql = "SELECT * FROM tickets WHERE ticket_id  = '$ticket_id'";
            $result = $this->conn->query($sql);
            $resultCount = $result->rowCount();
            return $resultCount;
        }catch(PDOEXception $e){
            echo $e->getMessage();
        }
    }

    public function checkStatus($ticket_id) {
        try {
            $sql = "SELECT * FROM tickets WHERE payment_status  = 1 AND ticket_id = $ticket_id";
            $result = $this->conn->query($sql);
            $resultCount = $result->rowCount();
            return $resultCount;
        }catch(PDOEXception $e){
            echo $e->getMessage();
        }
    }


    public function sellTicket($ticket_id) {
        try {
            $sql = "UPDATE tickets SET payment_status = '1', date_purchased = Now() WHERE ticket_id = :ticket_id ;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindparam(':ticket_id', $ticket_id);
            $stmt->execute();

            return true;

        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function sellAllTicket() {
        try {
            $sql = "UPDATE tickets SET payment_status = '1', date_purchased = Now() WHERE payment_status IS NULL";
            $stmt = $this->conn->query($sql);

            return $stmt->rowCount();

        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}

?>