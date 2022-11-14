<button id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
    class="btn-primary p-2 border border-0 dropdown-toggle  <?= isset($page) && $page =='projects_per_department' ? "active" : "" ?>">Please
    Select College</button>
<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
    <?php 
                    $departments = $conn->query("SELECT * FROM department_list where status = 1 order by `name` asc");
                    $dI =  $departments->num_rows;
                    while($row = $departments->fetch_assoc()):
                      $dI--;
                  ?>
    <li>
        <a href="?page=projects_per_department&id=<?= $row['id'] ?>"
            class="dropdown-item"><?= ucwords($row['name']) ?></a>
        <?php if($dI != 0): ?>
    <li class="dropdown-divider"></li>
    <?php endif; ?>
    </li>
    <?php endwhile; ?>
</ul>
<h2 class="text-center h-100">Please Select College</h2>