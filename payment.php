<!-- payment.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Payment Page</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npmza/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
      crossorigin="anonymous"
    ></script>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link 
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Cormorant:wght@500;700&family=Inconsolata:wght@400;500&family=Krona+One&family=Lexend+Exa:wght@600;800&family=Lexend+Tera:wght@200;600;800;900&family=Playfair+Display:ital@0;1&family=Poppins:wght@400;600;700&family=Yeseva+One&display=swap"
      rel="stylesheet"
    />

    <!--External css-->
    <link rel="stylesheet" href="stylenew.css" />
    <link rel="stylesheet" href="style-payment.css">

    <!--Icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body class="my-login-page">

<nav class="navbar-dark navbar navbar-expand-lg newnav sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"
          ><img src="logo.jpg" alt="" class="logo" /> EVENTIUM</a
        >
        <button
          class="navbar-toggler hambur"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link nlist" aria-current="page" href="index.html"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link nlist" href="index.html#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nlist" href="pricing.html">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nlist" href="index.html#contact">Contact</a>
            </li>
        </div>
      </div>
    </nav>
    
<div class="container-payment">
    <section class="h-100 sub-container-payment">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper card-payment">
                    <div class="card-fat">
                        <div class="card-body">
                            <h3 class="card-title">Payment Page</h3>
                           
                            <form action="berhasil_payment.php" method="POST" class="my-login-validation">
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input id="fullname" type="text" class="form-style" placeholder="Please add your Full Name!" name="fullname" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input id="email" type="email" class="form-style" placeholder="Please add your Email Address!" name="email" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input id="phone" type="number" class="form-style" placeholder="Please add your Phone Number!" name="phone" required>
                                </div>

                                <div class="form-group drop-group">
                                    <label for="service">Eventium Service</label>
                                    <select class="form-style-drop" name="service" id="service" onchange="updatePackageDropdown()" required>
                                        <option class="opt"  value="0" disabled selected>-Select-</option>
                                        <option class="opt" >Event Organizer</option>
                                        <option class="opt" >Hall Reservation</option>
                                        <option class="opt" >EO & Hall Reservation</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="package">Eventium Package</label>
                                    <select class="form-style-drop" name="package" id="package" onchange="updateTotal()" required>
                                        <option class="opt" value="0" disabled selected>-Select-</option>
                                        <option class="opt" value="Gold">Gold</option>
                                        <option class="opt" value="Diamond">Diamond</option>
                                        <option class="opt"  value="Platinum">Platinum</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input id="date" type="date" class="form-style cale" placeholder="Please add the Date!" name="date" required>
                                </div>

                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea name="note" class="form-style-text" id="note" cols="30" rows="10"
                                        placeholder="Write down your order details"></textarea>
                                </div>

                                <!-- Pricing display -->
                                <div id="totalPrice" class="mt-3" style="color: gold;"></div>
                                <div class="form-group m-0">

                                    <button type="submit" class="btn btn-block newbtn btn-buy">
                                        Order
                                    </button>
                                     
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    </section>
    

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var serviceDropdown = document.getElementById('service');
            var packageDropdown = document.getElementById('package');
    
            // Disable package dropdown initially
            packageDropdown.disabled = true;
    
            // Add event listener to service dropdown
            serviceDropdown.addEventListener('change', function () {
                // Enable or disable the package dropdown based on the selected service
                packageDropdown.disabled = serviceDropdown.value === "0";
    
                // Reset package selection when service changes
                if (serviceDropdown.value === "0") {
                    packageDropdown.value = "0";
                }
    
                // Update the total when the service changes
                updateTotal();
            });
    
            // Add event listener to package dropdown
            packageDropdown.addEventListener('change', function () {
                // Update the total when the package changes
                updateTotal();
            });
        });
    
        function updateTotal() {
            var packagePrice = 0;
            var selectedPackage = document.getElementById('package').value;
            var selectedService = document.getElementById('service').value;
    
            // Update package price based on the selected service
            if (selectedService === "Event Organizer") {
                if (selectedPackage === "Gold") {
                    packagePrice = 4198;
                } else if (selectedPackage === "Diamond") {
                    packagePrice = 5490;
                } else if (selectedPackage === "Platinum") {
                    packagePrice = 12950;
                }
            } else if (selectedService === "Hall Reservation") {
                if (selectedPackage === "Gold") {
                    packagePrice = 9710;
                } else if (selectedPackage === "Diamond") {
                    packagePrice = 18919;
                } else if (selectedPackage === "Platinum") {
                    packagePrice = 32299;
                }
            } else if (selectedService === "EO & Hall Reservation") {
                if (selectedPackage === "Gold") {
                    packagePrice = 14201;
                } else if (selectedPackage === "Diamond") {
                    packagePrice = 25851;
                } else if (selectedPackage === "Platinum") {
                    packagePrice = 45185;
                }
            }
    
            var totalPrice = packagePrice;
            document.getElementById('totalPrice').innerHTML = 'Total Price: $' + totalPrice.toLocaleString('en-US', { maximumFractionDigits: 3 });
        }
    </script>
    
    
</body>

</html>