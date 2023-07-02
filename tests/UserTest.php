<?php

namespace projectlily;

use PHPUnit\Framework\TestCase;

use App\components\user_sidebar;

class user_sidebar_test extends TestCase {

    public function testUserSidebar(){
    self::assertStringContainsString(
        "<ul class="list-group rounded-0">
    <a href="./index.php" class="list-group-item-action list-group-item">
        <p class="m-0 p-0 text-secondary">Hey, Welcome Back!</p>
        <h3 class="m-0 p-0 text-danger">' . $_SESSION['user_fullname'] . '</h3>
    </a>
    <a href="./tell_your_story.php" class="list-group-item-action list-group-item ' .
    ($active === 1 ? 'active' : '') . '">
      <i class="me-3 ' . ($active === 1 ? 'text-light' : 'text-secondary') . ' fas fa-chevron-right"></i>
      Tell Your <b class="' .  ($active === 1 ? 'text-light' : 'text-primary') . '">Story</b>
    </a>
    <a href="./about_project_lilly.php" class="list-group-item-action list-group-item ' .
    ($active === 2 ? 'active' : '') . '">
      <i class="me-3 ' . ($active === 2 ? 'text-light' : 'text-secondary') . ' fas fa-chevron-right"></i>
      About <b class="' . ($active === 2 ? 'text-light' : 'text-primary') . '">Project Lilly</b>
    </a>
    <a href="./about_aida.php" class="list-group-item-action list-group-item ' .
    ($active === 3 ? 'active' : '') . '">
      <i class="me-3 ' . ($active === 3 ? 'text-light' : 'text-secondary') . ' fas fa-chevron-right"></i>
      About <b class="' . ($active === 3 ? 'text-light' : 'text-primary') . '">AIDA</b>
    </a>
    <a href="./be_a_part_of_project_lilly.php" class="list-group-item-action list-group-item ' .
    ($active === 4 ? 'active' : '') . '">
      <i class="me-3 ' . ($active === 4 ? 'text-light' : 'text-secondary') . ' fas fa-chevron-right"></i>
      Be a Part of <b class="' . ($active === 4 ? 'text-light' : 'text-primary') . '">Project Lilly</b>
    </a>
    <a href="./logout.php" class="list-group-item-action list-group-item ' .
    ($active === 5 ? 'active' : '') . '">
      <i class="fas fa-sign-out-alt me-2 text-danger"></i>
      Logout
    </a>
  </ul>",
  3
  
}
  




    
// final class UserTest extends TestCase
// {
//     // Tests will go here
// }


  
