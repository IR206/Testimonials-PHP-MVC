<?php
class TestimonialsContoller{
    public function getAllTestimonials()
    {
        return Testimonial::getAll();
    }
    public function addTestimonial()
    {
        if(isset($_POST['submit'])) {
            $fileName = basename($_FILES["img"]["name"]);
            $data = array(
                'titre' => $_POST['titre'],
                'fileType' => pathinfo($fileName, PATHINFO_EXTENSION),
                'fileSize' => $_FILES["img"]["size"],
                'imagePath' => $_FILES['img']['tmp_name'],
                'message' => $_POST['message'],
            );
            $result = Testimonial::add($data);
            if($result==='ok')
            {
                Session::set("success","Testimonial Ajouté");
                Redirect::to('home');
            }else{
                echo $result;
            }
        }

    }
}

