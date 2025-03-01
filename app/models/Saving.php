<?php
class Saving
{
    private $db;
    private $table = 'savings';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getByUserId($userId){
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>