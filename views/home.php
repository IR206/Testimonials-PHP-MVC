<?php
if(isset($_POST['submit']))
{
    $new = new TestimonialsContoller();
    $new->addTestimonial();
}
$data = new TestimonialsContoller();
$testimonials = $data->getAllTestimonials();
?>
<div class="container">
    <div class="row my-4 ">
        <div class="col-md-5 mx-auto ">
            <div class="card">
                <div class="card-body bg-light p-5">
                    <form method="post" id="addTestimonial" enctype="multipart/form-data">
                        <div class="form-group p-3">
                            <label class="mb-3" for="titre">Titre *</label>
                            <input type="text" id="titre" name="titre" class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <label class="mb-3" for="image">Image</label><br>
                            <input type="file" id="img" name="img">
                        </div>
                        <div class="form-group p-3">
                            <label class="mb-3" for="message">Message *</label>
                            <textarea class="form-control" name="message" id="message"></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                        <button type="submit" class="btn sub btn-block" name="submit">Add New Testimonial</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<h1 class="text-center">Testimonails</h1>
<div class="container mt-5 mb-5" id="father">
    <ul class="row g-2" id="child">
        <?php foreach ($testimonials as $testimonial) : ?>
            <li class="col-md-4 testmonial">
                <div class="card p-3 text-center px-4">
                    <div class="user-image"> <img
                                src="data:image/jpeg;base64,<?php echo base64_encode($testimonial['image']); ?>" class="rounded-circle" width="120"> </div>
                    <div class="user-content">
                        <h5 class="mb-0"><?php echo $testimonial['titre'] ?></h5>
                        <p><?php echo $testimonial['message'] ?></p>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>