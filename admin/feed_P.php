<button id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
    class="btn-primary p-2 border border-0 dropdown-toggle  <?= isset($page) && $page =='projects_per_curriculum' ? "active" : "" ?>">Please
    Select Program</button>
<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
    <?php 
                    $curriculums = $conn->query("SELECT * FROM curriculum_list where status = 1 order by `name` asc");
                    $cI =  $curriculums->num_rows;
                    while($row = $curriculums->fetch_assoc()):
                      $cI--;
                  ?>
    <li>
        <a href="?page=projects_per_curriculum&id=<?= $row['id'] ?>"
            class="dropdown-item"><?= ucwords($row['name']) ?></a>
        <?php if($cI != 0): ?>
    <li class="dropdown-divider"></li>
    <?php endif; ?>
    </li>
    <?php endwhile; ?>
</ul>

<h2 class="text-center h-100">Please Select Program</h2>