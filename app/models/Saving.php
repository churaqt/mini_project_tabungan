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
        // Modify the query to include the user's name from the 'users' table
        $query = "SELECT d.*, u.name FROM " . $this->table . " d
              JOIN users u ON d.user_id = u.id
              WHERE d.user_id = :user_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // This will now include the 'name' field from users
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

    public function getAll()
    {
        $query = "SELECT d.*, u.name FROM " . $this->table . " d
                  JOIN users u ON d.user_id = u.id
                  ORDER BY d.created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
?>