<?php include "header.php";

$id = $_GET['id'];
$news = mysqli_query($link, "SELECT * FROM `blogs` WHERE `id` = '$id'");
$blogs = mysqli_fetch_assoc($news);

?>

 <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            
            <section aria-label="section" style="background-size: cover;" class="mt-5">
                <div class="container" style="background-size: cover;">
                    <div class="row" style="background-size: cover;">
                        <div class="col-md-8" style="background-size: cover;">
                            <div class="blog-read" style="background-size: cover;">

                                <img alt="" src="<?php echo $blogs['image'] ?>" class="img-fullwidth rounded">
                                <h2><?php echo $blogs['title'] ?></h2>

                                <div class="post-text" style="background-size: cover;">
                                    <?php echo $blogs['description'] ?>
                                    <!--<p>Quis sunt quis do laboris eiusmod in sint dolore sit pariatur consequat commodo aliqua nulla ad dolor aliquip incididunt voluptate est aliquip adipisicing ea cupidatat nostrud incididunt aliquip dolore. Sed minim nisi duis laborum est labore nisi amet elit adipisicing proident do consectetur dolor labore sit nisi ad proident esse ad velit nisi irure reprehenderit ut et dolor labore veniam quis.</p>-->

                                    

                                    <!--<p>Sunt duis laboris ex et quis laborum laborum cillum mollit voluptate culpa consequat ex cupidatat dolor eiusmod proident proident cillum pariatur sint adipisicing in nostrud do dolore consectetur quis incididunt minim consectetur. Exercitation elit proident dolor est id eiusmod dolor dolor incididunt ad voluptate laboris cupidatat est est sint veniam sint officia sint incididunt est sit ut tempor commodo pariatur ut proident et do.</p>-->

                                    <!--<p>Sed eu in ut sint dolor irure fugiat minim veniam sed ea proident ullamco occaecat irure ut velit eu ullamco fugiat cupidatat dolore fugiat. Lorem ipsum id non deserunt id consequat duis voluptate amet aliqua pariatur laboris officia pariatur veniam velit reprehenderit sint nostrud cupidatat magna eiusmod mollit exercitation pariatur nulla minim laboris dolore aliqua consectetur cillum duis aute consectetur.</p>-->

                                </div>

                            </div>

                            <div class="spacer-single" style="background-size: cover;"></div>

                            

                        </div>

                        <div id="sidebar" class="col-md-4" style="background-size: cover;">
                            <div class="widget widget-post" style="background-size: cover;">
                                <h4>Recent Posts</h4>
                                <div class="small-border" style="background-size: cover;"></div>
                                <ul>
                                    <?php
                                    $news = mysqli_query($link, "SELECT * FROM `blogs` WHERE `id` != '$id' ORDER BY `id` DESC LIMIT 4");
                                    if ($news) {
                                    foreach($news as $newss) {
                                        if (!empty($newss['date']) && $newss['date'] !== false) {
                                            $formatted_date = date("j F", $newss['date']);
                                        } else {
                                            $formatted_date = "Date not available"; // Or handle it as per your requirement
                                        }
                                        
                                        echo '<li><span class="date">'.$formatted_date.'</span><a href="blog-details.php?id='.$newss['id'].'">'.$newss['title'].'</a></li>';
                                        }
                                    } else {
                                        echo "No Recent Posts Found."; // Handle the case where no blogs are retrieved
                                    }
                                    ?>									
                           
                                </ul>
                            </div>

                            <div class="widget widget-text" style="background-size: cover;">
                                <h4>About Us</h4>
                                <div class="small-border" style="background-size: cover;"></div>
                                <?php echo $blogs['short_description'] ?>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </section>
            
            
  </div>
        <!-- content close -->

<?php include "footer.php";?>