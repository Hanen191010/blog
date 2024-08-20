## مدونة بسيطة باستخدام PHP و MySQL (XAMPP)

### مقدمة

هذه هي مدونة بسيطة تم إنشاؤها باستخدام "PHP و MySQL."  
تسمح لك هذه المدونة بإنشاء، عرض، تعديل، وحذف مقالات.

### التثبيت

1. إنشاء قاعدة بيانات:
   * افتح XAMPP Control Panel.
   * شغّل خدمة MySQL.
   * انقر على "Admin" (إدارة) لفتح phpMyAdmin.
   * أنشئ قاعدة بيانات جديدة باسم `blog_db`.
   * أنشئ جدول `posts` باستخدام ملف `create_table.sql` الموجود في مجلد المشروع.
2. تعديل ملفات التكوين:
   * افتح ملف `database.php` وقم بتعديل بيانات الاتصال بقاعدة البيانات (اسم المستخدم وكلمة المرور). 
   * *ملاحظة:* بشكل افتراضي، يكون اسم مستخدم MySQL و كلمة المرور فارغين.
3. رفع الملفات على XAMPP:
   * أنشئ مجلدًا باسم `plog` داخل مجلد `htdocs` في مجلد XAMPP.
   * قم برفع ملفات المشروع إلى مجلد `plog`.
4. الوصول إلى المدونة:
   * افتح متصفح الويب واكتب `http://localhost/plog`.

### استخدام المدونة

* إنشاء مقالة جديدة:
    * افتح عنوان URL `http://localhost/plog/create_post.php` لإنشاء مقالة جديدة.
* عرض المقالات:
    * افتح عنوان URL `http://localhost/plog/list_posts.php` لعرض قائمة المقالات.
* عرض مقالة محددة:
    * افتح عنوان URL `http://localhost/plog/view_post.php?id=X` حيث `X` هو معرف المقالة.
* تعديل مقالة:
    * افتح عنوان URL `http://localhost/plog/edit_post.php?id=X` حيث `X` هو معرف المقالة.
* حذف مقالة:
    * افتح عنوان URL `http://localhost/plog/delete_post.php?id=X` حيث `X` هو معرف المقالة.

### ملاحظة

* يمكنك إضافة ميزات أخرى إلى المدونة، مثل التعليقات، والفئات، والتصنيفات بالأضافة الى اضافة صورة لكل مقالة 