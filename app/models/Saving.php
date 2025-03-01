<?php
class Saving
{
    private $db;
    private $table = 'savings';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getByUserId($userId)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($user_id, $amount, $message)
    {
        $query = "INSERT INTO " . $this->table . " (user_id, amount, message) VALUES (:user_id, :amount, :message)";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}


?>