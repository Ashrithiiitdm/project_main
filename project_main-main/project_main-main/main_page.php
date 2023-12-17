<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <style>
    /* Add this style for dropdown menu */
    .purchase-dropdown {
      position: relative;
      display: inline-block;
    }

    .purchase-dropdown-content {
      display: none;
      position: absolute;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      z-index: 1;
      margin-top: 5px;
      border-radius: 5px;
      transition: display 0.5s; /* Add a transition for smooth display/hide */
    }

    .purchase-dropdown:hover .purchase-dropdown-content,
    .purchase-dropdown-content.show {
      display: flex;
      flex-direction: column-reverse;
    }

    .purchase-dropdown-content a {
      color: #333;
      padding: 10px 20px;
      text-decoration: none;
      display: block;
    }

    .purchase-dropdown-content a:hover {
      background-color: #f0f0f0;
    }

    /* Adjust the position of other buttons when dropdown is displayed */
    .purchase-dropdown:hover + .supplier,
    .purchase-dropdown:hover + .cost,
    .purchase-dropdown:hover + .Risk_management {
      margin-top: 100px;
    }
  </style>

  <title>VIKRAM SEVA KENDRA for SMEs</title>
</head>
<body>

  <header>
    <h1>VIKRAM SEVA KENDRA for SMEs</h1>
  </header>
   
  <nav>
    <a href="#" onclick="showTab('dashboard')">Dashboard</a>
    <a href="#" onclick="showTab('assistant')">Personal Assistant</a>
  </nav>
  
  <section id="dashboard">
    <h2 class="dash">Welcome to Dashboard !</h2>
    <!-- Your Dashboard page content goes here -->
    <div class="performance">
    <button id="myButton1" onclick="redirectTo('performance.php')">Performance</button>
    </div>
    <div class="purchase-dropdown">
      <button id="myButton2" onclick="toggleDropdown()">Purchase options</button>
      <div class="purchase-dropdown-content">
        <!-- Add inner options content here -->
        <a href="view_inventory.html" target="_blank">View Inventory</a>
        <a href="check_purchases.php" target="_blank">Check Purchases</a>
      </div>
    </div>
    <div class="supplier">
      <button id="myButton3" onclick="redirectTo('csv.php','_blank')">Supplier management</button>
    </div>
    <div class="cost">
      <button id="myButton4" onclick="redirectTo('#')">Cost management</button>
    </div>
    <div class="Risk_management">
      <button id="myButton5" onclick="redirectTo('#')">Risk management</button>
    </div>
  </section>

  <section id="assistant" style="display:none;">
    <!-- Your Personal Assistant page content goes here -->
    <h2>Personal Assistant Page</h2>
    <p>Welcome to the Personal Assistant!</p>
    <iframe
      src="https://www.chatbase.co/chatbot-iframe/jqf7NNQH6ltM1y0uxj-Iw"
      width="80%"
      style="height: 30%; min-height: 700px"
      frameborder="0"
     ></iframe>
      <!-- <script>
        window.embeddedChatbotConfig = {
        chatbotId: "jqf7NNQH6ltM1y0uxj-Iw",
        domain: "www.chatbase.co"
        }
        </script>
        <script
        src="https://www.chatbase.co/embed.min.js"
        chatbotId="jqf7NNQH6ltM1y0uxj-Iw"
        domain="www.chatbase.co"
        defer>
        </script> -->

  </section>

  <footer>
    <p>&copy; 2023 TRIMatrix. All rights reserved.</p>
  </footer>

  <script>
    let timeoutId; // Variable to store the timeout ID

    function showTab(tabName) {
      // Hide all sections
      document.querySelectorAll('section').forEach(section => {
        section.style.display = 'none';
      });

      // Show the selected section
      document.getElementById(tabName).style.display = 'block';
    }

    function redirectTo(page) {
      window.location.href = page;
    }

    function changeTextColor() {
      var dashElement = document.querySelector('.dash');
      var currentColor = getComputedStyle(dashElement).color;

      // Generate a random color (you can customize this part)
      var randomColor = '#' + Math.floor(Math.random()*16777215).toString(16);

      // Change the text color
      dashElement.style.color = randomColor;

      // Schedule the next color change after 2 seconds
      setTimeout(changeTextColor, 2000);
    }

    function toggleDropdown() {
      // Toggle the class to show/hide the dropdown content
      const dropdownContent = document.querySelector('.purchase-dropdown-content');
      dropdownContent.classList.toggle('show');

      // If the dropdown is shown, set a timeout to hide it after 5 seconds
      if (dropdownContent.classList.contains('show')) {
        timeoutId = setTimeout(() => {
          dropdownContent.classList.remove('show');
        }, 5000);
      } else {
        // If the dropdown is hidden, clear the previous timeout
        clearTimeout(timeoutId);
      }
    }

    // Start the color change process
    changeTextColor();
  </script>

</body>
</html>
