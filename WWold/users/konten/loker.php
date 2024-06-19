<div id="loker">
        <?php
        // Include the connection file to establish a database connection
        include 'koneksi.php';

        // Check if the connection is successful
        if ($koneksi) {
            // Prepare statement to retrieve data from the 'loker' table
            $stmt = $koneksi->prepare("SELECT * FROM `loker`");

            // Check if the statement preparation was successful
            if ($stmt) {
                // Execute the prepared statement
                $stmt->execute();

                // Get the result set from the executed statement
                $result = $stmt->get_result();

                // Check if there are rows in the result set
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        // Display the data in card format
                        echo '<div class="card mb-3">';
                        echo '<div class="row g-0">';
                        echo '<div class="col-md-4">';
                        echo '</div>';
                        echo '<div class="col-md-8">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row["posisi"] . '</h5>';
                        echo '<p class="card-text">' . $row["syarat_pekerjaan"] . '</p>';
                        echo '<span class="badge rounded-pill text-bg-secondary">' . $row["besaran_gaji"] . '</span>';
                        echo '</div>';
                        echo '<div class="card-footer text-end text-muted">Last updated today.</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "Tidak ada data lowongan kerja.";
                }

                // Close the prepared statement
                $stmt->close();
            } else {
                echo "Error in preparing SQL statement.";
            }

            // Close the database connection
            $koneksi->close();
        } else {
            echo "Error in establishing database connection.";
        }
        ?>
    </div>