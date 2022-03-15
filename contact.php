<?php
$active='Contact Us';
include("includes/header.php");
?>

<style>
            /*FAQ styles*/
.faq-section{
    width: 100%;
    height: 90vh;
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
}
.faq-container{
    width: 100%;
    max-width: 80rem;
    margin: 0 auto;
    padding: 0 1.5rem;
}
.accordion-item{
    background-color: #283042;
    border-radius: .4rem;
    margin-bottom: 1rem;
    padding: 1rem;
    box-shadow: .5rem 2px .5rem rgba(0,0,0,0.1);
}
.accordion-link{
    font-size: 1.6ren;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    background-color: #283042;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 0;
}
.accordion-link i{
    color: #e7d5ff;
    padding: .5rem;
}
.accordion-link .ion-md-remove{
    display: none;
}
.answer{
    max-height: 0;
    overflow: hidden;
    position: relative;
    background-color: #212838;
    transition: max-height 650ms;
}
.answer::before{
    content: "";
    position: absolute;
    width: .6rem;
    height: 90%;
    background-color: #8fc460;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
}
.answer p{
    color: rgba(255, 255, 255, 0.6);
    font-size: 1.4rem;
    padding: 2rem;
}
.accordion-item:target .answer{
    max-height: 20rem;
}
.accordion-item:target .accordion-link .ion-md-add{
    display: none;
}
.accordion-item:target .accordion-link .ion-md-remove{
    display: block;
}
        </style>

        <div id="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            Contact Us
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <?php
                        include("includes/sidebar.php")
                    ?>
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header">
                            <center>
                                <h2>Feel free to Contact Us</h2>
                                <p class="text-muted">
                                    If you have any questions, feel free to contact us. Our customer service work <strong>24/7</strong>
                                </p>
                            </center>

                            <form action="contact.php" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>

                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" name="subject" required>
                                </div>

                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" id="" class="form-control"></textarea>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit" name="submit">
                                    <i class="fa fa-user-md"></i> Send Message
                                    </button>
                                    
                                </div>
                            </form>

                            <?php

                                if(isset($_POST['submit'])){
                                    /// Admin receives message with this ///

                                    $sender_name= $_POST['name'];
                                    $sender_email= $_POST['email'];
                                    $sender_subject= $_POST['subject'];
                                    $sender_message= $_POST['message'];

                                    $receiver_email= "ecyclehub@gmail.com";

                                    mail($receiver_email, $sender_name, $sender_subject, $sender_message);
                                    
                                    /// Auto reply to sender with this ///

                                    $email= $_POST['email'];
                                    $subject= "Welcome to E-CYCLE HUB";
                                    $msg= "Thanks for sending us message. ASAP we will reply your message";
                                    $from= "ecyclehub@gmail.com";

                                    mail($email, $subject, $msg, $from);

                                    echo "<h2 align='center'> Your message has sent successfully....</h2>";
                                    
                                }

                            ?>

                        </div>
                    </div>
                </div>
                


            </div>
        </div>

        <section class="faq-section">
            <div class="container-fluid faq-container">
            <h2 style="font-weight:700;">Frequently Asked Questions (FAQs)</h2>
                <div class="row">
                
                    <div class="col-md-6">
                        <div class="accordion">
                            <?php
                                $get_faq="SELECT * FROM faq order by faq_id ASC LIMIT 6";
                                $run_faq=mysqli_query($conn,$get_faq);
                                while($row_faq=mysqli_fetch_array($run_faq)){
                                    $faq_id=$row_faq['faq_id'];
                                    $faq_question=$row_faq['faq_question'];
                                    $faq_answer=$row_faq['faq_answer'];
                            ?>
                                <div class="accordion-item" id="question<?php echo $faq_id; ?>">
                                    <a class="accordion-link" href="#question<?php echo $faq_id; ?>" style="text-decoration: none;">
                                        <?php echo $faq_question; ?>
                                        <i class="icon ion-md-add"></i>
                                        <i class="icon ion-md-remove"></i>
                                    </a>
                                    <div class="answer">
                                        <?php echo $faq_answer; ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="accordion">
                            <?php
                                $get_faq="SELECT * FROM faq order by faq_id DESC LIMIT 6";
                                $run_faq=mysqli_query($conn,$get_faq);
                                while($row_faq=mysqli_fetch_array($run_faq)){
                                    $faq_id=$row_faq['faq_id'];
                                    $faq_question=$row_faq['faq_question'];
                                    $faq_answer=$row_faq['faq_answer'];
                            ?>
                                <div class="accordion-item" id="question<?php echo $faq_id; ?>">
                                    <a class="accordion-link" href="#question<?php echo $faq_id; ?>" style="text-decoration: none;">
                                        <?php echo $faq_question; ?>
                                        <i class="icon ion-md-add"></i>
                                        <i class="icon ion-md-remove"></i>
                                    </a>
                                    <div class="answer">
                                        <span><?php echo $faq_answer; ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php
        include("includes/footer.php");
        ?>
        <script src="js/bootstrap-337.min.js"></script>
        <script src="js/jquery-331.min.js"></script>
    </body>
</html>