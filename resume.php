<?php

// Include your PHP logic here
include 'includes/config.php'; // Include your database configuration file
$pdo = Database::connection(); // Establish a PDO connection

$app_id =$_POST['app_id'];


    try {

        // Query application_list to get the app_id
        $sql = "SELECT app_id FROM application_list WHERE app_id = :app_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':app_id', $app_id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the app_id and store it in a variable
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $id = $result['app_id']; // Store the app_id in a variable

            // Use the variable $id in the second query
            $sql1 = "SELECT * FROM user_resume WHERE app_id = :id";

            // Prepare and execute the query
            $stmt = $pdo->prepare($sql1);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Fetch all rows as an associative array
            $resumeData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "Application not found";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    0


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>RESUME</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" />
    <link rel="stylesheet" href="plugins/assets/vendor/css/core.css" class="template-customizer-core-css">
    <link rel="stylesheet" href="plugins/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
    <link rel="stylesheet" href="plugins/assets/css/demo.css">
    <link rel="stylesheet" href="css/resume.css">

</head>
<body>
<div id="doc2" class="yui-t7">
<div id="inner">
    <div id="resume">
        <div id="hd">
            <div class="yui-gc">
                <div class="yui-u first">
                <?php
        foreach ($resumeData as $row) {
                    $name = $row['fullname'];
                    $position = $row['position'];

                    echo '<h1>'.$name.'</h1>';
                    echo '<h2>'.$position.'</h2>';
        }
                    ?>
                </div>

                <div class="yui-u">
                <div class="contact-info">
                        <?php
                        foreach ($resumeData as $row) {
                            $contacts = $row['contacts'];
                            $contactarray = explode(', ', $contacts);
                            $address = $row['address'];
                            for ($i = 0; $i < count($contactarray); $i++) {
                                echo '<h3>' . $contactarray[$i] . '</h3>';
                            }
                            echo '<p>' . $address . '</p>';
                        }
                        ?>
                    </div><!--// .contact-info -->
                </div>
            </div><!--// .yui-gc -->
        </div><!--// hd -->
      </div>

      <div id="resume">
        <div id="bd">
            <div id="yui-main">
                <div class="yui-b">
                    <div class="yui-gf">
                        <div class="yui-u first">
                            <h2>Summary</h2>
                        </div>
                        <div class="yui-u">
                            <?php
                                $summary = $row['summary'];

                              echo '<p class="enlarge">'. $summary .'</p>';

                            ?>

                        </div>
                    </div><!--// .yui-gf -->

                    <div class="yui-gf">
                        <div class="yui-u first">
                            <h2>Education</h2>
                        </div>
                        <div class="yui-u">
                    <?php
                        foreach ($resumeData as $row) {
                            $school = $row['schools'];
                            $school_a = $row['school_address'];
                            $school_y = $row['school_sy'];

                            $school_array = explode(', ', $school);
                            $school_a_array = explode(', ', $school_a);
                            $school_y_array = explode(', ', $school_y);

                            // Check if all arrays have the same length before looping through them
                            $array_length = count($school_array);

                            for ($i = 0; $i < $array_length; $i++) {
                                echo '<div class="job">';
                                echo '<h2><strong>' . $school_array[$i] . '</strong></h2>';
                                echo '<h3>' . $school_a_array[$i] . '</h3>';
                                echo '<h4>' . $school_y_array[$i] . '</h4>';
                                echo '</div>';
                            }
                        }
                        ?>

                        </div>
                    </div>

                    <div class="yui-gf">
                        <div class="yui-u first">
                            <h2>Experience</h2>
                        </div>
                        <div class="yui-u">
                            <?php
                            // Iterate through the resume data and display experience information
                            foreach ($resumeData as $row) {
                                $expCompany = $row['exp_company'];
                                $expPosition = $row['exp_position'];
                                $expExperience = $row['work_exp'];
                                $expYear = $row ['exp_year'];

                                $companyArray = explode(', ', $expCompany);
                                $positionArray = explode(', ', $expPosition);
                                $experienceArray = explode(', ', $expExperience);
                                $expyear = explode(', ',$expYear);

                                for ($i = 0; $i < count($companyArray); $i++) {
                                    echo '<div class="job">';
                                    echo '<h2>' . $companyArray[$i] . '</h2>';
                                    echo '<h3>' . $positionArray[$i] . '</h3>';
                                    echo '<h4>'.$expyear[$i].'</h4>';
                                    echo '<p>' . $experienceArray[$i] . '</p>';

                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="yui-gf">
    <div class="">
        <h2>Skills</h2>

                    <?php
            $skills = $row['skills'];
            $skills_array = explode(',  ', $skills);

            for($i = 0; $i < count($skills_array); $i++) {
                echo ' •  ' . $skills_array[$i] . '   ';
            }
            echo '<br>';
            ?>

    </div>
</div>





                    <div class="yui-gf">
                        <div class="yui-u first">
                            <h2>Certificates</h2>
                        </div>
                        <div class="yui-u">


                       <?php

foreach ($resumeData as $row) {
    $cert = $row['cert_desc']; // Remove single quotes
    $cert_year = $row['cert_year']; // Remove single quotes

    $cert_array = explode(', ', $cert);
    $certyear_array = explode(', ', $cert_year);

    for ($i = 0; $i < count($cert_array); $i++) {
        echo '<div class="job">';
        echo '<h3><strong>' . $cert_array[$i] . '</strong></h3>';
        echo '<h4>' . $certyear_array[$i] . '</h4>';
        echo '<br>';
        echo '</div>';
    }
}




                       ?>
                       </div>
                        </div>
                    </div>
                </div><!--// .yui-b -->
            </div><!--// yui-main -->
        </div><!--// bd -->
    </div><!-- // inner -->
</div>
</div><!--// doc -->
</body>
</html>
