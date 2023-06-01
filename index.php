// Route to homepage
if (isset($_GET['login'])) {
    require VIEWS . '/login/layout.php';
    exit();
} elseif (isset($_GET['id']) && !empty($_GET['id'])) {
    $errors = array();
    require DB;

    $list = null;
    try {
        $articleID = $_GET['id']; // Get the 'id' parameter from the URL
        $query = "SELECT article_ID FROM article_content WHERE article_ID = ?";
        $statement = $db->prepare($query);
        $statement->execute(array($articleID));
        $list = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (empty($list)) {
            require VIEWS . '/404.php';
        } else {
            require VIEWS . '/article_body.layout.php';
        }
    } catch (PDOException $e) {
        $errors[] = "Statement error because: {$e->getMessage()}";
        require 'db_error.html.php';
        exit();
    }
    exit();
} elseif (isset($_GET['upload'])) {
    $errors = array();
    require DB;

    $list = null;
    try {
        require VIEWS . '/article_upload.layout.php';
        require MODELS . '/article_upload.php';
    } catch (PDOException $e) {
        $errors[] = "Statement error because: {$e->getMessage()}";
        require VIEWS . '/db_error.html.php';
        exit();
    }
    exit();
} elseif (isset($_GET['search']) && !empty($_GET['search'])) {
    $errors = array();
    require DB;

    $list = null;
    try {
        require MODELS . '/search.results.php';
    } catch (PDOException $e) {
        $errors[] = "Statement error because: {$e->getMessage()}";
        require VIEWS . '/db_error.html.php';
        exit();
    }
    exit();
} else {
    $errors = array();
    require DB;

    $list = null;
    try {
        require VIEWS . '/site_home.layout.php';
    } catch (PDOException $e) {
        $errors[] = "Statement error because: {$e->getMessage()}";
        require VIEWS . '/db_error.html.php';
        exit();
    }
    exit();
}
