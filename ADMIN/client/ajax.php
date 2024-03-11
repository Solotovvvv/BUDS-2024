<?php
require_once '../../includes/config.php';

$pdo = Database::connection();

if (isset($_POST['category'])) {
    $selected_category = $_POST['category'];

    try {
        // Fetch data for the selected category (modify your SQL query)
        $sql = "SELECT * FROM subcategory_list WHERE catId = :category";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':category', $selected_category, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Construct the HTML response
        $html = '';
        foreach ($result as $row) {
            $html .= '<tr>
                        <td>'.$row['ID'].'</td>
                        <td>'.$row['subCategory'].'</td>
                        <td>
                          <div class="text-center" role="group">
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel">
                              <i class="bx bx-trash-alt"></i>
                            </button>
                          </div>
                        </td>
                      </tr>';

        }

        // Return the HTML response
        echo $html;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $pdo = null;
}
?>
