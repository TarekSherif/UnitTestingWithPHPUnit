<?php
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
 
    /** @test */
    public function emptyInstantiatedCollectionReturnsNoItem():void
    {
        $collection=new \App\Support\Collection;
        $this->assertEmpty( $collection->get());
    }
   /** @test */
    public function checkCollectionCount():void
    {
        $collection=new \App\Support\Collection([
            "One","Two","Three"
        ]);
        $this->assertEquals( 3,$collection->count());
          $this->assertCount(3, $collection->get());
          $this->assertEquals( "One",$collection->get()[0]);
          $this->assertEquals( "Two",$collection->get()[1]);
          $this->assertEquals( "Three",$collection->get()[2]);

    }
/** @test */
        public function collection_Is_Instance_of_iterator_aggregate():void
    {
        $collection=new \App\Support\Collection;

         $this->assertInstanceOf( IteratorAggregate::class,$collection);
       
    }
    
/** @test */
        public function collection_Can_be_iterated():void
    {
       $collection=new \App\Support\Collection([
            "One","Two","Three"
        ]);
        $items=[];
    
        foreach ($collection as $item) {
           $items[]=$item;
        }


         $this->assertCount(3, $items);
         $this->assertCount(3, $collection);
         $this->assertInstanceOf( ArrayIterator::class,$collection->getIterator());
         

    }
    /** @test */
        public function collection_Can_be_merged_with_another_collection():void
    {
        $collection1=new \App\Support\Collection(["one","two"]);
        $collection2=new \App\Support\Collection(["three","four"]);

         $collection3=$collection1->merge($collection2);

          $this->assertCount(4, $collection3);
            
    }

        /** @test */
        public function collection_Can_be_Add_another_collection():void
    {
        $collection1=new \App\Support\Collection(["one","two"]);
        $collection2=new \App\Support\Collection(["three","four"]);

         $collection1->add($collection2);

          $this->assertCount(4, $collection1);
            
    }
           /** @test */
        public function returns_JSON_encoded_items():void
    {
        $collection1=new \App\Support\Collection([
            ["userName"=>"Tarek Sherif"],
            ["userName"=>"Ahmed Sherif"],
            ]);
            
          $this->assertEquals(
              '[{"userName":"Tarek Sherif"},{"userName":"Ahmed Sherif"}]',
                 $collection1->ToJSON()
          );
          $this->assertInternalType( 'string',$collection1->ToJSON());
            
    }
       /** @test */
        public function JSON_encoded_a_collection_object_returns_json():void
    {
        $collection1=new \App\Support\Collection([
            ["userName"=>"Tarek Sherif"],
            ["userName"=>"Ahmed Sherif"],
            ]);
            
        $encode= json_encode( $collection1);
          $this->assertEquals(
              '[{"userName":"Tarek Sherif"},{"userName":"Ahmed Sherif"}]',
                  $encode
          );
          
          $this->assertInternalType( 'string',$collection1->ToJSON());
            
    }
}