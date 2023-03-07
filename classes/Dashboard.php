<?php

class Dashboard {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    public function allTickets() {
        try {

            $sql = "SELECT * FROM tickets";
            $result = $this->conn->query($sql);
            $allTicket = $result->rowCount();
            return $allTicket;

        }catch(PDOException $e) {
            echo $e->getMessage();   
        }
    }

    public function availableTickets() {
        try {
            
            $sql = "SELECT * FROM tickets WHERE payment_status IS NULL";
            $result = $this->conn->query($sql);
            $availableTicket = $result->rowCount();
            return $availableTicket;

        }catch(PDOException $e) {
            echo $e->getMessage();   
        }
    }

    public function purchasedTickets() {
        try {
            
            $sql = "SELECT * FROM tickets WHERE payment_status = 1";
            $result = $this->conn->query($sql);
            $purchasedTickets = $result->rowCount();
            return $purchasedTickets;

        }catch(PDOException $e) {
            echo $e->getMessage();   
        }
    }

    public function raffleWinners() {
        try {
            
            $sql = "SELECT * FROM raffle_winner";
            $result = $this->conn->query($sql);
            $raffleWinners = $result->rowCount();
            return $raffleWinners;

        }catch(PDOException $e) {
            echo $e->getMessage();   
        }
    }

    public function eligibleParticipants() {
        try {
            
            $sql = "SELECT * FROM tickets WHERE ticket_status = 0 AND payment_status IS NOT NULL";
            $result = $this->conn->query($sql);
            $eligibleParticipants = $result->rowCount();
            return $eligibleParticipants;

        }catch(PDOException $e) {
            echo $e->getMessage();   
        }
    }

    public function recentWinner() {
        try {
            
            $sql = "SELECT * FROM raffle_winner ORDER BY id DESC LIMIT 3";
            $result = $this->conn->query($sql);
            return $result;

        }catch(PDOException $e) {
            echo $e->getMessage();   
        }
    }
}