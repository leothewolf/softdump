<!DOCTYPE html>
<html>
  <head>
    <title>Title of the Document</title>
  </head>
  <body>
    
    <div class="flyout" id="flyout-example">
      <input type="text">
      <div class="flyout-debug" id="flyout-debug"></div>
    </div>
    <script>
      document.addEventListener("click", (evt) => {
        const flyoutEl = document.getElementById("flyout-example");
        let targetEl = evt.target; // clicked element      
        do {
          if(targetEl == flyoutEl) {
            // This is a click inside, does nothing, just return.
            document.getElementById("flyout-debug").textContent = "Typing...";
            return;
          }
          // Go up the DOM
          targetEl = targetEl.parentNode;
        } while (targetEl);
        // This is a click outside.      
        document.getElementById("flyout-debug").textContent = "";
      });
    </script>
  
  </body>
</html>