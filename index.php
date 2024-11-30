<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <div class="container">
      <div id="main">
        <h1>PHP & AJAX PAGINATION</h1>
        <br />
        <div id="table-data"></div>
      </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script>
      $(document).ready(function () {
        function loadtable(page) {
          $.ajax({
            url: "pagination.php",
            type: "POST",
            data: {
              page_no: page,
            },
            success: function (r) {
              $("#table-data").html(r);
            },
          });
        }
        loadtable();
        // pagination code
        $(document).on("click", "#pagination a", function (e) {
          e.preventDefault();
          var page_id = $(this).attr("id");
          loadtable(page_id);
        });
      });
    </script>
  </body>
</html>
