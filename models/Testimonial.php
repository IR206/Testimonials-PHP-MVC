<?php
class Testimonial
{
    //get all Testimonials
    static public function getAll()
    {
         $stmt=DB::connect()->prepare('select * from testimonials');
         $stmt->execute();
         return $stmt->fetchAll();
         $stmt->close();
         $stmt=null;
    }
    //add an Testimonial
    static  public  function add($data)
    {
        $fileType = $data['fileType'];
        $fileSize = $data['fileSize'];
        $allowTypes = array('jpg','png','jpeg','gif');
        if($fileSize <= 1048576){//check if less than 1Mo
            if(in_array($fileType, $allowTypes)) {
                $image = $data['imagePath'];
                $imgContent = file_get_contents($image);
                $con = DB::connect();
                $stmt = $con->prepare('INSERT INTO testimonials (titre,image,message) values (:titre,:image,:message)');
                $stmt->bindParam(':titre', $data['titre']);
                $stmt->bindParam(':image', $imgContent);
                $stmt->bindParam(':message', $data['message']);
                if($stmt->execute())
                {
                    return 'ok';
                }else{
                    return 'error : SQL';
                }

            }else{
                return 'error : File Type';
            }
        }else{
            return 'error : File Size must be less than 1Mo';
        }
        $stmt->close();
        $stmt=null;
    }

}