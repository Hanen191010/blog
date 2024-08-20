<?php
class Post {
// يمثل  كائن الاتصال بقاعدة البيانات
    private $db;
// post تعريف المتغيرات الخاصة بالصف 
    public $id;
    public $title;
    public $content;
    public $author;
    public $created_at;
    public $updated_at;

    public function __construct(Database $db) {
        $this->db = $db;
    }

//تعريف التابع المخصص لعملية اضافة مقال 
    public function create($title, $content, $author) {
        $sql = "INSERT INTO posts (title, content, author) VALUES (?, ?, ?)";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("sss", $title, $content, $author);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

//تعريف التابع المخصص لعملية عرض مقال 
    public function read($id) {
        $sql = "SELECT * FROM posts WHERE id = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if ($result) {
            $this->id = $result['id'];
            $this->title = $result['title'];
            $this->content = $result['content'];
            $this->author = $result['author'];
            $this->created_at = $result['created_at'];
            $this->updated_at = $result['updated_at'];
            return true;
        } else {
            return false;
        }
    }

//تعريف التابع المخصص لعملية تعديل مقال
    public function update($id, $title, $content, $author) {
        $sql = "UPDATE posts SET title = ?, content = ?, author = ? WHERE id = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("sssi", $title, $content, $author, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

 //تعريف التابع المخصص لعملية حذف مقال 
    public function delete($id) {
        $sql = "DELETE FROM posts WHERE id = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

//تعريف التابع المخصص لعملية عرض كل المقالات 
    public function listAll() {
        $sql = "SELECT * FROM posts ORDER BY created_at DESC"; 
        return $this->db->fetchAll($sql);
    }


}
?>
