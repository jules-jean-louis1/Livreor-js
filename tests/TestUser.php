<?php

use PHPUnit\Framework\TestCase;
require_once 'Classes/Users.php';
class TestUser extends TestCase
{
    protected $users;

    protected function setUp(): void
    {
        $this->users = new Users();
    }

    public function testCheckLogin(): void
    {
        $this->assertTrue($this->users->checkLogin('Citron'));
        $this->assertFalse($this->users->checkLogin('poire2'));
    }

    // public function testRegister(): void
    // {
    //     $this->assertTrue($this->users->register('poire', 'poire2'));
    //     $this->assertFalse($this->users->register('Citron', 'password'));
    // }

    public function testLogin(): void
    {
        $this->assertIsArray($this->users->login('Citron', 'password'));
        $this->assertFalse($this->users->login('Citron', 'password2'));
    }
}
