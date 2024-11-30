<?php
$conn = mysqli_connect('localhost', 'root', '', 'ajax');

$limt = 4;
if (isset($_POST['page_no'])) {
  $page = $_POST['page_no'];
} else {
  $page = 1;
}
$offset = ($page - 1) * $limt;
$sql = "SELECT * FROM emp LIMIT {$offset},{$limt}";
$result = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($result) > 0) {
  $output .= '    <table class="table table-success">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>

            </tr>
          </thead>
          ';
  while ($row = mysqli_fetch_assoc($result)) {
    $output .= " <tr>

          <td>{$row['id']}</td>
              <td>{$row['name']}</td>
              <td>{$row['email']}</td>

           </tr>";
  }
  $output .= "</tbody></table>";
  $sql_total = "SELECT * FROM emp";
  $records = mysqli_query($conn, $sql_total);
  $total_records = mysqli_num_rows($records);
  $total_pages = ceil($total_records / $limt);
  $output .= '    <div id="paginaton">';
  for ($i = 1; $i <= $total_pages; $i++) {

    $output .= "<a href=''  id='{$i}' class='ative btn btn-primary'>{$i}</a>";
  }

  $output .= '</div>';

  echo $output;
}
