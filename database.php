<?php

class Database {
    // خصائص الاتصال بقاعدة البيانات
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "blog_db";
    // متغير لتمثيل اتصال قاعدة البيانات
    public $conn;

    public function __construct() {
        // إنشاء اتصال باستخدام mysqli
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        // التحقق من وجود أخطاء في الاتصال
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // دالة لتنفيذ استعلام SQL
    public function query($sql) {
        // تنفيذ الاستعلام باستخدام mysqli
        return $this->conn->query($sql);
    }

    // دالة لجلب جميع الصفوف من نتيجة الاستعلام
    public function fetchAll($sql) {
        // تنفيذ الاستعلام
        $result = $this->query($sql);

        // إنشاء مصفوفة لتخزين الصفوف
        $rows = array();

        // تكرار على كل صف في نتيجة الاستعلام
        while ($row = $result->fetch_assoc()) {
            // إضافة الصف إلى المصفوفة
            $rows[] = $row;
        }

        // إرجاع المصفوفة التي تحتوي على جميع الصفوف
        return $rows;
    }

    // دالة لجلب صف واحد فقط من نتيجة الاستعلام
    public function fetch($sql) {
        // تنفيذ الاستعلام
        $result = $this->query($sql);

        // إرجاع الصف الأول من نتيجة الاستعلام
        return $result->fetch_assoc();
    }

    // دالة لإغلاق الاتصال بقاعدة البيانات
    public function close() {
        // إغلاق الاتصال باستخدام mysqli
        $this->conn->close();
    }
}
?>