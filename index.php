<?php

include "data.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS-->
    <link rel = "stylesheet" href ="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <!-- Google Font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:wght@600&family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome Lib -->
    <script src="https://kit.fontawesome.com/fc0cf1c146.js" crossorigin="anonymous"></script>
    <!-- CSS  -->
    <link rel = "stylesheet" href = "style.css">
    <title>Covid-19 Tracker</title>

</head>
<body>
    <div class="container-fluid bg-light p-5 text-center my-3">
        <h1> Covid-19 Tracker </h1>
        <h5 class = "text-muted"> Keeping track of all the Covid-19 Cases around the world. </h5>
    </div>

    <div class="container my-5">
        <div class="row text-center">
            <div class="col-6 text-warning">
                <h5>Confirmed</h5>
                <?php echo $total_confirmed;?>
            </div>
            <!-- <div class="col-4 text-success">   all recovered cases are 0 in the json data so when using it use col-4 only in other divs also.
                <h5>Recovered</h5>
                <?php //echo $total_recovered;?> 
            </div> -->
            <div class="col-6 text-danger">
                <h5>Deceased</h5>
                <?php echo $total_deceased;?>
            </div>
        </div>
    </div>

    <div class="container bg-light p-3 my-3 text-center">
        <h5 class="text-info">"Prevention is the Cure!"</h5>
        <p class="text-muted">Stay Indoors. Stay Safe.</p>
    </div>

    <div class="container-fluid">
        <div class="table-responsive">
        <table class= "table">
            <thead class = "thead-dark">
                <tr class="bg-dark text-white">
                    <th scope="col">Countries</th>
                    <th scope="col">Confirmed</th>
                    <!-- <th scope="col">Recovered</th> -->
                    <th scope="col">Deceased</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($data as $key => $value){   //closed it in another php tag so that we can use the in-between empty space for html tags coz you can't use html tags in php
                        $increase = $value[$days_count]['confirmed'] - $value[$days_count_prev]['confirmed'];
                ?>
                    <tr>
                        <th><?php echo $key; ?> </th> <!-- key contains countries -->
                        <td>
                            <?php echo $value[$days_count]['confirmed']; ?>  <!-- this is 2D array, in the last object, ie the last date we are accessing the confirmed cases -->
                            <?php if($increase != 0){?>
                                <small class="text-danger p-2"><i class="fas fa-arrow-up"></i><?php echo $increase;?></small>
                            <?php }?>
                        </td>  
                        <!-- <td>
                            <?php// echo $value[$days_count]['recovered']; ?>  
                        </td>  -->
                        <td>
                            <?php echo $value[$days_count]['deaths']; ?>  
                        </td>   
                    </tr>

                <?php } ?>
            </tbody
            <tfoot>
      <tr>
        <td colspan="3" class="text-center text-muted bg-light py-4">Copyright &copy;2021, <a href="https://www.linkedin.com/in/kavya-garg-/">Kavya Garg</a></td>
      </tr>
    </tfoot>
        </table>
        </div>
    </div>


    <!-- This footer is coming above the table after Prevention idk why so had to comment out -->
    
    <!-- <footer class="footer mt-auto py-60px bg-light">
        <div class="container text-center">
        <span class="text-muted">Copyright &copy;2021, <a href="https://www.linkedin.com/in/kavya-garg-/">Kavya Garg</a></span>
        </div>
    </footer> -->
    

</body>
</html>