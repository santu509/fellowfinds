<?php
session_start();
include 'connection.php';
global $connect;

$message = "";

if(isset($_POST['upload_resource']))
{
    $user_id = $_SESSION['user_id'] ?? 1;

    $title = mysqli_real_escape_string($connect,$_POST['title']);
    $category_id = (int)$_POST['category_id'];
    $description = mysqli_real_escape_string($connect,$_POST['description']);
    $price = !empty($_POST['price']) ? $_POST['price'] : 0;
    $type = mysqli_real_escape_string($connect,$_POST['type']);

    $upload_dir = "uploads/";

    if(!file_exists($upload_dir))
    {
        mkdir($upload_dir,0777,true);
    }

    if(isset($_FILES['upload_file']) && $_FILES['upload_file']['error'] == 0)
    {
        $file_name = $_FILES['upload_file']['name'];
        $tmp_name = $_FILES['upload_file']['tmp_name'];

        $extension = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));

        $allowed = ['jpg','jpeg','png','gif','pdf'];

        if(in_array($extension,$allowed))
        {
            $new_file_name = time().'_'.uniqid().'.'.$extension;

            $upload_path = $upload_dir.$new_file_name;

            if(move_uploaded_file($tmp_name,$upload_path))
            {
                $sql = "INSERT INTO resources
                (
                    user_id,
                    category_id,
                    title,
                    description,
                    price,
                    image,
                    type,
                    status
                )
                VALUES
                (
                    '$user_id',
                    '$category_id',
                    '$title',
                    '$description',
                    '$price',
                    '$upload_path',
                    '$type',
                    'available'
                )";

                $insert = mysqli_query($connect,$sql);

                if($insert)
                {
                    $_SESSION['success_message'] =
                    "Resource Uploaded Successfully!";

                    header("Location: index.php");
                    exit();
                }
                else
                {
                    $message = "<div class='alert alert-danger'>
                    ".mysqli_error($connect)."
                    </div>";
                }
            }
            else
            {
                $message = "<div class='alert alert-danger'>
                File Upload Failed!
                </div>";
            }
        }
        else
        {
            $message = "<div class='alert alert-warning'>
            Only JPG, JPEG, PNG, GIF and PDF files allowed.
            </div>";
        }
    }
}

include 'nav.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <?= $message ?>

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4>Upload Resource</h4>
                </div>

                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label>Category</label>

                            <select name="category_id"
                                    class="form-select"
                                    required>

                                <option value="">
                                    Select Category
                                </option>

                                <?php
                                $cat_query = mysqli_query(
                                    $connect,
                                    "SELECT * FROM categories
                                     ORDER BY category_name ASC"
                                );

                                while($cat = mysqli_fetch_assoc($cat_query))
                                {
                                ?>
                                    <option value="<?= $cat['id'] ?>">
                                        <?= htmlspecialchars($cat['category_name']) ?>
                                    </option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description"
                                      class="form-control"
                                      rows="4"></textarea>
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label>Type</label>

                                <select name="type"
                                        class="form-select">

                                    <option value="sell">Sell</option>
                                    <option value="exchange">Exchange</option>
                                    <option value="donate">Donate</option>

                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Price</label>

                                <input type="number"
                                       step="0.01"
                                       name="price"
                                       class="form-control">
                            </div>

                        </div>

                        <div class="mb-3">
                            <label>Upload File</label>

                            <input type="file"
                                   name="upload_file"
                                   class="form-control"
                                   accept=".pdf,.jpg,.jpeg,.png,.gif"
                                   required>
                        </div>
                        <button type="submit"
                                name="upload_resource"
                                class="btn btn-primary w-100">
                            Upload Resource
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
