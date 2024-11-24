<nav aria-label="Page navigation example">
    <ul class="pagination">

        <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= max(1, $page-1) ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
        </li>

        <?php for($page_number = 1; $page_number <= $totalPages; $page_number++): ?>
        <li class="page-item <?= $page_number == $currentPage ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $page_number ?>"><?= $page_number ?></a>
        </li>
        <?php endfor; ?> 

        <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= min($totalPages, $page+1) ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
        </li>

    </ul>
</nav>