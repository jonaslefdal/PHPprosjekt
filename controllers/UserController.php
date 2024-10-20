<?php

class UserController
{
    // Show the registration form
    public function showRegistrationForm($errors = [], $navn = '', $mobil = '', $email = '')
    {
        // Pass errors and input values to the view
        require '../views/registrer_view.php';
    }

    // Handle form submission (POST request)
    public function registerUser()
    {
        require_once '../config/config.php'; 

        global $link; 


        // Initialize variables
        $navn = $mobil = $email = "";
        $errors = [];

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
          
             $navn = $_POST['navn'] ?? '';
             $mobil = $_POST['mobil'] ?? '';
             $email = $_POST['email'] ?? '';
            
            // Validate 'navn'
            if (empty($_POST["navn"])) {
                $errors['navn'] = "Navn er påkrevd.";
            } else {
                $nyBruker['navn'] = $_POST["navn"];
                if (!preg_match("/^[a-zA-Z-' ]*$/", $nyBruker['navn'])) {
                    $errors['navn'] = "Kun bokstaver og mellomrom er tillatt i navnet.";
                }
            }

            // Validate 'mobil'
            if (empty($_POST["mobil"])) {
                $errors['mobil'] = "Mobilnummer er påkrevd.";
            } else {
                $nyBruker['mobil'] = $_POST["mobil"];
                if (!preg_match("/^[0-9]{8}$/", $nyBruker['mobil'])) {
                    $errors['mobil'] = "Mobilnummer må være et 8-sifret nummer.";
                }
            }

            // Validate 'email'
            if (empty($_POST["email"])) {
                $errors['email'] = "E-post er påkrevd.";
            } else {
                $nyBruker['email'] = $_POST["email"];
                if (!filter_var($nyBruker['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Ugyldig e-postformat.";
                }
            }
            // If no validation errors, insert into the database
            if (empty($errors)) {
                $sql = "INSERT INTO test (test2, test3, test4) VALUES (?, ?, ?)";

                if ($stmt = mysqli_prepare($link, $sql)) {
                    // Bind variables to the prepared statement
                    mysqli_stmt_bind_param($stmt, "sss", $navn, $mobil, $email);

                
                    if (mysqli_stmt_execute($stmt)) {
                        header("Location: registrer.php?status=success");
                        exit;
                    } else {
                        echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
                    }

                
                    mysqli_stmt_close($stmt);
                } else {
                    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
                }
            }
        }

       
        $this->showRegistrationForm($errors, $nyBruker['navn'] ?? '', $nyBruker['mobil'] ?? '', $nyBruker['email'] ?? '');
    }
}
