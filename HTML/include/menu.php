<!-- menu.php -->

<div id="menu">
  <ul>
    <li>
      <a href="." class="<?php if ($_SERVER["REQUEST_URI"] == '/' or 
                            $_SERVER["REQUEST_URI"] == '/index.php'or isset($_GET['view']) or 
                            isset($_GET['cat'])or isset($_GET['subcat']) or isset($_GET['edit']) or 
                            isset($_GET['based'])){echo 'selected';}?>">
        <span class="fa fa-archive fa-lg">
        </span> My components
      </a>
    </li>
    <li>
      <a href="add.php" class="<?php if ($_SERVER["REQUEST_URI"] == '/add.php'){echo 'selected';}?>">
        <span class="fa fa-plus-square fa-lg">
        </span> Add component
      </a>
    </li>
    <li>
      <a href="shoplist.php" class="<?php if ($_SERVER["REQUEST_URI"] == '/shoplist.php'){echo 'selected';}?>">
        <span class="fa fa-shopping-basket fa-lg">
        </span> Shopping list
      </a>
    </li>
    <li>
      <a href="proj_list.php" class="<?php if ($_SERVER["REQUEST_URI"] == '/proj_list.php' or isset($_GET['proj_id'])){echo 'selected';}?>">
        <span class="fa fa-rocket fa-lg">
        </span> Projects
      </a>
    </li>
    <li>
      <a href="my.php" class="<?php if ($_SERVER["REQUEST_URI"] == '/my.php'){echo 'selected';}?>">
        <span class="fa fa-user fa-lg">
        </span> My settings
      </a>
    </li>
        <li>
      <a href="maintenance.php" class="<?php if ($_SERVER["REQUEST_URI"] == '/maintenance.php'){echo 'selected';}?>">
        <span class="fa fa-cog fa-lg">
        </span> Reference items
      </a>
    </li>



  </ul>
</div>
