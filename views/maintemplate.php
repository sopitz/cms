<!-- ToDo: make meta tags available for every single page. not just globally -->
<!DOCTYPE html>
<html>
<head>
<meta name="description" content="<?php echo $viewModel->get('description'); ?>">
<meta name="keywords" content="<?php echo $viewModel->get('keywords'); ?>">
<meta name="author" content="<?php echo $viewModel->get('author'); ?>">
<meta charset="UTF-8">
<title><?php echo $viewModel->get('pageTitle'); ?></title>
</head>
<body>
<?php require($this->viewFile); ?>
</body>
</html>