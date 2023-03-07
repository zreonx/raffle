<?php 

class Raffle {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function selectPaidParticipant() {
        try {
            $sql = "SELECT * FROM tickets where payment_status = '1' AND ticket_status != '1'; ";
            $result = $this->conn->query($sql);
            $query =  array('count' => $result->rowCount(), 'result' => $result);
            return $query;
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insertWinner($winner_id) {
        try {
            $sql = "INSERT INTO raffle_winner (ticket_id) VALUES (:ticket_number)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindparam(':ticket_number', $winner_id);

            $stmt->execute();

            return true;

        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function excludeFromRaffle($ticket_id) {
        try {
            $sql = "UPDATE tickets SET ticket_status = '1' WHERE ticket_id = :ticket_id;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindparam(':ticket_id', $ticket_id);
            $stmt->execute();

            return true;

        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getWinner() {
        try {
            $sql = "SELECT * FROM raffle_winner ORDER BY id DESC LIMIT 1";
            $result = $this->conn->query($sql);
            $query = $result->fetch(PDO::FETCH_NUM);
            return $query;
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function setActiveWinner($winner_id) {
        try {
            $status =  'active';
            $sql = "INSERT INTO winner_index (ticket_id, status) VALUES (:ticket_number, :status) ON DUPLICATE KEY UPDATE status = :status";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindparam(':ticket_number', $winner_id);
            $stmt->bindparam(':status', $status);
            $stmt->execute();

            return true;

        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function selectIndex() {
        try {
            $sql = "SELECT * FROM winner_index WHERE status = 'active'";
            $result = $this->conn->query($sql);
            $query = $result->fetch(PDO::FETCH_ASSOC);
            return array('column_count' => $result->columnCount(), 'result' => $query);
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function stopIndex($index_column) {
        try {
            $sql = "UPDATE winner_index SET $index_column = '1' WHERE status = 'active';";
            $result = $this->conn->query($sql);

            return true;

        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function clearIndexStatus() {
        try {
            $sql = "UPDATE winner_index SET status = NULL;";
            $result = $this->conn->query($sql);

            return true;

        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>