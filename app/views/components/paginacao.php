<nav aria-label="Page navigation example" class='pagination'>
    <ul class="pagination">

        <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= max(1, $page-1) ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
        </li>

        <li class="page-item <?= $page == 1 ? 'active' : '' ?>">
            <a class="page-link" href="?page=1">1</a>
        </li>

        <?php if ($page > 4): ?>
            <li class="page-item disabled"><span class="page-link">...</span></li>
        <?php endif; ?>

        <?php for ($page_number = max(2, $page - 2); $page_number <= min($totalPages - 1, $page + 2); $page_number++): ?>
            <li class="page-item <?= $page_number == $page ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $page_number ?>"><?= $page_number ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($page < $totalPages - 3): ?>
            <li class="page-item disabled"><span class="page-link">...</span></li>
        <?php endif; ?>

        <li class="page-item <?= $page == $totalPages ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $totalPages ?>"><?= $totalPages ?></a>
        </li>

        <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= min($totalPages, $page+1) ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
        </li>

    </ul>
</nav>