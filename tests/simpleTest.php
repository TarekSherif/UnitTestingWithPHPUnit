<?php
use PHPUnit\Framework\TestCase;

class simpleTest extends TestCase
{
    protected $user;
    public function setUp():void
    {
        //  what diffrent bettween __constractor and  setUp void
        $this->user=new \App\Models\User();
        // setUp  run befor call any mythod
    }

   public function testThatWeCanGetTheFirstName():void
    {
        $this->user->setFirstName("Tarek");
        $this->assertEquals( "Tarek",$this->user->getFirstName());
    }
    /** @test */
    public function thatWeCanGetTheLastName():void
    {
        # code...
        
        $this->user->setLastName("Sherif");
        $this->assertEquals("Sherif", $this->user->getLastName());
    }
/** @test */
    public function thatWeCanGetTheFullName():void
    {
        # code...
        
        $this->user->setFirstName("Tarek");
        $this->user->setLastName("Sherif");
        $this->assertEquals("Tarek Sherif", $this->user->getFullName());
    }
    /** @test */
      public function thatWeCanGetTheEmail():void
    {
        # code...
        
        $email="Eng.tarek.sherif@gmail.com";
        $this->user->setEmail($email);
        $this->assertEquals($email,$this->user->getEmail() );
        $this->assertContains("@",$this->user->getEmail() );

    }
/** @test */
    public function checkArrayKeysValues():void
    {
        # code...
        
        $firstName="Tarek";
        $lastName="Sherif";
        $email="Eng.tarek.sherif@gmail.com";

        $this->user->setFirstName($firstName);
        $this->user->setLastName($lastName);
        $this->user->setEmail($email);


        $this->userData=$this->user->exportData();

        $this->assertArrayHasKey("firstName",$this->userData);
        $this->assertArrayHasKey("lastName",$this->userData);
        $this->assertArrayHasKey("fullName",$this->userData);
        $this->assertArrayHasKey("email",$this->userData);


        $this->assertEquals($firstName,$this->userData["firstName"]);
        $this->assertEquals($lastName,$this->userData["lastName"]);
        $this->assertEquals("$firstName $lastName",$this->userData["fullName"]);
        $this->assertEquals($email,$this->userData["email"]);

    }
    
}

// $this->assertTrue(True);
// $this->assertEquals("value","value");