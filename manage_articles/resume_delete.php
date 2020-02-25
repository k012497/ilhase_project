<?php
    include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/db_connector.php";
    $num   = $_GET["num"];


        $sql = "select * from resume where num = $num";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $copied_name = $row["file_copied"];

        if ($copied_name) {
            $file_path = "./data/".$copied_name;
            unlink($file_path);
        }

        $sql = "delete from resume where num = $num";
        mysqli_query($conn, $sql);


        echo "
             <script>
                 location.href = 'manage_recruitment_form.php';
             </script>
           ";

        mysqli_close($conn);
