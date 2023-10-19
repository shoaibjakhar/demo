<?php require('partials/head.php'); ?>

<?php require('partials/nav.php'); ?>

<?php require('partials/banner.php'); ?>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <ul>    
                <?php foreach($notes as $note) : ?>
                    <a href="/note?id=<?php echo $note['id'] ?>" class="text-blue-500 hover:underline">
                        <li><?= htmlspecialchars($note['body']); ?></li>
                    </a>
                <?php endforeach ?>
            </ul>
            <p class="mt-6">
                <a href="/note-create" class="text-blue-500 hover:underline">Create Note</a>
            </p>
            </div>
        </main>
    
<?php require('partials/footer.php'); ?>

        