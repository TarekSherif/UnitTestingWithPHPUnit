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
        $this->assertEquals( $this->user->getFirstName(),"Tarek");
    }
    /** @test */
    public function thatWeCanGetTheLastName():void
    {
        # code...
        
        $this->user->setLastName("Sherif");
        $this->assertEquals( $this->user->getLastName(),"Sherif");
    }
/** @test */
    public function thatWeCanGetTheFullName():void
    {
        # code...
        
        $this->user->setFirstName("Tarek");
        $this->user->setLastName("Sherif");
        $this->assertEquals( $this->user->getFullName(),"Tarek Sherif");
    }
    /** @test */
      public function thatWeCanGetTheEmail():void
    {
        # code...
        
        $email="Eng.tarek.sherif@gmail.com";
        $this->user->setEmail($email);
        $this->assertEquals($this->user->getEmail() ,$email);
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


        $this->assertEquals($this->userData["firstName"],$firstName);
        $this->assertEquals($this->userData["lastName"],$lastName);
        $this->assertEquals($this->userData["fullName"],"$firstName $lastName");
        $this->assertEquals($this->userData["email"],$email);

    }
    
}

// $this->assertTrue(True);
// $this->assertEquals("value","value");