<?php
// index.php

// Include necessary classes
require_once '../classes/PageManager.php';
require_once '../classes/AwardManager.php';

// Initialize managers
$pageManager = new PageManager();
$awardManager = new AwardManager();

// Fetch data
$pages = $pageManager->getAllPages();
$awards = $awardManager->getAllAwards();

// Contact information variables
$address = "500 Main Street, Cincinnati, USA";
$phone = "+1 523 456 7890";
$email = "Group3@company.com";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Group 3 Landing Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS Styles -->
    <style>
        .section-padding {
            padding: 60px 0;
        }
        .award-item {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top" id="navbar">
    <div class="container">
        <a class="navbar-brand logo" href="#">
            <img src="images/logo-dark.png" alt="Company Logo" height="28" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Navigation Links -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#home">Home</a>
                </li>
                <?php if (!empty($pages)): ?>
                    <?php foreach ($pages as $page): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#page-<?= htmlspecialchars($page->getId()); ?>">
                                <?= htmlspecialchars($page->getTitle()); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="#awards">Awards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<!-- Main Section -->
<section id="home" class="section-padding" style="padding-top: 100px;">
    <div class="container">
        <h1 class="text-center">Welcome to Our Company Group 3</h1>
        <p class="lead text-center">
            We are committed to delivering the best services to our customers.
        </p>
    </div>
</section>

<!-- Dynamic Pages Section -->
<?php if (!empty($pages)): ?>
    <?php foreach ($pages as $page): ?>
        <section id="page-<?= htmlspecialchars($page->getId()); ?>" class="section-padding">
            <div class="container">
                <h2 class="text-center"><?= htmlspecialchars($page->getTitle()); ?></h2>
                <p><?= nl2br(htmlspecialchars($page->getContent())); ?></p>
            </div>
        </section>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Awards Section -->
<section id="awards" class="section-padding bg-light">
    <div class="container">
        <h2 class="text-center">Our Awards</h2>
        <div class="row">
            <?php if (!empty($awards)): ?>
                <?php foreach ($awards as $award): ?>
                    <div class="col-md-4 award-item">
                        <h4><?= htmlspecialchars($award->getName()); ?></h4>
                        <p><strong>Date:</strong> <?= htmlspecialchars($award->getDate()); ?></p>
                        <p><?= nl2br(htmlspecialchars($award->getDescription())); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">No awards to display at this time.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Contact Us Section -->
<section id="contact" class="section-padding">
    <div class="container">
        <h2 class="text-center">Contact Us</h2>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h4>Get In Touch</h4>
                <p><strong>Address:</strong> <?= htmlspecialchars($address); ?></p>
                <p><strong>Phone:</strong> <?= htmlspecialchars($phone); ?></p>
                <p><strong>Email:</strong> <a href="mailto:<?= htmlspecialchars($email); ?>"><?= htmlspecialchars($email); ?></a></p>
            </div>
        </div>
        <!-- Contact Form -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form action="contact_submit.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message:</label>
                        <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer bg-dark text-white py-3">
    <div class="container">
        <p class="text-center mb-0">&copy; <?= date('Y'); ?> Group 3. All rights reserved.</p>
    </div>
</footer>

<!-- JavaScript Files -->
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
