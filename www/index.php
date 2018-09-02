<html>
<head>
  <title>Test</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    function funcBefore () {
      $("#information").text ("Wait please...");
    }

    function funcSuccess (data) {
      $("#information").text (data);
    }

    $(document).ready (function () {
      $("#load").bind("click", function () {
      var admin = "Admin";
        $.ajax ({
           url: "content.php",
           type: "POST",
           data: ({name: admin, number: 5}),
           dataType: "html",
           beforeSend: funcBefore,
           success: funcSuccess
        });
      });

      $("#done").bind("click", function () {
        $.ajax ({
           url: "check.php",
           type: "POST",
           data: ({name: $("#name").val()}),
           dataType: "html",
           beforeSend: function () {
             $("#information").text ("Wait please...");
           },
           success: function (data) {
             if(data == "Fail")
               alert("Busy name");
             else
               $("#information").text (data);
           }
        });
      });

    });
  </script>
</head>
<body>
  <input type="text" id="name" placeholder="Enter your name" />
  <input type="button" id="done" value="Ready" />
  <p id="load" style="cursor:pointer">Download data</p>
  <div id="information"></div>
</body>
</html>
